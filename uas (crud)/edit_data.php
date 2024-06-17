<?php
include_once ('koneksi.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM mahasiswa WHERE id = '$id'";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_assoc($query);
} else {
    echo "ID mahasiswa tidak ditemukan.";
}

if (isset($_POST['proses'])) {
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $newNpm = $_POST['npm']; // Ubah variabel $id menjadi $newNpm

    $sql = "UPDATE mahasiswa SET nama = '$nama', prodi = '$prodi', npm = '$newNpm' WHERE id = '$id'"; // Tambahkan id = '$newNpm' pada query UPDATE
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        // echo "Data mahasiswa berhasil diupdate.";
        // header("Location: index.php");
        // exit();

        echo "<script>
        alert('Data mahasiswa berhasil diperbarui');
        window.location.assign('form.php');
        </script>";
    } else {
        echo "Gagal memperbarui data mahasiswa.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="library/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="library/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="library/assets/styles.css" rel="stylesheet" media="screen">
    <script src="library/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <title>Edit Data Mahasiswa</title>
</head>

<body>
    <div class="container">
        <form action="" method="POST">
            <fieldset>
                <legend>Edit Data Mahasiswa</legend>
                <div class="control-group">
                    <label for="npm">Nama</label>
                    <div class="controls">
                        <input type="text" name="nama" id="nama" value="<?php echo $data['nama']; ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="npm">Program Studi</label>
                    <div class="controls">
                        <input type="text" name="prodi" id="prodi" value="<?php echo $data['prodi']; ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="npm">Nomor Pokok Mahasiswa</label>
                    <div class="controls">
                        <input type="number" name="npm" id="npm" value="<?php echo $data['npm']; ?>" required>
                    </div>
                </div>
                <div class="form_action">
                    <button type="submit" class="btn btn-success" name="proses">Perbarui</button>
                    <!-- <button type="reset" class="btn">Batal</button> -->
                    <a class="btn" href="./form.php">Batal</a>
                </div>
                
            </fieldset>
        </form>
    </div>
</body>

</html>