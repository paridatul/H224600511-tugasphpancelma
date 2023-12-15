<?php
session_start();
require_once('required/database.php');
require_once('required/auth.php');

onlyAdmin();

$query = "SELECT * FROM user ORDER BY id DESC";
$result = mysqli_query($connectDb, $query);
?>

<?php require 'header.php'; ?>


<div class="container">
    <div class="card mt-5">
        <div class="card-header">
        <a href="user-add.php" class="btn btn-primary">Tambah User</a>

        <h2>Manajemen Users</h2>
        </div>
        <div class="card-body">
        <table class="table table-bordered">
            <tr>
            <th>No</th>
            <th>Username</th>
            <th>Password</th>
            <th>Action</th>
            </tr>
            <?php 
            $no = 1;
            while ($data = mysqli_fetch_array($result)) : ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $data['username']; ?></td>
                <td><?= $data['password']; ?></td>
                <td>
                <a href="user-edit.php?id=<?= $data['id']; ?>" class="btn btn-info">Edit</a>
                <a onclick="return confirm('Are you sure you want to delete this entry?')" href="user-delete.php?id=<?= $data['id']; ?>" class='btn btn-danger'>Delete</a>
                </td>
            </tr>
            <?php $no++; endwhile; ?>
        </table>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>
