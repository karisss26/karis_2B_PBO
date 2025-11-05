<?php
session_start();
if($_SESSION['status'] != "login"){ header("location:../login.php"); exit(); }
include ('../koneksi.php'); // Panggil dari root
$db = new database();
$kode_baru = $db->kode_customer(); 
?>
<!DOCTYPE html><html><head><title>Tambah Customer</title></head><body>
    <h3>Form Tambah Data Customer</h3>
    <form method="post" action="proses.php?action=add">
    <table>
        <tr><td>ID Customer</td><td>:</td><td><input type="text" name="id_customer" value="<?php echo $kode_baru;?>" readonly></td></tr>
        <tr><td>NIK Customer</td><td>:</td><td><input type="text" name="nik_customer" required></td></tr>
        <tr><td>Nama Customer</td><td>:</td><td><input type="text" name="nama_customer" required></td></tr>
        <tr><td>Jenis Kelamin</td><td>:</td><td><select name="jenis_kelamin"><option value="Laki-laki">Laki-laki</option><option value="Perempuan">Perempuan</option></select></td></tr>
        <tr><td>Alamat</td><td>:</td><td><textarea name="alamat_customer" required></textarea></td></tr>
        <tr><td>Telepon</td><td>:</td><td><input type="text" name="telepon_customer"></td></tr>
        <tr><td>Email</td><td>:</td><td><input type="email" name="email_customer" required></td></tr>
        <tr><td>Password</td><td>:</td><td><input type="password" name="pass_customer" required></td></tr>
        <tr><td></td><td></td><td><input type="submit" value="Simpan"><a href="../index.php?modul=customer"><input type="button" value="Kembali"></a></td></tr>
    </table></form></body></html>