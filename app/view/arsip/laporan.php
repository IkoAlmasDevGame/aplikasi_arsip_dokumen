<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laporan Arsip</title>
        <?php if ($_SESSION['akses'] == 'administrator' || $_SESSION['akses'] == 'pegawai') { ?>
        <?php require_once("../ui/header.php"); ?>
        <?php } else { ?>
        <?php
        header("location:../ui/header.php?page=beranda");
        exit(0);
        ?>
        <?php } ?>
    </head>

    <body onload="window.print()">
        <div class="container-fluid">
            <div style="width: 900px; min-width: 100%;">
                <table class="table table-striped-columns table-bordered">
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
                        <th class="text-center fw-normal">Status Arsip</th>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php if (isset($_GET['cari_kode_box'])) { ?>
                        <?php $keyword = htmlspecialchars($_GET['cari_kode_box']); ?>
                        <?php $data = $archive->cariKodeBox($keyword); ?>
                        <?php foreach ($data as $row): ?>
                        <tr>
                            <td class="text-center text-justify"><?= $no++; ?></td>
                            <td class="text-center text-justify">
                                <?= $row["kode_rak"]; ?>
                            </td>
                            <td class="text-center text-justify">
                                <?= $row["kode_box"]; ?>
                            </td>
                            <td class="text-center text-justify">
                                <?= $row["kode_ordner"]; ?>
                            </td>
                            <td class="text-center text-justify">
                                <?= $row["kode_arsip"]; ?>
                            </td>
                            <td class="text-center text-justify">
                                <?= $row["no_akun"]; ?>
                            </td>
                            <td class="text-center text-justify">
                                <?= ucwords($row["bidang"]); ?>
                            </td>
                            <td class="text-center text-justify">
                                <?= ucwords($row["sub_bidang"]); ?>
                            </td>
                            <td class="text-center text-justify">
                                <?= ucfirst($row["kegiatan"]); ?>
                            </td>
                            <td><?= $row["tahun"]; ?></td>
                            <td><?= $row["status_arsip"]; ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php } elseif (isset($_GET['cari_kode_ordner'])) { ?>
                        <?php $keyword = htmlspecialchars($_GET['cari_kode_ordner']); ?>
                        <?php $data = $archive->cariKodeOrdner($keyword); ?>
                        <?php foreach ($data as $row): ?>
                        <tr>
                            <td class="text-center text-justify"><?= $no++; ?></td>
                            <td class="text-center text-justify">
                                <?= $row["kode_rak"]; ?>
                            </td>
                            <td class="text-center text-justify">
                                <?= $row["kode_box"]; ?>
                            </td>
                            <td class="text-center text-justify">
                                <?= $row["kode_ordner"]; ?>
                            </td>
                            <td class="text-center text-justify">
                                <?= $row["kode_arsip"]; ?>
                            </td>
                            <td class="text-center text-justify">
                                <?= $row["no_akun"]; ?>
                            </td>
                            <td class="text-center text-justify">
                                <?= ucwords($row["bidang"]); ?>
                            </td>
                            <td class="text-center text-justify">
                                <?= ucwords($row["sub_bidang"]); ?>
                            </td>
                            <td class="text-center text-justify">
                                <?= ucfirst($row["kegiatan"]); ?>
                            </td>
                            <td><?= $row["tahun"]; ?></td>
                            <td><?= $row["status_arsip"]; ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php } elseif (isset($_GET['cari_kode_arsip'])) { ?>
                        <?php $keyword = htmlspecialchars($_GET['cari_kode_arsip']); ?>
                        <?php $data = $archive->cariKodeArsip($keyword); ?>
                        <?php foreach ($data as $row): ?>
                        <tr>
                            <td class="text-center text-justify"><?= $no++; ?></td>
                            <td class="text-center text-justify">
                                <?= $row["kode_rak"]; ?>
                            </td>
                            <td class="text-center text-justify">
                                <?= $row["kode_box"]; ?>
                            </td>
                            <td class="text-center text-justify">
                                <?= $row["kode_ordner"]; ?>
                            </td>
                            <td class="text-center text-justify">
                                <?= $row["kode_arsip"]; ?>
                            </td>
                            <td class="text-center text-justify">
                                <?= $row["no_akun"]; ?>
                            </td>
                            <td class="text-center text-justify">
                                <?= ucwords($row["bidang"]); ?>
                            </td>
                            <td class="text-center text-justify">
                                <?= ucwords($row["sub_bidang"]); ?>
                            </td>
                            <td class="text-center text-justify">
                                <?= ucfirst($row["kegiatan"]); ?>
                            </td>
                            <td><?= $row["tahun"]; ?></td>
                            <td><?= $row["status_arsip"]; ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php } elseif (isset($_GET['cari_kegiatan'])) { ?>
                        <?php $keyword = htmlspecialchars($_GET['cari_kegiatan']); ?>
                        <?php $data = $archive->cariKegiatan($keyword); ?>
                        <?php foreach ($data as $row): ?>
                        <tr>
                            <td class="text-center text-justify"><?= $no++; ?></td>
                            <td class="text-center text-justify">
                                <?= $row["kode_rak"]; ?>
                            </td>
                            <td class="text-center text-justify">
                                <?= $row["kode_box"]; ?>
                            </td>
                            <td class="text-center text-justify">
                                <?= $row["kode_ordner"]; ?>
                            </td>
                            <td class="text-center text-justify">
                                <?= $row["kode_arsip"]; ?>
                            </td>
                            <td class="text-center text-justify">
                                <?= $row["no_akun"]; ?>
                            </td>
                            <td class="text-center text-justify">
                                <?= ucwords($row["bidang"]); ?>
                            </td>
                            <td class="text-center text-justify">
                                <?= ucwords($row["sub_bidang"]); ?>
                            </td>
                            <td class="text-center text-justify">
                                <?= ucfirst($row["kegiatan"]); ?>
                            </td>
                            <td><?= $row["tahun"]; ?></td>
                            <td><?= $row["status_arsip"]; ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>