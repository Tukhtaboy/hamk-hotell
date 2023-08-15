<?php
include('db.php');

if (isset($_POST['sendApplication'])) {
  $status = $_POST["status"];
  $application_id = $_POST["application_id"];
  $message = $status == 0 ? "rejected" : "approved";

  $sql = "UPDATE `applications` SET `status`= ? WHERE id = ?";
  $query = $pdo->prepare($sql);


  if ($query->execute([$status, $application_id])) {
    $answer = '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> The application has been ' . $message . '!✅
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>';

    session_start();
    $_SESSION["answer"] = $answer;
    header("Location: " . $_SERVER['HTTP_REFERER']);
  } else {
    $answer = '<div class="alert alert-error alert-dismissible fade show" role="alert">
        <strong>Error❌!</strong> Unexpected error occured, please, contact with adminstration!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>';

    session_start();
    $_SESSION["answer"] = $answer;
    header("Location: " . $_SERVER['HTTP_REFERER']);
  }
}
