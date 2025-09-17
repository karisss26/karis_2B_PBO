<?php
class Employee {
    protected $gaji;
    protected $masaKerja;

    public function __construct($gaji, $masaKerja) {
        $this->gaji = $gaji;
        $this->masaKerja = $masaKerja;
    }

    public function getgaji() {
        return $this->gaji;
    }

    public function getmasaKerja() {
        return $this->masaKerja;
    }

    public function hitungBonus() {
        return 0;
    }

    public function getTotalGaji() {
        return $this->gaji + $this->hitungBonus();
    }
}

class Programmer extends Employee {
    public function hitungBonus() {
        $tahun = $this->masaKerja;
        if ($tahun < 1) {
            return 0;
        } elseif ($tahun >= 1 && $tahun <= 10) {
            return $this->gaji * 0.01 * $tahun;
        } else { // > 10 tahun
            return $this->gaji * 0.02 * $tahun;
        }
    }
}

class Direktur extends Employee {
    public function hitungBonus() {
        // Bonus 0.5 * masaKerja * gaji
        return $this->gaji * 0.5 * $this->masaKerja;
    }

    public function hitungTunjangan() {
        // tunjangan 0.1 * masaKerja * gaji
        return $this->gaji * 0.1 * $this->masaKerja;
    }

    public function getTotalGaji() {
        return $this->gaji + $this->hitungBonus() + $this->hitungTunjangan();
    }
}

class PegawaiMingguan extends Employee {
    private $hargaBarang;
    private $stok;
    private $penjualan;

    public function __construct($gaji, $masaKerja, $hargaBarang, $stok, $penjualan) {
        parent::__construct($gaji, $masaKerja);
        $this->hargaBarang = $hargaBarang;
        $this->stok = $stok;
        $this->penjualan = $penjualan;
    }

    public function hitungBonus() {
        $totalPenjualan = $this->penjualan / $this->stok;
        if ($totalPenjualan > 0.7) {
            // 10% dari harga per item per penjualan
            return $this->hargaBarang * 0.10 * $this->penjualan;
        } else {
            // 3% dari harga per item per penjualan
            return $this->hargaBarang * 0.03 * $this->penjualan;
        }
    }

    public function getTotalGaji() {
        return $this->gaji + $this->hitungBonus();
    }
}

$programmer = new Programmer(10000000, 5);
echo "Programmer <br>";
echo "Gaji Pokok: Rp " . number_format($programmer->getgaji(), 0, ',', '.') . "<br>";
echo "Bonus: Rp " . number_format($programmer->hitungBonus(), 0, ',', '.') . "<br>";
echo "Total Gaji: Rp " . number_format($programmer->getTotalGaji(), 0, ',', '.') . "<br><br>";

$direktur = new Direktur(15000000, 3);
echo "Direktur <br>";
echo "Gaji Pokok: Rp " . number_format($direktur->getgaji(), 0, ',', '.') . "<br>";
echo "Bonus: Rp " . number_format($direktur->hitungBonus(), 0, ',', '.') . "<br>";
echo "Tunjangan: Rp " . number_format($direktur->hitungTunjangan(), 0, ',', '.') . "<br>";
echo "Total Gaji: Rp " . number_format($direktur->getTotalGaji(), 0, ',', '.') . "<br><br>";

$pegawaiMingguan = new PegawaiMingguan(2000000, 2, 100000, 100, 80);
echo "Pegawai Mingguan <br>";
echo "Gaji Pokok: Rp " . number_format($pegawaiMingguan->getgaji(), 0, ',', '.') . "<br>";
echo "Bonus: Rp " . number_format($pegawaiMingguan->hitungBonus(), 0, ',', '.') . "<br>";
echo "Total Gaji: Rp " . number_format($pegawaiMingguan->getTotalGaji(), 0, ',', '.') . "<br>";

?>