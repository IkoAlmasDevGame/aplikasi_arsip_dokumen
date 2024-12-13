<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laporan Bidang</title>
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
            <?php if (isset($_GET['cari_bidang'])): ?>
            <?php $keyword = htmlspecialchars($_GET['cari_bidang']); ?>
            <?php $data = $koneksi->query("SELECT * FROM bidang WHERE bidang like '%$keyword%' order by bidang asc LIMIT 1"); ?>
            <?php foreach ($data as $row): ?>
            <h4 class="fs-1 text-center fw-normal text-dark">
                Bidang - [ <?php echo $row['bidang']; ?> ] -
            </h4>
            <?php endforeach; ?>
            <?php elseif (isset($_GET['cari_sub_bidang'])): ?>
            <?php $keyword = htmlspecialchars($_GET['cari_sub_bidang']); ?>
            <?php $data = $koneksi->query("SELECT * FROM bidang WHERE sub_bidang like '%$keyword%' order by sub_bidang asc LIMIT 1"); ?>
            <?php foreach ($data as $row): ?>
            <h4 class="fs-1 text-center fw-normal">
                Bidang - [ <?php echo $row['sub_bidang']; ?> ] -
            </h4>
            <?php endforeach; ?>
            <?php endif; ?>
            <br>
            <table class="table table-striped-columns table-bordered">
                <thead>
                    <th class="text-center fw-normal">No.</th>
                    <th class="text-center fw-normal">Bidang</th>
                    <th class="text-center fw-normal">Sub Bidang</th>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php if (isset($_GET['cari_bidang'])) { ?>
                    <?php $keyword = htmlspecialchars($_GET['cari_bidang']); ?>
                    <?php $data = $bdang->cariBidang($keyword); ?>
                    <?php foreach ($data as $row): ?>
                    <tr>
                        <td class="text-center fw-normal"><?= $no++; ?></td>
                        <td class="text-start fw-normal">
                            <?= $row['bidang']; ?>
                        </td>
                        <td class="text-start fw-normal">
                            <?= $row['sub_bidang']; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php } elseif (isset($_GET['cari_sub_bidang'])) { ?>
                    <?php $keyword = htmlspecialchars($_GET['cari_sub_bidang']); ?>
                    <?php $data = $bdang->cariSubBidang($keyword); ?>
                    <?php foreach ($data as $row): ?>
                    <tr>
                        <td class="text-center fw-normal"><?= $no++; ?></td>
                        <td class="text-start fw-normal">
                            <?= $row['bidang']; ?>
                        </td>
                        <td class="text-start fw-normal">
                            <?= $row['sub_bidang']; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php require_once("../ui/footer.php") ?>