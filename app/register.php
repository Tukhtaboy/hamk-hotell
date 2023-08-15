<?php
include "db.php";

$first_name = $_POST["first_name"];
$second_name = $_POST["second_name"];
$country = $_POST["country"];
$phone_number = $_POST["phone_number"];
$password = $_POST["password"];
$email = $_POST["email"];

$sql = ("INSERT INTO `users`(`first_name`, `second_name`, `country`, `phone_number`, `password`, `email`) VALUES(?,?,?,?,?,?)");
$query = $pdo->prepare($sql);

if ($query->execute([$first_name, $second_name, $country, $phone_number, $password, $email])) {
    $sql = ("SELECT * FROM `users` WHERE email = ? LIMIT 1");
    $query = $pdo->prepare($sql);
    $query->execute([$email]);
    $user = $query->fetchAll();
    session_start();
    // Set the session timeout to 10 minutes (600 seconds)
    $_SESSION['timeout'] = time() + 600;
    $_SESSION["user"] = $user[0];
    header('Location: ../index.php');
}
