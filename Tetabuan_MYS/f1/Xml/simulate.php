<?php
// ============================================================
// SIMULATOR — Tetabuan_MYS — generates realistic Main.xml with
// values that change every poll based on time-of-day patterns.
//
// Tetabuan node inventory:
//   - 2× BDI (BDI1, BDI2) — each ~50kVA, share 1 battery bank
//   - 2× SCC (SCC1, SCC2) — DC-coupled solar, ~10kW each peak
//   - 4× GCI (GCI1-4)     — AC-coupled solar, ~50kW each peak
//   - 2× Gen (Gen1, Gen2) — ~100 kW each
//   - Load PM, Ctrl PM
//
// Place at f1/Xml/simulate.php
// To use: change plant.html XML_URL to 'Xml/simulate.php'
// ============================================================
header('Content-Type: text/xml; charset=utf-8');
header('Cache-Control: no-cache, no-store');
date_default_timezone_set('Asia/Bangkok');

$hour = (int)date('H');
$min  = (int)date('i');
$t = $hour + $min/60.0;

function noise($range=0.5){ return (mt_rand(-100,100)/100.0) * $range; }
function clamp($v,$lo,$hi){ return max($lo, min($hi, $v)); }
function f($v,$d=2){ return number_format($v,$d,'.',''); }

// ── Solar bell curve (6am-6pm, peak ~12) ──
// Tetabuan total solar AC + DC peak ~ 220 kW (4×50 GCI + 2×10 SCC)
$solarFactor = 0;
if($t >= 6 && $t <= 18){
    $x = ($t - 12) / 3.2;
    $solarFactor = exp(-$x*$x);   // 0..1
}

// GCI per unit (AC-coupled, ~50 kW peak each)
$gci_peak = 48.0;
$gci1 = max(0, $solarFactor * $gci_peak * (0.95 + noise(0.05)));
$gci2 = max(0, $solarFactor * $gci_peak * (0.93 + noise(0.05)));
$gci3 = max(0, $solarFactor * $gci_peak * (0.96 + noise(0.05)));
$gci4 = max(0, $solarFactor * $gci_peak * (0.94 + noise(0.05)));
$gciSum = $gci1 + $gci2 + $gci3 + $gci4;

// SCC per unit (DC-coupled, ~10 kW peak each)
$scc_peak = 9.5;
$scc1Pv  = max(0, $solarFactor * $scc_peak * (0.97 + noise(0.05)));
$scc2Pv  = max(0, $solarFactor * $scc_peak * (0.95 + noise(0.05)));
$scc1Chg = $scc1Pv * 0.94;
$scc2Chg = $scc2Pv * 0.94;
$sccChgTot = $scc1Chg + $scc2Chg;

// ── SOC pattern ──
// 35% midnight, charge during day to ~85%, discharge evening
$socBase = 35;
if($t >= 7 && $t <= 17) $socBase = 35 + min(50, ($t-7)*5);
elseif($t > 17 && $t <= 23) $socBase = 85 - ($t-17)*7;
else $socBase = 35 + ($t/24)*5;
$soc = clamp($socBase + noise(1.5), 5, 100);

// ── Load (50-90 kW) ──
$loadP = 60 + abs(sin($t/3.5)) * 25 + noise(2);

// ── Generators (run if solar+battery insufficient) ──
$genRunning = ($solarFactor < 0.15 && $soc < 45) || ($hour >= 19 && $hour < 22);
$gen1Running = $genRunning;
$gen2Running = $genRunning && $loadP > 90;   // gen2 only on heavy load
$gen1P = $gen1Running ? 55 + noise(5) : 0;
$gen2P = $gen2Running ? 45 + noise(4) : 0;
$genTot = $gen1P + $gen2P;

// ── BDI / Battery balance ──
// surplus = AC sources - load
$acSupply = $gciSum + $genTot;
$surplus  = $acSupply - $loadP;       // + means charging the battery via BDI

// Total DC (BDI1+BDI2 combined). Sign: <0 charge, >0 discharge
if($surplus > 1 && $soc < 95){
    $battDC_total = -1 * min($surplus * 0.85, 50) + noise(0.5);   // charging
} elseif($surplus < -1 && $soc > 15){
    $battDC_total = min(abs($surplus), 40) + noise(0.5);          // discharging
} else {
    $battDC_total = noise(0.1);
}
// Add SCC charging contribution to DC bus (extra charge to battery)
$battDC_total -= $sccChgTot * 0.6;     // SCC pushes battery toward charging

// Split between BDI1 and BDI2 (60/40 to make them slightly different)
$bdi1DC = $battDC_total * 0.55;
$bdi2DC = $battDC_total * 0.45;
$bdi1AC = abs($bdi1DC) * 0.95;
$bdi2AC = abs($bdi2DC) * 0.95;
$bdiACtot = $bdi1AC + $bdi2AC;

$battV = 528 + ($soc/100) * 32 + noise(1);   // 528..560V (high-V battery bank)
$battI = $battV > 0 ? abs($battDC_total) * 1000 / $battV : 0;

// ── Voltages (3-phase, ~400V Y / 230V phase) ──
$v1 = 230.5 + noise(1.0); $v2 = 231.0 + noise(1.0); $v3 = 229.8 + noise(1.0);

// ── Ctrl PM (AC input total = generators feeding bus) ──
$ctrlTot = $genTot;
$cP1 = $ctrlTot/3 + noise(0.3);
$cP2 = $ctrlTot/3 + noise(0.3);
$cP3 = $ctrlTot - $cP1 - $cP2;
$cI1 = $v1>0?($cP1*1000/$v1):0;
$cI2 = $v2>0?($cP2*1000/$v2):0;
$cI3 = $v3>0?($cP3*1000/$v3):0;

// ── Load PM (3-phase) ──
$ldP1 = $loadP/3 + noise(0.4); $ldP2 = $loadP/3 + noise(0.4); $ldP3 = $loadP - $ldP1 - $ldP2;
$ldI1 = $v1>0?($ldP1*1000/$v1):0;
$ldI2 = $v2>0?($ldP2*1000/$v2):0;
$ldI3 = $v3>0?($ldP3*1000/$v3):0;

// ── Weather ──
$irr  = $solarFactor * 1050 + noise(20);
$irr  = max(0, $irr);
$tMod = 26 + ($irr/1000)*22 + noise(1);
$tAmb = 28 + ($t >= 10 && $t <= 16 ? 5 : 0) + noise(0.5);
$rh   = 72 + noise(5);

// ── Today energy accumulators ──
$todayHr   = max(0, $t - 6);
$todayPv   = ($gciSum + $sccChgTot) * 0.35 * $todayHr;
$todayGen  = $genRunning ? $genTot * $todayHr * 0.2 : ($t > 22 ? 80 + noise(5) : 0);
$todayLoad = $loadP * $t * 0.5;
$gen1Today = $gen1P > 0 ? $gen1P * $todayHr * 0.18 : ($t > 22 ? 50 : 0);
$gen2Today = $gen2P > 0 ? $gen2P * $todayHr * 0.10 : 0;

// ── Status strings ──
$gen1Status = $gen1Running ? 'Running' : 'Stop';
$gen2Status = $gen2Running ? 'Running' : 'Stop';

echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<Main>
<DateServer><?php echo date('d-M-y');?></DateServer>
<TimeServer><?php echo date('H:i:s');?></TimeServer>
<InstallDate>29-Oct-2025</InstallDate>
<DatetimeHccu><?php echo date('YmdHis');?></DatetimeHccu>

<!-- ============= BDI 1 ============= -->
<BDI1_BDI_Total_Power_kW><?php echo f($bdi1AC);?></BDI1_BDI_Total_Power_kW>
<BDI1_BDI_DC_Power_kW><?php echo f($bdi1DC);?></BDI1_BDI_DC_Power_kW>
<BDI1_BDI_SOC><?php echo f($soc,0);?></BDI1_BDI_SOC>
<BDI1_BDI_Batt_Voltage><?php echo f($battV,1);?></BDI1_BDI_Batt_Voltage>
<BDI1_BDI_Battery_Current><?php echo f($battI);?></BDI1_BDI_Battery_Current>
<BDI1_BDI_Heat_Sink_Temp><?php echo f(42+noise(3),1);?></BDI1_BDI_Heat_Sink_Temp>
<BDI1_BDI_Voltage_L1><?php echo f($v1,1);?></BDI1_BDI_Voltage_L1>
<BDI1_BDI_Voltage_L2><?php echo f($v2,1);?></BDI1_BDI_Voltage_L2>
<BDI1_BDI_Voltage_L3><?php echo f($v3,1);?></BDI1_BDI_Voltage_L3>
<BDI1_BDI_Power_P1_kW><?php echo f($bdi1AC/3);?></BDI1_BDI_Power_P1_kW>
<BDI1_BDI_Power_P2_kW><?php echo f($bdi1AC/3);?></BDI1_BDI_Power_P2_kW>
<BDI1_BDI_Power_P3_kW><?php echo f($bdi1AC/3);?></BDI1_BDI_Power_P3_kW>
<BDI1_BDI_Freq><?php echo f(50+noise(0.05));?></BDI1_BDI_Freq>
<BDI1_BDI_PF>0.98</BDI1_BDI_PF>

<!-- ============= BDI 2 ============= -->
<BDI2_BDI_Total_Power_kW><?php echo f($bdi2AC);?></BDI2_BDI_Total_Power_kW>
<BDI2_BDI_DC_Power_kW><?php echo f($bdi2DC);?></BDI2_BDI_DC_Power_kW>
<BDI2_BDI_SOC><?php echo f($soc,0);?></BDI2_BDI_SOC>
<BDI2_BDI_Batt_Voltage><?php echo f($battV,1);?></BDI2_BDI_Batt_Voltage>
<BDI2_BDI_Battery_Current><?php echo f($battI);?></BDI2_BDI_Battery_Current>
<BDI2_BDI_Heat_Sink_Temp><?php echo f(43+noise(3),1);?></BDI2_BDI_Heat_Sink_Temp>
<BDI2_BDI_Voltage_L1><?php echo f($v1,1);?></BDI2_BDI_Voltage_L1>
<BDI2_BDI_Voltage_L2><?php echo f($v2,1);?></BDI2_BDI_Voltage_L2>
<BDI2_BDI_Voltage_L3><?php echo f($v3,1);?></BDI2_BDI_Voltage_L3>
<BDI2_BDI_Power_P1_kW><?php echo f($bdi2AC/3);?></BDI2_BDI_Power_P1_kW>
<BDI2_BDI_Power_P2_kW><?php echo f($bdi2AC/3);?></BDI2_BDI_Power_P2_kW>
<BDI2_BDI_Power_P3_kW><?php echo f($bdi2AC/3);?></BDI2_BDI_Power_P3_kW>
<BDI2_BDI_Freq><?php echo f(50+noise(0.05));?></BDI2_BDI_Freq>
<BDI2_BDI_PF>0.98</BDI2_BDI_PF>

<!-- ============= SCC 1 ============= -->
<SCC1_PV_Voltage><?php echo $scc1Pv > 0.1 ? f(450+noise(20),1) : '0.0';?></SCC1_PV_Voltage>
<SCC1_PV_Current><?php echo $scc1Pv > 0.1 ? f($scc1Pv*1000/470) : '0.00';?></SCC1_PV_Current>
<SCC1_PV_Power_kW><?php echo f($scc1Pv);?></SCC1_PV_Power_kW>
<SCC1_Chg_Voltage><?php echo $scc1Pv > 0.1 ? f($battV,1) : '0.0';?></SCC1_Chg_Voltage>
<SCC1_Chg_Current><?php echo $scc1Pv > 0.1 ? f($scc1Chg*1000/$battV) : '0.00';?></SCC1_Chg_Current>
<SCC1_Chg_Power_kW><?php echo f($scc1Chg);?></SCC1_Chg_Power_kW>

<!-- ============= SCC 2 ============= -->
<SCC2_PV_Voltage><?php echo $scc2Pv > 0.1 ? f(448+noise(20),1) : '0.0';?></SCC2_PV_Voltage>
<SCC2_PV_Current><?php echo $scc2Pv > 0.1 ? f($scc2Pv*1000/468) : '0.00';?></SCC2_PV_Current>
<SCC2_PV_Power_kW><?php echo f($scc2Pv);?></SCC2_PV_Power_kW>
<SCC2_Chg_Voltage><?php echo $scc2Pv > 0.1 ? f($battV,1) : '0.0';?></SCC2_Chg_Voltage>
<SCC2_Chg_Current><?php echo $scc2Pv > 0.1 ? f($scc2Chg*1000/$battV) : '0.00';?></SCC2_Chg_Current>
<SCC2_Chg_Power_kW><?php echo f($scc2Chg);?></SCC2_Chg_Power_kW>

<!-- ============= GCI 1-4 (AC-coupled PV inverters) ============= -->
<?php
$gciValues = [1=>$gci1, 2=>$gci2, 3=>$gci3, 4=>$gci4];
foreach($gciValues as $idx=>$gciP){
    $pvV = $gciP>0.1 ? 580+noise(15) : 0;
    $pvI = $pvV>0 ? $gciP*1000/$pvV/3 : 0;
    $acI = $gciP>0.1 ? $gciP*1000/(3*$v1) : 0;
?>
<GCI<?=$idx?>_PV1_Voltage><?php echo f($pvV,1);?></GCI<?=$idx?>_PV1_Voltage>
<GCI<?=$idx?>_PV2_Voltage><?php echo f($pvV+noise(5),1);?></GCI<?=$idx?>_PV2_Voltage>
<GCI<?=$idx?>_PV3_Voltage><?php echo f($pvV+noise(5),1);?></GCI<?=$idx?>_PV3_Voltage>
<GCI<?=$idx?>_PV1_Current><?php echo f($pvI,2);?></GCI<?=$idx?>_PV1_Current>
<GCI<?=$idx?>_PV2_Current><?php echo f($pvI,2);?></GCI<?=$idx?>_PV2_Current>
<GCI<?=$idx?>_PV3_Current><?php echo f($pvI,2);?></GCI<?=$idx?>_PV3_Current>
<GCI<?=$idx?>_Sum_PV_Current><?php echo f($pvI*3,2);?></GCI<?=$idx?>_Sum_PV_Current>
<GCI<?=$idx?>_PV1_Power_kW><?php echo f($gciP/3,2);?></GCI<?=$idx?>_PV1_Power_kW>
<GCI<?=$idx?>_PV2_Power_kW><?php echo f($gciP/3,2);?></GCI<?=$idx?>_PV2_Power_kW>
<GCI<?=$idx?>_PV3_Power_kW><?php echo f($gciP/3,2);?></GCI<?=$idx?>_PV3_Power_kW>
<GCI<?=$idx?>_Sum_PV_kW><?php echo f($gciP);?></GCI<?=$idx?>_Sum_PV_kW>
<GCI<?=$idx?>_AC_Voltage_L1><?php echo f($v1,1);?></GCI<?=$idx?>_AC_Voltage_L1>
<GCI<?=$idx?>_AC_Voltage_L2><?php echo f($v2,1);?></GCI<?=$idx?>_AC_Voltage_L2>
<GCI<?=$idx?>_AC_Voltage_L3><?php echo f($v3,1);?></GCI<?=$idx?>_AC_Voltage_L3>
<GCI<?=$idx?>_Freq_L1_Hz><?php echo f(50+noise(0.05));?></GCI<?=$idx?>_Freq_L1_Hz>
<GCI<?=$idx?>_Freq_L2_Hz><?php echo f(50+noise(0.05));?></GCI<?=$idx?>_Freq_L2_Hz>
<GCI<?=$idx?>_Freq_L3_Hz><?php echo f(50+noise(0.05));?></GCI<?=$idx?>_Freq_L3_Hz>
<GCI<?=$idx?>_AC_Current_I1><?php echo f($acI);?></GCI<?=$idx?>_AC_Current_I1>
<GCI<?=$idx?>_AC_Current_I2><?php echo f($acI);?></GCI<?=$idx?>_AC_Current_I2>
<GCI<?=$idx?>_AC_Current_I3><?php echo f($acI);?></GCI<?=$idx?>_AC_Current_I3>
<GCI<?=$idx?>_AC_Power_kW><?php echo f($gciP);?></GCI<?=$idx?>_AC_Power_kW>
<GCI<?=$idx?>_Today_AC_kWh><?php echo f($gciP*$todayHr*0.4);?></GCI<?=$idx?>_Today_AC_kWh>
<GCI<?=$idx?>_Today_PV_kWh><?php echo f($gciP*$todayHr*0.42);?></GCI<?=$idx?>_Today_PV_kWh>
<?php } ?>
<GCI_Sum_PV_kW><?php echo f($gciSum);?></GCI_Sum_PV_kW>
<GCI_Sum_AC_kW><?php echo f($gciSum*0.97);?></GCI_Sum_AC_kW>
<GCI_Sum_Today_AC_kWh><?php echo f($gciSum*$todayHr*0.4);?></GCI_Sum_Today_AC_kWh>
<GCI_Sum_Today_PV_kWh><?php echo f($gciSum*$todayHr*0.42);?></GCI_Sum_Today_PV_kWh>

<!-- ============= Generator 1 ============= -->
<Gen1_Engine><?php echo $gen1Status;?></Gen1_Engine>
<Gen1_Total_Power_kW><?php echo f($gen1P);?></Gen1_Total_Power_kW>
<Gen1_Power_factor>0.99</Gen1_Power_factor>
<Gen1_V1n><?php echo $gen1Running ? f($v1,1) : '0.0';?></Gen1_V1n>
<Gen1_V2n><?php echo $gen1Running ? f($v2,1) : '0.0';?></Gen1_V2n>
<Gen1_V3n><?php echo $gen1Running ? f($v3,1) : '0.0';?></Gen1_V3n>
<Gen1_VoltageL1_L2><?php echo $gen1Running ? f(400+noise(2),1) : '0.0';?></Gen1_VoltageL1_L2>
<Gen1_VoltageL2_L3><?php echo $gen1Running ? f(400+noise(2),1) : '0.0';?></Gen1_VoltageL2_L3>
<Gen1_VoltageL3_L1><?php echo $gen1Running ? f(400+noise(2),1) : '0.0';?></Gen1_VoltageL3_L1>
<Gen1_I1><?php echo $gen1Running ? f($gen1P*1000/(3*$v1)) : '0.0';?></Gen1_I1>
<Gen1_I2><?php echo $gen1Running ? f($gen1P*1000/(3*$v2)) : '0.0';?></Gen1_I2>
<Gen1_I3><?php echo $gen1Running ? f($gen1P*1000/(3*$v3)) : '0.0';?></Gen1_I3>
<Gen1_Total_ReactivePower_kVA><?php echo f($gen1P*1.01);?></Gen1_Total_ReactivePower_kVA>
<Gen1_Run_hour_h>1245.5</Gen1_Run_hour_h>
<Gen1_Today_kWh><?php echo f($gen1Today);?></Gen1_Today_kWh>
<Gen1_Today_Run_hour_h><?php echo f($gen1Running?$todayHr*0.3:0,2);?></Gen1_Today_Run_hour_h>
<Gen1_Real_Energy_MWh>458.20</Gen1_Real_Energy_MWh>

<!-- ============= Generator 2 ============= -->
<Gen2_Engine><?php echo $gen2Status;?></Gen2_Engine>
<Gen2_Total_Power_kW><?php echo f($gen2P);?></Gen2_Total_Power_kW>
<Gen2_Power_factor>0.99</Gen2_Power_factor>
<Gen2_V1n><?php echo $gen2Running ? f($v1,1) : '0.0';?></Gen2_V1n>
<Gen2_V2n><?php echo $gen2Running ? f($v2,1) : '0.0';?></Gen2_V2n>
<Gen2_V3n><?php echo $gen2Running ? f($v3,1) : '0.0';?></Gen2_V3n>
<Gen2_VoltageL1_L2><?php echo $gen2Running ? f(400+noise(2),1) : '0.0';?></Gen2_VoltageL1_L2>
<Gen2_VoltageL2_L3><?php echo $gen2Running ? f(400+noise(2),1) : '0.0';?></Gen2_VoltageL2_L3>
<Gen2_VoltageL3_L1><?php echo $gen2Running ? f(400+noise(2),1) : '0.0';?></Gen2_VoltageL3_L1>
<Gen2_I1><?php echo $gen2Running ? f($gen2P*1000/(3*$v1)) : '0.0';?></Gen2_I1>
<Gen2_I2><?php echo $gen2Running ? f($gen2P*1000/(3*$v2)) : '0.0';?></Gen2_I2>
<Gen2_I3><?php echo $gen2Running ? f($gen2P*1000/(3*$v3)) : '0.0';?></Gen2_I3>
<Gen2_Total_ReactivePower_kVA><?php echo f($gen2P*1.01);?></Gen2_Total_ReactivePower_kVA>
<Gen2_Run_hour_h>820.3</Gen2_Run_hour_h>
<Gen2_Today_kWh><?php echo f($gen2Today);?></Gen2_Today_kWh>
<Gen2_Today_Run_hour_h><?php echo f($gen2Running?$todayHr*0.15:0,2);?></Gen2_Today_Run_hour_h>
<Gen2_Real_Energy_MWh>302.10</Gen2_Real_Energy_MWh>

<!-- ============= Ctrl PM (AC input total) ============= -->
<Ctrl_PM_Voltage_L1><?php echo f($v1,1);?></Ctrl_PM_Voltage_L1>
<Ctrl_PM_Voltage_L2><?php echo f($v2,1);?></Ctrl_PM_Voltage_L2>
<Ctrl_PM_Voltage_L3><?php echo f($v3,1);?></Ctrl_PM_Voltage_L3>
<Ctrl_PM_Current_I1><?php echo f($cI1);?></Ctrl_PM_Current_I1>
<Ctrl_PM_Current_I2><?php echo f($cI2);?></Ctrl_PM_Current_I2>
<Ctrl_PM_Current_I3><?php echo f($cI3);?></Ctrl_PM_Current_I3>
<Ctrl_PM_Power_P1_kW><?php echo f($cP1);?></Ctrl_PM_Power_P1_kW>
<Ctrl_PM_Power_P2_kW><?php echo f($cP2);?></Ctrl_PM_Power_P2_kW>
<Ctrl_PM_Power_P3_kW><?php echo f($cP3);?></Ctrl_PM_Power_P3_kW>
<Ctrl_PM_Total_P_kW><?php echo f($ctrlTot);?></Ctrl_PM_Total_P_kW>
<Ctrl_PM_PF1>0.99</Ctrl_PM_PF1>
<Ctrl_PM_PF2>0.99</Ctrl_PM_PF2>
<Ctrl_PM_PF3>0.99</Ctrl_PM_PF3>
<Ctrl_PM_Freq><?php echo f(50+noise(0.05));?></Ctrl_PM_Freq>
<Ctrl_PM_Today_Import_kWh><?php echo f($todayGen);?></Ctrl_PM_Today_Import_kWh>
<Ctrl_PM_Import_kWh>125400.50</Ctrl_PM_Import_kWh>

<!-- ============= Load PM ============= -->
<Load_PM_Voltage_L1><?php echo f($v1,1);?></Load_PM_Voltage_L1>
<Load_PM_Voltage_L2><?php echo f($v2,1);?></Load_PM_Voltage_L2>
<Load_PM_Voltage_L3><?php echo f($v3,1);?></Load_PM_Voltage_L3>
<Load_PM_Current_I1><?php echo f($ldI1);?></Load_PM_Current_I1>
<Load_PM_Current_I2><?php echo f($ldI2);?></Load_PM_Current_I2>
<Load_PM_Current_I3><?php echo f($ldI3);?></Load_PM_Current_I3>
<Load_PM_Power_P1_kW><?php echo f($ldP1);?></Load_PM_Power_P1_kW>
<Load_PM_Power_P2_kW><?php echo f($ldP2);?></Load_PM_Power_P2_kW>
<Load_PM_Power_P3_kW><?php echo f($ldP3);?></Load_PM_Power_P3_kW>
<Load_PM_Total_P_kW><?php echo f($loadP);?></Load_PM_Total_P_kW>
<Load_PM_PF1>0.96</Load_PM_PF1>
<Load_PM_PF2>0.96</Load_PM_PF2>
<Load_PM_PF3>0.96</Load_PM_PF3>
<Load_PM_Freq><?php echo f(50+noise(0.05));?></Load_PM_Freq>
<Load_PM_Today_Import_kWh><?php echo f($todayLoad);?></Load_PM_Today_Import_kWh>
<Load_PM_Import_kWh>89540.20</Load_PM_Import_kWh>

<!-- ============= PV totals ============= -->
<PV_kW><?php echo f($gciSum + $sccChgTot);?></PV_kW>
<PV_kWh><?php echo f($todayPv);?></PV_kWh>

<!-- ============= Weather ============= -->
<Irradiance_W_m2><?php echo f($irr,0);?></Irradiance_W_m2>
<Irradiation_kWh_m2><?php echo f($solarFactor*4*$todayHr/24,2);?></Irradiation_kWh_m2>
<Tmod><?php echo f($tMod,1);?></Tmod>
<Tamb><?php echo f($tAmb,1);?></Tamb>
<RH><?php echo f($rh,1);?></RH>
<analog1><?php echo f($irr,0);?></analog1>
<analog5><?php echo f($tMod,1);?></analog5>
<analog6><?php echo f($tAmb,1);?></analog6>
</Main>
