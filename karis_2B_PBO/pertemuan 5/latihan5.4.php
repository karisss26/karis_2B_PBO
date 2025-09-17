<?php
// Class induk
class Kendaraan {
    // Bisa tambahkan properti umum kendaraan kalau perlu
}

// Class turunan
class Pesawat extends Kendaraan {
    private $tinggiMaks;
    private $kecepatanMaks;
    public $harga;

    public function __construct($harga) {
        $this->harga = $harga;
    }

    public function setTinggiMaks($tinggi) {
        $this->tinggiMaks = $tinggi;
    }

    public function setKecepatanMaks($kecepatan) {
        $this->kecepatanMaks = $kecepatan;
    }

    public function bacaTinggiMaks() {
        return $this->tinggiMaks;
    }

    public function getKecepatanMaks() {
        return $this->kecepatanMaks;
    }

    public function biayaOperasional() {
        $hargaDalamRupiah = $this->harga * 1000000; // harga dalam juta

        if ($this->tinggiMaks > 5000 && $this->kecepatanMaks > 800) {
            return 0.30 * $hargaDalamRupiah;
        } elseif ($this->tinggiMaks > 3000 && $this->tinggiMaks <= 5000 && $this->kecepatanMaks >= 500 && $this->kecepatanMaks <= 800) {
            return 0.25 * $hargaDalamRupiah;
        } elseif ($this->tinggiMaks > 3000 && $this->kecepatanMaks < 500) {
            return 0.10 * $hargaDalamRupiah;
        } else {
            return 0.05 * $hargaDalamRupiah;
        }
    }
}

// Buat objek pesawat
$boeing737 = new Pesawat(2000); // harga juta
$boeing737->setTinggiMaks(7500);
$boeing737->setKecepatanMaks(650);

$boeing747 = new Pesawat(1500);
$boeing747->setTinggiMaks(3500);
$boeing747->setKecepatanMaks(700);

$cassa = new Pesawat(750);
$cassa->setTinggiMaks(2500);
$cassa->setKecepatanMaks(500);

// Fungsi untuk tampilkan hasil
function tampilkanBiaya($nama, $pesawat) {
    $harga = number_format($pesawat->harga * 1000000, 0, ',', '.');
    $tinggi = $pesawat->bacaTinggiMaks();
    $kecepatan = $pesawat->getKecepatanMaks();
    $biaya = number_format($pesawat->biayaOperasional(), 0, ',', '.');

    echo "Biaya operasional pesawat '$nama' dengan harga Rp {$harga} yang memiliki tinggi maksimum {$tinggi} feet dan kecepatan maksimum {$kecepatan} km/jam adalah Rp {$biaya}<br><br>";
}

// Tampilkan semua
tampilkanBiaya("Boeing 737", $boeing737);
tampilkanBiaya("Boeing 747", $boeing747);
tampilkanBiaya("Cassa", $cassa);
?>
