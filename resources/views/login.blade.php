<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Proyek Lab</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f3f4f6; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-card { background: white; padding: 40px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); width: 350px; }
        .login-card h2 { margin-bottom: 5px; text-align: center; color: #1f2937; font-size: 24px; }
        .login-card p { text-align: center; color: #6b7280; font-size: 14px; margin-bottom: 25px; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 7px; font-size: 14px; color: #4b5563; font-weight: 500; }
        .form-group input { width: 100%; padding: 10px 12px; box-sizing: border-box; border: 1px solid #d1d5db; border-radius: 6px; font-size: 14px; }
        .form-group input:focus { outline: none; border-color: #4f46e5; }
        .btn-login { width: 100%; padding: 12px; background: #4f46e5; color: white; border: none; border-radius: 6px; font-size: 15px; font-weight: 600; cursor: pointer; }
        .btn-login:hover { background: #4338ca; }
    </style>
</head>
<body>

<div class="login-card">
    <h2>Selamat Datang</h2>
    <p>Silakan login untuk masuk ke sistem</p>
    <form>
        <div class="form-group">
            <label>NIM / Username</label>
            <input type="text" placeholder="Masukkan NIM kamu...">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" placeholder="Masukkan password...">
        </div>
        <button type="button" class="btn-login">Masuk Aplikasi</button>
    </form>
</div>

</body>
</html>