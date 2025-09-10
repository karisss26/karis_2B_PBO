<?php
class Kendaraan {
    var $merek;
    var $jmlroda;
    var $harga;
    var $warna;
    var $bhnbakar;
    var $tahun;

    // Setter
    function setMerek($merek) {
        $this->merek = $merek;
    }

    function setJmlroda($jmlroda) {
        $this->jmlroda = $jmlroda;
    }

    function setHarga($harga) {
        $this->harga = $harga;
    }

    function setWarna($warna) {
        $this->warna = $warna;
    }

    function setBhnbakar($bhnbakar) {
        $this->bhnbakar = $bhnbakar;
    }

   function setTahun($tahun) {
        $this->tahun = $tahun;
    }

    // Getter
    function getMerek() {
        return $this->merek;
    }

    function getJmlroda() {
        return $this->jmlroda;
    }

    function getHarga() {
        return $this->harga;
    }

    function getWarna() {
        return $this->warna;
    }

    function getBhnBakar() {
        return $this->bhnbakar;
    }

    function getTahun() {
        return $this->tahun;
    }

    public function getStatusHarga() {
        if ($this->harga > 50000000) {
            return "Harga Mahal";
        } else {
            return "Harga Terjangkau";
        }
    }

    public function dapatSubsidi() {
        if ($this->bhnbakar == 'Premium' && $this->tahun < 2010) {
            return "Mendapat Subsidi";
        } else {
            return "Tidak Mendapat Subsidi";
        }
    }

    public function hargaSecondKendaraan() {
        return $this->harga * 0.8;
    }
}

$Data1 = array('Toyota Yaris', '4', 160000000, 'Merah', 'Pertamax', 2014);
$Data2 = array('Honda Scoopy', '2', 13000000, 'Putih', 'Premium', 2005);
$Data3 = array('Isuzu Panther', '4', 80000000, 'Hitam', 'Solar', 1994);

$kendaraan = [];

$dataArr = [$Data1, $Data2, $Data3];

for ($i = 0; $i < count($dataArr); $i++) {
    $kendaraan[$i] = new Kendaraan();
    $kendaraan[$i]->setMerek($dataArr[$i][0]);
    $kendaraan[$i]->setJmlroda($dataArr[$i][1]);
    $kendaraan[$i]->setHarga($dataArr[$i][2]);
    $kendaraan[$i]->setWarna($dataArr[$i][3]);
    $kendaraan[$i]->setBhnbakar($dataArr[$i][4]);
    $kendaraan[$i]->setTahun($dataArr[$i][5]);
}

for ($i = 0; $i < count($kendaraan); $i++) {
    echo "Kendaraan " . ($i + 1) . "<br>";
    echo "Merek: " . $kendaraan[$i]->getMerek() . "<br>";
    echo "Jumlah Roda: " . $kendaraan[$i]->getJmlroda() . "<br>";
    echo "Harga: Rp " . number_format($kendaraan[$i]->getHarga(), 0, ',', '.') . "<br>";
    echo "Warna: " . $kendaraan[$i]->getWarna() . "<br>";
    echo "Bahan Bakar: " . $kendaraan[$i]->getBhnBakar() . "<br>";
    echo "Tahun: " . $kendaraan[$i]->getTahun() . "<br>";
    echo "Status Harga: " . $kendaraan[$i]->getStatusHarga() . "<br>";
    echo "Subsidi: " . $kendaraan[$i]->dapatSubsidi() . "<br>";
    echo "Harga Kendaraan Second: Rp " . number_format($kendaraan[$i]->hargaSecondKendaraan(), 0, ',', '.') . "<br><br>";
}

?>