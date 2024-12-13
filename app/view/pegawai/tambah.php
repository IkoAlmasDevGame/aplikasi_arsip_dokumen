<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Tambah Pegawai</title>
    <?php if ($_SESSION['akses'] == 'administrator') { ?>
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
                    Dashboard Tambah Pegawai
                </h4>
                <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?page=beranda" aria-current="page"
                            class="text-decoration-none text-primary">Beranda</a>
                    </li>
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?page=pegawai" aria-current="page"
                            class="text-decoration-none text-primary">Pegawai</a>
                    </li>
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?aksi=pegawai-tambah" aria-current="page"
                            class="text-decoration-none active">Tambah Pegawai</a>
                    </li>
                </div>
            </div>
            <hr class="text-secondary">
            <div class="z-n1 py-2">
                <section class="content">
                    <div class="content-wrapper">
                        <div class="card shadow mb-4">
                            <div class="card-header py-2">
                                <h4 class="card-title display-3 fs-2 text-center"
                                    style="font-weight: 600; font-family: monospace;">Tambah Pegawai</h4>
                            </div>
                            <div class="card-body my-2">
                                <div class="container">
                                    <div class="table-responsive">
                                        <div class="d-flex justify-content-center align-items-center flex-wrap">
                                            <div class="card bg-secondary col-sm-7 col-md-7">
                                                <div class="card-header py-2 bg-body-secondary shadow">
                                                    <?php require_once("../pegawai/function.php"); ?>
                                                    <hr class="text-dark">
                                                    <div class="form-inline row justify-content-end 
                                                                align-items-center flex-wrap">
                                                        <div class="col-sm-4 col-md-4 fs-5 btn-block disabled">
                                                            <?php error_reporting(0); ?>
                                                            <?php $ambil = $koneksi->query("SELECT * FROM user ORDER BY nip DESC LIMIT 1") ?>
                                                            <?php $pecah = $ambil->fetch_array(); ?>
                                                            <label for="">Data
                                                                Terakhir :</label>
                                                        </div>
                                                        <div class="col-sm-4 col-md-4">
                                                            <input type="text" value="<?php echo $pecah['nip'] ?>"
                                                                placeholder="nip pegawai sebelumnya ..." readonly
                                                                class="form-control" id="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body my-1">
                                                    <form action="?aksi=tambah-pegawai" method="post">
                                                        <div class="form-group">
                                                            <div class="my-2"></div>
                                                            <div class="form-inline row">
                                                                <div class="d-flex justify-content-start 
                                                                        align-items-center flex-wrap text-light">
                                                                    <div class="form-label col-sm-4 col-md-4
                                                                             fs-5">
                                                                        <label for=""
                                                                            class="label label-default">Username</label>
                                                                    </div>
                                                                    <div class="col-sm-1 col-md-1">:</div>
                                                                    <div class="col-sm-7 col-md-7">
                                                                        <input type="text" maxlength="20"
                                                                            name="username" class="form-control"
                                                                            placeholder="masukkan username baru ..."
                                                                            id="" aria-required="TRUE">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="my-2"></div>
                                                            <div class="form-inline row">
                                                                <div class="d-flex justify-content-start 
                                                                        align-items-center flex-wrap text-light">
                                                                    <div class="form-label col-sm-4 col-md-4
                                                                             fs-5">
                                                                        <label for=""
                                                                            class="label label-default">Nama</label>
                                                                    </div>
                                                                    <div class="col-sm-1 col-md-1">:</div>
                                                                    <div class="col-sm-7 col-md-7">
                                                                        <input type="text" maxlength="20"
                                                                            name="nama" class="form-control"
                                                                            placeholder="masukkan nama pegawai ..."
                                                                            id="" aria-required="TRUE">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="my-2"></div>
                                                            <div class="form-inline row">
                                                                <div class="d-flex justify-content-start 
                                                                        align-items-center flex-wrap text-light">
                                                                    <div class="form-label col-sm-4 col-md-4
                                                                             fs-5">
                                                                        <label for=""
                                                                            class="label label-default">Password</label>
                                                                    </div>
                                                                    <div class="col-sm-1 col-md-1">:</div>
                                                                    <div class="col-sm-7 col-md-7">
                                                                        <input type="password" min="6"
                                                                            maxlength="350" name="password"
                                                                            class="form-control"
                                                                            placeholder="masukkan password baru  ..."
                                                                            id="" aria-required="TRUE">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="my-2"></div>
                                                            <div class="form-inline row">
                                                                <div class="d-flex justify-content-start 
                                                                        align-items-center flex-wrap text-light">
                                                                    <div class="form-label col-sm-4 col-md-4
                                                                             fs-5">
                                                                        <label for=""
                                                                            class="label label-default">Verifikasi
                                                                            Password</label>
                                                                    </div>
                                                                    <div class="col-sm-1 col-md-1">:</div>
                                                                    <div class="col-sm-7 col-md-7">
                                                                        <input type="password" min="6"
                                                                            maxlength="350" name="password2"
                                                                            class="form-control"
                                                                            placeholder="ulangi password baru  ..."
                                                                            id="" aria-required="TRUE">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="my-2"></div>
                                                            <div class="form-inline row">
                                                                <div class="d-flex justify-content-start 
                                                                        align-items-center flex-wrap text-light">
                                                                    <div class="form-label col-sm-4 col-md-4
                                                                             fs-5">
                                                                        <label for=""
                                                                            class="label label-default">Nip</label>
                                                                    </div>
                                                                    <div class="col-sm-1 col-md-1">:</div>
                                                                    <div class="col-sm-7 col-md-7">
                                                                        <input type="text" maxlength="20" name="nip"
                                                                            class="form-control"
                                                                            placeholder="masukkan nip baru ..."
                                                                            id="" aria-required="TRUEE">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="my-2"></div>
                                                            <div class="form-inline row">
                                                                <div class="d-flex justify-content-start 
                                                                        align-items-center flex-wrap text-light">
                                                                    <div class="form-label col-sm-4 col-md-4
                                                                             fs-5">
                                                                        <label for=""
                                                                            class="label label-default">Akses</label>
                                                                    </div>
                                                                    <div class="col-sm-1 col-md-1">:</div>
                                                                    <div class="col-sm-7 col-md-7">
                                                                        <select name="akses" id=""
                                                                            class="form-select">
                                                                            <option value="">Pilih Akses</option>
                                                                            <option value="administrator">
                                                                                Administrator</option>
                                                                            <option value="pegawai">Pegawai</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer my-2">
                                                            <div class="text-center">
                                                                <button type="submit" class="btn btn-primary">
                                                                    <i class="fas fa-fw fa-save fa-1x"></i>
                                                                    Simpan Data
                                                                </button>
                                                                <a href="?page=pegawai" aria-current="page"
                                                                    class="btn btn-default btn-outline-dark">
                                                                    <i class="fas fa-fw fa-close fa-1x"></i>
                                                                    Cancel
                                                                </a>
                                                                <button type="reset" class="btn btn-danger">
                                                                    <i class="fas fa-fw fa-eraser fa-1x"></i>
                                                                    Hapus Data
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
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
    <?php require_once("../ui/footer.php"); ?>