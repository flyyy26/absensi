<?php
include '../middleware/admin_only.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- SIDEBAR -->
    <?php include '../layout/sidebar.php'; ?>

    <!-- MAIN CONTENT -->
    <main class="ml-64 min-h-screen p-6">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold text-gray-800">
                Dashboard Admin
            </h1>
            <div class="text-sm text-gray-600">
                Login sebagai <span class="font-semibold">Admin</span>
            </div>
        </div>

        <!-- STATISTIC CARDS -->
        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-5 rounded-lg shadow">
                <p class="text-sm text-gray-500">Total Guru</p>
                <p class="text-3xl font-bold mt-2">0</p>
            </div>

            <div class="bg-white p-5 rounded-lg shadow">
                <p class="text-sm text-gray-500">Total Murid</p>
                <p class="text-3xl font-bold mt-2">0</p>
            </div>

            <div class="bg-white p-5 rounded-lg shadow">
                <p class="text-sm text-gray-500">Total Kelas</p>
                <p class="text-3xl font-bold mt-2">0</p>
            </div>

            <div class="bg-white p-5 rounded-lg shadow">
                <p class="text-sm text-gray-500">Absensi Hari Ini</p>
                <p class="text-3xl font-bold mt-2">0</p>
            </div>
        </section>

        <!-- WELCOME BOX -->
        <section class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-semibold mb-2">
                Selamat Datang 👋
            </h2>
            <p class="text-gray-600 leading-relaxed">
                Gunakan menu di sebelah kiri untuk mengelola data sekolah,
                mengatur guru, murid, mata pelajaran, serta melihat rekap absensi
                harian, bulanan, semester, dan tahunan.
            </p>
        </section>

    </main>

</body>
</html>
