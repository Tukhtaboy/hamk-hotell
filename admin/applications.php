<?php include('layouts/main-layout.php');
session_start();
if (isset($_SESSION["answer"])) {
    $answer = $_SESSION["answer"];
    unset($_SESSION["answer"]);
}

?>

<title>Applications</title>
<?php include('layouts/sidebar&header.php') ?>
<div class="row p-2 m-0">
    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
        <h2 class="display-2">Applications</h2>
    </div>
    <?php
    include "app/db.php";
    $sql = "SELECT A.id, A.start_date, A.finish_date, A.status, U.first_name AS user_first_name, U.second_name AS user_second_name, U.phone_number AS user_phone_number, U.email AS user_email, R.name AS room_name FROM `applications` A JOIN users U ON A.user_id = U.id JOIN rooms R ON A.room_id = R.id";
    $query = $pdo->prepare($sql);
    $query->execute();
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
                        <th width="10%">Phone</th>
                        <th width="15%">Email</th>
                        <th width="10%">Room name</th>
                        <th width="20%">Period</th>
                        <th width="10%">Status</th>
                        <th width="10%">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $i = 0;
                    foreach ($applications as $application) { ?>
                        <tr class="text-center">
                            <td><?= ++$i ?></td>
                            <td><?= $application['user_first_name'] . " " . $application['user_second_name'] ?></td>
                            <td><?= $application['user_phone_number'] ?></td>
                            <td><?= $application['user_email'] ?></td>
                            <td><?= $application['room_name'] ?></td>
                            <td><?= $application['start_date'] . "/" . $application['finish_date'] ?></td>
                            <td class="<?= $application['status'] == 0 ? "text-danger" : "text-green" ?>"><?= $application['status'] == 0 ? "Not approved⛔" : "Approved✅" ?></td>
                            <td>
                                <form action="app/application.php" method="post">
                                    <input type="hidden" name="application_id" value="<?= $application['id']?>">
                                    <input type="hidden" name="status" value="<?= $application['status'] == 0 ? 1 : 0 ?>">
                                    <button type="submit" name="sendApplication" class="btn <?= $application['status'] == 0 ? "btn-success" : "btn-danger" ?>"><?= $application['status'] == 0 ? "Approve✅" : "Reject⛔" ?></button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<?php include('layouts/footer&scripts.php') ?>