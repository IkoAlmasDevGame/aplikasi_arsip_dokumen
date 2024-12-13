<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Edit Pegawai</title>
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
                        Dashboard Edit Pegawai
                    </h4>
                    <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page"
                                class="text-decoration-none text-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=profile-edit&id_user=<?= $_SESSION['id'] ?>" aria-current="page"
                                class="text-decoration-none active">Edit
                                Pegawai</a>
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
                                        style="font-weight: 600; font-family: monospace;">Edit Pegawai</h4>
                                </div>
                                <div class="card-body my-2">
                                    <div class="container">
                                        <div class="table-responsive">
                                            <div class="d-flex justify-content-center align-items-center flex-wrap">
                                                <?php if (isset($_GET['id_user'])): ?>
                                                <div class="card bg-secondary col-sm-7 col-md-7">
                                                    <div class="card-header py-2 bg-secondary shadow">
                                                        <?php require_once("../profile/function.php"); ?>
                                                    </div>
                                                    <div class="card-body my-1">
                                                        <?php $SQL = "SELECT * FROM user WHERE id_user = '$_GET[id_user]'"; ?>
                                                        <?php $query = $koneksi->query($SQL); ?>
                                                        <?php foreach ($query as $isi): ?>
                                                        <form action="?aksi=ubah-pegawai" method="post">
                                                            <input type="hidden" name="id_user"
                                                                value="<?= $isi['id_user'] ?>">
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
                                                                                name="username"
                                                                                value="<?= $isi['username'] ?>"
                                                                                class="form-control" readonly
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
                                                                                id="" value="<?= $isi['nama'] ?>"
                                                                                aria-required="TRUE">
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
                                                                                class="label label-default">Old
                                                                                Password</label>
                                                                        </div>
                                                                        <div class="col-sm-1 col-md-1">:</div>
                                                                        <div class="col-sm-7 col-md-7">
                                                                            <input type="password" min="6"
                                                                                maxlength="350" name="old_password"
                                                                                class="form-control"
                                                                                placeholder="masukkan password lama  ..."
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
                                                                            <label for="" class="label label-default">
                                                                                Password baru</label>
                                                                        </div>
                                                                        <div class="col-sm-1 col-md-1">:</div>
                                                                        <div class="col-sm-7 col-md-7">
                                                                            <input type="password" min="6"
                                                                                maxlength="350" name="new_password"
                                                                                class="form-control"
                                                                                placeholder="masukkan password baru anda ..."
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
                                                                            <label for="" class="label label-default">
                                                                                Password Verify</label>
                                                                        </div>
                                                                        <div class="col-sm-1 col-md-1">:</div>
                                                                        <div class="col-sm-7 col-md-7">
                                                                            <input type="password" min="6"
                                                                                maxlength="350"
                                                                                name="new_password_verify"
                                                                                class="form-control"
                                                                                placeholder="ulangi password baru anda  ..."
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
                                                                                id="" readonly
                                                                                value="<?= $isi['nip'] ?>"
                                                                                aria-required="TRUE">
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
                                                                            <input type="text" class="form-control"
                                                                                name="akses" readonly
                                                                                aria-required="TRUE"
                                                                                value="<?= $isi['akses'] ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer my-2">
                                                                <div class="text-center">
                                                                    <button type="submit" class="btn btn-primary">
                                                                        <i class="fas fa-fw fa-save fa-1x"></i>
                                                                        Update Data
                                                                    </button>
                                                                    <a href="?page=beranda" aria-current="page"
                                                                        class="btn btn-default btn-outline-dark">
                                                                        <i class="fas fa-fw fa-close fa-1x"></i>
                                                                        Cancel
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                                <?php endif; ?>
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