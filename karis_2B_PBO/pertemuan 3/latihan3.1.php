<?php
class barangHarian {
    var $namaBarang = "Mie Instan ";
    var $harga;
    var $jumlah;
    var $total;

    function hitungTotalPembayaran() {
        $this->total = $this->harga * $this->jumlah;
        return $this->total;
    }

    function statusPembayaran() {
        if ($this->total > 50000) {
            return "Mahal";
        } else {
            return "Murah";
        }
    }
}

// Barang 1
$barang1 = new barangHarian();
$barang1->harga = 15000;
$barang1->jumlah = 3;
$barang1->hitungTotalPembayaran();

echo "Nama Barang: " . $barang1->namaBarang . "<br>";
echo "Harga: " . $barang1->harga . "<br>" ;
echo "Total: " . $barang1->total . "<br>";
echo "Status: " . $barang1->statusPembayaran() . "<br><br>";

// Barang 2
$barang2 = new barangHarian();
$barang2->namaBarang = "Kopi ";
$barang2->harga = 2000;
$barang2->jumlah = 5;
$barang2->hitungTotalPembayaran();

echo "Nama Barang: " . $barang2->namaBarang . "<br>";
echo "Harga: " . $barang2->harga . "<br>";
echo "Total: " . $barang2->total . "<br>";
echo "Status: " . $barang2->statusPembayaran() . "<br><br>";

// Barang 3
$barang3 = new barangHarian();
$barang3->namaBarang = "Air Mineral ";
$barang3->harga = 5000;
$barang3->jumlah = 2;
$barang3->hitungTotalPembayaran();

echo "Nama Barang: " . $barang3->namaBarang . "<br>";
echo "Harga: " . $barang3->harga . "<br>";
echo "Total: " . $barang3->total . "<br>";
echo "Status: " . $barang3->statusPembayaran() . "<br><br>";
?>
