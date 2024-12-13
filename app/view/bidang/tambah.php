<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Tambah Bidang</title>
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
                        Dashboard Tambah Bidang
                    </h4>
                    <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page"
                                class="text-decoration-none text-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=bidang-arsip" aria-current="page"
                                class="text-decoration-none text-primary">Bidang Arsip</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?aksi=bidang-tambah" aria-current="page" class="text-decoration-none active">Tambah
                                Bidang</a>
                        </li>
                    </div>
                </div>
                <div class="z-n1 py-2">
                    <section class="content">
                        <div class="content-wrapper">
                            <div class="card shadow mb-4">
                                <div class="card-header py-2">
                                    <h4 class="card-title display-3 text-center"
                                        style="font-weight: 600; font-family: monospace;">Tambah
                                        Bidang</h4>
                                </div>
                                <div class="card-body my-2">
                                    <div class="d-flex justify-content-center align-items-center flex-wrap">
                                        <div class="card col-sm-6 col-md-6 bg-secondary">
                                            <div class="card-header bg-body-secondary py-2">
                                                <?php require_once("../bidang/function.php"); ?>
                                            </div>
                                            <div class="card-body">
                                                <form action="?aksi=tambah-bidang" method="post">
                                                    <div class="form-group">
                                                        <div class="form-inline row justify-content-center 
                                                        align-items-center flex-wrap">
                                                            <div class="form-label col-sm-4 col-md-4 text-light">
                                                                <label for="bidang"
                                                                    class="label label-default fs-3">Bidang</label>
                                                            </div>
                                                            <div class="col-sm-1 col-md-1">:</div>
                                                            <div class="col-sm-6 col-md-6">
                                                                <input type="text" name="bidang" maxlength="100"
                                                                    placeholder="masukkan bidang ...."
                                                                    class="form-control" required id="bidang">
                                                            </div>
                                                        </div>
                                                        <div class="form-inline row justify-content-center 
                                                        align-items-center flex-wrap">
                                                            <div class="form-label col-sm-4 col-md-4 text-light">
                                                                <label for="sub_bidang"
                                                                    class="label label-default fs-3">Sub Bidang</label>
                                                            </div>
                                                            <div class="col-sm-1 col-md-1">:</div>
                                                            <div class="col-sm-6 col-md-6">
                                                                <input type="text" maxlength="100"
                                                                    placeholder="masukkan sub bidang ...."
                                                                    name="sub_bidang" class="form-control" required
                                                                    id="sub_bidang">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="my-2"></div>
                                                    <div class="card-footer rounded-2 bg-body-secondary">
                                                        <div class="text-end">
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="fas fa-fw fa-1x fa-save"></i>
                                                                Simpan Data
                                                            </button>
                                                            <button type="reset" class="btn btn-danger">
                                                                <i class="fas fa-fw fa-1x fa-eraser"></i>
                                                                Hapus Data</button>
                                                        </div>
                                                    </div>
                                                </form>
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