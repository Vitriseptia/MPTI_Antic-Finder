<?php
    session_start();

    require 'koneksi.php';

    if (isset($_POST['update'])) {
        $id = $_SESSION['id'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telp = $_POST['telp'];
        $provinsi = $_POST['provinsi'];
        $sql = "UPDATE user SET nama = ?, alamat = ?, telp = ?, provinsi = ? WHERE id = ?";
        $res = $connection->prepare($sql);
        $res->execute([$nama, $alamat, $telp, $provinsi, $id]);

        $_SESSION['nama'] = $nama;

        header('location: index.php');
    }
?>