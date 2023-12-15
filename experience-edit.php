<?php
require_once('required/database.php');

$id = $_GET['id'];

$sql = 'SELECT * FROM experience WHERE id=?';
$statement = $connectDb->prepare($sql);
$statement->bind_param('i', $id);
$statement->execute();
$person = $statement->get_result()->fetch_object();

if (isset($_POST['title']) && isset($_POST['tahun'])) {
    $title = $_POST['title'];
    $tahun = $_POST['tahun'];

    // Fix the typo in the column name
    $sql = 'UPDATE experience SET title=?, tahun=? WHERE id=?';
    $statement = $connectDb->prepare($sql);
    $statement->bind_param('ssi', $title, $tahun, $id);

    if ($statement->execute()) {
        header("Location: experience.php");
    }
}

require 'header.php';
?>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update Experience</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="title">Title</label>
          <input value="<?= $person->title; ?>" type="text" name="title" id="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="tahun">Tahun</label>
            <select class="form-control" name="tahun" required>
                <?php for ($year = date("Y"); $year >= 1900; $year--) : ?>
                    <option value="<?php echo $year; ?>" <?php echo ($year == $person->tahun) ? 'selected' : ''; ?>>
                        <?php echo $year; ?>
                    </option>
                <?php endfor; ?>
            </select>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-info">Update</button>
        </div>
        <div class="form-group">
            <a href="experience.php" class="btn btn-warning">Kembali</a>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
