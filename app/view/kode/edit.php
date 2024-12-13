<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Edit Kode Arsip</title>
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
            <div class="panel-body rounded-2 container-fluid">
                <div class="panel-heading text-dark">
                    <h4 class="panel-title display-3 fs-2" style="font-weight: 600; font-family: monospace;">
                        Dashboard Edit Kode Arsip
                    </h4>
                    <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page"
                                class="text-decoration-none text-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=kode-arsip" aria-current="page"
                                class="text-decoration-none text-primary">Kode
                                Arsip</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?aksi=kode-ubah&id_kode_arsip=<?= $_GET['id_kode_arsip'] ?>" aria-current="page"
                                class="text-decoration-none active">Edit
                                Kode Arsip</a>
                        </li>
                    </div>
                </div>
                <div class="z-n1 py-2">
                    <section class="content">
                        <div class="content-wrapper">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h4 class="card-title display-3 text-center"
                                        style="font-weight: 600; font-family: monospace;">
                                        Edit Kode Arsip
                                    </h4>
                                </div>
                                <div class="card-body my-3">
                                    <div class="d-flex justify-content-center align-items-center flex-wrap">
                                        <div class="card bg-secondary col-sm-6 col-md-6">
                                            <div class="card-header py-2 bg-body-secondary">
                                                <?php require_once("../kode/function.php") ?>
                                            </div>
                                            <div class="card-body">
                                                <?php if (isset($_GET['id_kode_arsip'])): ?>
                                                <?php $SQL = "SELECT * FROM kode_arsip WHERE id_kode_arsip = '$_GET[id_kode_arsip]'"; ?>
                                                <?php $data = $koneksi->query($SQL); ?>
                                                <?php foreach ($data as $isi): ?>
                                                <form action="?aksi=ubah-kode" method="post">
                                                    <div class="my-2"></div>
                                                    <div class="form-inline row justify-content-start
                                                             align-items-start flex-wrap text-light">
                                                        <div class="form-label col-sm-4 col-md-4 fs-4 fw-normal">
                                                            <label for="kode_arsip" class="label label-default">
                                                                Kode Arsip
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-1 col-md-1 fs-4 fw-normal">:</div>
                                                        <div class="col-sm-7 col-md-7">
                                                            <input type="text" placeholder="kode arsip ..."
                                                                name="kode_arsip" value="<?= $isi['kode_arsip'] ?>"
                                                                maxlength="100" required class="form-control"
                                                                id="kode_arsip">
                                                        </div>
                                                    </div>
                                                    <div class="my-2"></div>
                                                    <div class="form-inline row justify-content-start
                                                             align-items-start flex-wrap text-light">
                                                        <div class="form-label col-sm-4 col-md-4 fs-4 fw-normal">
                                                            <label for="deskripsi_arsip" class="label label-default">
                                                                Deskrispi Arsip
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-1 col-md-1 fs-4 fw-normal">:</div>
                                                        <div class="col-sm-7 col-md-7">
                                                            <input type="text" value="<?= $isi['deskripsi_arsip'] ?>"
                                                                placeholder="deskripsi arsip ..." name="deskripsi_arsip"
                                                                maxlength="100" required class="form-control"
                                                                id="deskripsi_arsip">
                                                        </div>
                                                    </div>
                                                    <div class="card-footer my-2">
                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="fas fa-fw fa-save fa-1x"></i>
                                                                Update Data
                                                            </button>
                                                            <a href="?page=kode-arsip" aria-current="page"
                                                                class="btn btn-default">
                                                                <i class="fas fa-fw fa-close fa-1x"></i>
                                                                Kembali
                                                            </a>
                                                        </div>
                                                    </div>
                                                </form>
                                                <?php endforeach; ?>
                                                <?php endif; ?>
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
        <?php require_once("../ui/footer.php"); ?>