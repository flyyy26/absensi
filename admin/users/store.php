<?php
include "../../middleware/admin_only.php";

$pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

$stmt = $conn->prepare(
    "INSERT INTO users(username,password,role) VALUES (?,?,?)"
);
$stmt->bind_param("sss",
    $_POST['username'],
    $pass,
    $_POST['role']
);
$stmt->execute();

header("Location: index.php");