<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - SPK VARK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        body {
            background: #f5f7fb;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .login-card {
            background: white;
            border-radius: 28px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.05);
            max-width: 420px;
            width: 100%;
            overflow: hidden;
        }
        .login-header {
            background: white;
            padding: 32px 28px 24px;
            text-align: center;
            border-bottom: 1px solid #f0f0f0;
        }
        .login-header .icon {
            width: 56px;
            height: 56px;
            background: #1a2a6c;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }
        .login-header .icon i {
            font-size: 26px;
            color: white;
        }
        .login-header h3 {
            font-weight: 700;
            font-size: 1.5rem;
            color: #1f2937;
            margin-bottom: 6px;
        }
        .login-header p {
            color: #9ca3af;
            font-size: 0.85rem;
            margin: 0;
        }
        .btn-back {
            position: absolute;
            top: 24px;
            left: 24px;
            color: #6b7280;
            text-decoration: none;
            font-size: 0.85rem;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .btn-back:hover {
            color: #1f2937;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: 500;
            font-size: 0.85rem;
            color: #374151;
            margin-bottom: 8px;
            display: block;
        }
        .form-control {
            padding: 12px 16px;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
            font-size: 0.9rem;
            transition: all 0.2s;
        }
        .form-control:focus {
            border-color: #1a2a6c;
            box-shadow: 0 0 0 3px rgba(26,42,108,0.1);
        }
        .btn-login {
            background: #1a2a6c;
            border: none;
            padding: 12px;
            border-radius: 12px;
            font-weight: 600;
            width: 100%;
            margin-top: 8px;
        }
        .btn-login:hover {
            background: #0f1a4a;
        }
        .demo-info {
            background: #f8fafc;
            border-radius: 14px;
            padding: 12px;
            text-align: center;
            margin-top: 24px;
        }
        .demo-info small {
            color: #6b7280;
            font-size: 0.8rem;
        }
        .alert {
            border-radius: 12px;
            font-size: 0.85rem;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="login-card" style="position: relative;">
        <a href="{{ route('dashboard') }}" class="btn-back">
            <i class="fas fa-arrow-left"></i> Beranda
        </a>
        <div class="login-header">
            <div class="icon">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <h3>Selamat Datang</h3>
            <p>Silakan login untuk mengakses dashboard admin</p>
        </div>
        <div class="p-4 pt-0">
            @if(session('error'))
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                </div>
            @endif
            <form action="{{ route('login.submit') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="admin@example.com" required autofocus>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="********" required>
                </div>
                <button type="submit" class="btn btn-login text-white">
                    <i class="fas fa-arrow-right me-2"></i> Login
                </button>
            </form>
        </div>
    </div>
</body>
</html>