<?php

session_start();


$valid_username = "user123";
$valid_password = "password123";


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $valid_username && $password === $valid_password) {

        $_SESSION['username'] = $username;
        header("Location: biodata.php"); 
        exit();
    } else {
        $error_message = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Form Login</h2>
    <?php if (isset($error_message)) : ?>
        <p style="color: red;"> <?= $error_message; ?> </p>
    <?php endif; ?>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>


<?php

session_start();


if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata</title>
</head>
<body>
    <h2>Halaman Biodata</h2>
    <p>Selamat datang, <?= htmlspecialchars($_SESSION['username']); ?>!</p>
    <p>Berikut adalah biodata saya:</p>
    <ul>
        <li>Nama: Jhon kevin andrianto sinaga</li>
        <li>Alamat: Jalan Sejahtera No. 123</li>
        <li>Email: kepiin1234@gmail.com</li>
    </ul>
    <a href="logout.php">Logout</a>
</body>
</html>


<?php

session_start();


session_unset();
session_destroy();

header("Location: index.php"); 
exit();
?>
