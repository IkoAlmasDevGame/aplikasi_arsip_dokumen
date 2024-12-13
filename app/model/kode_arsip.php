<?php

namespace model;

class KodeArsip
{
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function kode_arsip()
    {
        return $this->db->query("SELECT * FROM kode_arsip order by id_kode_arsip asc");
    }

    public function cariKodeArsip($keyword)
    {
        $SQL = "SELECT * FROM kode_arsip WHERE kode_arsip  LIKE '%$keyword%'";
        return $this->db->query($SQL);
    }

    public function cariDeskripsiArsip($keyword)
    {
        $SQL = "SELECT * FROM kode_arsip WHERE deskripsi_arsip LIKE '%$keyword%'";
        return $this->db->query($SQL);
    }

    public function tambahkodearsip($kode_arsip, $deskripsi_arsip)
    {
        $kode_arsip = htmlspecialchars($_POST['kode_arsip']);
        $deskripsi_arsip = htmlspecialchars($_POST['deskripsi_arsip']);
        $table = "kode_arsip";
        $insert = "INSERT INTO $table SET kode_arsip='$kode_arsip', deskripsi_arsip='$deskripsi_arsip'";
        $data = $this->db->query($insert);
        if ($data != "") {
            if ($data) {
                echo "<script>document.location.href = '../ui/header.php?aksi=kode-tambah&dialog=success'</script>";
                die;
            }
        } else {
            echo "<script>document.location.href = '../ui/header.php?aksi=kode-tambah'</script>";
            die;
        }
    }

    public function ubahkodearsip($kode_arsip, $deskripsi_arsip, $id_kode_arsip)
    {
        $kode_arsip = htmlspecialchars($_POST['kode_arsip']);
        $deskripsi_arsip = htmlspecialchars($_POST['deskripsi_arsip']);
        $id_kode_arsip = htmlspecialchars($_POST['id_kode_arsip']);
        $table = "kode_arsip";
        $update = "UPDATE $table SET kode_arsip = '$kode_arsip', deskripsi_arsip = '$deskripsi_arsip' WHERE id_kode_arsip = '$id_kode_arsip'";
        $data = $this->db->query($update);
        if ($data != "") {
            if ($data) {
                echo "<script>document.location.href = '../ui/header.php?aksi=kode-ubah&id_kode_arsip=$id_kode_arsip&dialog=change'</script>";
                die;
            }
        } else {
            echo "<script>document.location.href = '../ui/header.php?aksi=kode-tambah'</script>";
            die;
        }
    }

    public function hapuskodearsip($id_kode_arsip)
    {
        $id_kode_arsip = htmlspecialchars($_GET['id_kode_arsip']);
        $table = "kode_arsip";
        $delete = "DELETE FROM $table WHERE id_kode_arsip='$id_kode_arsip'";
        $data = $this->db->query($delete);
        if ($data != "") {
            if ($data) {
                echo "<script>document.location.href = '../ui/header.php?page=kode-arsip&dialog=delete'</script>";
                die;
            }
        } else {
            echo "<script>document.location.href = '../ui/header.php?aksi=kode-tambah'</script>";
            die;
        }
    }
}