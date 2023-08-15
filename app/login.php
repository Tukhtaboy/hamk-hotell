<?php
include "db.php";

$password = $_POST["password"];
$email = $_POST["email"];

$sql = ("SELECT * FROM `users` WHERE email = ? AND password = ? LIMIT 1");
$query = $pdo->prepare($sql);
$query->execute([$email, $password]);
$user = $query->fetchAll();

if (count($user) > 0) {
    session_start();
    // Set the session timeout to 10 minutes (600)
    $_SESSION['timeout'] = time() + 600;
    $_SESSION["user"] = $user[0];
    header('Location: ../index.php');
} else {
    if (isset($_SERVER['HTTP_REFERER'])) {
        $answer = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error❌!</strong> Email or password is not correct!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
        session_start();
        $_SESSION["answer"] = $answer;
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
        // Redirect to a default page if HTTP_REFERER is not set
        $answer = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error❌!</strong> Email or password is not correct!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
        session_start();
        $_SESSION["answer"] = $answer;
        header("Location: ../client/pages/login.php");
    }
}
