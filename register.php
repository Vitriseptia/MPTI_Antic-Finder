<?php
    require 'koneksi.php';

    $email = "";
    $password = "";
    $confirm_password = "";

    if (isset($_POST['register'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm-password'];

        if ($email == "") {
            ?>
                <script>alert("Email Kosong!!!");</script>
            <?php
        }

        if ($password == "") {
            ?>
                <script>alert("Password Kosong!!!");</script>
            <?php
        }

        if ($confirm_password == "") {
            ?>
                <script>alert("Konfirmasi Password Kosong!!!");</script>
            <?php
        }

        if ($password == $confirm_password) {
            $query = "INSERT INTO user (email, password) VALUES (?, ?)";
            $stmt = $connection->prepare($query);
            $stmt->execute([$email, $password]);
            $sql = "SELECT * FROM user WHERE email = ? AND password = ?";
            $stmt = $connection->prepare($sql);
            $stmt->execute([$email, $password]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['id'] = $data['id'];
            $_SESSION['email'] = $data['email'];
            header('Location: main.php');
            exit;
        }else{
            ?>
                <script>alert("Password dan Konfirmasi Password Berbeda!!!");</script>
            <?php
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AntikFinder - Register</title>
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

        .register-form {
            width: 100%;
            max-width: 300px;
        }

        .register-form h2 {
            margin-bottom: 20px;
            font-size: 20px;
            color: #333;
        }

        .register-form form {
            display: flex;
            flex-direction: column;
        }

        .register-form input {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .register-form button {
            padding: 10px;
            background-color: #7db340;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .register-form button:hover {
            background-color: #6ca32a;
        }

        .register-form p {
            margin-top: 10px;
            color: #666;
        }

        .register-form a {
            color: #7db340;
            text-decoration: none;
        }

        .register-form .terms {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            font-size: 14px;
            color: #666;
        }

        .register-form .terms input {
            margin-right: 5px;
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
            <div class="register-form">
                <h2>Register</h2>
                <form method="post">
                    <input name="email" type="text" placeholder="Masukkan Email" required>
                    <input name="password" type="password" placeholder="Masukkan Password" required>
                    <input name="confirm-password" type="password" placeholder="Masukkan Konfirmasi Password" required>
                    <div class="terms">
                        <input type="checkbox" required>
                        <label>By creating your account you agree with to our <a href="#">Terms and Conditions</a>.</label>
                    </div>
                    <button name="register" type="submit">Sign up</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
