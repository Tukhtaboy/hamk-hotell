<?php
session_start();
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
}

if (isset($_SESSION["answer"])) {
    $answer = $_SESSION["answer"];
    unset($_SESSION["answer"]);
}

// Check if the session has timed out
if (isset($_SESSION['timeout']) && $_SESSION['timeout'] < time()) {
    // Unset the session variable
    unset($_SESSION['user']);
    // Unset the session timeout
    unset($_SESSION['timeout']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../css/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/main.css">
    <title>HAMK Hotel</title>
    <style class="darkreader darkreader--override" media="screen"></style>
</head>

<body>
    <div class="bootstrap-wrapper">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand text-light" href="#">
                    <img src="../../images/logo/logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    HAMK Hotel
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link text-light active" aria-current="page" href="../../index.php">Home</a>
                        <a class="nav-link text-light" href="/client/pages/rooms.php">Rooms</a>
                        <?php if (isset($user[0])) { ?>
                            <div class="action">
                                <div class="profile" onclick="menuToggle();">
                                    <img src="../../images/icons/user-circle-icon.png">
                                </div>
                                <div class="menu">
                                    <h3><span>Hello!</span><br><?= $user["first_name"] . " " . $user["second_name"] ?><br></h3>
                                    <ul>
                                        <li>
                                            <img src="../../images/icons/envelope.png"><a href="/client/pages/applications.php">My applications</a>
                                        </li>
                                        <li>
                                            <img src="../../images/icons/log-out.png"><a href="/app/logout.php">Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </nav>