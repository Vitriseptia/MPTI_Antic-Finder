<?php
    session_start();

    require 'koneksi.php';

    if (isset($_POST['update'])) {
        $id = $_SESSION['id'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telp = $_POST['telp'];
        $provinsi = $_POST['provinsi'];
        $gender = $_POST['gender'];
        $sql = "UPDATE user SET nama = ?, alamat = ?, telp = ?, provinsi = ?, jenis = ? WHERE id = ?";
        $res = $connection->prepare($sql);
        $res->execute([$nama, $alamat, $telp, $provinsi, $gender, $id]);

        $_SESSION['nama'] = $nama;

        header('location: index.php');
    }
?>