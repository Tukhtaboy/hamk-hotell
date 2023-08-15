<?php
include "db.php";

$user_id = $_POST["user_id"];
$room_id = $_POST["room_id"];
$start_date = $_POST["start_date"];
$finish_date = $_POST["finish_date"];

$sql = ("INSERT INTO `applications`(`user_id`, `room_id`, `start_date`, `finish_date`) VALUES(?,?,?,?)");
$query = $pdo->prepare($sql);

if ($query->execute([$user_id, $room_id, $start_date, $finish_date])) {
    $answer = '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!✅</strong> Application has been sent!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    session_start();
    $_SESSION["answer"] = $answer;
    header("Location: " . $_SERVER['HTTP_REFERER']);
}
