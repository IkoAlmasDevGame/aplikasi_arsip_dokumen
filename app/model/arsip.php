<?php

namespace model;

class arsip
{
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function arsip()
    {
        $SQL = "SELECT * FROM arsip_dokumen JOIN kode_arsip ON arsip_dokumen.kode_arsip = kode_arsip.kode_arsip";
        return $this->db->query($SQL);
    }

    public function cariKodeBox($keyword)
    {
        $SQL = "SELECT * FROM arsip_dokumen JOIN kode_arsip ON arsip_dokumen.kode_arsip = kode_arsip.kode_arsip WHERE kode_box LIKE '%$keyword%'";
        return $this->db->query($SQL);
    }

    public function cariKodeOrdner($keyword)
    {
        $SQL = "SELECT * FROM arsip_dokumen JOIN kode_arsip ON arsip_dokumen.kode_arsip = kode_arsip.kode_arsip WHERE kode_ordner LIKE '%$keyword%'";
        return $this->db->query($SQL);
    }

    public function cariKodeArsip($keyword)
    {
        $SQL = "SELECT * FROM arsip_dokumen JOIN kode_arsip ON arsip_dokumen.kode_arsip = kode_arsip.kode_arsip WHERE arsip_dokumen.kode_arsip LIKE '%$keyword%'";
        return $this->db->query($SQL);
    }

    public function cariKegiatan($keyword)
    {
        $SQL = "SELECT * FROM arsip_dokumen JOIN kode_arsip ON arsip_dokumen.kode_arsip = kode_arsip.kode_arsip WHERE kegiatan LIKE '%$keyword%'";
        return $this->db->query($SQL);
    }

    public function tambaharsip($kode_rak, $kode_box, $kode_ordner, $kode_arsip, $no_akun, $bidang, $sub_bidang, $kegiatan, $tahun, $status_arsip)
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
        # code database table input.
        $table = "arsip_dokumen";
        $SQL = "INSERT INTO $table SET kode_rak='$kode_rak', kode_box='$kode_box', kode_ordner='$kode_ordner', kode_arsip='$kode_arsip', no_akun='$no_akun', 
        bidang='$bidang', sub_bidang='$sub_bidang', kegiatan='$kegiatan', tahun='$tahun', status_arsip='$status_arsip'";
        $data = $this->db->query($SQL);
        if ($data != "") {
            if ($data) {
                echo "<script>document.location.href = '../ui/header.php?aksi=arsip-tambah&dialog=success'</script>";
                die;
            }
        } else {
            echo "<script>document.location.href = '../ui/header.php?aksi=arsip-tambah'</script>";
            die;
        }
    }

    public function ubaharsip($kode_rak, $kode_box, $kode_ordner, $kode_arsip, $no_akun, $bidang, $sub_bidang, $kegiatan, $tahun, $status_arsip, $id_arsip_dokumen)
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
        # code database table input.
        $table = "arsip_dokumen";
        $SQL = "UPDATE $table SET kode_rak='$kode_rak', kode_box='$kode_box', kode_ordner='$kode_ordner', kode_arsip='$kode_arsip', no_akun='$no_akun', 
        bidang='$bidang', sub_bidang='$sub_bidang', kegiatan='$kegiatan', tahun='$tahun', status_arsip='$status_arsip' WHERE id_arsip_dokumen = '$id_arsip_dokumen'";
        $data = $this->db->query($SQL);
        if ($data != "") {
            if ($data) {
                echo "<script>document.location.href = '../ui/header.php?aksi=arsip-tambah&id_arsip_dokumen=$id_arsip_dokumen&dialog=change'</script>";
                die;
            }
        } else {
            echo "<script>document.location.href = '../ui/header.php?page=arsip'</script>";
            die;
        }
    }

    public function hapusarsip($id_arsip_dokumen)
    {
        $id_arsip_dokumen = htmlspecialchars($_GET['id_arsip_dokumen']) ? htmlentities($_GET['id_arsip_dokumen']) : strip_tags($_GET['id_arsip_dokumen']);
        # code database table input.
        $table = "arsip_dokumen";
        $SQL = "DELETE FROM $table WHERE id_arsip_dokumen = '$id_arsip_dokumen'";
        $data = $this->db->query($SQL);
        if ($data != "") {
            if ($data) {
                echo "<script>document.location.href = '../ui/header.php?page=arsip&dialog=delete'</script>";
                die;
            }
        } else {
            echo "<script>document.location.href = '../ui/header.php?page=arsip'</script>";
            die;
        }
    }
}
