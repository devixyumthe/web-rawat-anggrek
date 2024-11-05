<?php
session_start();

if (isset($_SESSION["login"])) {
    header("location: index.php");
    exit;
}

require 'function.php';

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {

            // set session
            $_SESSION["login"] = true;

            header("location: home.php");
            exit;
        }
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>

    <div class="container">
        <h1>Halaman Login</h1>

        <?php if (isset($error)) : ?>
            <p class="error-message">username / password salah</p>
        <?php endif; ?>

        <form action="" method="post">
            <ul>
                <li>
                    <label for="username">Username :</label>
                    <input type="text" name="username" id="username" required>
                </li>
                <li>
                    <label for="password">Password :</label>
                    <input type="password" name="password" id="password" required>
                </li>
                <li>
                    <button type="submit" name="login">Login</button>
                </li>
            </ul>
        </form>

        <p style="margin-top: 10px;">Belum punya akun? <a href="registrasi.php" style="color: #FF6F61;">Registrasi Sekarang</a></p>
    </div>

</body>

</html>

