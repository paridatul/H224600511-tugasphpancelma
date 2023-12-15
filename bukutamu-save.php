<?php
require_once('required/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = strip_tags($_POST['nama']);
    $email = strip_tags($_POST['email']);
    $pesan = strip_tags($_POST['message']);

    $query = "INSERT INTO bukutamu (nama, email, message) VALUES (?, ?, ?)";
    $statement = $connectDb->prepare($query);
    $statement->bind_param('sss', $nama, $email, $pesan);
    $result = $statement->execute();

    if ($result) {
        header('location:index.php?bukutamu=sukses');
    } else {
        header('location:index.php?bukutamu=gagal');
    }

    $statement->close();
} else {
    header('location:index.php');
}
?>
