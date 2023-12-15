<?php
require_once('required/database.php');

$message = '';
if (isset($_POST['title']) && isset($_POST['tahun'])) {
    $title = $_POST['title'];
    $tahun = $_POST['tahun'];

    $sql = 'INSERT INTO `experience` (`title`, `tahun`) VALUES (?, ?)';
    $statement = $connectDb->prepare($sql);

    $statement->bind_param('ss', $title, $tahun);

    if ($statement->execute()) {
        $message = 'Data berhasil ditambahkan!';
    } else {
        $message = 'Data gagal ditambahkan: ' . $statement->error;
    }
    
    $statement->close();
}

require 'header.php';
?>

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Tambah Experience</h2>
        </div>
        <div class="card-body">
            <?php if (!empty($message)) : ?>
                <div class="alert alert-success">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
            <form method="post">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <select class="form-control" name="tahun" required>
                        <?php for ($year = date("Y"); $year >= 1900; $year--) : ?>
                            <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Simpan</button>
                </div>
                <div class="form-group">
                    <a href="experience.php" class="btn btn-warning">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>
