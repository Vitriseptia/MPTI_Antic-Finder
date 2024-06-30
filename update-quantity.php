<?php
session_start();

// Memastikan itemId dan newQty tersedia dalam POST
if (isset($_POST['itemId']) && isset($_POST['newQty'])) {
    $itemId = $_POST['itemId'];
    $newQty = $_POST['newQty'];

    // Mencari item dengan ID yang sesuai dalam $_SESSION['cart']
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $itemId) {
            // Memperbarui qty item
            $item['quantity'] = $newQty;
            $item['total'] = $item['quantity'] * $item['harga'];
            break;
        }
    }

    // Mengembalikan respons JSON sukses
    echo json_encode(['success' => true, 'message' => 'Quantity updated successfully.']);
} else {
    // Jika itemId atau newQty tidak tersedia dalam POST, kembalikan respons error
    echo json_encode(['success' => false, 'message' => 'Item ID or new quantity not provided.']);
}
?>
