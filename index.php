<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Peminjaman Buku Sekolah</title>
    <link rel="stylesheet" href="tambahan/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="tambahan/font-awesome/css/font-awesome.min.css">
    <style>
        body {
            background-image: url('img/gambar7.png');
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Arial', sans-serif;
        }
        .login-container {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 50px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 450px;
            text-align: center;
            backdrop-filter: blur(10px);
        }
        .login-container h2 {
            margin-bottom: 30px;
            font-size: 28px;
            color: #333;
        }
        .login-container .form-group {
            margin-bottom: 25px;
        }
        .login-container label {
            font-size: 16px;
            color: #666;
            display: block;
            margin-bottom: 8px;
        }
        .form-control {
            border-radius: 10px;
            border: 1px solid #ced4da;
            padding: 15px;
            font-size: 16px;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            font-size: 18px;
            padding: 15px;
            border-radius: 10px;
            font-weight: bold;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .btn-info.btn-icon {
            border-radius: 50%;
            padding: 15px;
            font-size: 28px;
            color: #fff;
            margin-bottom: 30px;
            background-color: #17a2b8;
            border: none;
        }
        .btn-info.btn-icon i {
            vertical-align: middle;
        }
        .register-link {
            display: block;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
            font-size: 16px;
        }
        .register-link:hover {
            text-decoration: underline;
        }
        .text-muted {
            font-size: 14px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <a class="btn btn-info btn-icon" href="index.php">
                <i class="fa fa-arrow-left"></i>
            </a>
            <h2>Login</h2>
            <form action="PENGGUNA/proses-login.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" id="password" name="password" required>
                </div>
                <button type="submit" name="login" class="btn btn-success btn-block">LOGIN</button>
                <a href="PENGGUNA/register.php" class="register-link">Tidak Punya Akun? Daftar</a>
                <p class="text-muted">© 2024 Peminjaman Buku Sekolah</p>
            </form>
        </div>
    </div>
    <script src="tambahan/jquery/dist/jquery.min.js"></script>
    <script src="tambahan/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
