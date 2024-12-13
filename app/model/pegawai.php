<?php

namespace model;

class pegawai
{
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function data_pegawai()
    {
        $SQL = "SELECT * FROM user order by id_user asc";
        return $this->db->query($SQL);
    }

    public function tambah_pegawai($username, $password, $nama, $nip)
    {
        if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['nama']) || empty($_POST['nip'])):
            echo "<script>document.location.href = '../ui/header.php?aksi=pegawai-tambah';</script>";
            die;
        else:
            $username = htmlspecialchars($_POST['username']) ? htmlentities($_POST['username']) : strip_tags($_POST['username']);
            $password = htmlspecialchars(md5($_POST['password'], false));
            $password_verify = htmlspecialchars(md5($_POST['password2'], false));
            $nama = htmlspecialchars($_POST['nama']) ? htmlentities($_POST['nama']) : strip_tags($_POST['nama']);
            $nip = htmlspecialchars($_POST['nip']) ? htmlentities($_POST['nip']) : strip_tags($_POST['nip']);
            $akses = htmlspecialchars($_POST['akses']) ? htmlentities($_POST['akses']) : strip_tags($_POST['akses']);

            # code verified password or not verified
            if (password_verify($password, PASSWORD_DEFAULT) !== password_verify($password_verify, PASSWORD_DEFAULT)) {
                echo "<script>document.location.href = '../ui/header.php?aksi=pegawai-tambah&dialog=password_verify';</script>";
                die;
            }

            # code database insert table user
            $SQL = "SELECT * FROM user WHERE username = '$username' and nip = '$nip' order by username desc";
            $queryz = $this->db->query($SQL);
            $cek = mysqli_num_rows($queryz);

            # cek username ketika ada yang sama.
            if ($cek) {
                echo "<script>document.location.href = '../ui/header.php?aksi=pegawai-tambah';</script>";
                die;
            } else {
                $insert = "INSERT INTO user SET username = '$username', password = '$password', nama = '$nama', nip = '$nip', akses = '$akses'";
                $data = $this->db->query($insert);
                if ($data != "") {
                    if ($data) {
                        echo "<script>document.location.href = '../ui/header.php?aksi=pegawai-tambah&dialog=success';</script>";
                        die;
                    }
                } else {
                    echo "<script>document.location.href = '../ui/header.php?aksi=pegawai-tambah';</script>";
                    die;
                }
            }
        endif;
    }
    public function ubah_pegawai($username, $new_password, $nama, $nip, $akses, $id)
    {
        $id = htmlspecialchars($_POST['id_user']) ? htmlentities($_POST['id_user']) : strip_tags($_POST['id_user']);
        $username = htmlspecialchars($_POST['username']) ? htmlentities($_POST['username']) : strip_tags($_POST['username']);
        $new_password = md5(htmlspecialchars($_POST['new_password']), false);
        $old_password = md5(htmlspecialchars($_POST['old_password']), false);
        $new_password_verify = md5(htmlspecialchars($_POST['new_password_verify']), false);
        $nama = htmlspecialchars($_POST['nama']) ? htmlentities($_POST['nama']) : strip_tags($_POST['nama']);
        $nip = htmlspecialchars($_POST['nip']) ? htmlentities($_POST['nip']) : strip_tags($_POST['nip']);
        $akses = htmlspecialchars($_POST['akses']) ? htmlentities($_POST['akses']) : strip_tags($_POST['akses']);

        # table cek password
        $table = "user";
        $data = $this->db->query("SELECT * FROM $table WHERE id_user = '$id'");
        $cekpassword = mysqli_fetch_array($data);
        # data update password

        if (password_verify($old_password, PASSWORD_DEFAULT) == md5($cekpassword['password'], false)) {
            echo "<script>document.location.href = '../ui/header.php?page=profile-edit&id_user=$id&dialog=password_verify';</script>";
            die;
        }

        if ($new_password == $new_password_verify) {
            $SQL = "UPDATE $table SET username = '$username', password = '$new_password', nama = '$nama', nip = '$nip', akses = '$akses' WHERE id_user = '$id'";
            $query = $this->db->query($SQL);
            if ($query != "") {
                if ($query) {
                    echo "<script>document.location.href = '../ui/header.php?page=profile-edit&id_user=$id&dialog=change';</script>";
                    die;
                }
            } else {
                echo "<script>document.location.href = '../ui/header.php?page=profile-edit&id_user=$id';</script>";
                die;
            }
        } else {
            echo "<script>document.location.href = '../ui/header.php?page=profile-edit&id_user=$id&dialog=password_verify';</script>";
            die;
        }
    }

    public function hapus_pegawai($id)
    {
        $id = htmlspecialchars($_GET['id_user']) ? htmlentities($_GET['id_user']) : strip_tags($_GET['id_user']);
        $table = "user";
        $hapus = "DELETE FROM $table WHERE id_user = '$id'";
        $data = $this->db->query($hapus);
        if ($data != "") {
            if ($data) {
                echo "<script>document.location.href = '../ui/header.php?page=pegawai&dialog=delete';</script>";
                die;
            }
        } else {
            echo "<script>document.location.href = '../ui/header.php?page=pegawai';</script>";
            die;
        }
    }
}
