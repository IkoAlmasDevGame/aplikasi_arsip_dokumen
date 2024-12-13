<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Kode Arsip</title>
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
                        Dashboard Kode Arsip
                    </h4>
                    <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page"
                                class="text-decoration-none text-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=kode-arsip" aria-current="page" class="text-decoration-none active">Kode
                                Arsip</a>
                        </li>
                    </div>
                </div>
                <div class="z-n1 py-2">
                    <section class="content">
                        <div class="content-wrapper">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-6 mb-3 mt-2">
                                        <marquee scrollamount="10" loop="infinite" direction="left"
                                            class="nav-link text-dark p-2 bg-info rounded text-center">
                                            <h4><?= salam(); ?>, <?= ucfirst($_SESSION['nama']); ?></h4>
                                        </marquee>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h4 class="card-title text-dark fs-2 display-4"
                                        style="font-weight: 600; font-family: monospace;">Kode Arsip</h4>
                                    <?php require_once("../kode/function.php") ?>
                                    <div class="row justify-content-start align-items-start">
                                        <div class="col-md-3 mt-3 mb-2">
                                            <form action="" class="form-inline" method="post">
                                                <input for="colFormLabel" class="form-control" type="text"
                                                    autocomplete="off" placeholder="Cari" aria-label="Search"
                                                    name="keyword">
                                                <div class="my-2"></div>
                                                <!--  -->
                                                <div class="dropdown">
                                                    <button class="btn btn-success dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        Cari berdasarkan
                                                    </button>
                                                    <!--  -->
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <button class="dropdown-item" name="cari_kode_arsip"
                                                            type="submit">Kode Arsip</button>
                                                        <button class="dropdown-item" name="cari_deskripsi_arsip"
                                                            type="submit">Deskripsi Arsip</button>
                                                    </div>
                                                    <div class="col-md-6 mt-3 mb-2 text-start">
                                                        <?php if (isset($_POST['cari_kode_arsip'])) { ?>
                                                        <a href="?page=kode-print&cari_kode_arsip=<?= $_POST['keyword'] ?>"
                                                            class="btn btn-danger" title="mencari data kode box">
                                                            <i class="fas fa-fw fa-file-pdf fa-1x"></i>
                                                            PDF
                                                        </a>
                                                        <?php } elseif (isset($_POST['cari_deskripsi_arsip'])) { ?>
                                                        <a href="?page=kode-print&cari_deskripsi_arsip=<?= $_POST['keyword'] ?>"
                                                            class="btn btn-danger"
                                                            title="mencari data cari kode order owner">
                                                            <i class="fas fa-fw fa-file-pdf fa-1x"></i>
                                                            PDF
                                                        </a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-0 mt-3 mb-2 text-end">
                                        <a href="?aksi=kode-tambah" aria-current="page" class="btn btn-warning">
                                            <i class="fas fa-fw fa-plus fa-1x"></i>
                                            Tambah Kode Arsip
                                        </a>
                                        <a href="?page=kode-arsip" aria-current="page" class="btn btn-info">
                                            <i class="fas fa-fw fa-refresh fa-1x"></i>
                                            Refresh Halaman
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body my-2">
                                    <div class="container">
                                        <div class="table-responsive">
                                            <table class="table table-striped-columns table-bordered" id="datatable1">
                                                <thead>
                                                    <th class="text-center fw-normal">No.</th>
                                                    <th class="text-center fw-normal">Kode Arsip</th>
                                                    <th class="text-center fw-normal">Deskripsi Arsip</th>
                                                    <th class="text-center fw-normal">Aksi</th>
                                                </thead>
                                                <tbody>
                                                    <?php if (isset($_POST['cari_kode_arsip'])) { ?>
                                                    <?php $keyword = htmlspecialchars($_POST['keyword']); ?>
                                                    <?php $data = $arsipkode->cariKodeArsip($keyword); ?>
                                                    <?php } elseif (isset($_POST['cari_deskripsi_arsip'])) { ?>
                                                    <?php $keyword = htmlspecialchars($_POST['keyword']); ?>
                                                    <?php $data = $arsipkode->cariDeskripsiArsip($keyword); ?>
                                                    <?php } else { ?>
                                                    <?php $data = $arsipkode->kode_arsip(); ?>
                                                    <?php } ?>
                                                    <?php foreach ($data as $row): ?>
                                                    <?php $no = $row['id_kode_arsip']; ?>
                                                    <tr>
                                                        <td class="text-center fw-normal">
                                                            <?= $no; ?>
                                                        </td>
                                                        <td class="text-start fw-normal">
                                                            <?= $row['kode_arsip']; ?>
                                                        </td>
                                                        <td class="text-start fw-normal">
                                                            <?= $row['deskripsi_arsip']; ?>
                                                        </td>
                                                        <td class="text-center fw-normal">
                                                            <a href="?aksi=hapus-kode&id_kode_arsip=<?= $row['id_kode_arsip'] ?>"
                                                                aria-current="page"
                                                                onclick="return confirm('Apakah anda ingin menghapus data bidang ini ?')"
                                                                class="btn btn-sm btn-danger">
                                                                <i class="fas fa-fw fa-1x fa-trash"></i>
                                                            </a>
                                                            <a href="?aksi=kode-ubah&id_kode_arsip=<?= $row['id_kode_arsip'] ?>"
                                                                aria-current="page" class="btn btn-sm btn-info">
                                                                <i class="fas fa-fw fa-1x fa-edit"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php $no++; ?>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
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