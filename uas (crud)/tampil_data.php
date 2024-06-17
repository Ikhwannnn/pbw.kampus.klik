<?php
include_once ("koneksi.php");

$query = "SELECT * FROM mahasiswa";
$result = mysqli_query($koneksi, $query);