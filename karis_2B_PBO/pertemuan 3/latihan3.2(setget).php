<?php
class barangHarian {
    var $namaBarang = "Mie Instan";
    var $harga;
    var $jumlah;
    var $total;

    function setNamaBarang($namaBarang) {
        $this->namaBarang = $namaBarang;
    }

    function setHarga($harga) {
        $this->harga = $harga;
    }

    function setJumlah($jumlah) {
        $this->jumlah = $jumlah;
    }

    function getNamaBarang() {
        return $this->namaBarang;
    }

    function getHarga() {
        return $this->harga;
    }

    function getJumlah() {
        return $this->jumlah;
    }

    function getTotal() {
        return $this->total;
    }

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

$barang1 = new barangHarian();
$barang1->setNamaBarang("Mie Instan");
$barang1->setHarga(15000);
$barang1->setJumlah(3);
$barang1->hitungTotalPembayaran();

echo "Nama Barang: " . $barang1->getNamaBarang() . "<br>";
echo "Harga: " . $barang1->getHarga() . "<br>";
echo "Jumlah: " . $barang1->getJumlah() . "<br>";
echo "Total: " . $barang1->getTotal() . "<br>";
echo "Status: " . $barang1->statusPembayaran() . "<br><br>";

$barang2 = new barangHarian();
$barang2->setNamaBarang("Kopi");
$barang2->setHarga(2000);
$barang2->setJumlah(5);
$barang2->hitungTotalPembayaran();

echo "Nama Barang: " . $barang2->getNamaBarang() . "<br>";
echo "Harga: " . $barang2->getHarga() . "<br>";
echo "Jumlah: " . $barang2->getJumlah() . "<br>";
echo "Total: " . $barang2->getTotal() . "<br>";
echo "Status: " . $barang2->statusPembayaran() . "<br><br>";

$barang3 = new barangHarian();
$barang3->setNamaBarang("Air Mineral");
$barang3->setHarga(5000);
$barang3->setJumlah(2);
$barang3->hitungTotalPembayaran();

echo "Nama Barang: " . $barang3->getNamaBarang() . "<br>";
echo "Harga: " . $barang3->getHarga() . "<br>";
echo "Jumlah: " . $barang3->getJumlah() . "<br>";
echo "Total: " . $barang3->getTotal() . "<br>";
echo "Status: " . $barang3->statusPembayaran() . "<br><br>";

?>