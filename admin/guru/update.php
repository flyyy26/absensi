<?php
include '../../config/database.php';

mysqli_query($conn, "
    UPDATE guru SET
        nip = '{$_POST['nip']}',
        nama = '{$_POST['nama']}',
        jenis_kelamin = '{$_POST['jenis_kelamin']}',
        no_hp = '{$_POST['no_hp']}',
        alamat = '{$_POST['alamat']}'
    WHERE id = '{$_POST['id']}'
");

header("Location: index.php");