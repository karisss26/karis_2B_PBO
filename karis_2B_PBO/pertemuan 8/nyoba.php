<?php

class Nasabah {
    private $nama;
    private $saldo;
    private $pin;

    public function __construct($nama, $saldo, $pin) {
        $this->nama = $nama;
        $this->saldo = $saldo;
        $this->pin = $pin;
    }

    public function getNama() {
        return $this->nama;
    }

    public function getSaldo() {
        return $this->saldo;
    }

    public function cekPin($pin) {
        return $this->pin === $pin;
    }

    public function tambahSaldo($nominal) {
        $bunga = $nominal * 0.05;
        $this->saldo += $nominal + $bunga;
        echo "Saldo terakhir: Rp." . number_format($this->saldo, 0, ',', '.') . "\n";
    }

    public function ambilUang($nominal) {
        if ($nominal > $this->saldo) {
            echo "Jumlah uang yang diambil terlalu melebihi saldo tabungan\n";
        } else {
            $this->saldo -= $nominal;
            echo "Saldo terakhir: Rp." . number_format($this->saldo, 0, ',', '.') . "\n";
        }
    }
}

class AplikasiTabungan {
    private $daftarNasabah = [];

    public function __construct() {
        $this->daftarNasabah[] = new Nasabah("Aditya Hafidz", 500000, "1234");
        $this->daftarNasabah[] = new Nasabah("Eko Nugroho", 1200000, "5678");
        $this->daftarNasabah[] = new Nasabah("Dani Abdul", 750000, "9012");
    }

    public function tampilkanNasabah() {
        echo "Jumlah Nasabah Simpanan Pelajar : " . count($this->daftarNasabah) . "\n";
        foreach ($this->daftarNasabah as $key => $nasabah) {
            echo "Nasabah ke-" . ($key + 1) . ": " . $nasabah->getNama() . " Saldo Rp." . number_format($nasabah->getSaldo(), 0, ',', '.') . "\n";
        }
    }

    public function jalankan() {
        $this->tampilkanNasabah();

        echo "Pilih no nasabah: ";
        $pilihanNasabah = (int)trim(fgets(STDIN));
        $nasabahTerpilih = $this->daftarNasabah[$pilihanNasabah - 1] ?? null;

        if (!$nasabahTerpilih) {
            echo "Pilihan nasabah tidak valid.\n";
            return;
        }

        echo "Nasabah ke: " . $pilihanNasabah . " " . $nasabahTerpilih->getNama() . " Saldo Rp." . number_format($nasabahTerpilih->getSaldo(), 0, ',', '.') . "\n";
        echo "1. Masukan pin ATM: ";
        $pinInput = trim(fgets(STDIN));

        if (!$nasabahTerpilih->cekPin($pinInput)) {
            echo "Maaf kode pin yang anda masukan tidak sesuai\n";
            echo "Silahkan masukan kembali kode pin yang benar !\n";
            return;
        }

        while (true) {
            echo "Nasabah ke: " . $pilihanNasabah . " " . $nasabahTerpilih->getNama() . " Saldo Rp." . number_format($nasabahTerpilih->getSaldo(), 0, ',', '.') . "\n";
            echo "Pilihan Menu:\n";
            echo "1. Tambah saldo: Jumlah saldo terakhir + bunga 5%\n";
            echo "2. Ambil uang: saldo terakhir - nominal pengambilan\n";
            echo "Masukan angka pilihan menu: ";
            $pilihanMenu = (int)trim(fgets(STDIN));

            if ($pilihanMenu === 1) {
                echo "Masukan nominal saldo yang akan ditambah: ";
                $nominalTambah = (int)trim(fgets(STDIN));
                $nasabahTerpilih->tambahSaldo($nominalTambah);
            } elseif ($pilihanMenu === 2) {
                echo "Masukan nominal saldo yang akan di ambil: ";
                $nominalAmbil = (int)trim(fgets(STDIN));
                $nasabahTerpilih->ambilUang($nominalAmbil);
            } else {
                echo "Pilihan menu tidak valid.\n";
            }

            echo "Kembali ke menu awal : y/n ";
            $kembali = trim(fgets(STDIN));
            if (strtolower($kembali) !== 'y') {
                break;
            }
        }
    }
}

$aplikasi = new AplikasiTabungan();
$aplikasi->jalankan();

?>