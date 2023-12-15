<?php
session_start();
require_once('required/database.php');
require_once('required/auth.php');

onlyAdmin();

$query = "SELECT * FROM bukutamu ORDER BY id DESC";
$result = mysqli_query($connectDb, $query);
?>

<?php require 'header.php'; ?>


<div class="container">
    <div class="card mt-5">
        <div class="card-header">

        <h2>Manajemen Buku Tamu</h2>
        </div>
        <div class="card-body">
        <table class="table table-bordered">
            <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Message</th>
            <th>Action</th>
            </tr>
            <?php 
            $no = 1;
            while ($data = mysqli_fetch_array($result)) : ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $data['nama']; ?></td>
                <td><?= $data['email']; ?></td>
                <td><?= $data['message']; ?></td>
                <td>
                <a onclick="return confirm('Are you sure you want to delete this entry?')" href="bukutamu-delete.php?id=<?= $data['id']; ?>" class='btn btn-danger'>Delete</a>
                </td>
            </tr>
            <?php $no++; endwhile; ?>
        </table>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>
