<?php
# Waktu Bagian Asia
date_default_timezone_set("Asia/Jakarta");
function salam()
{
    date_default_timezone_set("Asia/Jakarta");
    $b = time();
    $hour = date("G", $b);

    if (
        $hour >= 0 && $hour <= 11
    ) {
        echo "Selamat Pagi";
    } elseif ($hour >= 11 && $hour <= 15) {
        echo "Selamat Siang ";
    } elseif ($hour >= 15 && $hour <= 18) {
        echo "Selamat Sore ";
    } elseif ($hour >= 18 && $hour < 24) {
        echo "Selamat Malam ";
    }
}
# Base URL untuk File
function baseurl($link)
{
    $url = "http://localhost/aplikasi_arsip_dokumen/" . ltrim($link, "/");
    return $url;
}

# Database Connection
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "db_arsip";
$koneksi = mysqli_connect($hostname, $username, $password, $dbname) or mysqli_connect_errno();