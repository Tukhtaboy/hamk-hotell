<?php include "../layouts/head.php";
if (!isset($user)) {
    header("Location: login.php");
}
?>
<section id="applications">
    <div class="container">
        <div class="row p-2 m-0">
            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                <h2 class="display-2 text-light">Applications</h2>
            </div>
            <?php
            include "../../app/db.php";
            $sql = "SELECT A.id, A.start_date, A.finish_date, A.status, U.first_name AS user_first_name, U.second_name AS user_second_name, U.phone_number AS user_phone_number, U.email AS user_email, R.name AS room_name FROM `applications` A JOIN users U ON A.user_id = U.id JOIN rooms R ON A.room_id = R.id WHERE user_id = ?";
            $query = $pdo->prepare($sql);
            $query->execute([$user["id"]]);
            $applications = $query->fetchAll();

            ?>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <?= @$answer ?>
                <div class="table-responsive">
                    <table class="table shadow table-striped" style="border-radius: 10px;">
                        <thead class="bg-dark text-white">
                            <tr class="text-center">
                                <th width="5%">№</th>
                                <th width="20%">FIO</th>
                                <th width="20%">Phone</th>
                                <th width="15%">Email</th>
                                <th width="10%">Room name</th>
                                <th width="20%">Period</th>
                                <th width="10%">Status</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $i = 0;
                            if (count($applications) > 0) {
                                foreach ($applications as $application) { ?>
                                    <tr class="text-center">
                                        <td><?= ++$i ?></td>
                                        <td><?= $application['user_first_name'] . " " . $application['user_second_name'] ?></td>
                                        <td><?= $application['user_phone_number'] ?></td>
                                        <td><?= $application['user_email'] ?></td>
                                        <td><?= $application['room_name'] ?></td>
                                        <td><?= $application['start_date'] . "/" . $application['finish_date'] ?></td>
                                        <td class="<?= $application['status'] == 0 ? "text-danger" : "text-green" ?>"><?= $application['status'] == 0 ? "Rejected⛔" : "Approved✅" ?></td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="7">You do not have any applications.</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
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