<?php
require_once('required/database.php');

$id = $_GET['id'];

$sql = 'DELETE FROM user WHERE id = ?';
$statement = $connectDb->prepare($sql);
$statement->bind_param('i', $id);

if ($statement->execute()) {
    header("Location: user.php");
} else {
    echo "Error deleting record: " . $statement->error;
}

$statement->close();
?>
