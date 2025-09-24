<?php

class Karyawan {
    private $nama;
    private $golongan;
    private $jamLembur;
    private $gajiPokok;
    private $gajiLembur;

    public function __construct($nama, $golongan, $jamLembur) {
        echo "Constructor dipanggil untuk karyawan: " . $nama . "\n";
        $this->nama = $nama;
        $this->golongan = $golongan;
        $this->jamLembur = $jamLembur;
        $this->gajiPokok = $this->getGajiPokok($golongan);
        $this->gajiLembur = $this->hitungGajiLembur($jamLembur);
    }
    public function __destruct() {
        echo "Destructor dipanggil untuk karyawan: " . $this->nama . "\n";
        unset($this->nama);
        unset($this->golongan);
        unset($this->jamLembur);
        unset($this->gajiPokok);
        unset($this->gajiLembur);
    }

    public function setNama($nama) {
        $this->nama = $nama;
    }

    public function getNama() {
        return $this->nama;
    }

    public function setGolongan($golongan) {
        $this->golongan = $golongan;
        $this->gajiPokok = $this->getGajiPokok($golongan);
    }

    public function getGolongan() {
        return $this->golongan;
    }

    public function setJamLembur($jamLembur) {
        $this->jamLembur = $jamLembur;
        $this->gajiLembur = $this->hitungGajiLembur($jamLembur);
    }

    public function getJamLembur() {
        return $this->jamLembur;
    }

    private function getGajiPokok($golongan) {
        $gajiMap = [
            "Ib" => 1250000,
            "IIa" => 2000000,
            "Ic" => 1300000,
            "IIb" => 2100000,
            "Id" => 1350000,
            "IIc" => 2200000,
            "IIIa" => 2400000,
            "IId" => 2300000,
            "IIIb" => 2500000,
            "Va" => 2800000,
            "IIIc" => 2600000,
            "IVb" => 2900000,
            "IIId" => 2700000,
            "IVc" => 3000000,
            "IVd" => 3100000
        ];

        return isset($gajiMap[$golongan]) ? $gajiMap[$golongan] : 0;
    }

    private function hitungGajiLembur($jamLembur) {
        $gajiPerJam = 15000;
        return $jamLembur * $gajiPerJam;
    }

    public function getTotalGaji() {
        return $this->gajiPokok + $this->gajiLembur;
    }

    public function displayData() {
        return [
            'nama' => $this->nama,
            'golongan' => $this->golongan,
            'jam_lembur' => $this->jamLembur,
            'total_gaji' => $this->getTotalGaji()
        ];
    }
}

$dataKaryawan = [
    ["Winny", "IIb", 30],
    ["Stendy", "IIIc", 32],
    ["Alfred", "IVb", 30],
    ["Ferdinand", "IIIc", 40],
];

$karyawanList = [];

foreach ($dataKaryawan as $data) {
    $karyawan = new Karyawan($data[0], $data[1], $data[2]);
    $karyawanList[] = $karyawan;
}

echo "\n" . str_repeat("=", 80) . "\n";
echo "DATA KARYAWAN DAN GAJI\n";
echo str_repeat("=", 80) . "\n";
echo sprintf("%-15s %-10s %-15s %-15s\n", "Nama Karyawan", "Golongan", "Total Jam Lembur", "Total Gaji");
echo str_repeat("-", 80) . "\n";

foreach ($karyawanList as $karyawan) {
    $data = $karyawan->displayData();
    echo sprintf("%-15s %-10s %-15s Rp %-12.0f\n",
        $data['nama'],
        $data['golongan'],
        $data['jam_lembur'],
        $data['total_gaji']
    );
}

echo str_repeat("-", 80) . "\n";

foreach ($karyawanList as $karyawan) {
    unset($karyawan);
}

echo "\nSemua objek karyawan telah dihapus.\n";
echo "Program selesai dieksekusi.\n";

?>