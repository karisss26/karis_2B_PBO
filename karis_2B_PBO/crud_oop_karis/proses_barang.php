<?php
include 'koneksi.php';
$koneksi = new database();

$action = $_GET['action'];

if ($action == "add") {

    // Menghitung keuntungan
    $keuntungan = $_POST['harga_jual'] - $_POST['harga_beli'];

    // Perbaikan: Hapus semicolon yang salah dan pastikan koma pemisah parameter
    $koneksi->tambah_data(
        $_POST['nama_barang'],
        $_POST['stok'],
        $_POST['harga_beli'],
        $_POST['harga_jual'],
        $keuntungan // Parameter tambahan untuk keuntungan
    );
    header('Location: index.php?pesan=input'); 

} elseif ($action == "edit") {

    $id_barang = $_GET['id_barang'];
    // Menghitung keuntungan sebelum edit
    $keuntungan = $_POST['harga_jual'] - $_POST['harga_beli'];

    // Perbaikan: Hapus semicolon yang salah dan pastikan koma pemisah parameter
    $koneksi->update_data( // Menggunakan update_data, bukan edit_data
        $id_barang,
        $_POST['nama_barang'],
        $_POST['stok'],
        $_POST['harga_beli'],
        $_POST['harga_jual'],
        $keuntungan // Parameter tambahan untuk keuntungan
    );
    header('Location: index.php?pesan=update'); 

} elseif ($action == "delete") {

    $id_barang = $_GET['id_barang'];
    $koneksi->delete_data($id_barang);
    header('Location: index.php?pesan=delete'); 

} elseif ($action == "search") {
    
    // Logika search di-redirect kembali ke index.php
    $keyword = $_GET['cari'];
    header('Location: index.php?cari=' . urlencode($keyword));
    
} else {
    header('Location: index.php?pesan=error_action');
}
?>