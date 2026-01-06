<?php
include '../../config/database.php';

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

mysqli_query($conn, "
    INSERT INTO users (username,password,role,is_active,created_at,updated_at)
    VALUES (
        '{$_POST['username']}',
        '$password',
        'guru',
        1,
        NOW(),
        NOW()
    )
");

$user_id = mysqli_insert_id($conn);

mysqli_query($conn, "
    INSERT INTO guru (user_id,nip,nama,jenis_kelamin,no_hp,alamat)
    VALUES (
        '$user_id',
        '{$_POST['nip']}',
        '{$_POST['nama']}',
        '{$_POST['jenis_kelamin']}',
        '{$_POST['no_hp']}',
        '{$_POST['alamat']}'
    )
");

header("Location: index.php");