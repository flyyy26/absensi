<?php
include "../../middleware/admin_only.php";
$id = $_GET['id'];
$user = $conn->query("SELECT * FROM users WHERE id=$id")->fetch_assoc();
?>
<form method="POST" action="update.php">
    <input type="hidden" name="id" value="<?= $user['id']; ?>">
    <input name="username" value="<?= $user['username']; ?>">
    <select name="role">
        <option <?= $user['role']=='admin'?'selected':''; ?>>admin</option>
        <option <?= $user['role']=='guru'?'selected':''; ?>>guru</option>
        <option <?= $user['role']=='murid'?'selected':''; ?>>murid</option>
    </select>
    <button>Update</button>
</form>