  <?php
  include('db.php');

  // CREATING 


  if (isset($_POST['createRoom'])) {
    $name = $_POST['name'];
    $area = $_POST['area'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $is_reserved = $_POST['is_reserved'];
    $filetemp = @$_FILES['image']['tmp_name'];
    $filename = @$_FILES['image']['name'];
    $filetype = @$_FILES['image']['type'];
    $filepath = "../assets/img/Rooms/" . $filename;




    $imageMimeTypes = array(
      'image/png',
      'image/gif',
      'image/jpeg'
    );
    $fileMimeType = mime_content_type($filetemp);

    if (in_array($fileMimeType, $imageMimeTypes)) {
      $sql = ("INSERT INTO `rooms`(`name`, `area`, `price`, `description`, `image`, `is_reserved`) VALUES(?,?,?,?,?,?)");
      $query = $pdo->prepare($sql);

      if (move_uploaded_file($filetemp, $filepath) && $query->execute([$name, $area, $price, $description, $filename, $is_reserved])) {
        session_start();
        $answer = '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Successful!</strong>' . $name  . ' has been added successfully!✅
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
        $_SESSION["answer"] = $answer;

        header('Location: ../rooms.php');
      } else {
        session_start();
        $answer = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Something unexpected occured when adding ' . $name  . ' room! Please, check the date you entered and try again or contact with adminstration!❌ 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
        $_SESSION["answer"] = $answer;

        header('Location: ../rooms.php');
      }
    } else {
      session_start();
      $answer = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> The image format you uploaded is not accessible! Please, upload PNG, JPEG or JPG!❌ 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      $_SESSION["answer"] = $answer;

      header('Location: ../rooms.php');
    }
  }


  //UPDATE

  if (isset($_POST['editRoom'])) {
    $id = $_POST["id"];
    $name = $_POST['name'];
    $area = $_POST['area'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $is_reserved = $_POST['is_reserved'];
    $filetemp = @$_FILES['image']['tmp_name'];
    $filename = @$_FILES['image']['name'];
    $filetype = @$_FILES['image']['type'];
    $filepath = "../assets/img/Rooms/" . $filename;




    $imageMimeTypes = array(
      'image/png',
      'image/gif',
      'image/jpeg'
    );
    $fileMimeType = mime_content_type($filetemp);

    if (in_array($fileMimeType, $imageMimeTypes)) {
      $sql = ("UPDATE `rooms` SET `name`= ?,`area`= ?,`price`= ?,`description`= ?,`image`= ?,`is_reserved`= ? WHERE id = ?");
      $query = $pdo->prepare($sql);

      if (move_uploaded_file($filetemp, $filepath) && $query->execute([$name, $area, $price, $description, $filename, $is_reserved, $id])) {
        session_start();
        $answer = '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Successful!</strong>' . $name  . ' has been edited successfully!✅
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
        $_SESSION["answer"] = $answer;

        header('Location: ../rooms.php');
      } else {
        session_start();
        $answer = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Something unexpected occured when editing ' . $name  . ' room! Please, check the date you entered and try again or contact with adminstration!❌ 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
        $_SESSION["answer"] = $answer;

        header('Location: ../editRoom.php?id=' . $id);
      }
    } else {
      session_start();
      $answer = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> The image format you uploaded is not accessible! Please, upload PNG, JPEG or JPG!❌ 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      $_SESSION["answer"] = $answer;

      header('Location: ../editRoom.php?id=' . $id);
    }
  }





  //DELETE

  if (isset($_POST["delete_submit"])) {
    $id = $_POST['id'];

    $sql = 'DELETE FROM `rooms` WHERE id = ?';
    $query = $pdo->prepare($sql);
    if ($query->execute([$id])) {
      session_start();
      $answer = '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Successful!</strong> The room has been deleted successfully!✅
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      $_SESSION["answer"] = $answer;

      header('Location: ../rooms.php');
    } else {
      session_start();
      $answer = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Something unexpected occured when deleting the room! Please, check the date you entered and try again or contact with adminstration!❌ 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      $_SESSION["answer"] = $answer;
      header('Location: ../rooms.php');
    }
  }
  ?>
  </body>