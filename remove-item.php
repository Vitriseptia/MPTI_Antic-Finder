<?php
session_start();

// Memastikan ID item yang dikirimkan melalui POST tersedia
if (isset($_POST['itemId'])) {
    $itemId = $_POST['itemId'];

    // Mencari item dengan ID yang sesuai dalam $_SESSION['cart']
    foreach ($_SESSION['cart'] as $index => $item) {
        if ($item['id'] == $itemId) {
            // Menghapus item dari keranjang belanja
            unset($_SESSION['cart'][$index]);
            // Berhasil menghapus item, keluar dari loop karena item sudah ditemukan dan dihapus
            break;
        }
    }

    // Mengembalikan respons sukses jika item berhasil dihapus
    echo json_encode(['success' => true, 'message' => 'Item has been removed from cart.']);
} else {
    // Jika tidak ada itemId yang dikirimkan, kembalikan pesan error
    echo json_encode(['success' => false, 'message' => 'Item ID not provided.']);
}
?>
