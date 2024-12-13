<?php

namespace model;

class Bidangs
{
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function bidang()
    {
        $SQL = "SELECT * FROM bidang";
        return $this->db->query($SQL);
    }

    public function cariBidang($keyword)
    {
        $SQL = "SELECT * FROM bidang WHERE bidang LIKE '%$keyword%'";
        return $this->db->query($SQL);
    }

    public function cariSubBidang($keyword)
    {
        $SQL = "SELECT * FROM bidang WHERE sub_bidang LIKE '%$keyword%'";
        return $this->db->query($SQL);
    }

    public function tambahbidang($bidang, $sub_bidang)
    {
        $bidang = htmlspecialchars($_POST['bidang']);
        $sub_bidang = htmlspecialchars($_POST['sub_bidang']);
        # code database
        $table = "bidang";
        $insert = "INSERT INTO $table SET bidang = '$bidang', sub_bidang = '$sub_bidang'";
        $data = $this->db->query($insert);
        if ($data != "") {
            if ($data) {
                echo "<script>document.location.href = '../ui/header.php?aksi=bidang-tambah&dialog=success'</script>";
                die;
            }
        } else {
            echo "<script>document.location.href = '../ui/header.php?aksi=bidang-tambah'</script>";
            die;
        }
    }
    public function ubahbidang($bidang, $sub_bidang, $id_bidang)
    {
        $bidang = htmlspecialchars($_POST['bidang']);
        $sub_bidang = htmlspecialchars($_POST['sub_bidang']);
        $id_bidang = htmlspecialchars($_POST['id_bidang']);
        # code database
        $table = "bidang";
        $update = "UPDATE $table SET bidang = '$bidang', sub_bidang = '$sub_bidang' WHERE id_bidang = '$id_bidang'";
        $data = $this->db->query($update);
        if ($data != "") {
            if ($data) {
                echo "<script>document.location.href = '../ui/header.php?aksi=bidang-ubah&id_bidang=$id_bidang&dialog=change'</script>";
                die;
            }
        } else {
            echo "<script>document.location.href = '../ui/header.php?page=bidang-arsip'</script>";
            die;
        }
    }
    public function hapusbidang($id_bidang)
    {
        $id_bidang = htmlspecialchars($_GET['id_bidang']);
        # code database
        $table = "bidang";
        $delete = "DELETE FROM $table WHERE id_bidang = '$id_bidang'";
        $data = $this->db->query($delete);
        if ($data != "") {
            if ($data) {
                echo "<script>document.location.href = '../ui/header.php?page=bidang-arsip&dialog=delete'</script>";
                die;
            }
        } else {
            echo "<script>document.location.href = '../ui/header.php?page=bidang-arsip'</script>";
            die;
        }
    }
}
