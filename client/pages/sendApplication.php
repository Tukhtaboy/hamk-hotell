<!-- MODAL FOR SENDING APPLICATION -->

<div class="modal fade" id="applicationModal<?= $room["id"] ?>" tabindex="-1" aria-labelledby="applicationModal<?= $room["id"] ?>Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow">
            <div class="modal-header">
                <p class="lead">
                    <?= $room["name"] ?> </p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/app/application.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="user_id" value="<?= $user["id"] ?>">
                    <input type="hidden" name="room_id" value="<?= $room["id"] ?>">
                    <div class="form-group mb-1">
                        <label for="start_date">Reservation start date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date">
                    </div>
                    <div class="form-group mb-1">
                        <label for="start_date">Reservation end date</label>
                        <input type="date" class="form-control" id="finish_date" name="finish_date">
                    </div>
                    <?php if (!isset($user)) { ?>
                        <div class="form-group mb-1">
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Warning!☝🏻</strong> You can not apply for the room until you login to your account!
                                <br>
                                Please, <a href="login.php">Log in</a> or <a href="registration.php">Sign up</a> if you do not have an account!
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary" <?= !isset($user) ? "disabled" : "" ?>>Send</button>
                </div>
            </form>
        </div>
    </div>
</div>