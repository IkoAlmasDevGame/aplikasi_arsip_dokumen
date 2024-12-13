<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Pegawai</title>
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
            <div class="panel-body rounded-2 container-fluid">
                <div class="panel-heading text-dark">
                    <h4 class="panel-title display-3 fs-2" style="font-weight: 600; font-family: monospace;">
                        Dashboard Pegawai
                    </h4>
                    <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page"
                                class="text-decoration-none text-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=pegawai" aria-current="page" class="text-decoration-none active">Pegawai</a>
                        </li>
                    </div>
                </div>
                <div class="z-n1 py-2">
                    <hr class="text-secondary">
                    <section class="content">
                        <div class="content-wrapper">
                            <div class="card shadow mb-4">
                                <div class="card-header py-2">
                                    <?php if ($_SESSION['akses'] == 'administrator'): ?>
                                    <a href="?aksi=pegawai-tambah" aria-current="page" class="btn btn-danger">
                                        <i class="fas fa-fw fa-user-plus fa-1x mx-2"></i>
                                        <span>Tambah Pegawai</span>
                                    </a>
                                    <?php endif; ?>
                                    <a href="?page=pegawai" aria-current="page" class="btn btn-info">
                                        <i class="fas fa-fw fa-refresh fa-1x mx-2"></i>
                                        <span>Refresh Halaman</span>
                                    </a>
                                </div>
                                <div class="card-body my-2">
                                    <div class="container-fluid">
                                        <div class="table-responsive">
                                            <table class="table table-striped-columns table-bordered" id="datatable2">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center fw-normal">No</th>
                                                        <th class="text-center fw-normal">Username</th>
                                                        <th class="text-center fw-normal">Nama</th>
                                                        <th class="text-center fw-normal">NIP</th>
                                                        <th class="text-center fw-normal">Akses</th>
                                                        <?php if ($_SESSION['akses'] == 'administrator') : ?>
                                                        <th class="text-center fw-normal">Aksi</th>
                                                        <?php endif; ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1; ?>
                                                    <?php $isi = $pegawai->data_pegawai(); ?>
                                                    <?php foreach ($isi as $row): ?>
                                                    <tr>
                                                        <td class="text-center fw-normal"><?php echo $no; ?></td>
                                                        <td class="text-center fw-normal">
                                                            <?php echo $row['username']; ?>
                                                        </td>
                                                        <td class="text-center fw-normal">
                                                            <?php echo $row['nama']; ?>
                                                        </td>
                                                        <td class="text-center fw-normal">
                                                            <?php echo $row['nip']; ?>
                                                        </td>
                                                        <td class="text-center fw-normal">
                                                            <?php echo $row['akses']; ?>
                                                        </td>
                                                        <?php if ($row['username'] == 'superadmin'): ?>
                                                        <td class="text-center fw-normal">Tidak bisa dihapus ...</td>
                                                        <?php elseif ($row['akses'] == 'pegawai' || $row['akses'] == 'administrator'): ?>
                                                        <td class="text-center fw-normal">
                                                            <a href="?aksi=hapus-pegawai&id_user=<?= $row['id_user'] ?>"
                                                                onclick="return confirm('Apakah anda ingin menghapus data ini ?');"
                                                                aria-current="page" class="btn btn-sm btn-danger">
                                                                <i class="fas fa-fw fa-trash fa-1x"></i>
                                                                Hapus data
                                                            </a>
                                                        </td>
                                                        <?php endif; ?>
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