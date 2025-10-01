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
$siswaArray = [$siswa1, $siswa2, $siswa3];

// Display initial saldo
echo "\n==========Saldo Awal Masing-masing Siswa:==========\n";
foreach ($siswaArray as $siswa) {
    echo $siswa->getNama() . ": Rp " . $siswa->getSaldo() . "\n";
}

// Open input stream for command prompt interaction
$input = fopen("php://stdin", "r");

do {
    echo "\nPilih siswa untuk transaksi:\n";
    foreach ($siswaArray as $index => $siswa) {
        echo ($index + 1) . ". " . $siswa->getNama() . "\n";
    }
    echo "0. Keluar\n";
    echo "Masukkan pilihan: ";
    $pilihan = trim(fgets($input));

    if ($pilihan == "0") {
        break;
    }

    if (!is_numeric($pilihan) || $pilihan < 1 || $pilihan > count($siswaArray)) {
        echo "Pilihan tidak valid. Silakan coba lagi.\n";
        continue;
    }

    $siswaDipilih = $siswaArray[$pilihan - 1];

    do {
        echo "\nTransaksi untuk " . $siswaDipilih->getNama() . ":\n";
        echo "1. Setor Tunai\n";
        echo "2. Tarik Tunai\n";
        echo "Masukkan pilihan transaksi: ";
        $transaksi = trim(fgets($input));

        switch ($transaksi) {
            case "1":
                echo "Masukkan jumlah setor tunai: ";
                $jumlahSetor = trim(fgets($input));
                if (is_numeric($jumlahSetor) && $jumlahSetor > 0) {
                    $siswaDipilih->setorTunai((int)$jumlahSetor);
                    echo "Setor tunai berhasil.\n";
                } else {
                    echo "Jumlah tidak valid.\n";
                }
                break;
            case "2":
                echo "Masukkan jumlah tarik tunai: ";
                $jumlahTarik = trim(fgets($input));
                if (is_numeric($jumlahTarik) && $jumlahTarik > 0) {
                    if ($jumlahTarik <= $siswaDipilih->getSaldo()) {
                        $siswaDipilih->tarikTunai((int)$jumlahTarik);
                        echo "Tarik tunai berhasil.\n";
                    } else {
                        echo "Saldo tidak cukup.\n";
                    }
                } else {
                    echo "Jumlah tidak valid.\n";
                }
                break;
            case "3":
                // Ganti siswa, keluar dari transaksi loop
                break 2;
            case "0":
                // Keluar program
                fclose($input);
                echo "\n==========Saldo Akhir Masing-masing Siswa:==========\n";
                foreach ($siswaArray as $siswa) {
                    echo $siswa->getNama() . ": Rp " . $siswa->getSaldo() . "\n";
                }
                exit;
            default:
                echo "Pilihan transaksi tidak valid.\n";
        }

        echo "Saldo saat ini: Rp " . $siswaDipilih->getSaldo() . "\n";

        echo "Apakah ingin melanjutkan transaksi untuk siswa ini? (y/n): ";
        $lanjut = trim(fgets($input));
    } while (strtolower($lanjut) == 'y');

} while (true);

fclose($input);

echo "\n==========Saldo Akhir Masing-masing Siswa:==========\n";
foreach ($siswaArray as $siswa) {
    echo $siswa->getNama() . ": Rp " . $siswa->getSaldo() . "\n";
}

?>
