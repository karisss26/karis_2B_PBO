<?php
// Parent class Tabungan (Savings)
class Tabungan {
    protected $saldo;

    public function __construct($saldo_awal) {
        $this->saldo = $saldo_awal;
    }

    public function getSaldo() {
        return $this->saldo;
    }

    public function setorTunai($jumlah) {
        if ($jumlah > 0) {
            $this->saldo += $jumlah;
        }
    }

    public function tarikTunai($jumlah) {
        if ($jumlah > 0 && $jumlah <= $this->saldo) {
            $this->saldo -= $jumlah;
        }
    }
}

// Child classes for each student
class Siswa1 extends Tabungan {
    private $nama = "Siswa 1";
    public function getNama() {
        return $this->nama;
    }
}

class Siswa2 extends Tabungan {
    private $nama = "Siswa 2";
    public function getNama() {
        return $this->nama;
    }
}

class Siswa3 extends Tabungan {
    private $nama = "Siswa 3";
    public function getNama() {
        return $this->nama;
    }
}

// Create student objects with initial saldo
$siswa1 = new Siswa1(100000);
$siswa2 = new Siswa2(150000);
$siswa3 = new Siswa3(200000);

// Store students in an array
$siswaArray = [
    1 => $siswa1,
    2 => $siswa2,
    3 => $siswa3
];

// Open input stream for command prompt interaction
$input = fopen("php://stdin", "r");

echo "========== Pilih Siswa yang Mau Transaksi ==========\n";
echo "1. Siswa 1\n";
echo "2. Siswa 2\n";
echo "3. Siswa 3\n";
echo "Masukkan pilihan (1/2/3): ";
$pilihan = trim(fgets($input));

if (isset($siswaArray[$pilihan])) {
    $siswa = $siswaArray[$pilihan];
    echo "\nSaldo Awal: Rp " . $siswa->getSaldo() . "\n";

    echo "\n========== Pilih Transaksi ==========\n";
    echo "1. Setor Tunai\n";
    echo "2. Tarik Tunai\n";
    echo "Masukkan pilihan (1/2): ";
    $jenisTransaksi = trim(fgets($input));

    if ($jenisTransaksi == 1) {
        echo "Masukkan jumlah setor tunai: ";
        $jumlah = trim(fgets($input));
        if (is_numeric($jumlah) && $jumlah > 0) {
            $siswa->setorTunai((int)$jumlah);
            echo "Setoran berhasil!\n";
        } else {
            echo "Input tidak valid.\n";
        }
    } elseif ($jenisTransaksi == 2) {
        echo "Masukkan jumlah tarik tunai: ";
        $jumlah = trim(fgets($input));
        if (is_numeric($jumlah) && $jumlah > 0) {
            $siswa->tarikTunai((int)$jumlah);
            echo "Penarikan berhasil!\n";
        } else {
            echo "Input tidak valid.\n";
        }
    } else {
        echo "Pilihan transaksi tidak valid.\n";
    }

    echo "\nSaldo Akhir " . $siswa->getNama() . ": Rp " . $siswa->getSaldo() . "\n";
} else {
    echo "Pilihan siswa tidak valid.\n";
}

fclose($input);

?>