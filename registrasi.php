<?php 
require 'function.php';

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('user baru berhasil ditambahkan');
                document.location = 'login.php';
            </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Registrasi</title>
    <link rel="stylesheet" href="regis.css">
</head>

<body>

    <div class="container">
        <h1>Halaman Registrasi</h1>

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
                    <label for="password2">Konfirmasi Password :</label>
                    <input type="password" name="password2" id="password2" required>
                </li>
                <li>
                    <button type="submit" name="register">Register!</button>
                </li>
            </ul>
        </form>
    </div>

</body>

</html>
