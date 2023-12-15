<?php
session_start();
require_once('required/database.php');
require_once('required/auth.php');

onlyAdmin();

$query = "SELECT * FROM experience ORDER BY id DESC";
$result = mysqli_query($connectDb, $query);
?>

<?php require 'header.php'; ?>


<div class="container">
    <div class="card mt-5">
        <div class="card-header">
        <a href="experience-add.php" class="btn btn-primary">Tambah Experience</a>

        <h2>Manajemen Experience</h2>
        </div>
        <div class="card-body">
        <table class="table table-bordered">
            <tr>
            <th>No</th>
            <th>Title</th>
            <th>Tahun</th>
            <th>Action</th>
            </tr>
            <?php 
            $no = 1;
            while ($data = mysqli_fetch_array($result)) : ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $data['title']; ?></td>
                <td><?= $data['tahun']; ?></td>
                <td>
                <a href="experience-edit.php?id=<?= $data['id']; ?>" class="btn btn-info">Edit</a>
                <a onclick="return confirm('Are you sure you want to delete this entry?')" href="experience-delete.php?id=<?= $data['id']; ?>" class='btn btn-danger'>Delete</a>
                </td>
            </tr>
            <?php $no++; endwhile; ?>
        </table>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>
