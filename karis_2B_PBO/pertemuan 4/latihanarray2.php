<?php
class Kredit {
    private $pinjaman;
    private $bunga;
    private $lama;

    public function setPinjaman($pinjaman) {
        $this->pinjaman = $pinjaman;
    }
    public function setBunga($bunga) {
        $this->bunga = $bunga;
    }
    public function setLama($lama) {
        $this->lama = $lama;
    }

    public function getPinjaman() {
        return $this->pinjaman;
    }
    public function getBunga() {
        return $this->bunga;
    }
    public function getLama() {
        return $this->lama;
    }

    public function hitungAngsuran() {
        $angsuranPokok = $this->pinjaman / $this->lama;
        $angsuran = [];
        for ($i = 1; $i <= $this->lama; $i++) {

            $sisaPinjaman = $this->pinjaman - ($angsuranPokok * ($i - 1));
            $bungaPerBulan = $sisaPinjaman * ($this->bunga / 100);
            $totalAngsuran = $angsuranPokok + $bungaPerBulan;
            $angsuran[] = [
                'angsuran_ke' => $i,
                'pokok' => $angsuranPokok,
                'bunga' => $bungaPerBulan,
                'total' => $totalAngsuran
            ];
        }
        return $angsuran;
    }
}

$kredit = new Kredit();
$kredit->setPinjaman(1000000);
$kredit->setBunga(10);
$kredit->setLama(5);

echo "Latihan 4<br>";
echo "TOKO PEGADAIAN SYARIAH<br>";
echo "Jl Keadilan No 16<br>";
echo "Telp 732746238<br><br>";

echo "Program Penghitung Besaran Angsuran Hutang<br><br>";

echo "Besaran Pinjaman : Rp." . number_format($kredit->getPinjaman(), 0, ',', '.') . "<br>";
echo "Masukan Besaran Bunga (%) : " . $kredit->getBunga() . "<br>";
echo "Lama Angsuran (bulan) : " . $kredit->getLama() . "<br><br>";

$angsuran = $kredit->hitungAngsuran();
foreach ($angsuran as $a) {
    echo "Angsuran ke-" . $a['angsuran_ke'] . " : " . number_format($a['pokok'], 0, ',', '.') . " + " . number_format($a['bunga'], 0, ',', '.') . " = " . number_format($a['total'], 0, ',', '.') . "<br>";
}

?>