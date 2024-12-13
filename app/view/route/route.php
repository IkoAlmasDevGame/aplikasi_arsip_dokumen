<?php
require_once("../../config/config.php");
$ds = $koneksi->query("SELECT * FROM setting WHERE status_website = '1'");
$setting = mysqli_fetch_array($ds);
# <--- ==== ==== --->
# Files Model Awal
require_once("../../model/authentication.php");
$login = new model\Authentication($koneksi);
require_once("../../model/pegawai.php");
$pegawai = new model\pegawai($koneksi);
require_once("../../model/arsip.php");
$archive = new model\arsip($koneksi);
require_once("../../model/bidang.php");
$bdang = new model\Bidangs($koneksi);
require_once("../../model/kode_arsip.php");
$arsipkode = new model\KodeArsip($koneksi);
# Files Model Akhir
# <--- ==== ==== --->
# Files Controller Awal
require_once("../../controller/controller.php");
$signin = new controller\Authen($koneksi);
$pgw = new controller\Akun($koneksi);
$arsip = new controller\Archive($koneksi);
$bidang = new controller\Bidang($koneksi);
$kode = new controller\Kode_Arsip($koneksi);
# Files Controller Akhir
# <--- ==== ==== --->
# Page
if (!isset($_GET['page'])):
else:
    switch ($_GET['page']) {
        case 'beranda':
            require_once("../dashboard/index.php");
            break;

            # Halaman Arsip Awal
        case 'arsip':
            require_once("../arsip/arsip.php");
            break;
        case 'arsip-print':
            require_once("../arsip/laporan.php");
            break;
            # Halaman Arsip Akhir

            # Halaman Kode Arsip Awal
        case 'kode-arsip':
            require_once("../kode/kode.php");
            break;
        case 'kode-print':
            require_once("../kode/laporan.php");
            break;
            # Halaman Kode Arsip Akhir

            # Halaman Pegawai Awal
        case 'pegawai':
            require_once("../pegawai/pegawai.php");
            break;
            # Halaman Pegawai Akhir

            # Halaman Bidang Awal
        case 'bidang-arsip':
            require_once("../bidang/bidang.php");
            break;
        case 'bidang-print':
            require_once("../bidang/laporan.php");
            break;
            # Halaman Bidang Akhir

            # Halaman Setting Profile Awal
        case 'profile-setting':
            require_once("../setting/edit.php");
            break;
            # Halaman Setting Profile Akhir

            # Halaman Profile Awal
        case 'profile-edit':
            require_once("../profile/edit.php");
            break;
            # Halaman Profile Akhir

        case 'logout':
            if (isset($_SESSION['status'])) {
                unset($_SESSION['status']);
                session_unset();
                session_destroy();
                $_SESSION = array();
            }
            echo "<script>document.location.href = '../index.php';</script>";
            exit(0);
            break;

        default:
            require_once("../dashboard/index.php");
            break;
    }
endif;
# Action
if (!isset($_GET['aksi'])):
else:
    switch ($_GET['aksi']) {
            # Halaman Pegawai Awal
        case 'pegawai-tambah':
            require_once("../pegawai/tambah.php");
            break;
        case 'tambah-pegawai':
            $pgw->tambahpegawai();
            break;
        case 'ubah-pegawai':
            $pgw->ubahpegawai();
            break;
        case 'hapus-pegawai':
            $pgw->hapuspegawai();
            break;
            # Halaman Pegawai Awal

            # Halaman Arsip Awal
        case 'arsip-tambah':
            require_once("../arsip/tambah.php");
            break;
        case 'arsip-ubah':
            require_once("../arsip/edit.php");
            break;
        case 'tambah-arsip':
            $arsip->tambah_arsip();
            break;
        case 'ubah-arsip':
            $arsip->ubah_arsip();
            break;
        case 'hapus-arsip':
            $arsip->hapus_arsip();
            break;
            # Halaman Arsip Akhir

            # Halaman Arsip Awal
        case 'bidang-tambah':
            require_once("../bidang/tambah.php");
            break;
        case 'bidang-ubah':
            require_once("../bidang/edit.php");
            break;
        case 'tambah-bidang':
            $bidang->tambah_bidang();
            break;
        case 'ubah-bidang':
            $bidang->ubah_bidang();
            break;
        case 'hapus-bidang':
            $bidang->hapus_bidang();
            break;
            # Halaman Arsip Akhir

            # Halaman Kode Arsip Awal
        case 'kode-tambah':
            require_once("../kode/tambah.php");
            break;
        case 'kode-ubah':
            require_once("../kode/edit.php");
            break;
        case 'tambah-kode':
            $kode->tambah_kode();
            break;
        case 'ubah-kode':
            $kode->ubah_kode();
            break;
        case 'hapus-kode':
            $kode->hapus_kode();
            break;
            # Halaman Kode Arsip Akhir


        default:
            require_once("../../controller/controller.php");
            break;
    }
endif;