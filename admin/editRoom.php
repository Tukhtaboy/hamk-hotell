<?php include('layouts/main-layout.php');
session_start();
if (isset($_SESSION["answer"])) {
    $answer = $_SESSION["answer"];
    unset($_SESSION["answer"]);
}

?>
<title>Edit the room </title>
<?php include('layouts/sidebar&header.php');
include "app/db.php";
$id = $_GET["id"];
$sql = "SELECT * FROM `rooms` WHERE `id` = ? LIMIT 1";
$query = $pdo->prepare($sql);
$query->execute([$id]);
$oldValues = $query->fetchAll();
?>

<div class="container pb-5">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
            <?= @$answer ?>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 text-center my-3">
            <h2 class="display-3">Edit the room</h2>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <form action="app/crudRoom.php" method="post" enctype='multipart/form-data'>
                <input type="hidden" name="id" value="<?= $id ?>">
                <div class="form-group">
                    <label for="name"><b>Room name:</b></label>
                    <input type="text" class="form-control" name="name" value="<?= $oldValues[0]['name'] ?>"> <!-- required -->
                </div>
                <div class="form-group">
                    <label for="area"><b>Room area:</b></label>
                    <input type="number" class="form-control" name="area" value="<?= $oldValues[0]['area'] ?>">
                </div>
                <div class="form-group">
                    <label for="price"><b>Room price:</b></label>
                    <input type="number" class="form-control" name="price" value="<?= $oldValues[0]['price'] ?>">
                </div>
                <div class="form-group">
                    <label for="description"><b>Room description:</b></label>
                    <textarea name="description" id="description" class="form-control"><?= $oldValues[0]["description"] ?></textarea>
                </div>
                <div class="form-group text-center">
                    <label class="forRemove"><b>Room's current photo</b></label>
                    <img src="assets/img/Rooms/<?= $oldValues[0]['image'] ?>" alt="<?= $oldValues[0]['name'] ?> photo" style="width: 100px; height: 100px; display: block; margin: 0 auto; border-radius: 50%" class="mb-4 forRemove">
                    <label for="image"><b>Choose new photo:</b></label>
                    <input type="file" class="form-control" name="image" value="<?= $oldValues[0]['image'] ?>" onchange="previewFile(this)" required> <!-- required -->
                    <div class="form-group d-flex align-align-items-center justify-content-center">
                        <img alt="Profile Photo" id="previewImg" style="max-width: 100px; height:100px; margin: 20px auto; border-radius: 50%; display: none">
                    </div>
                </div>
                <div class="form-group">
                    <label for="is_reserved"><b>Room status:</b></label>
                    <select name="is_reserved" id="is_reserved" class="form-control">
                        <option value="0" <?php $oldValues[0]["is_reserved"] == 0 ? "selected" : "" ?>>Not reserved❌</option>
                        <option value="1" <?php $oldValues[0]["is_reserved"] == 1 ? "selected" : "" ?>>Reserved✅</option>
                    </select>
                </div>
                <div class="modal-footer justify-content-flex-end p-0">
                    <button type="submit" name="editRoom" class="btn btn-success submitButton">Submit</button>
                </div>
            </form>
        </div>




    </div>
</div>
</div>




<?php include('layouts/footer&scripts.php') ?>


<script>
    function previewFile(input) {
        const removeElements = document.querySelectorAll('.forRemove');
        $('#previewImg').css('display', 'block');
        let file = $('input[type=file]').get(0).files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function() {
                $('#previewImg').attr('src', reader.result);
            }
            reader.readAsDataURL(file);
        }

        removeElements.forEach(item => {
            item.remove();
        })

    }
</script>