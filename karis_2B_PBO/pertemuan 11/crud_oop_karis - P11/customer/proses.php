<?php 
// File: customer/proses.php

// PENTING: Naik satu level (../) untuk menemukan koneksi.php
include ('../koneksi.php'); 
session_start();
$koneksi = new database();

$action = $_GET['action'];

if ($action == "add"){
    // Tambah data Customer
    $koneksi->tambah_data_customer(
        $_POST['nik_customer'], 
        $_POST['nama_customer'], 
        $_POST['jenis_kelamin'], 
        $_POST['alamat_customer'], 
        $_POST['telepon_customer'], 
        $_POST['email_customer'], 
        $_POST['pass_customer'] 
    );
    // Redirect kembali ke tampilan Customer di index.php (root)
    header("location:../index.php?modul=customer");
    
} else if ($action == "edit"){
    $id = $_GET['id_customer']; // Mengambil ID dari URL
    // Edit data Customer
    $koneksi->edit_data_customer(
        $id,
        $_POST['nik_customer'], 
        $_POST['nama_customer'], 
        $_POST['jenis_kelamin'], 
        $_POST['alamat_customer'], 
        $_POST['telepon_customer'], 
        $_POST['email_customer'], 
        $_POST['pass_customer']
    );
    header("location:../index.php?modul=customer");
    
} else if ($action == "delete"){
    $id = $_GET['id_customer']; // Mengambil ID dari URL
    // Hapus data Customer
    $koneksi->delete_data_customer($id);
    header("location:../index.php?modul=customer");
} else {
    // Jika action tidak valid
    header("location:../index.php?modul=customer");
}
?>