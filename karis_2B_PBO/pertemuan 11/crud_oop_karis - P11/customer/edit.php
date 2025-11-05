<?php
// File: customer/edit.php
session_start();
if($_SESSION['status'] != "login"){ 
    header("location:../login.php"); 
    exit(); 
}

// PENTING: Naik satu level (../) untuk menemukan koneksi.php
include ('../koneksi.php');
$db = new database();

$id_customer = $_GET['id_customer'];
// Panggil fungsi tampil_edit_data_customer dari koneksi.php
$data_edit_customer = $db->tampil_edit_data_customer($id_customer); 
?>
<!DOCTYPE html>
<html>
<head><title>Edit Customer</title></head>
<body>
    <h3>Form Edit Data Customer</h3>
    <hr>
    <?php foreach($data_edit_customer as $d): ?>
    
    <form method="post" action="proses.php?action=edit&id_customer=<?php echo $d['id_customer']; ?>">
    <table>
        <tr>
            <td>ID Customer</td><td>:</td>
            <td>
                <input type="hidden" name="id_customer" value="<?php echo $d['id_customer']; ?>">
                <input type="text" value="<?php echo $d['id_customer']; ?>" readonly>
            </td>
        </tr>
        <tr><td>NIK Customer</td><td>:</td>
            <td><input type="text" name="nik_customer" value="<?php echo $d['nik_customer']; ?>" required></td>
        </tr>
        <tr><td>Nama Customer</td><td>:</td>
            <td><input type="text" name="nama_customer" value="<?php echo $d['nama_customer']; ?>" required></td>
        </tr>
        <tr><td>Jenis Kelamin</td><td>:</td>
            <td>
                <select name="jenis_kelamin">
                    <option value="Laki-laki" <?php if($d['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                    <option value="Perempuan" <?php if($d['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                </select>
            </td>
        </tr>
        <tr><td>Alamat</td><td>:</td>
            <td><textarea name="alamat_customer" required><?php echo $d['alamat_customer']; ?></textarea></td>
        </tr>
        <tr><td>Telepon</td><td>:</td><td><input type="text" name="telepon_customer" value="<?php echo $d['telepon_customer']; ?>"></td></tr>
        <tr><td>Email</td><td>:</td><td><input type="email" name="email_customer" value="<?php echo $d['email_customer']; ?>" required></td></tr>
        <tr><td>Password</td><td>:</td><td><input type="password" name="pass_customer" value="<?php echo $d['pass_customer']; ?>" required></td></tr>
        <tr><td></td><td></td>
            <td>
                <input type="submit" value="Ubah">
                <a href="../index.php?modul=customer"><input type="button" value="Kembali"></a>
            </td>
        </tr>
    </table>
    </form>
    <?php endforeach; ?>
</body>
</html>