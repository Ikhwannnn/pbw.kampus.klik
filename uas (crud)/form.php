<?php
include_once ("tampil_data.php");
include_once ('koneksi.php');

$searchQuery = isset($_POST['search']) ? $_POST['search'] : '';

    if(isset($_POST['search'])) {
    
        if(!is_numeric($searchQuery)) {
            echo "<script>alert('NPM harus berupa angka');</script>";
        } elseif(strlen($searchQuery) < 13) { 
            echo "<script>alert('NPM harus terdiri dari 13 digit');</script>";
        } elseif(strlen($searchQuery) > 13) {
            echo "<script>alert('NPM tidak boleh lebih dari 13 digit');</script>";
        }elseif(strlen($searchQuery) == 13) {
            echo "<script>alert('Data yang di tampilkan');</script>";
        }
        
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="library/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="library/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="library/assets/styles.css" rel="stylesheet" media="screen">
    <script src="library/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="container-fluid">
            <h1><a class="brand" href="#">Data Mahasiswa</a></h1>
        </div>
            <div class="span9" id="content">
                <div class="row-fluid">
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Tambah Data</div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <form action="proses.php" method="POST">
                                    <fieldset>
                                        <legend>Input Data Mahasiswa</legend>
                                        <div class="control-group">
                                            <label for="npm">Nama</label>
                                            <div class="controls">
                                                <input type="text" name="nama" id="nama" value="">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="npm">Program Studi</label>
                                            <div class="controls">
                                                <input type="text" name="prodi"id="prodi" value="">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="npm">Nomor Pokok Mahasiswa</label>
                                            <div class="controls">
                                                <input type="number" name="npm" id="npm" value="">
                                            </div>
                                        </div>

                                        <div class="form_action">
                                            <button type="submit" class="btn btn-success" name="proses">Proses</button>
                                            <button type="reset" class="btn">Reset</button>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row-fluid">
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Data Mahasiswa</div>
                        </div>
                        <div class="block-content collapse in">
                    <div class="span12">
                        
                        <form action="" method="POST">
                            <input type ="text" name="search" placeholder="Cari Nama atau NPM" value="<?php echo htmlspecialchars($searchQuery); ?>">
                            <button type ="submit" class="btn btn-primary">Cari</button>
                        </form>

                        <div class="block-content collapse in">
                            <div class="span12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>NPM</th>
                                            <th>Nama</th>
                                            <th>Prodi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                            
                                         $sql = "SELECT * FROM mahasiswa WHERE  npm LIKE '%$searchQuery%'";
                                         $result = $koneksi->query($sql);
                                         while($data = $result->fetch_assoc()){
                                         ?>
                                             <tr>
                                                 <td><?php echo $data['npm']; ?></td>
                                                 <td><?php echo $data['nama']; ?></td>
                                                 <td><?php echo $data['prodi']; ?></td>
                                                 <td>
                                                     <a href="edit_data.php?id=<?php echo $data['id']; ?>">Edit</a> |
                                                     <a href="hapus_data.php?id=<?php echo $data['id']; ?>"
                                                         onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                                 </td>
                                             </tr>
                                             <?php
                                         }
                                         $result->free();
                                         $koneksi->close();
                                         ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>