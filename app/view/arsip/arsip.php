<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Arsip</title>
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
                    Dashboard Arsip
                </h4>
                <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?page=beranda" aria-current="page"
                            class="text-decoration-none text-primary">Beranda</a>
                    </li>
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?page=arsip" aria-current="page" class="text-decoration-none active">Arsip</a>
                    </li>
                </div>
            </div>
            <div class="z-n1 py-2">
                <section class="content">
                    <div class="content-wrapper">
                        <div class="container-fluid">
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
                                    style="font-weight: 600; font-family: monospace;">Arsip Document</h4>
                                <?php require_once("../arsip/function.php") ?>
                                <div class="row justify-content-start align-items-start">
                                    <div class="col-md-3 mt-3 mb-2">
                                        <form class="form-inline" method="post">
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
                                                    <button class="dropdown-item" name="cari_kode_box"
                                                        type="submit">Kode Box</button>
                                                    <button class="dropdown-item" name="cari_kode_ordner"
                                                        type="submit">Kode Ordner</button>
                                                    <button class="dropdown-item" name="cari_kode_arsip"
                                                        type="submit">Kode Arsip</button>
                                                    <button class="dropdown-item" name="cari_kegiatan"
                                                        type="submit">kegiatan</button>
                                                </div>
                                                <div class="col-md-6 mt-3 mb-2 text-start">
                                                    <?php if (isset($_POST['cari_kode_box'])) { ?>
                                                        <a href="?page=arsip-print&cari_kode_box=<?= $_POST['keyword'] ?>"
                                                            class="btn btn-danger" title="mencari data kode box">
                                                            <i class="fas fa-fw fa-file-pdf fa-1x"></i>
                                                            PDF
                                                        </a>
                                                    <?php } elseif (isset($_POST['cari_kode_ordner'])) { ?>
                                                        <a href="?page=arsip-print&cari_kode_ordner=<?= $_POST['keyword'] ?>"
                                                            class="btn btn-danger"
                                                            title="mencari data cari kode order owner">
                                                            <i class="fas fa-fw fa-file-pdf fa-1x"></i>
                                                            PDF
                                                        </a>
                                                    <?php } elseif (isset($_POST['cari_kode_arsip'])) { ?>
                                                        <a href="?page=arsip-print&cari_kode_arsip=<?= $_POST['keyword'] ?>"
                                                            class="btn btn-danger" title="mencari data cari kode arsip">
                                                            <i class="fas fa-fw fa-file-pdf fa-1x"></i>
                                                            PDF
                                                        </a>
                                                    <?php } elseif (isset($_POST['cari_kegiatan'])) { ?>
                                                        <a href="?page=arsip-print&cari_kegiatan=<?= $_POST['keyword'] ?>"
                                                            class="btn btn-danger" title="mencari data cari kegiatan">
                                                            <i class="fas fa-fw fa-file-pdf fa-1x"></i>
                                                            PDF
                                                        </a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-0 mt-3 mb-2 text-end">
                                <a href="?aksi=arsip-tambah" aria-current="page" class="btn btn-warning">
                                    <i class="fas fa-fw fa-plus fa-1x"></i>
                                    Tambah Arsip Document
                                </a>
                                <a href="?page=arsip" aria-current="page" class="btn btn-info">
                                    <i class="fas fa-fw fa-refresh fa-1x"></i>
                                    Refresh Halaman
                                </a>
                            </div>
                            <div class="card-body my-2">
                                <div class="container-fluid">
                                    <div class="table-responsive">
                                        <div class="d-table" style="width: 1052px; min-width: 100%;">
                                            <table class="table table-striped-columns table-bordered"
                                                id="datatable1">
                                                <thead>
                                                    <th class="text-center fw-normal">No.</th>
                                                    <th class="text-center fw-normal">Kode Rak</th>
                                                    <th class="text-center fw-normal">Kode Box</th>
                                                    <th class="text-center fw-normal">Kode Ordner</th>
                                                    <th class="text-center fw-normal">Kode Arsip</th>
                                                    <th class="text-center fw-normal">No Akun</th>
                                                    <th class="text-center fw-normal">Bidang</th>
                                                    <th class="text-center fw-normal">Sub Bidang</th>
                                                    <th class="text-center fw-normal">Kegiatan</th>
                                                    <th class="text-center fw-normal">Tahun</th>
                                                    <th class="text-center fw-normal"
                                                        style="width: 80px; min-width: 100%;">Status Arsip</th>
                                                    <th style="min-width: 100%; width: 99px;"
                                                        class="text-center fw-normal">Aksi</th>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1; ?>
                                                    <?php if (isset($_POST['cari_kode_box'])) { ?>
                                                        <?php $keyword = htmlspecialchars($_POST['keyword']); ?>
                                                        <?php $data = $archive->cariKodeBox($keyword); ?>
                                                    <?php } elseif (isset($_POST['cari_kode_ordner'])) { ?>
                                                        <?php $keyword = htmlspecialchars($_POST['keyword']); ?>
                                                        <?php $data = $archive->cariKodeOrdner($keyword); ?>
                                                    <?php } elseif (isset($_POST['cari_kode_arsip'])) { ?>
                                                        <?php $keyword = htmlspecialchars($_POST['keyword']); ?>
                                                        <?php $data = $archive->cariKodeArsip($keyword); ?>
                                                    <?php } elseif (isset($_POST['cari_kegiatan'])) { ?>
                                                        <?php $keyword = htmlspecialchars($_POST['keyword']); ?>
                                                        <?php $data = $archive->cariKegiatan($keyword); ?>
                                                    <?php } else { ?>
                                                        <?php $data = $archive->arsip(); ?>
                                                    <?php } ?>
                                                    <?php foreach ($data as $row): ?>
                                                        <tr>
                                                            <td><?= $no; ?></td>
                                                            <td><?= $row["kode_rak"]; ?></td>
                                                            <td><?= $row["kode_box"]; ?></td>
                                                            <td><?= $row["kode_ordner"]; ?></td>
                                                            <td>
                                                                <button type="button"
                                                                    class="btn btn-light border bordered-primary"
                                                                    data-toggle="popover"
                                                                    title="<?= $row["kode_arsip"]; ?>"
                                                                    data-content="<?= $row['deskripsi_arsip']; ?>"><?= $row["kode_arsip"]; ?>
                                                                </button>
                                                            </td>
                                                            <td><?= $row["no_akun"]; ?></td>
                                                            <td class="text-center text-justify">
                                                                <?= ucwords($row["bidang"]); ?></td>
                                                            <td class="text-center text-justify">
                                                                <?= ucwords($row["sub_bidang"]); ?></td>
                                                            <td class="text-center text-justify">
                                                                <?= ucfirst($row["kegiatan"]); ?></td>
                                                            <td><?= $row["tahun"]; ?></td>
                                                            <td><?= $row["status_arsip"]; ?></td>
                                                            <td>
                                                                <a href="?aksi=hapus-arsip&id_arsip_dokumen=<?= $row['id_arsip_dokumen'] ?>"
                                                                    aria-current="page"
                                                                    onclick="return confirm('Apakah anda ingin hapus dokumen arsip.')"
                                                                    class="btn btn-sm btn-danger">
                                                                    <i class="fas fa-fw fa-1x fa-trash"></i>
                                                                </a>
                                                                <a href="?aksi=arsip-ubah&id_arsip_dokumen=<?= $row['id_arsip_dokumen'] ?>"
                                                                    aria-current="page" class="btn btn-sm btn-warning">
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
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- Script Luar -->
    <script type="text/javascript">
        $(function() {
            $('[data-toggle="popover"]').popover()
        })
    </script>
    <!-- Script Luar -->
    <?php require_once("../ui/footer.php"); ?>