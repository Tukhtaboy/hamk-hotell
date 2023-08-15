<?php
session_start();

if (isset($_SESSION['admin'])) {
    $admin = $_SESSION['admin'];
    header("Location: dashboard.php");
}

if (isset($_SESSION['answer'])) {
    $answer = $_SESSION['answer'];
    unset($_SESSION['answer']);
}

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login-form.css">
    <title>A1MENU</title>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <h1>Xush kelibsiz!</h1>
            <form action="./app/login.php" class="form" method="POST">
                <input type="text" placeholder="Kafe nomini kiriting" name="email" autocomplete="off" value="admin@hamk-hotel.com">
                <input type="password" placeholder="Parolinggizni kiriting" name="password">
                <button type="submit" id="login-button" name="submit">KIRISH</button>
            </form>
            <?= @$answer ?>
        </div>

        <ul class="bg-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>