<?php
session_start();

include "../config/database.php";
include "../config/helper.php";

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND is_active=1");
$stmt->bind_param("s", $username);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {

    $_SESSION['user'] = [
        'id' => $user['id'],
        'role' => $user['role'],
        'username' => $user['username']
    ];

    if ($user['role'] == 'admin') {
        redirect("/ade/admin/dashboard.php");
    } elseif ($user['role'] == 'guru') {
        redirect("/ade/guru/dashboard.php");
    } else {
        redirect("/ade/murid/dashboard.php");
    }
} else {
    echo "Login gagal";
}
