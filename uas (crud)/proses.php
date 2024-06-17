<?php
include "koneksi.php";

if (isset($_POST["proses"])) {
    $nama_mhs = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $npm = $_POST['npm'];
    $proses = mysqli_query($koneksi, "INSERT INTO mahasiswa (nama, prodi, npm) VALUES ('$nama_mhs', '$prodi', '$npm')") or die(mysqli_error($koneksi));
    $huruf_mutu = '';

    if ($proses) {
        echo "<script>
        alert('Data berhasil ditambahkan');
        window.location.assign('form.php');
        </script>";
    } else {
        echo "<script>alert('Gagal')</script>";
    }

}
?>