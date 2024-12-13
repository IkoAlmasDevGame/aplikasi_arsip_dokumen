<?php
if (isset($_GET['dialog'])):
    if ($_GET['dialog'] == "change") {
?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">Successfully change</h4>
    <p>Pegawai has been change data</p>
    <hr>
    <div class="text-end">
        <button type="button" class="btn btn-default"
            onclick="document.location.href = '../ui/header.php?page=profile-edit&id_user=<?= $_SESSION['id'] ?>'"
            data-bs-dismiss="alert" aria-label="Close">Close</button>
    </div>
</div>
<?php
    } else if ($_GET['dialog'] == "password_verify") {
    ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">Not Successfully password verified</h4>
    <p>Password has been not verified</p>
    <hr>
    <div class="text-end">
        <button type="button" class="btn btn-default"
            onclick="document.location.href = '../ui/header.php?page=profile-edit&id_user=<?= $_SESSION['id'] ?>'"
            data-bs-dismiss="alert" aria-label="Close">Close</button>
    </div>
</div>
<?php
    }
endif;