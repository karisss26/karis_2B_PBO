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

    function getNama() {
        return $this->nama;
    }

    function getMember() {
        return $this->member;
    }

    function getTotalBelanja() {
        return $this->totalBelanja;
    }

    function setNama($nama) {
        $this->nama = $nama;
    }

    function setMember($member) {
        $this->member = $member;
    }

    function setTotalBelanja($totalBelanja) {
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
        echo "Nama : {$this->getNama()}<br>";
        echo "Kartu Member : " . ($this->getMember() ? "Ya" : "Tidak") . "<br>";
        echo "Total Belanja : Rp " . number_format($this->getTotalBelanja(), 0, ',', '.') . "<br>";
        echo "Diskon : Rp " . number_format($this->hitungDiskon(), 0, ',', '.') . "<br>";
        echo "Total Bayar : Rp " . number_format($this->totalBayar(), 0, ',', '.') . "<br><br>";
    }
}

$pembeli1 = new Pembeli("Pembeli 1", true, 120000);
$pembeli1->setNama("Karis");
$pembeli1->setTotalBelanja(300000);
$pembeli1->cetakStruk();

?>