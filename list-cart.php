<?php
    session_start();

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $id = $_POST['id'];
        $gambar = $_POST['gambar'];
    
        $item = ['id' => $id, 'nama' => $nama, 'harga' => $harga, 'gambar' => $gambar, 'quantity' => 1, 'total' => $harga];
        $_SESSION['cart'][] = $item;
    }

    $totalHarga = 0;
    
    foreach ($_SESSION['cart'] as $item) {
        $totalHarga += $item['harga'];
    }

    $_SESSION['total'] = $totalHarga;

    header('Location: cart.php');
    exit;
?>