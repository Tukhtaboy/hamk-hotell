<?php include('layouts/main-layout.php');
session_start();
if (isset($_SESSION["answer"])) {
    $answer = $_SESSION["answer"];
    unset($_SESSION["answer"]);
}

?>

<title>Rooms</title>
<?php include('layouts/sidebar&header.php') ?>
<div class="row p-2 m-0">
    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
        <h2 class="display-2">Rooms</h2>
    </div>
    <?php
    include "app/db.php";
    $sql = "SELECT * FROM `rooms`";
    $query = $pdo->prepare($sql);
    $query->execute();
    $rooms = $query->fetchAll();

    ?>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <?= @$answer ?>
        <button class="btn btn-success mb-1 float-right" data-toggle="modal" data-target="#Modal"><i class="fas fa-plus"></i> Add new room</button>
        <div class="table-responsive">
            <table class="table shadow table-striped" style="border-radius: 10px;">
                <thead class="bg-dark text-white">
                    <tr class="text-center">
                        <th width="5%">№</th>
                        <th width="10%">Name</th>
                        <th width="15%">Area</th>
                        <th width="10%">Price</th>
                        <th width="30%">Description</th>
                        <th width="20%">Image</th>
                        <th width="10%">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $i = 0;
                    foreach ($rooms as $room) { ?>
                        <tr class="text-center">
                            <td><?= ++$i ?></td>
                            <td><?= $room['name'] ?></td>
                            <td><?= $room['area'] ?></td>
                            <td><?= $room['price'] ?></td>
                            <td><?= $room['description'] ?></td>
                            <td><img src="assets/img/Rooms/<?= $room['image'] ?>" alt="<?= $room['name'] ?> photo" class="w-100 img-thumbnail" /></td>
                            <td>
                                <a href="editRoom.php?id=<?= $room['id'] ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?= $room['id'] ?>"><i class="fa fa-trash"></i></button>
                                <?php require('deleteModal.php'); ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="Modal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content shadow">
                <div class="modal-header">
                    <h5 class="modal-title">Add new room:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="app/crudRoom.php" method="post" enctype='multipart/form-data'>
                        <div class="form-group">
                            <label for="name"><b>Room name:</b></label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="area"><b>Room area:</b></label>
                            <input type="number" class="form-control" name="area" id="area">
                        </div>
                        <div class="form-group">
                            <label for="price"><b>Room price:</b></label>
                            <input type="number" class="form-control" name="price" id="price">
                        </div>
                        <div class="form-group">
                            <label for="description"><b>Room description:</b></label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image"><b>Room image:</b></label>
                            <input type="file" class="form-control" name="image" required> <!-- required -->
                        </div>
                        <div class="form-group">
                            <label for="is_reserved"><b>Room status:</b></label>
                            <select name="is_reserved" id="is_reserved" class="form-control">
                                <option value="0">Not reserved</option>
                                <option value="1">Reserved</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="createRoom" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('layouts/footer&scripts.php') ?>

< <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></> -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->