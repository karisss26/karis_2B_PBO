<?php

// Parent class
abstract class BangunDatar {
    abstract public function luas();
    abstract public function keliling();
}

// Class Persegi
class Persegi extends BangunDatar {
    private $sisi;

    public function __construct($sisi) {
        $this->sisi = $sisi;
    }

    public function luas() {
        return $this->sisi * $this->sisi;
    }

    public function keliling() {
        return 4 * $this->sisi;
    }
}

// Class Lingkaran
class Lingkaran extends BangunDatar {
    private $r;

    public function __construct($r) {
        $this->r = $r;
    }

    public function luas() {
        return M_PI * $this->r * $this->r;
    }

    public function keliling() {
        return 2 * M_PI * $this->r;
    }
}

// Class Persegi Panjang
class PersegiPanjang extends BangunDatar {
    private $panjang, $lebar;

    public function __construct($panjang, $lebar) {
        $this->panjang = $panjang;
        $this->lebar = $lebar;
    }

    public function luas() {
        return $this->panjang * $this->lebar;
    }

    public function keliling() {
        return 2 * ($this->panjang + $this->lebar);
    }
}

// Class Segitiga
class Segitiga extends BangunDatar {
    private $alas, $tinggi;

    public function __construct($alas, $tinggi) {
        $this->alas = $alas;
        $this->tinggi = $tinggi;
    }

    public function luas() {
        return 0.5 * $this->alas * $this->tinggi;
    }

    public function keliling() {
        // asumsinya segitiga sama sisi (biar simple)
        return 3 * $this->alas;
    }
}

// Main
echo "=== Output Luas dan Keliling ===<br>";

$persegi = new Persegi(5);
echo "Persegi - Luas: ".$persegi->luas().", Keliling: ".$persegi->keliling()."<br>";

$lingkaran = new Lingkaran(7);
echo "Lingkaran - Luas: ".$lingkaran->luas().", Keliling: ".$lingkaran->keliling()."<br>";

$pp = new PersegiPanjang(10, 4);
echo "Persegi Panjang - Luas: ".$pp->luas().", Keliling: ".$pp->keliling()."<br>";

$segitiga = new Segitiga(6, 8);
echo "Segitiga - Luas: ".$segitiga->luas().", Keliling: ".$segitiga->keliling()."<br>";

?>