<?php
include('koneksi.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cari Data Barang</title>
</head>
<body>
<h3>Cari Data Barang</h3>
<form method="get" action="">
    <input type="text" name="keyword" placeholder="Masukkan nama barang...">
    <input type="submit" value="Cari">
</form>
<hr>

<?php
if(isset($_GET['keyword'])){
    $keyword = $_GET['keyword'];

    // Query cari data
    $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE nama_barang LIKE '%$keyword%'");

    if(mysqli_num_rows($query) > 0){
        echo "<table border='1' cellpadding='5' cellspacing='0'>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Aksi</th>
                </tr>";
        $no = 1;
        while($data = mysqli_fetch_array($query)){
            echo "<tr>
                    <td>".$no++."</td>
                    <td>".$data['nama_barang']."</td>
                    <td>".$data['stok']."</td>
                    <td>".$data['harga_beli']."</td>
                    <td>".$data['harga_jual']."</td>
                    <td>
                        <a href='edit_data.php?id_barang=".$data['id_barang']."'>Edit</a> | 
                        <a href='delete_data.php?id_barang=".$data['id_barang']."' onclick=\"return confirm('Yakin hapus data?')\">Hapus</a>
                    </td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Data tidak ditemukan.";
    }
}
?>
</body>
</html>