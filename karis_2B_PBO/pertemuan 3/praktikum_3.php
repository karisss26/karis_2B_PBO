<?php
class Pembeli {
    var $nama;
    var $member;
    var $totalBelanja;

    function __construct($nama, $member, $totalBelanja) {
    $this->nama = $nama;
    $this->member = $member;
    $this->totalBelanja = $totalBelanja;
    }

    function hitungDiskon() {
    if ($this->member) {

    switch (true) {
    case ($this->totalBelanja > 500000):
    return 50000;
    case ($this->totalBelanja > 100000):
    return 15000;
    default:
    return 5000;
    }
    } else {

    switch (true) {
    case ($this->totalBelanja > 100000):
    return 5000;
    default:
    return 0;
    }
    }
    }

    function totalBayar() {
    return $this->totalBelanja - $this->hitungDiskon();
    }

    function cetakStruk() {
    echo "Nama: {$this->nama}<br>";
    echo "Kartu Member: " . ($this->member ? "Ya" : "Tidak") . "<br>";
    echo "Total Belanja: Rp " . number_format($this->totalBelanja, 0, ',', '.') . "<br>";
    echo "Diskon: Rp " . number_format($this->hitungDiskon(), 0, ',', '.') . "<br>";
    echo "Total Bayar: Rp " . number_format($this->totalBayar(), 0, ',', '.') . "<br>";
    }
}

$pembeli1 = new Pembeli("Pembeli 1", true, 334000);
$pembeli1->cetakStruk();

?>