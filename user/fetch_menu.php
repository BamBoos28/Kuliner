<?php
include("../db/conn.php");

$filter_name = $_GET['filter'];

if ($filter_name == "Semua") {
    $query = "SELECT * FROM produk";
} else {
    $query = "SELECT * FROM produk WHERE jenis_produk = '$filter_name'";
}

$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    echo json_encode([
        'Response' => 'True',
        'product' => $rows
    ]);
} else {
    // Jika produk tidak ditemukan
    echo json_encode([
        'Response' => 'False',
        'message' => 'Produk tidak ditemukan'
    ]);
}
?>

