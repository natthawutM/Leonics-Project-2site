<?php
// ── Auth config ──
$VALID_USERS = array(
  'admin' => 'leonics2024',
  'tnbes' => 'solar2024',
);
$COOKIE_NAME = 'moc_user';
$COOKIE_DAYS = 30;

// ── Already logged in? → redirect to fleet ──
if(isset($_COOKIE[$COOKIE_NAME]) && $_COOKIE[$COOKIE_NAME] !== ''){
  header('Location: /BELB_Sabah/fleet.php');
  exit();
}

// ── Handle login POST ──
$error = '';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $user = isset($_POST['username']) ? trim($_POST['username']) : '';
  $pass = isset($_POST['password']) ? $_POST['password'] : '';

  if(isset($VALID_USERS[$user]) && $VALID_USERS[$user] === $pass){
    // Login success → set cookie + redirect
    $token = $user . '|' . md5($user . 'leonics_moc_salt_2024');
    setcookie($COOKIE_NAME, $token, time() + 86400 * $COOKIE_DAYS, '/');
    header('Location: /BELB_Sabah/fleet.php');
    exit();
  } else {
    $error = 'Invalid username or password';
  }
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sign in — Leonics MOC</title>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:'DM Sans',system-ui,sans-serif;background:#f5f5f0;color:#1a1a1a;min-height:100vh;display:flex;align-items:center;justify-content:center;padding:20px}
.login-wrap{width:100%;max-width:400px}

/* Logo */
.logo{text-align:center;margin-bottom:2rem}
.logo-icon{width:52px;height:52px;border-radius:14px;background:#1a1a1a;display:flex;align-items:center;justify-content:center;margin:0 auto 12px}
.logo-icon svg{width:26px;height:26px}
.logo h1{font-size:20px;font-weight:600;margin-bottom:2px}
.logo p{font-size:13px;color:#888}

/* Card */
.card{background:#fff;border:1px solid #e8e6df;border-radius:14px;padding:28px 24px}
.card-title{font-size:15px;font-weight:600;margin-bottom:20px}

/* Form */
.field{margin-bottom:16px}
.field label{display:block;font-size:12px;font-weight:500;color:#888;margin-bottom:5px;text-transform:uppercase;letter-spacing:.3px}
.field input[type=text],.field input[type=password]{width:100%;padding:11px 14px;border:1px solid #e8e6df;border-radius:10px;font-family:'DM Sans',sans-serif;font-size:14px;background:#fafaf7;color:#1a1a1a;outline:none;transition:border-color .15s}
.field input:focus{border-color:#999}
.pw-wrap{position:relative}
.pw-wrap input{padding-right:40px}
.pw-toggle{position:absolute;right:12px;top:50%;transform:translateY(-50%);cursor:pointer;background:none;border:none;padding:0;color:#aaa}
.pw-toggle:hover{color:#555}

/* Remember + error */
.options{display:flex;align-items:center;justify-content:space-between;margin-bottom:20px}
.remember{display:flex;align-items:center;gap:6px;font-size:13px;color:#888;cursor:pointer}
.remember input{width:16px;height:16px;accent-color:#1a1a1a}
.error{background:#fef2f2;border:1px solid #fecaca;border-radius:8px;padding:10px 14px;font-size:13px;color:#b91c1c;margin-bottom:16px;display:flex;align-items:center;gap:8px}
.error svg{flex-shrink:0}

/* Button */
.btn{width:100%;padding:12px;border:none;border-radius:10px;background:#1a1a1a;color:#fff;font-family:'DM Sans',sans-serif;font-size:14px;font-weight:600;cursor:pointer;transition:background .15s}
.btn:hover{background:#333}
.btn:active{transform:scale(.99)}

/* Footer */
.footer{text-align:center;margin-top:1.5rem;font-size:12px;color:#aaa}

@media(max-width:480px){body{padding:16px}.card{padding:20px 18px}}
</style>
</head>
<body>

<div class="login-wrap">
  <div class="logo">
    <div class="logo-icon">
      <svg viewBox="0 0 24 24" fill="none" stroke="#f5f5f0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="12" cy="12" r="4"/>
        <line x1="12" y1="2" x2="12" y2="4"/><line x1="12" y1="20" x2="12" y2="22"/>
        <line x1="4.93" y1="4.93" x2="6.34" y2="6.34"/><line x1="17.66" y1="17.66" x2="19.07" y2="19.07"/>
        <line x1="2" y1="12" x2="4" y2="12"/><line x1="20" y1="12" x2="22" y2="12"/>
        <line x1="4.93" y1="19.07" x2="6.34" y2="17.66"/><line x1="17.66" y1="6.34" x2="19.07" y2="4.93"/>
      </svg>
    </div>
    <h1>Leonics MOC</h1>
    <p>Monitoring and Operation Center</p>
  </div>

  <div class="card">
    <div class="card-title">Sign in to your account</div>

    <?php if($error): ?>
    <div class="error">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
      <?php echo htmlspecialchars($error); ?>
    </div>
    <?php endif; ?>

    <form method="POST" action="login.php">
      <div class="field">
        <label>Username</label>
        <input type="text" name="username" value="<?php echo isset($_POST['username'])?htmlspecialchars($_POST['username']):''; ?>" autocomplete="username" autofocus required />
      </div>

      <div class="field">
        <label>Password</label>
        <div class="pw-wrap">
          <input type="password" name="password" id="pw" autocomplete="current-password" required />
          <button type="button" class="pw-toggle" onclick="togglePw()" aria-label="Show password">
            <svg id="eye-open" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
            <svg id="eye-closed" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:none"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
          </button>
        </div>
      </div>

      <div class="options">
        <label class="remember">
          <input type="checkbox" name="remember" checked /> Remember me
        </label>
      </div>

      <button type="submit" class="btn">Sign in</button>
    </form>
  </div>

  <div class="footer">TNBES Solar Hybrid System — Sabah, Malaysia</div>
</div>

<script>
function togglePw(){
  var p=document.getElementById('pw');
  var o=document.getElementById('eye-open');
  var c=document.getElementById('eye-closed');
  if(p.type==='password'){p.type='text';o.style.display='none';c.style.display='inline';}
  else{p.type='password';o.style.display='inline';c.style.display='none';}
}
</script>
</body>
</html>
