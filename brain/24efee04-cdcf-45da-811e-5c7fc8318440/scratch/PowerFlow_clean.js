    const PowerFlow = {
      _pid: 0,
      render(data) {
        const W = 1200, H = 640;
        const cardW = 250, cardH = 130;
        const topY = 80;
        const busY = 200;
        const midY = 320;
        const dcY = 440;
        const botY = 560;

        const cGen = { x: 155, y: topY, w: cardW, h: cardH };
        const cWeather = { x: 450, y: topY, w: cardW, h: cardH };
        const cGci = { x: 745, y: topY, w: cardW, h: cardH };
        const cLoad = { x: 1045, y: topY, w: cardW, h: cardH };
        const cBdi1 = { x: 450, y: midY, w: cardW, h: cardH };
        const cBdi2 = { x: 745, y: midY, w: cardW, h: cardH };
        const cScc = { x: 155, y: botY, w: cardW, h: cardH };
        const cEss1 = { x: 450, y: botY, w: cardW, h: cardH };
        const cEss2 = { x: 745, y: botY, w: cardW, h: cardH };

        const g1P = data.gen1_power || 0, g1On = data.gen1_on;
        const g2P = data.gen2_power || 0, g2On = data.gen2_on;
        const gTot = g1P + g2P, genOn = g1On || g2On;
        const gciP = [data.gci1_power || 0, data.gci2_power || 0, data.gci3_power || 0, data.gci4_power || 0];
        const gciTot = gciP.reduce((a, b) => a + b, 0);
        const bdi1P = data.bdi1_power || 0, bdi1Soc = data.bdi1_soc || 0, bdi1Current = data.bdi1_current || 0;
        const bdi2P = data.bdi2_power || 0, bdi2Soc = data.bdi2_soc || 0, bdi2Current = data.bdi2_current || 0;
        const scc1P = data.scc1_power || 0, scc2P = data.scc2_power || 0, sccTot = scc1P + scc2P;
        const ldP = data.load_power || 0, ldV1 = data.load_v1 || 0, ldV2 = data.load_v2 || 0, ldV3 = data.load_v3 || 0;
        const irr = data.irradiance || 0, tMod = data.tmod || 0, tAmb = data.tamb || 0, rh = data.rh || 0;

        const bdi1Charging = bdi1P < -0.5, bdi1Discharging = bdi1P > 0.5;
        const bdi2Charging = bdi2P < -0.5, bdi2Discharging = bdi2P > 0.5;

        const LN_COLOR = '#cbd5e1';
        const ln = (x1, y1, x2, y2, color) => `<line x1="${x1}" y1="${y1}" x2="${x2}" y2="${y2}" stroke="${color || LN_COLOR}" stroke-width="2" stroke-linecap="round"/>`;
        const dots = (x1, y1, x2, y2, color, delay) => {
          const id = 'anim-' + Math.random().toString(36).substr(2, 5);
          return `<circle r="3" fill="${color || '#3b82f6'}" filter="url(#glow)">
            <animateMotion dur="2.5s" repeatCount="indefinite" path="M ${x1} ${y1} L ${x2} ${y2}" id="${id}" begin="${-(delay || 0)}s"/>
          </circle>`;
        };
        const routeDots = (pts, color, delay) => {
          if (!pts || pts.length < 2) return '';
          const path = pts.map((p, i) => (i === 0 ? 'M' : 'L') + p.x + ' ' + p.y).join(' ');
          return `<circle r="3" fill="${color || '#3b82f6'}" filter="url(#glow)">
            <animateMotion dur="3s" repeatCount="indefinite" path="${path}" begin="${-(delay || 0)}s"/>
          </circle>`;
        };

        const card = (c, opts) => {
          const { title, iconSym, iconColor, mainLabel, mainValue, mainUnit, valueColor, subRows } = opts;
          const x = c.x - c.w / 2, y = c.y - c.h / 2;
          let s = `<g filter="url(#shadow)">`;
          s += `<rect x="${x}" y="${y}" width="${c.w}" height="${c.h}" rx="12" fill="url(#cardGrad)" stroke="#e2e8f0" stroke-width="1"/>`;
          s += `<path d="M ${x + 12} ${y} h ${c.w - 24} q 12 0 12 12 v 28 h ${-c.w} v -28 q 0 -12 12 -12 z" fill="${iconColor}10"/>`;
          s += `<circle cx="${x + 25}" cy="${y + 22}" r="14" fill="${iconColor}15"/>`;
          s += `<text x="${x + 25}" y="${y + 27}" text-anchor="middle" font-size="18" fill="${iconColor}">${iconSym}</text>`;
          s += `<text x="${x + 48}" y="${y + 26}" font-size="14" font-weight="700" fill="#334155" font-family="DM Sans,sans-serif">${title}</text>`;
          s += `<text x="${x + 14}" y="${y + 68}" font-size="12" font-weight="600" fill="#64748b" font-family="DM Sans,sans-serif" text-transform="uppercase" letter-spacing="0.5">${mainLabel}</text>`;
          s += `<text x="${x + c.w - 14}" y="${y + 72}" text-anchor="end" font-size="28" font-weight="800" fill="${valueColor || '#1e293b'}" font-family="DM Mono,monospace">${mainValue}<tspan font-size="14" fill="#94a3b8" font-weight="600" dx="6">${mainUnit || ''}</tspan></text>`;
          if (subRows && subRows.length) {
            const rowY0 = y + 104;
            const colW = (c.w - 20) / subRows.length;
            subRows.forEach((r, i) => {
              const cx = x + 10 + colW * (i + 0.5);
              s += `<text x="${cx}" y="${rowY0}" text-anchor="middle" font-size="10" font-weight="700" fill="#94a3b8" font-family="DM Sans,sans-serif" text-transform="uppercase">${r.label}</text>`;
              s += `<text x="${cx}" y="${rowY0 + 24}" text-anchor="middle" font-size="16" font-weight="700" fill="${r.color || '#334155'}" font-family="DM Mono,monospace">${r.value}${r.unit && r.inlineUnit ? `<tspan font-size="11" fill="#94a3b8" font-weight="500" dx="4">${r.unit}</tspan>` : ''}</text>`;
            });
          }
          s += `</g>`; return s;
        };

        let svg = `<svg viewBox="0 0 ${W} ${H}" preserveAspectRatio="xMidYMid meet" style="width:100%;height:auto" xmlns="http://www.w3.org/2000/svg">
          <defs>
            <filter id="shadow" x="-20%" y="-20%" width="140%" height="140%"><feGaussianBlur in="SourceAlpha" stdDeviation="3"/><feOffset dx="0" dy="2" result="offsetblur"/><feComponentTransfer><feFuncA type="linear" slope="0.15"/></feComponentTransfer><feMerge><feMergeNode/><feMergeNode in="SourceGraphic"/></feMerge></filter>
            <filter id="glow" x="-50%" y="-50%" width="200%" height="200%"><feGaussianBlur stdDeviation="2.5" result="blur"/><feComposite in="SourceGraphic" in2="blur" operator="over"/></filter>
            <linearGradient id="cardGrad" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#ffffff"/><stop offset="100%" stop-color="#f8fafc"/></linearGradient>
          </defs>`;

        svg += `<line x1="${cGen.x}" y1="${busY}" x2="${cLoad.x}" y2="${busY}" stroke="${LN_COLOR}" stroke-width="2.2" opacity="0.7"/>`;
        svg += `<text x="${cGen.x}" y="${busY - 8}" font-size="11" fill="#444" font-family="DM Sans,sans-serif" font-weight="600" letter-spacing="0.5">AC BUS</text>`;
        svg += `<line x1="${cScc.x}" y1="${dcY}" x2="${cEss1.x}" y2="${dcY}" stroke="${LN_COLOR}" stroke-width="2.2" opacity="0.7"/>`;
        svg += `<text x="${cScc.x}" y="${dcY - 8}" font-size="11" fill="#444" font-family="DM Sans,sans-serif" font-weight="600" letter-spacing="0.5">DC BUS</text>`;

        svg += ln(cGen.x, cGen.y + cGen.h / 2, cGen.x, busY);
        svg += ln(cGci.x, cGci.y + cGci.h / 2, cGci.x, busY);
        svg += ln(cLoad.x, busY, cLoad.x, cLoad.y + cLoad.h / 2);
        svg += ln(cBdi1.x, busY, cBdi1.x, cBdi1.y - cBdi1.h / 2);
        svg += ln(cBdi2.x, busY, cBdi2.x, cBdi2.y - cBdi2.h / 2);
        svg += ln(cBdi1.x, cBdi1.y + cBdi1.h / 2, cBdi1.x, dcY);
        svg += ln(cBdi2.x, cBdi2.y + cBdi2.h / 2, cBdi2.x, dcY);
        svg += ln(cScc.x, dcY, cScc.x, cScc.y - cScc.h / 2);
        svg += ln(cEss1.x, dcY, cEss1.x, cEss1.y - cEss1.h / 2);
        svg += ln(cEss2.x, dcY, cEss2.x, cEss2.y - cEss2.h / 2);

        if (genOn && gTot > 0.5) svg += dots(cGen.x, cGen.y + cGen.h / 2, cGen.x, busY, '#ea580c', 0.1);
        if (gciTot > 0.5) svg += dots(cGci.x, cGci.y + cGci.h / 2, cGci.x, busY, '#f59e0b', 0.2);
        if (ldP > 0.5) {
          svg += dots(cGci.x, busY, cLoad.x, busY, '#3b82f6', 0.15);
          svg += dots(cLoad.x, busY, cLoad.x, cLoad.y + cLoad.h / 2, '#3b82f6', 0.4);
        }
        if (bdi1Charging) {
          svg += dots(cBdi1.x, busY, cBdi1.x, cBdi1.y - cBdi1.h / 2, '#8b5cf6', 0.2);
          svg += routeDots([{ x: cBdi1.x, y: cBdi1.y + cBdi1.h / 2 }, { x: cBdi1.x, y: dcY }, { x: cEss1.x, y: dcY }, { x: cEss1.x, y: cEss1.y - cEss1.h / 2 }], '#8b5cf6', 0.5);
        } else if (bdi1Discharging) {
          svg += routeDots([{ x: cEss1.x, y: cEss1.y - cEss1.h / 2 }, { x: cEss1.x, y: dcY }, { x: cBdi1.x, y: dcY }, { x: cBdi1.x, y: cBdi1.y + cBdi1.h / 2 }], '#8b5cf6', 0.2);
          svg += dots(cBdi1.x, cBdi1.y - cBdi1.h / 2, cBdi1.x, busY, '#8b5cf6', 0.6);
        }
        if (bdi2Charging) {
          svg += dots(cBdi2.x, busY, cBdi2.x, cBdi2.y - cBdi2.h / 2, '#8b5cf6', 0.2);
          svg += routeDots([{ x: cBdi2.x, y: cBdi2.y + cBdi2.h / 2 }, { x: cBdi2.x, y: dcY }, { x: cEss2.x, y: dcY }, { x: cEss2.x, y: cEss2.y - cEss2.h / 2 }], '#8b5cf6', 0.5);
        } else if (bdi2Discharging) {
          svg += routeDots([{ x: cEss2.x, y: cEss2.y - cEss2.h / 2 }, { x: cEss2.x, y: dcY }, { x: cBdi2.x, y: dcY }, { x: cBdi2.x, y: cBdi2.y + cBdi2.h / 2 }], '#8b5cf6', 0.2);
          svg += dots(cBdi2.x, cBdi2.y - cBdi2.h / 2, cBdi2.x, busY, '#8b5cf6', 0.6);
        }
        if (sccTot > 0.5) {
          svg += dots(cScc.x, cScc.y - cScc.h / 2, cScc.x, dcY, '#f59e0b', 0.3);
          svg += dots(cScc.x, dcY, cEss1.x, dcY, '#f59e0b', 0.5);
        }

        svg += card(cGen, { title: 'Diesel Generators', iconSym: '&#9881;', iconColor: '#3b82f6', mainLabel: 'Power', mainValue: fmt(gTot, 1), mainUnit: 'kW', valueColor: '#3b82f6', subRows: [{ label: 'GEN-1', value: fmt(g1P, 1) }, { label: 'GEN-2', value: fmt(g2P, 1), unit: 'kW' }] });
        svg += card(cWeather, { title: 'Meteorological Data', iconSym: '&#9728;', iconColor: '#0891b2', mainLabel: 'Irradiance', mainValue: fmt(irr, 0), mainUnit: 'W/m²', valueColor: '#0891b2', subRows: [{ label: 'PV Temp', value: fmt(tMod, 1) }, { label: 'Ambient', value: fmt(tAmb, 1) }, { label: 'Humidity', value: fmt(rh, 0), unit: '°C/%' }] });
        svg += card(cGci, { title: 'PV Inverters', iconSym: '&#9728;', iconColor: '#f59e0b', mainLabel: 'Power', mainValue: fmt(gciTot, 1), mainUnit: 'kW', valueColor: '#f59e0b', subRows: [{ label: 'GCI-1', value: fmt(gciP[0], 1) }, { label: 'GCI-2', value: fmt(gciP[1], 1), unit: 'kW' }] });
        svg += card(cLoad, { title: 'Load', iconSym: '&#9750;', iconColor: '#16a34a', mainLabel: 'Power', mainValue: fmt(ldP, 1), mainUnit: 'kW', valueColor: '#16a34a', subRows: [{ label: 'L1', value: fmt(ldV1, 0) }, { label: 'L2', value: fmt(ldV2, 0) }, { label: 'L3', value: fmt(ldV3, 0), unit: 'V' }] });
        svg += card(cBdi1, { title: 'BDI-Master', iconSym: '&#8644;', iconColor: '#3b82f6', mainLabel: 'Power', mainValue: (bdi1P > 0 ? '+' : '') + fmt(bdi1P, 1), mainUnit: 'kW', valueColor: '#8b5cf6', subRows: [{ label: 'SOC', value: fmt(bdi1Soc, 0) }, { label: 'Current', value: fmt(bdi1Current, 2), unit: '%/A' }] });
        svg += card(cBdi2, { title: 'BDI-Slave', iconSym: '&#8644;', iconColor: '#3b82f6', mainLabel: 'Power', mainValue: (bdi2P > 0 ? '+' : '') + fmt(bdi2P, 1), mainUnit: 'kW', valueColor: '#8b5cf6', subRows: [{ label: 'SOC', value: fmt(bdi2Soc, 0) }, { label: 'Current', value: fmt(bdi2Current, 2), unit: '%/A' }] });
        svg += card(cScc, { title: 'Solar Charge Controllers', iconSym: '&#9728;', iconColor: '#f59e0b', mainLabel: 'Power', mainValue: fmt(sccTot, 2), mainUnit: 'kW', valueColor: '#f59e0b', subRows: [{ label: 'SCC-1', value: fmt(scc1P, 2) }, { label: 'SCC-2', value: fmt(scc2P, 2), unit: 'kW' }] });
        svg += card(cEss1, { title: 'ESS-1', iconSym: '&#9707;', iconColor: '#22c55e', mainLabel: 'SOC', mainValue: fmt(bdi1Soc, 0), mainUnit: '%', valueColor: '#22c55e', subRows: [{ label: 'Voltage', value: fmt(data.bdi1_voltage || 0, 0) }, { label: 'Power', value: fmt(Math.abs(bdi1P), 1), unit: 'kW' }] });
        svg += card(cEss2, { title: 'ESS-2', iconSym: '&#9707;', iconColor: '#22c55e', mainLabel: 'SOC', mainValue: fmt(bdi2Soc, 0), mainUnit: '%', valueColor: '#22c55e', subRows: [{ label: 'Voltage', value: fmt(data.bdi2_voltage || 0, 0) }, { label: 'Power', value: fmt(Math.abs(bdi2P), 1), unit: 'kW' }] });

        return svg + '</svg>';
      },
      renderMobile(data) {
        const batP = data.battery_power || 0;
        const batS = data.battery_soc || 0;
        const ldP = data.load_power || 0;
        const gciTot = (data.gci1_power || 0) + (data.gci2_power || 0) + (data.gci3_power || 0) + (data.gci4_power || 0);
        const sccTot = (data.scc1_power || 0) + (data.scc2_power || 0);
        const genTot = (data.gen1_power || 0) + (data.gen2_power || 0);
        const genOn = data.gen1_on || data.gen2_on;
        const batCharging = batP < -0.5, batDischarging = batP > 0.5;
        const batColor = batCharging ? '#22c55e' : batDischarging ? '#8b5cf6' : '#888';

        function card(label, icon, value, sub, bg, brd, iconBg, iconColor, valueColor) {
          return `<div class="mpf-card" style="background:${bg};border-color:${brd}">
        <div class="mpf-ic" style="background:${iconBg};color:${iconColor}">${icon}</div>
        <div class="mpf-body">
          <div class="mpf-l">${label}</div>
          <div class="mpf-v" style="color:${valueColor}">${value}</div>
          <div class="mpf-sub">${sub}</div>
        </div>
      </div>`;
        }
        function section(label) {
          return `<div class="mpf-section">${label}</div>`;
        }
        function flowArrow(color, text) {
          return `<div class="mpf-flow-arrow" style="color:${color}">
        <span class="arr-line"></span><span class="arr-tri">▼</span><span>${text || ''}</span><span class="arr-tri">▼</span><span class="arr-line"></span>
      </div>`;
        }

        const solarACCard = gciTot > 0.5 ? card('Solar AC', '&#9728;', gciTot.toFixed(2) + ' kW', 'GCI Inverters', '#fffbeb', '#fde68a', '#fef3c7', '#f59e0b', '#f59e0b') : '';
        const solarDCCard = sccTot > 0.5 ? card('Solar DC', '&#9728;', sccTot.toFixed(2) + ' kW', 'SCC Controllers', '#fffbeb', '#fde68a', '#fef3c7', '#f59e0b', '#f59e0b') : '';
        const genCard = genOn ? card('Generators', '&#9881;', genTot.toFixed(2) + ' kW', 'Running', '#fff7ed', '#fed7aa', '#fff7ed', '#ea580c', '#ea580c') : '';
        const battSub = batCharging ? `Charging · SOC ${Math.round(batS)}%` : batDischarging ? `Discharging · SOC ${Math.round(batS)}%` : `Idle · SOC ${Math.round(batS)}%`;
        const battCard = card('Battery', '&#9107;', (batP > 0 ? '+' : '') + batP.toFixed(2) + ' kW', battSub, '#faf5ff', '#d8b4fe', '#ede9fe', '#8b5cf6', batColor);
        const homeCard = card('Home', '&#9750;', ldP.toFixed(2) + ' kW', 'Consumption', '#eff6ff', '#93c5fd', '#dbeafe', '#3b82f6', '#1e40af');

        let html = '';
        if (batDischarging) {
          html += section('Sources'); html += battCard; if (solarACCard) html += solarACCard; if (solarDCCard) html += solarDCCard; if (genCard) html += genCard;
          html += flowArrow('#8b5cf6', 'powering'); html += section('Consumer'); html += homeCard;
        } else if (batCharging) {
          html += section('Sources'); if (solarACCard) html += solarACCard; if (solarDCCard) html += solarDCCard; if (genCard) html += genCard;
          html += flowArrow('#22c55e', 'flowing'); html += section('Destinations'); html += homeCard; html += battCard;
        } else {
          const hasSources = !!(solarACCard || solarDCCard || genCard);
          if (hasSources) { html += section('Sources'); if (solarACCard) html += solarACCard; if (solarDCCard) html += solarDCCard; if (genCard) html += genCard; html += flowArrow('#3b82f6', ''); }
          html += section('Status'); html += homeCard; html += battCard;
        }
        return html;
      },
    };
