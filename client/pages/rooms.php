<?php include "../layouts/head.php";

include "../../app/db.php";
$sql = "SELECT * FROM `rooms`";
$query = $pdo->prepare($sql);
$query->execute();
$rooms = $query->fetchAll();

?>
<section id="rooms">
    <div class="container">
        <div class="row">
            <?= @$answer ?>
            <?php foreach ($rooms as $room) { ?>
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <div class="card-header">
                            <img src="/admin/assets/img/Rooms/<?= $room["image"] ?>" alt="<?= $room["name"] ?> photo" class="w-100 img-thumbnail">
                        </div>
                        <div class="card-body text-center">
                            <h4 class="display-6"><?= $room["name"] ?></h4>
                            <p class="lead"><?= $room["description"] ?> </p>
                            <div class="row">
                                <div class="col-md-6 d-flex justify-content-between align-items-center">
                                    <h6>Price:</h6>
                                    <p class="lead">$<?= $room["price"] ?></p>
                                </div>
                                <div class="col-md-6 d-flex justify-content-between align-items-center">
                                    <h6>Area:</h6>
                                    <p class="lead"><?= $room["area"] ?>m<sup>2</sup></p>

                                </div>
                                <div class="col-md-6 offset-md-3">
                                    <h6>Status:</h6>
                                    <p class="lead <?= $room["is_reserved"] == 0 ? "text-success" : "text-danger" ?>"><?= $room["is_reserved"] == 0 ? "Empty✅" : "Reserved⛔" ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#applicationModal<?= $room["id"] ?>">Book</button>
                            <?php require "sendApplication.php" ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../js/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../../js/aos.js"></script>
<script>
    function menuToggle() {
        const toggleMenu = document.querySelector(".menu");
        toggleMenu.classList.toggle("active");
    }
</script>
</div>
</body>

</html>