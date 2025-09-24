<?php

class Belanja {
    public $nama_barang;
    public $jumlah;
    public $harga;
    public $total;

    public function __construct($nama_barang, $jumlah, $harga) {
        $this->nama_barang = $nama_barang;
        $this->jumlah = $jumlah;
        $this->harga = $harga;
        $this->total = $harga * $jumlah;
        echo "Constructor : Data Belanja '$this->nama_barang' dibuat. \n<br>";
    }

    public function __destruct() {
        echo "Destruct : Data Belanja '$this->nama_barang' dihapus. \n<br>";
    }

    function getInfo() {
        return $this->nama_barang . " (" . $this->harga . " x " . $this->jumlah . ") = " . $this->total;
    }    
}

echo "Masukkan jumlah barang belanja yang dibeli: ";
$jml = (int)trim(fgets(STDIN));

$barang = [];
$totalBelanja = 0;

for ($i = 1; $i <= $jml; $i++) {
    echo "\nBarang ke-$i\n";
    echo "Nama barang: ";
    $nama_barang = trim(fgets(STDIN));

    echo "Harga satuan: ";
    $harga = (int)trim(fgets(STDIN));

    echo "Jumlah: ";
    $jumlah = (int)trim(fgets(STDIN));

    $item = new Belanja($nama_barang, $jumlah, $harga);
    $barang[] = $item;
    $totalBelanja += $item->total;
}

echo "\n---------- Daftar Belanja ----------\n";
foreach ($barang as $item) {
    echo $item->getInfo() . "\n";
}
echo "------------------------------------\n";
echo "Total Belanja : " . $totalBelanja . "\n";

?>