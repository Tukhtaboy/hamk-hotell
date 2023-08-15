<?php
include('db.php');

if (isset($_POST['submit'])) {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $sql = "SELECT * FROM `users` WHERE email = ? AND password = ? AND type = 0 LIMIT 1";
  $query = $pdo->prepare($sql);
  $query->execute([$email, $password]);
  $admin = $query->fetchAll();

  if (count($admin) > 0) {
    session_start();
    // Set the session timeout to 10 minutes (600)
    $_SESSION['timeout'] = time() + 600;
    $_SESSION["admin"] = $admin[0];
    header('Location: ../dashboard.php');
  } else {
    if (isset($_SERVER['HTTP_REFERER'])) {
      $answer = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Error❌!</strong> Email or password is not correct!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>';

      session_start();
      $_SESSION["answer"] = $answer;
      header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
      // Redirect to a default page if HTTP_REFERER is not set
      $answer = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error❌!</strong> Email or password is not correct!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      l</button>
        </div>';
      session_start();
      $_SESSION["answer"] = $answer;
      header("Location: ../index.php");
    }
  }
}
