<?php
include "../../middleware/admin_only.php";
$data = $conn->query("SELECT * FROM users");
?>
<a href="create.php">Tambah User</a>
<table border="1">
<?php while($u = $data->fetch_assoc()): ?>
<tr>
    <td><?= $u['username']; ?></td>
    <td><?= $u['role']; ?></td>
    <td>
        <a href="edit.php?id=<?= $u['id']; ?>">Edit</a>
        <a href="delete.php?id=<?= $u['id']; ?>">Hapus</a>
    </td>
</tr>
<?php endwhile; ?>
</table>