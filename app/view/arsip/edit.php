<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Edit Arsip</title>
        <?php if ($_SESSION['akses'] == 'administrator' || $_SESSION['akses'] == 'pegawai') { ?>
        <?php require_once("../ui/header.php"); ?>
        <?php } else { ?>
        <?php
        header("location:../ui/header.php?page=beranda");
        exit(0);
        ?>
        <?php } ?>
        <style type="text/css">
        .counter {
            color: white;
        }

        .counter.exceeded {
            color: red;
        }
        </style>
    </head>

    <body>
        <?php require_once("../ui/sidebar.php"); ?>
        <div class="panel panel-default bg-body-secondary py-2 rounded-2">
            <div class="panel-body rounded-2 container-fluid">
                <div class="panel-heading text-dark">
                    <h4 class="panel-title display-3 fs-2" style="font-weight: 600; font-family: monospace;">
                        Dashboard Edit Arsip
                    </h4>
                    <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page"
                                class="text-decoration-none text-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=arsip" aria-current="page"
                                class="text-decoration-none text-primary">Arsip</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?aksi=arsip-ubah&id_arsip_dokumen=<?= $_GET['id_arsip_dokumen'] ?>"
                                aria-current="page" class="text-decoration-none active">Edit
                                Arsip</a>
                        </li>
                    </div>
                </div>
                <div class="z-n1 py-2">
                    <section class="content">
                        <div class="content-wrapper">
                            <div class="card shadow mb-4">
                                <div class="card-header py-2">
                                    <h4 class="card-title display-3 fs-3 text-center"
                                        style="font-weight: 600; font-family: monospace;">Tambah Arsip</h4>
                                </div>
                                <div class="card-body my-2">
                                    <div class="d-flex justify-content-center align-items-center flex-wrap">
                                        <div class="card shadow my-3 bg-secondary col-sm-9 col-md-9">
                                            <div class="card-header bg-body-secondary py-2">
                                                <?php require_once("../arsip/function.php"); ?>
                                            </div>
                                            <?php if (isset($_GET['id_arsip_dokumen'])): ?>
                                            <div class="card-body my-2">
                                                <?php $SQL = "SELECT * FROM arsip_dokumen WHERE id_arsip_dokumen = '$_GET[id_arsip_dokumen]'"; ?>
                                                <?php $data = $koneksi->query($SQL); ?>
                                                <?php foreach ($data as $isi): ?>
                                                <form action="?aksi=ubah-arsip" method="post">
                                                    <input type="hidden" name="id_arsip_dokumen"
                                                        value="<?= $isi['id_arsip_dokumen'] ?>">
                                                    <div class="form-group">
                                                        <div class="form-inline row flex-wrap
                                                             justify-content-center align-items-center">
                                                            <div class="form-label col-sm-5 col-md-5 text-light">
                                                                <label for="kode_rak"
                                                                    class="label label-default fs-5">Kode Rak</label>
                                                            </div>
                                                            <div class="col-sm-1 col-md-1">:</div>
                                                            <div class="col-sm-6 col-md-6">
                                                                <input type="text" name="kode_rak" required
                                                                    class="form-control" value="<?= $isi['kode_rak'] ?>"
                                                                    maxlength="30" placeholder="Kode Rak" id="kode_rak">
                                                                <div class="d-flex justify-content-between 
                                                                align-items-center flex-wrap">
                                                                    <small class="counter" id="counterKodeRak">Sisa
                                                                        Karakter
                                                                        : 30</small>
                                                                    <button type="button" data-bs-toggle="modal"
                                                                        aria-expanded="false"
                                                                        class="badge badge-btn badge-info text-dark"
                                                                        data-bs-target="#KodeRak">
                                                                        <i class="fas fa-info fa-fw fa-1x"></i>
                                                                        info kode Rak
                                                                    </button>
                                                                    <div class="modal fade" id="KodeRak"
                                                                        aria-labelledby="Kode Rak" tabindex="-1"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog 
                                                                            modal-dialog-centered opacity-75">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title">Infomation
                                                                                        Kode Rak</h4>
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <p class="text-start fs-6 
                                                                                        fw-normal">
                                                                                        Jika yang dimaksud dengan "kode
                                                                                        rak" dalam dokumen arsip adalah
                                                                                        sistem pengkodean yang digunakan
                                                                                        untuk menyusun arsip berdasarkan
                                                                                        lokasi penyimpanannya (misalnya,
                                                                                        di rak tertentu dalam ruang
                                                                                        arsip), maka ini berarti kita
                                                                                        perlu membuat sistem pengkodean
                                                                                        lokasi arsip yang dapat
                                                                                        mengidentifikasi di rak mana
                                                                                        arsip tersebut disimpan.
                                                                                        Pengkodean semacam ini membantu
                                                                                        dalam pengelolaan dan pencarian
                                                                                        dokumen fisik yang disimpan di
                                                                                        rak atau gudang arsip.
                                                                                    </p>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-bs-dismiss="modal">Close</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="my-2"></div>
                                                        <div class="form-inline row flex-wrap
                                                             justify-content-center align-items-center">
                                                            <div class="form-label col-sm-5 col-md-5 text-light">
                                                                <label for="kode_box"
                                                                    class="label label-default fs-5">Kode Box</label>
                                                            </div>
                                                            <div class="col-sm-1 col-md-1">:</div>
                                                            <div class="col-sm-6 col-md-6">
                                                                <input type="text" name="kode_box" required
                                                                    class="form-control" value="<?= $isi['kode_box'] ?>"
                                                                    maxlength="30" placeholder="Kode Box" id="kode_box">
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center flex-wrap">
                                                                    <small class="counter" id="counterKodeBox">Sisa
                                                                        Karakter
                                                                        : 30</small>
                                                                    <button type="button" data-bs-toggle="modal"
                                                                        aria-expanded="false"
                                                                        class="badge badge-btn badge-info text-dark"
                                                                        data-bs-target="#KodeBox">
                                                                        <i class="fas fa-info fa-fw fa-1x"></i>
                                                                        info kode box
                                                                    </button>
                                                                    <div class="modal fade" id="KodeBox"
                                                                        aria-labelledby="Kode Box" tabindex="-1"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog 
                                                                            modal-dialog-centered opacity-75">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title">Infomation
                                                                                        Kode Box</h4>
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <p class="text-start fs-6 
                                                                                        fw-normal">
                                                                                        Jika yang dimaksud dengan "kode
                                                                                        box" dalam konteks dokumen arsip
                                                                                        adalah sistem pengkodean atau
                                                                                        pengorganisasian dokumen dalam
                                                                                        kotak (box) atau folder di mana
                                                                                        arsip disimpan, maka saya akan
                                                                                        menjelaskan cara membuat sistem
                                                                                        pengkodean arsip dalam format
                                                                                        box atau folder dengan
                                                                                        menggunakan kode yang dapat
                                                                                        digunakan untuk mengidentifikasi
                                                                                        atau mencari arsip tersebut.
                                                                                    </p>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-bs-dismiss="modal">Close</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="my-2"></div>
                                                        <div class="form-inline row flex-wrap
                                                             justify-content-center align-items-center">
                                                            <div class="form-label col-sm-5 col-md-5 text-light">
                                                                <label for="kode_ordner"
                                                                    class="label label-default fs-5">Kode Ordner</label>
                                                            </div>
                                                            <div class="col-sm-1 col-md-1">:</div>
                                                            <div class="col-sm-6 col-md-6">
                                                                <input type="text" name="kode_ordner" required
                                                                    class="form-control" maxlength="30"
                                                                    placeholder="Kode Ordner"
                                                                    value="<?= $isi['kode_ordner'] ?>" id="kode_ordner">
                                                                <div class="d-flex justify-content-between
                                                                     align-items-center flex-wrap">
                                                                    <small class="counter" id="counterKodeOrdner">Sisa
                                                                        Karakter : 30</small>
                                                                    <button type="button" data-bs-toggle="modal"
                                                                        aria-expanded="false"
                                                                        class="badge badge-btn badge-info text-dark"
                                                                        data-bs-target="#KodeOrdner">
                                                                        <i class="fas fa-info fa-fw fa-1x"></i>
                                                                        info kode ordner
                                                                    </button>
                                                                    <div class="modal fade" id="KodeOrdner"
                                                                        aria-labelledby="Kode Ordner" tabindex="-1"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog 
                                                                            modal-dialog-centered opacity-75">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title">Infomation
                                                                                        Kode Ordner</h4>
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <p
                                                                                        class="text-start fs-6 fw-normal">
                                                                                        Jika yang dimaksud dengan "kode
                                                                                        ordner" adalah sistem pengkodean
                                                                                        atau cara
                                                                                        penyusunan arsip dalam dokumen
                                                                                        (misalnya, kode untuk pengurutan
                                                                                        atau
                                                                                        pengkodean file/folder dalam
                                                                                        sistem manajemen arsip), maka
                                                                                        berikut ini
                                                                                        adalah penjelasan dan contoh
                                                                                        pengkodean arsip menggunakan
                                                                                        JavaScript untuk
                                                                                        mendokumentasikan arsip
                                                                                        berdasarkan nomor atau kategori.
                                                                                    </p>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-bs-dismiss="modal">Close</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="my-2"></div>
                                                        <div class="form-inline row flex-wrap
                                                             justify-content-center align-items-center">
                                                            <div class="form-label col-sm-5 col-md-5 text-light">
                                                                <label for="kode_arsip"
                                                                    class="label label-default fs-5">Kode Arsip</label>
                                                            </div>
                                                            <div class="col-sm-1 col-md-1">:</div>
                                                            <div class="col-sm-6 col-md-6">
                                                                <input type="text" name="kode_arsip" required
                                                                    class="form-control" maxlength="200"
                                                                    placeholder="Kode Arsip"
                                                                    value="<?= $isi['kode_arsip'] ?>" id="kode_arsip">
                                                                <div class="d-flex justify-content-between
                                                                     align-items-center flex-wrap">
                                                                    <small class="counter" id="counterKodeArsip">Sisa
                                                                        Karakter :
                                                                        200</small>
                                                                    <button type="button" data-bs-toggle="modal"
                                                                        aria-expanded="false"
                                                                        class="badge badge-btn badge-info text-dark"
                                                                        data-bs-target="#KodeArsip">
                                                                        <i class="fas fa-info fa-fw fa-1x"></i>
                                                                        info Kode Arsip
                                                                    </button>
                                                                    <div class="modal fade" id="KodeArsip"
                                                                        aria-hidden="true" tabindex="-1">
                                                                        <div class="modal-dialog modal-dialog-centered
                                                                             opacity-75">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title">Infomation
                                                                                        Kode Arsip</h4>
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <?php require_once("../../config/config.php"); ?>
                                                                                    <?php $SQL1 = "SELECT * FROM kode_arsip"; ?>
                                                                                    <?php $bd1 = $koneksi->query($SQL1); ?>
                                                                                    <?php foreach ($bd1 as $db1): ?>
                                                                                    <li>
                                                                                        <?php echo $db1['kode_arsip'] . " - " . $db1['deskripsi_arsip']; ?>
                                                                                    </li>
                                                                                    <?php endforeach; ?>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-bs-dismiss="modal">Close</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="my-2"></div>
                                                        <div class="form-inline row flex-wrap
                                                             justify-content-center align-items-center">
                                                            <div class="form-label col-sm-5 col-md-5 text-light">
                                                                <label for="no_akun" class="label label-default fs-5">No
                                                                    Akun</label>
                                                            </div>
                                                            <div class="col-sm-1 col-md-1">:</div>
                                                            <div class="col-sm-6 col-md-6">
                                                                <input type="text" name="no_akun" required
                                                                    class="form-control" maxlength="30"
                                                                    placeholder="No Akun" value="<?= $isi['no_akun'] ?>"
                                                                    id="no_akun">
                                                                <small class="counter" id="counterNoAkun">Sisa Karakter
                                                                    : 30</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="text-light border border-top border-light">
                                                    <div class="form-group">
                                                        <div class="form-inline row flex-wrap
                                                             justify-content-center align-items-center">
                                                            <div class="form-label col-sm-5 col-md-5 text-light">
                                                                <label for="bidang"
                                                                    class="label label-default fs-5">Bidang</label>
                                                            </div>
                                                            <div class="col-sm-1 col-md-1">:</div>
                                                            <div class="col-sm-6 col-md-6">
                                                                <input type="text" name="bidang" required
                                                                    class="form-control" maxlength="250"
                                                                    placeholder="Bidang" value="<?= $isi['bidang'] ?>"
                                                                    id="bidang">
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center flex-wrap">
                                                                    <small class="counter" id="counterBidang">Sisa
                                                                        Karakter
                                                                        : 250</small>
                                                                    <button type="button" data-bs-toggle="modal"
                                                                        aria-expanded="false"
                                                                        class="badge badge-btn badge-info text-dark"
                                                                        data-bs-target="#Bidang">
                                                                        <i class="fas fa-info fa-fw fa-1x"></i>
                                                                        info Bidang
                                                                    </button>
                                                                    <div class="modal fade" id="Bidang"
                                                                        aria-hidden="true" tabindex="-1">
                                                                        <div class="modal-dialog modal-dialog-centered
                                                                             opacity-75">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title">Infomation
                                                                                        Bidang</h4>
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <?php require_once("../../config/config.php"); ?>
                                                                                    <?php $SQL = "SELECT * FROM bidang order by id_bidang asc"; ?>
                                                                                    <?php $bd = $koneksi->query($SQL); ?>
                                                                                    <ol type="1">
                                                                                        <?php foreach ($bd as $db): ?>
                                                                                        <li>
                                                                                            <?php echo $db['bidang']; ?>
                                                                                        </li>
                                                                                        <?php endforeach; ?>
                                                                                    </ol>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-bs-dismiss="modal">Close</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="my-2"></div>
                                                        <div class="form-inline row flex-wrap
                                                             justify-content-center align-items-center">
                                                            <div class="form-label col-sm-5 col-md-5 text-light">
                                                                <label for="sub_bidang"
                                                                    class="label label-default fs-5">Sub Bidang</label>
                                                            </div>
                                                            <div class="col-sm-1 col-md-1">:</div>
                                                            <div class="col-sm-6 col-md-6">
                                                                <input type="text" name="sub_bidang" required
                                                                    class="form-control"
                                                                    value="<?= $isi['sub_bidang'] ?>" maxlength="200"
                                                                    placeholder="Sub Bidang" id="sub_bidang">
                                                                <div class="d-flex justify-content-between
                                                                     align-items-center flex-wrap">
                                                                    <small class="counter" id="counterSubBidang">Sisa
                                                                        Karakter
                                                                        : 200</small>
                                                                    <button type="button" data-bs-toggle="modal"
                                                                        aria-expanded="false"
                                                                        class="badge badge-btn badge-info text-dark"
                                                                        data-bs-target="#SubBidang">
                                                                        <i class="fas fa-info fa-fw fa-1x"></i>
                                                                        info Sub Bidang
                                                                    </button>
                                                                    <div class="modal fade" id="SubBidang"
                                                                        aria-hidden="true" tabindex="-1">
                                                                        <div class="modal-dialog modal-dialog-centered
                                                                             opacity-75">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title">Infomation
                                                                                        Sub Bidang</h4>
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <?php require_once("../../config/config.php"); ?>
                                                                                    <?php $SQL = "SELECT * FROM bidang order by id_bidang asc"; ?>
                                                                                    <?php $bd = $koneksi->query($SQL); ?>
                                                                                    <ol type="1">
                                                                                        <?php foreach ($bd as $db): ?>
                                                                                        <li>
                                                                                            <?php echo $db['sub_bidang']; ?>
                                                                                        </li>
                                                                                        <?php endforeach; ?>
                                                                                    </ol>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-bs-dismiss="modal">Close</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="my-2"></div>
                                                        <div class="form-inline row flex-wrap
                                                             justify-content-center align-items-center">
                                                            <div class="form-label col-sm-5 col-md-5 text-light">
                                                                <label for="kode_ordner"
                                                                    class="label label-default fs-5">Kegiatan</label>
                                                            </div>
                                                            <div class="col-sm-1 col-md-1">:</div>
                                                            <div class="col-sm-6 col-md-6">
                                                                <input type="kegiatan" name="kegiatan" required
                                                                    class="form-control" maxlength="200"
                                                                    placeholder="Kegiatan"
                                                                    value="<?= $isi['Kegiatan'] ?>" id="kegiatan">
                                                                <small class="counter" id="counterKegiatan">Sisa
                                                                    Karakter
                                                                    : 200</small>
                                                            </div>
                                                        </div>
                                                        <div class="my-2"></div>
                                                        <div class="form-inline row flex-wrap
                                                             justify-content-center align-items-center">
                                                            <div class="form-label col-sm-5 col-md-5 text-light">
                                                                <label for="tahun"
                                                                    class="label label-default fs-5">Tahun</label>
                                                            </div>
                                                            <div class="col-sm-1 col-md-1">:</div>
                                                            <div class="col-sm-6 col-md-6">
                                                                <input type="text" min="2000" max="9999" name="tahun"
                                                                    required class="form-control" maxlength="4"
                                                                    placeholder="Tahun" value="<?= $isi['tahun'] ?>"
                                                                    id="tahun">
                                                                <small class="counter" id="counterTahun">Sisa
                                                                    Karakter
                                                                    : 4</small>
                                                            </div>
                                                        </div>
                                                        <div class="my-2"></div>
                                                        <div class="form-inline row flex-wrap
                                                             justify-content-center align-items-center">
                                                            <div class="form-label col-sm-5 col-md-5 text-light">
                                                                <label for="status_arsip"
                                                                    class="label label-default fs-5">Status
                                                                    Arsip</label>
                                                            </div>
                                                            <div class="col-sm-1 col-md-1">:</div>
                                                            <div class="col-sm-6 col-md-6">
                                                                <input type="text" placeholder="Status Arsip"
                                                                    name="status_arsip"
                                                                    value="<?= $isi['status_arsip'] ?>" maxlength="50"
                                                                    required class="form-control" id="status_arsip">
                                                                <small class="counter" id="counterStatusArsip">Sisa
                                                                    Karakter
                                                                    : 50</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="my-2"></div>
                                                    <div class="card-footer bg-secondary">
                                                        <div class="text-end">
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="fas fa-fw fa-save fa-1x"></i>
                                                                Update Data
                                                            </button>
                                                            <a href="?page=arsip" aria-current="page"
                                                                class="btn btn-default btn-outline-light">
                                                                <i class="fas fa-fw fa-close fa-1x"></i>
                                                                Kembali
                                                            </a>
                                                        </div>
                                                    </div>
                                                </form>
                                                <?php endforeach; ?>
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
        <script type="text/javascript">
        // Codingan Kode Rak Max Length
        const kode_rak = document.getElementById("kode_rak");
        const counterKodeRak = document.getElementById("counterKodeRak");
        kode_rak.addEventListener('input', function() {
            const maxLength = kode_rak.getAttribute("maxlength");
            const remaining = maxLength - kode_rak.value.length;
            counterKodeRak.textContent = `Sisa karakter: ${remaining}`;

            // Menandai jika karakter sudah mencapai maksimal
            if (remaining <= 0) {
                counterKodeRak.classList.add('exceeded');
            } else {
                counterKodeRak.classList.remove('exceeded');
            }
        })

        // Codingan Kode Box Max Length
        const kode_box = document.getElementById("kode_box");
        const counterKodeBox = document.getElementById("counterKodeBox");
        kode_box.addEventListener('input', function() {
            const maxLength = kode_box.getAttribute("maxlength");
            const remaining = maxLength - kode_box.value.length;
            counterKodeBox.textContent = `Sisa karakter: ${remaining}`;

            // Menandai jika karakter sudah mencapai maksimal
            if (remaining <= 0) {
                counterKodeBox.classList.add('exceeded');
            } else {
                counterKodeBox.classList.remove('exceeded');
            }
        })

        // Codingan Kode Box Ordner Length
        const kode_ordner = document.getElementById("kode_ordner");
        const counterKodeOrdner = document.getElementById("counterKodeOrdner");
        kode_ordner.addEventListener('input', function() {
            const maxLength = kode_ordner.getAttribute("maxlength");
            const remaining = maxLength - kode_ordner.value.length;
            counterKodeOrdner.textContent = `Sisa karakter: ${remaining}`;

            // Menandai jika karakter sudah mencapai maksimal
            if (remaining <= 0) {
                counterKodeOrdner.classList.add('exceeded');
            } else {
                counterKodeOrdner.classList.remove('exceeded');
            }
        })

        // Codingan Kode Arsip Max Length
        const kode_arsip = document.getElementById("kode_arsip");
        const counterKodeArsip = document.getElementById("counterKodeArsip");
        kode_arsip.addEventListener('input', function() {
            const maxLength = kode_arsip.getAttribute("maxlength");
            const remaining = maxLength - kode_arsip.value.length;
            counterKodeArsip.textContent = `Sisa karakter: ${remaining}`;

            // Menandai jika karakter sudah mencapai maksimal
            if (remaining <= 0) {
                counterKodeArsip.classList.add('exceeded');
            } else {
                counterKodeArsip.classList.remove('exceeded');
            }
        })

        // Codingan No Akun Max Length
        const no_akun = document.getElementById("no_akun");
        const counterNoAkun = document.getElementById("counterNoAkun");
        no_akun.addEventListener('input', function() {
            const maxLength = no_akun.getAttribute("maxlength");
            const remaining = maxLength - no_akun.value.length;
            counterNoAkun.textContent = `Sisa karakter: ${remaining}`;

            // Menandai jika karakter sudah mencapai maksimal
            if (remaining <= 0) {
                counterNoAkun.classList.add('exceeded');
            } else {
                counterNoAkun.classList.remove('exceeded');
            }
        })

        // Codingan Bidang Max Length
        const bidang = document.getElementById("bidang");
        const counterBidang = document.getElementById("counterBidang");
        bidang.addEventListener('input', function() {
            const maxLength = bidang.getAttribute("maxlength");
            const remaining = maxLength - bidang.value.length;
            counterBidang.textContent = `Sisa karakter: ${remaining}`;

            // Menandai jika karakter sudah mencapai maksimal
            if (remaining <= 0) {
                counterBidang.classList.add('exceeded');
            } else {
                counterBidang.classList.remove('exceeded');
            }
        })

        // Codingan Sub Bidang Max Length
        const sub_bidang = document.getElementById("sub_bidang");
        const counterSubBidang = document.getElementById("counterSubBidang");
        sub_bidang.addEventListener('input', function() {
            const maxLength = sub_bidang.getAttribute("maxlength");
            const remaining = maxLength - sub_bidang.value.length;
            counterSubBidang.textContent = `Sisa karakter: ${remaining}`;

            // Menandai jika karakter sudah mencapai maksimal
            if (remaining <= 0) {
                counterSubBidang.classList.add('exceeded');
            } else {
                counterSubBidang.classList.remove('exceeded');
            }
        })

        // Codingan Kegiatan Max Length
        const kegiatan = document.getElementById("kegiatan");
        const counterKegiatan = document.getElementById("counterKegiatan");
        kegiatan.addEventListener('input', function() {
            const maxLength = kegiatan.getAttribute("maxlength");
            const remaining = maxLength - kegiatan.value.length;
            counterKegiatan.textContent = `Sisa karakter: ${remaining}`;

            // Menandai jika karakter sudah mencapai maksimal
            if (remaining <= 0) {
                counterKegiatan.classList.add('exceeded');
            } else {
                counterKegiatan.classList.remove('exceeded');
            }
        })

        // Codingan Tahun Max Length
        const tahun = document.getElementById("tahun");
        const counterTahun = document.getElementById("counterTahun");
        tahun.addEventListener('input', function() {
            const maxLength = tahun.getAttribute("maxlength");
            const remaining = maxLength - tahun.value.length;
            counterTahun.textContent = `Sisa karakter: ${remaining}`;

            // Menandai jika karakter sudah mencapai maksimal
            if (remaining <= 0) {
                counterTahun.classList.add('exceeded');
            } else {
                counterTahun.classList.remove('exceeded');
            }
        })

        // Codingan Status Arsip Max Length
        const status_arsip = document.getElementById("status_arsip");
        const counterstatusArsip = document.getElementById("counterStatusArsip");
        status_arsip.addEventListener('input', function() {
            const maxLength = status_arsip.getAttribute("maxlength");
            const remaining = maxLength - status_arsip.value.length;
            counterstatusArsip.textContent = `Sisa karakter: ${remaining}`;

            // Menandai jika karakter sudah mencapai maksimal
            if (remaining <= 0) {
                counterstatusArsip.classList.add('exceeded');
            } else {
                counterstatusArsip.classList.remove('exceeded');
            }
        })
        </script>
        <?php require_once("../ui/footer.php") ?>