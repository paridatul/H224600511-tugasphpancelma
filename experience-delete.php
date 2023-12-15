<?php
require_once('required/database.php');

$id = $_GET['id'];

$sql = 'DELETE FROM experience WHERE id = ?';
$statement = $connectDb->prepare($sql);
$statement->bind_param('i', $id);

if ($statement->execute()) {
    header("Location: experience.php");
} else {
    echo "Error deleting record: " . $statement->error;
}

$statement->close();
?>
