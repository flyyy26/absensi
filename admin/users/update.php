<?php
include "../../middleware/admin_only.php";

$stmt = $conn->prepare(
    "UPDATE users SET username=?, role=? WHERE id=?"
);
$stmt->bind_param("ssi",
    $_POST['username'],
    $_POST['role'],
    $_POST['id']
);
$stmt->execute();

header("Location: index.php");