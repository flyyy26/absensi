<?php
// layout/sidebar.php
$current = $_SERVER['REQUEST_URI'];

function active($path) {
    return str_contains($_SERVER['REQUEST_URI'], $path)
        ? 'bg-blue-700 text-white'
        : 'text-gray-300 hover:bg-blue-600';
}
?>

<aside class="w-64 bg-blue-800 text-white min-h-screen fixed">
    <div class="p-4 text-xl font-bold border-b border-blue-700">
        Admin Panel
    </div>

    <nav class="mt-4 text-sm">
        <a href="/ade/admin/dashboard.php"
           class="block px-4 py-2 <?= active('/admin/dashboard.php') ?>">
            Dashboard
        </a>

        <p class="px-4 mt-4 mb-1 text-xs text-blue-300 uppercase">Master Data</p>

        <a href="/ade/admin/guru/index.php"
           class="block px-4 py-2 <?= active('/admin/guru') ?>">
            Data Guru
        </a>

        <a href="/ade/admin/kelas/index.php"
           class="block px-4 py-2 <?= active('/admin/kelas') ?>">
            Kelas
        </a>

        <a href="/ade/admin/jurusan/index.php"
           class="block px-4 py-2 <?= active('/admin/jurusan') ?>">
            Jurusan
        </a>

        <a href="/ade/admin/mapel/index.php"
           class="block px-4 py-2 <?= active('/admin/mapel') ?>">
            Mata Pelajaran
        </a>

        <p class="px-4 mt-4 mb-1 text-xs text-blue-300 uppercase">Rekap Absensi</p>

        <a href="/ade/admin/absensi/harian.php"
           class="block px-4 py-2 <?= active('/absensi/harian') ?>">
            Harian
        </a>

        <a href="/ade/admin/absensi/bulanan.php"
           class="block px-4 py-2 <?= active('/absensi/bulanan') ?>">
            Bulanan
        </a>

        <a href="/ade/admin/absensi/semester.php"
           class="block px-4 py-2 <?= active('/absensi/semester') ?>">
            Semester
        </a>

        <a href="/ade/admin/absensi/tahunan.php"
           class="block px-4 py-2 <?= active('/absensi/tahunan') ?>">
            Tahunan
        </a>

        <div class="mt-6 px-4">
            <a href="/ade/auth/logout.php"
               class="block text-center bg-red-600 hover:bg-red-700 py-2 rounded">
                Logout
            </a>
        </div>
    </nav>
</aside>
