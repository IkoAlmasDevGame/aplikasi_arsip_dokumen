<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kode Arsip</title>
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
        <?php if (isset($_GET['cari_kode_arsip'])): ?>
            <?php $keyword = htmlspecialchars($_GET['cari_kode_arsip']); ?>
            <?php $data = $koneksi->query("SELECT * FROM kode_arsip WHERE kode_arsip like '%$keyword%' order by kode_arsip asc LIMIT 1"); ?>
            <?php foreach ($data as $row): ?>
                <h4 class="fs-1 text-center fw-normal text-dark">
                    Kode Arsip - [ <?php echo $row['kode_arsip']; ?> ] -
                </h4>
            <?php endforeach; ?>
        <?php elseif (isset($_GET['cari_deskripsi_arsip'])): ?>
            <?php $keyword = htmlspecialchars($_GET['cari_deskripsi_arsip']); ?>
            <?php $data = $koneksi->query("SELECT * FROM kode_arsip WHERE deskripsi_arsip like '%$keyword%' order by deskripsi_arsip asc LIMIT 1"); ?>
            <?php foreach ($data as $row): ?>
                <h4 class="fs-1 text-center fw-normal">
                    Kode Arsip - [ <?php echo $row['deskripsi_arsip']; ?> ] -
                </h4>
            <?php endforeach; ?>
        <?php endif; ?>
        <br>
        <table class="table table-striped-columns table-bordered">
            <thead>
                <th class="text-center fw-normal">No.</th>
                <th class="text-center fw-normal">Kode Arsip</th>
                <th class="text-center fw-normal">Deskripsi Arsip</th>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php if (isset($_GET['cari_kode_arsip'])) { ?>
                    <?php $keyword = htmlspecialchars($_GET['cari_kode_arsip']); ?>
                    <?php $data = $arsipkode->cariKodeArsip($keyword); ?>
                    <?php foreach ($data as $row): ?>
                        <tr>
                            <td class="text-center fw-normal"><?= $no++; ?></td>
                            <td class="text-start fw-normal">
                                <?= $row['kode_arsip']; ?>
                            </td>
                            <td class="text-start fw-normal">
                                <?= $row['deskripsi_arsip']; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php } elseif (isset($_GET['cari_deskripsi_arsip'])) { ?>
                    <?php $keyword = htmlspecialchars($_GET['cari_deskripsi_arsip']); ?>
                    <?php $data = $arsipkode->cariDeskripsiArsip($keyword); ?>
                    <?php foreach ($data as $row): ?>
                        <tr>
                            <td class="text-center fw-normal"><?= $no++; ?></td>
                            <td class="text-start fw-normal">
                                <?= $row['kode_arsip']; ?>
                            </td>
                            <td class="text-start fw-normal">
                                <?= $row['deskripsi_arsip']; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php require_once("../ui/footer.php") ?>