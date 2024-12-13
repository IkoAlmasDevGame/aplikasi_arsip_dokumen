<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Setting Website</title>
        <?php if ($_SESSION['akses'] == 'administrator' || $_SESSION['akses'] == 'pegawai') { ?>
        <?php require_once("../ui/header.php"); ?>
        <?php } else { ?>
        <?php
        header("location:../ui/header.php?page=beranda");
        exit(0);
        ?>
        <?php } ?>
    </head>

    <body>
        <?php require_once("../ui/sidebar.php"); ?>
        <div class="panel panel-default bg-body-secondary py-2 rounded-2">
            <div class="panel-body rounded-2 container">
                <div class="panel-heading text-dark">
                    <h4 class="panel-title display-3 fs-2" style="font-weight: 600; font-family: monospace;">
                        Dashboard Setting Website
                    </h4>
                    <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page"
                                class="text-decoration-none text-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=profile-setting&id_setting=<?= $_GET['id_setting'] ?>" aria-current="page"
                                class="text-decoration-none active">Edit
                                Setting Website</a>
                        </li>
                    </div>
                </div>
                <div class="z-n1 py-2">
                    <?php if (isset($_POST['btnSettingEdit'])) { ?>
                    <?php
                    $nama = htmlspecialchars($_POST['nama_pemilik']);
                    $website = htmlspecialchars($_POST['nama_website']);
                    $status = htmlspecialchars($_POST['status_website']);
                    $id = htmlspecialchars($_POST['id_setting']);
                    $update = "UPDATE setting SET nama_pemilik='$nama', nama_website='$website', status_website='$status' WHERE id_setting='$id'";
                    $koneksi->query($update);
                    echo "<script>
                    document.location.href = '../ui/header.php?page=profile-setting&id_setting=1'
                    </script>";
                    die;
                    ?>
                    <?php } ?>
                    <section class="content">
                        <div class="content-wrapper">
                            <div class="card shadow mb-4">
                                <div class="card-header py-2">
                                    <h4 class="card-title display-3 fs-2"
                                        style="font-weight: 600; font-family: monospace;">
                                        Dashboard Setting Website
                                    </h4>
                                </div>
                                <div class="card-body my-3">
                                    <div class="d-flex justify-content-center align-items-center flex-wrap">
                                        <div class="card rounded-3 bg-secondary col-sm-6 col-md-6">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <div class="my-2"></div>
                                                    <?php if (isset($_GET['id_setting'])): ?>
                                                    <?php $SQL = $koneksi->query("SELECT * FROM setting WHERE id_setting = '1'")->fetch_array(); ?>
                                                    <?php extract($SQL); ?>
                                                    <form action="" method="post">
                                                        <input type="hidden" name="id_setting"
                                                            value="<?= $id_setting ?>">
                                                        <div class="form-inline row justify-content-start 
                                                            align-items-center flex-wrap text-light">
                                                            <div class="form-label col-sm-4 col-md-4 fs-5">
                                                                <label for="nama_pemilik"
                                                                    class="label label-default fw-normal">Nama
                                                                    Pemilik</label>
                                                            </div>
                                                            <div class="col-sm-1 col-md-1">:</div>
                                                            <div class="col-sm-6 col-md-6">
                                                                <input type="text" name="nama_pemilik"
                                                                    class="form-control" value="<?= $nama_pemilik ?>"
                                                                    id="nama_pemilik" required>
                                                            </div>
                                                        </div>
                                                        <div class="my-2"></div>
                                                        <div class="form-inline row justify-content-start 
                                                            align-items-center flex-wrap text-light">
                                                            <div class="form-label col-sm-4 col-md-4 fs-5">
                                                                <label for="nama_website"
                                                                    class="label label-default fw-normal">Nama
                                                                    Website</label>
                                                            </div>
                                                            <div class="col-sm-1 col-md-1">:</div>
                                                            <div class="col-sm-6 col-md-6">
                                                                <input type="text" name="nama_website"
                                                                    class="form-control" value="<?= $nama_website ?>"
                                                                    id="nama_website" required>
                                                            </div>
                                                        </div>
                                                        <div class="my-2"></div>
                                                        <div class="form-inline row justify-content-start 
                                                            align-items-center flex-wrap text-light">
                                                            <div class="form-label col-sm-4 col-md-4 fs-5">
                                                                <label for="nama_website"
                                                                    class="label label-default fw-normal">Status
                                                                    Website</label>
                                                            </div>
                                                            <div class="col-sm-1 col-md-1">:</div>
                                                            <div class="col-sm-6 col-md-6">
                                                                <select name="status_website" id="status_website"
                                                                    class="form-select">
                                                                    <option value="">Pilih Status Website</option>
                                                                    <option
                                                                        <?php if ($SQL['status_website'] == '0') { ?>
                                                                        selected <?php } ?> value="0">Tidak Aktif
                                                                    </option>
                                                                    <option
                                                                        <?php if ($SQL['status_website'] == '1') { ?>
                                                                        selected <?php } ?> value="1">Aktif</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="my-2">
                                                            <div class="card-footer">
                                                                <button type="submit" name="btnSettingEdit"
                                                                    class="btn btn-primary">
                                                                    <i class="fas fa-1x fa-fw fa-save"></i>
                                                                    Update Profile Website
                                                                </button>
                                                                <a href="?page=beranda" aria-current="page"
                                                                    class="btn btn-default">
                                                                    <i class="fas fa-fw fa-1x fa-close"></i>
                                                                    Kembali beranda
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>