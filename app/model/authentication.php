<?php

namespace model;

class Authentication
{
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function SignIn($userInput, $password)
    {
        session_start();
        if (empty($_POST['userInput']) || empty($_POST['password'])):
            echo "<script>document.location.href = 'error/error-msg.php?HttpStatus=401';</script>";
            die;
        else:
            $userInput = htmlspecialchars($_POST['userInput']) ? htmlentities($_POST['userInput']) : strip_tags($_POST['userInput']);
            $password = md5(htmlspecialchars($_POST['password']), false);
            password_verify($password, PASSWORD_DEFAULT);
            # database table
            $table = "user";
            $SQL = "SELECT * FROM $table WHERE username = '$userInput' and password = '$password'";
            $data = $this->db->query($SQL);
            # Capthca
            $hasil = $_POST['angka1'] + $_POST['angka2'];
            # cek user profile
            $cek = mysqli_num_rows($data);
            if ($cek) {
                $response = array($userInput, $password);
                $response[$table] = array($userInput, $password);
                if ($row = $data->fetch_assoc()) {
                    if ($row['akses'] == 'administrator'):
                        $_SESSION['status'] = true;
                        $_SESSION['id'] = $row['id_user'];
                        $_SESSION['nama'] = $row['nama'];
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['nip'] = $row['nip'];
                        if ($hasil == $_POST['hasil']) {
                            $_SESSION['akses'] = "administrator";
                            echo "<script>document.location.href = 'error/error-msg.php?HttpStatus=200';</script>";
                            die;
                        } else {
                            unset($_POST['hasil']);
                            $_SESSION['status'] = false;
                            echo "<script>document.location.href = '../view/index.php';</script>";
                            die;
                        }
                    elseif ($row['akses'] == 'pegawai'):
                        $_SESSION['status'] = true;
                        $_SESSION['id'] = $row['id_user'];
                        $_SESSION['nama'] = $row['nama'];
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['nip'] = $row['nip'];
                        if ($hasil == $_POST['hasil']) {
                            $_SESSION['akses'] = "pegawai";
                            echo "<script>document.location.href = 'error/error-msg.php?HttpStatus=200';</script>";
                            die;
                        } else {
                            unset($_POST['hasil']);
                            $_SESSION['status'] = false;
                            echo "<script>document.location.href = '../view/index.php';</script>";
                            die;
                        }
                    endif;
                }
                $_COOKIE['cookies'] = $userInput;
                $_SERVER['HTTPS'] = "on";
                $HttpStatus = $_SERVER["REDIRECT_STATUS"];
                if ($HttpStatus == 400) {
                    echo "<script>document.location.href = 'error/error-msg.php?HttpStatus=400';</script>";
                    die;
                }
                if ($HttpStatus == 403) {
                    echo "<script>document.location.href = 'error/error-msg.php?HttpStatus=403';</script>";
                    die;
                }
                if ($HttpStatus == 500) {
                    echo "<script>document.location.href = 'error/error-msg.php?HttpStatus=500';</script>";
                    die;
                }
                setcookie($response[$table], $row, time() + (86400 * 30), "/");
                array_push($response[$table], $row);
                die;
                exit;
            } else {
                unset($_POST['hasil']);
                $_SESSION['status'] = false;
                $_SERVER['HTTPS'] = "off";
                echo "<script>document.location.href = '../view/index.php';</script>";
                die;
            }
        endif;
    }
}