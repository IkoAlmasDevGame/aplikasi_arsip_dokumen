<?php

namespace controller;

use model\Authentication;
use model\pegawai;
use model\arsip;
use model\Bidangs;
use model\KodeArsip;

class Authen
{
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new Authentication($konfig);
    }

    public function Login()
    {
        $userInput = htmlspecialchars($_POST['userInput']) ? htmlentities($_POST['userInput']) : strip_tags($_POST['userInput']);
        $password = md5(htmlspecialchars($_POST['password']), false);
        password_verify($password, PASSWORD_DEFAULT);
        $data = $this->konfig->SignIn($userInput, $password);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }
}

class Akun
{
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new pegawai($konfig);
    }

    public function tambahpegawai()
    {
        $username = htmlspecialchars($_POST['username']) ? htmlentities($_POST['username']) : $_POST['username'];
        $password = md5(htmlspecialchars($_POST['password']), false);
        $nama = htmlspecialchars($_POST['nama']) ? htmlentities($_POST['nama']) : $_POST['nama'];
        $nip = htmlspecialchars($_POST['nip']) ? htmlentities($_POST['nip']) : $_POST['nip'];
        $data = $this->konfig->tambah_pegawai($username, $password, $nama, $nip);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }

    public function ubahpegawai()
    {
        $id = htmlspecialchars($_POST['id_user']) ? htmlentities($_POST['id_user']) : strip_tags($_POST['id_user']);
        $username = htmlspecialchars($_POST['username']) ? htmlentities($_POST['username']) : strip_tags($_POST['username']);
        $new_password = md5(htmlspecialchars($_POST['new_password']), false);
        $nama = htmlspecialchars($_POST['nama']) ? htmlentities($_POST['nama']) : strip_tags($_POST['nama']);
        $nip = htmlspecialchars($_POST['nip']) ? htmlentities($_POST['nip']) : strip_tags($_POST['nip']);
        $akses = htmlspecialchars($_POST['akses']) ? htmlentities($_POST['akses']) : strip_tags($_POST['akses']);
        $data = $this->konfig->ubah_pegawai($username, $new_password, $nama, $nip, $akses, $id);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }

    public function hapuspegawai()
    {
        $id = htmlspecialchars($_GET['id_user']) ? htmlentities($_GET['id_user']) : strip_tags($_GET['id_user']);
        $data = $this->konfig->hapus_pegawai($id);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }
}

class Archive
{
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new arsip($konfig);
    }

    public function tambah_arsip()
    {
        $kode_rak = htmlspecialchars($_POST['kode_rak']) ? htmlentities($_POST['kode_rak']) : strip_tags($_POST['kode_rak']);
        $kode_box = htmlspecialchars($_POST['kode_box']) ? htmlentities($_POST['kode_box']) : strip_tags($_POST['kode_box']);
        $kode_ordner = htmlspecialchars($_POST['kode_ordner']) ? htmlentities($_POST['kode_ordner']) : strip_tags($_POST['kode_ordner']);
        $kode_arsip = htmlspecialchars($_POST['kode_arsip']) ? htmlentities($_POST['kode_arsip']) : strip_tags($_POST['kode_arsip']);
        $no_akun = htmlspecialchars($_POST['no_akun']) ? htmlentities($_POST['no_akun']) : strip_tags($_POST['no_akun']);
        $bidang = htmlspecialchars($_POST['bidang']) ? htmlentities($_POST['bidang']) : strip_tags($_POST['bidang']);
        $sub_bidang = htmlspecialchars($_POST['sub_bidang']) ? htmlentities($_POST['sub_bidang']) : strip_tags($_POST['sub_bidang']);
        $kegiatan = htmlspecialchars($_POST['kegiatan']) ? htmlentities($_POST['kegiatan']) : strip_tags($_POST['kegiatan']);
        $tahun = htmlspecialchars($_POST['tahun']) ? htmlentities($_POST['tahun']) : strip_tags($_POST['tahun']);
        $status_arsip = htmlspecialchars($_POST['status_arsip']) ? htmlentities($_POST['status_arsip']) : strip_tags($_POST['status_arsip']);
        $data = $this->konfig->tambaharsip($kode_rak, $kode_box, $kode_ordner, $kode_arsip, $no_akun, $bidang, $sub_bidang, $kegiatan, $tahun, $status_arsip);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }

    public function ubah_arsip()
    {
        $id_arsip_dokumen = htmlspecialchars($_POST['id_arsip_dokumen']) ? htmlentities($_POST['id_arsip_dokumen']) : strip_tags($_POST['id_arsip_dokumen']);
        $kode_rak = htmlspecialchars($_POST['kode_rak']) ? htmlentities($_POST['kode_rak']) : strip_tags($_POST['kode_rak']);
        $kode_box = htmlspecialchars($_POST['kode_box']) ? htmlentities($_POST['kode_box']) : strip_tags($_POST['kode_box']);
        $kode_ordner = htmlspecialchars($_POST['kode_ordner']) ? htmlentities($_POST['kode_ordner']) : strip_tags($_POST['kode_ordner']);
        $kode_arsip = htmlspecialchars($_POST['kode_arsip']) ? htmlentities($_POST['kode_arsip']) : strip_tags($_POST['kode_arsip']);
        $no_akun = htmlspecialchars($_POST['no_akun']) ? htmlentities($_POST['no_akun']) : strip_tags($_POST['no_akun']);
        $bidang = htmlspecialchars($_POST['bidang']) ? htmlentities($_POST['bidang']) : strip_tags($_POST['bidang']);
        $sub_bidang = htmlspecialchars($_POST['sub_bidang']) ? htmlentities($_POST['sub_bidang']) : strip_tags($_POST['sub_bidang']);
        $kegiatan = htmlspecialchars($_POST['kegiatan']) ? htmlentities($_POST['kegiatan']) : strip_tags($_POST['kegiatan']);
        $tahun = htmlspecialchars($_POST['tahun']) ? htmlentities($_POST['tahun']) : strip_tags($_POST['tahun']);
        $status_arsip = htmlspecialchars($_POST['status_arsip']) ? htmlentities($_POST['status_arsip']) : strip_tags($_POST['status_arsip']);
        $data = $this->konfig->ubaharsip($kode_rak, $kode_box, $kode_ordner, $kode_arsip, $no_akun, $bidang, $sub_bidang, $kegiatan, $tahun, $status_arsip, $id_arsip_dokumen);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }

    public function hapus_arsip()
    {
        $id_arsip_dokumen = htmlspecialchars($_GET['id_arsip_dokumen']) ? htmlentities($_GET['id_arsip_dokumen']) : strip_tags($_GET['id_arsip_dokumen']);
        $data = $this->konfig->hapusarsip($id_arsip_dokumen);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }
}

class Bidang
{
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new Bidangs($konfig);
    }

    public function tambah_bidang()
    {
        $bidang = htmlspecialchars($_POST['bidang']);
        $sub_bidang = htmlspecialchars($_POST['sub_bidang']);
        $data = $this->konfig->tambahbidang($bidang, $sub_bidang);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }

    public function ubah_bidang()
    {
        $bidang = htmlspecialchars($_POST['bidang']);
        $sub_bidang = htmlspecialchars($_POST['sub_bidang']);
        $id_bidang = htmlspecialchars($_POST['id_bidang']);
        $data = $this->konfig->ubahbidang($bidang, $sub_bidang, $id_bidang);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }

    public function hapus_bidang()
    {
        $id_bidang = htmlspecialchars($_GET['id_bidang']);
        $data = $this->konfig->hapusbidang($id_bidang);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }
}

class Kode_Arsip
{
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new KodeArsip($konfig);
    }

    public function tambah_kode()
    {
        $kode_arsip = htmlspecialchars($_POST['kode_arsip']);
        $deskripsi_arsip = htmlspecialchars($_POST['deskripsi_arsip']);
        $data = $this->konfig->tambahkodearsip($kode_arsip, $deskripsi_arsip);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }

    public function ubah_kode()
    {
        $kode_arsip = htmlspecialchars($_POST['kode_arsip']);
        $deskripsi_arsip = htmlspecialchars($_POST['deskripsi_arsip']);
        $id_kode_arsip = htmlspecialchars($_POST['id_kode_arsip']);
        $data = $this->konfig->ubahkodearsip($kode_arsip, $deskripsi_arsip, $id_kode_arsip);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }

    public function hapus_kode()
    {
        $id_kode_arsip = htmlspecialchars($_GET['id_kode_arsip']);
        $data = $this->konfig->hapuskodearsip($id_kode_arsip);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }
}