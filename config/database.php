<?php
$conn = new mysqli("localhost","root","","absensi");
if ($conn->connect_error) {
    die("Koneksi gagal");
}