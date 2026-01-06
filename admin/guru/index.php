<?php
include '../../middleware/admin_only.php';
include '../../config/database.php';

$data = mysqli_query($conn, "
    SELECT guru.*, users.username 
    FROM guru
    LEFT JOIN users ON guru.user_id = users.id
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Guru</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    
    <?php include '../../layout/sidebar.php'; ?>

    <div class="ml-64 min-h-screen p-6">
        <div class="flex justify-between mb-4">
            <h1 class="text-xl font-bold">Data Guru</h1>
            <button onclick="openTambah()" class="bg-blue-600 text-white px-4 py-2 rounded">
                + Tambah Guru
            </button>
        </div>

        <div class="bg-white rounded shadow">
            <table class="w-full text-sm">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-2">NIP</th>
                        <th>Nama</th>
                        <th>JK</th>
                        <th>No HP</th>
                        <th>Username</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($g = mysqli_fetch_assoc($data)): ?>
                    <tr class="border-t">
                        <td class="p-2"><?= $g['nip'] ?></td>
                        <td><?= $g['nama'] ?></td>
                        <td><?= $g['jenis_kelamin'] ?></td>
                        <td><?= $g['no_hp'] ?></td>
                        <td><?= $g['username'] ?></td>
                        <td>
                            <button onclick='openEdit(<?= json_encode($g) ?>)' class="text-blue-600">
                                Edit
                            </button>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- MODAL TAMBAH -->
    <div id="modalTambah" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white w-96 p-5 rounded">
            <h2 class="font-bold mb-3">Tambah Guru</h2>
            <form method="POST" action="store.php">
                <input name="nip" placeholder="NIP" class="input" required>
                <input name="nama" placeholder="Nama" class="input" required>

                <select name="jenis_kelamin" class="input">
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>

                <input name="no_hp" placeholder="No HP" class="input">
                <textarea name="alamat" placeholder="Alamat" class="input"></textarea>

                <input name="username" placeholder="Username Login" class="input" required>
                <input name="password" placeholder="Password Login" class="input" required>

                <div class="flex justify-end gap-2 mt-3">
                    <button type="button" onclick="closeTambah()">Batal</button>
                    <button class="bg-blue-600 text-white px-4 py-1 rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL EDIT -->
    <div id="modalEdit" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white w-96 p-5 rounded">
            <h2 class="font-bold mb-3">Edit Guru</h2>
            <form method="POST" action="update.php">
                <input type="hidden" name="id" id="edit_id">

                <input name="nip" id="edit_nip" class="input">
                <input name="nama" id="edit_nama" class="input">

                <select name="jenis_kelamin" id="edit_jk" class="input">
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>

                <input name="no_hp" id="edit_hp" class="input">
                <textarea name="alamat" id="edit_alamat" class="input"></textarea>

                <div class="flex justify-end gap-2 mt-3">
                    <button type="button" onclick="closeEdit()">Batal</button>
                    <button class="bg-blue-600 text-white px-4 py-1 rounded">Update</button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .input{
            width:100%;
            border:1px solid #ccc;
            padding:6px;
            margin-bottom:8px;
            border-radius:4px;
        }
    </style>

    <script>
        function openTambah(){ modalTambah.classList.remove('hidden') }
        function closeTambah(){ modalTambah.classList.add('hidden') }

        function openEdit(data){
            modalEdit.classList.remove('hidden')
            edit_id.value = data.id
            edit_nip.value = data.nip
            edit_nama.value = data.nama
            edit_jk.value = data.jenis_kelamin
            edit_hp.value = data.no_hp
            edit_alamat.value = data.alamat
        }
        function closeEdit(){ modalEdit.classList.add('hidden') }
    </script>

</body>
</html>
