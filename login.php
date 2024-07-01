<?php
    require 'koneksi.php';

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "SELECT * FROM user WHERE email = ? AND password = ?";
        $stmt = $connection->prepare($query);
        $stmt->execute([$email, $password]);
        $hasil = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($hasil){
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $hasil['id'];
            if ($hasil['nama'] !== null) {
                $_SESSION['nama'] = $hasil['nama'];
            }
            header('Location: index.php');
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AntikFinder</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 900px;
            width: 100%;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #7db340;
            margin-bottom: 20px;
        }

        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .antique-image {
            width: 100%;
            max-width: 400px;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        .login-form {
            width: 100%;
            max-width: 300px;
        }

        .login-form h2 {
            margin-bottom: 20px;
            font-size: 20px;
            color: #333;
        }

        .login-form form {
            display: flex;
            flex-direction: column;
        }

        .login-form input {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-form button {
            padding: 10px;
            background-color: #7db340;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-form button:hover {
            background-color: #6ca32a;
        }

        .login-form p {
            margin-top: 10px;
            color: #666;
        }

        .login-form a {
            color: #7db340;
            text-decoration: none;
        }

        @media (min-width: 768px) {
            .content {
                flex-direction: row;
                justify-content: space-between;
            }

            .antique-image {
                margin-bottom: 0;
                margin-right: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">AntikFinder</div>
        <div class="content">
            <img src="img/my-img/cover.jpg" alt="Antique Vase" class="antique-image">
            <div class="login-form">
                <h2>Login</h2>
                <form method="post">
                    <input name="email" type="text" placeholder="Masukkan Email" required>
                    <input name="password" type="password" placeholder="Masukkan Password" required>
                    <button name="login" type="submit">Login</button>
                    <p>Jika belum punya akun <a href="register.php">Sign up</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
