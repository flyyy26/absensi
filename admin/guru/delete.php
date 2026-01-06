<?php
include '../../middleware/admin_only.php';
include '../../config/database.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = intval($_GET['id']);

/*
 Ambil user_id dulu
*/
$get = mysqli_query($conn, "SELECT user_id FROM guru WHERE id = $id");
$data = mysqli_fetch_assoc($get);

if (!$data) {
    header("Location: index.php");
    exit;
}

$user_id = $data['user_id'];

/*
 Hapus guru
*/
mysqli_query($conn, "DELETE FROM guru WHERE id = $id");

/*
 Hapus user login (opsional tapi direkomendasikan)
*/
if ($user_id) {
    mysqli_query($conn, "DELETE FROM users WHERE id = $user_id");
}

header("Location: index.php?success=hapus");
exit;
