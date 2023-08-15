<!-- MODAL FOR DELETING SALAT -->

<div class="modal fade" id="deleteModal<?= $room['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content shadow">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete <span style="color: #ff0000; font-weight: bolder"><?= $room['name'] ?></span> room!?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <form action="app/crudRoom.php?id=<?= $room['id'] ?>" method="post">
                    <input type="hidden" name="id" value="<?= $room["id"] ?>">
                        <button type="submit" name="delete_submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- MODAL FOR DELETING OVQAT(MEAL) -->

    <div class="modal fade" id="deleteModal<?= $ovqat['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content shadow">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Siz rostdan ham <span style="color: #ff0000; font-weight: bolder"><?= $ovqat['nomi'] ?></span> ovqatini o'chirmoqchimisiz !?</h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Bekor qilish</button>
                    <form action="editOvqat.php?delete=true&id=<?= $ovqat['id'] ?>&cafe_name=<?= $cafeName?>" method="post">
                        <button type="submit" name="delete_submit" class="btn btn-danger">O'chirish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL FOR DELETING ICHIMLIK(DRINKS) -->

    <div class="modal fade" id="deleteModal<?= $ichimlik['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content shadow">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Siz rostdan ham <span style="color: #ff0000; font-weight: bolder"><?= $ichimlik['nomi'] ?></span> ichimligini o'chirmoqchimisiz !?</h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Bekor qilish</button>
                    <form action="editIchimlik.php?delete=true&id=<?= $ichimlik['id'] ?>&cafe_name=<?= $cafeName?>" method="post">
                        <button type="submit" name="delete_submit" class="btn btn-danger">O'chirish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL FOR DELETING SHIRINLIK(SWEETS) -->

    <div class="modal fade" id="deleteModal<?= $shirinlik['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content shadow">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Siz rostdan ham <span style="color: #ff0000; font-weight: bolder"><?= $shirinlik['nomi'] ?></span> shirinligini o'chirmoqchimisiz !?</h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Bekor qilish</button>
                    <form action="editShirinlik.php?delete=true&id=<?= $shirinlik['id'] ?>&cafe_name=<?= $cafeName?>" method="post">
                        <button type="submit" name="delete_submit" class="btn btn-danger">O'chirish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>