<?php
require_once('required/database.php');

$id = $_GET['id'];

$sqlSelect = 'SELECT * FROM user WHERE id=?';
$statementSelect = $connectDb->prepare($sqlSelect);
$statementSelect->bind_param('i', $id);
$statementSelect->execute();
$person = $statementSelect->get_result()->fetch_object();
$statementSelect->close();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sqlUpdate = 'UPDATE user SET username=?, password=? WHERE id=?';
    $statementUpdate = $connectDb->prepare($sqlUpdate);
    $statementUpdate->bind_param('ssi', $username, $password, $id);

    if ($statementUpdate->execute()) {
        $statementUpdate->close();
        header("Location: user.php");
        exit();
    } else {
        echo "Update failed: " . $statementUpdate->error;
    }
}

require 'header.php';
?>


<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update User</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="username">Name</label>
          <input value="<?= $person->username; ?>" type="text" name="username" id="username" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" value="<?= $person->password; ?>" name="password" id="password" class="form-control">
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-info">Update</button>
        </div>
        <div class="form-group">
            <a href="user.php" class="btn btn-warning">Kembali</a>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>