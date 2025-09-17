<?php

class manusia {
    public $nama;
    public $umur;
    public $gender;

    function biodata() {
        echo "Selamat Datang<br/>";
    }

    function getInfo() {
        echo "Nama  : " . $this->nama . "<br/>";
        echo "Umur  : " . $this->umur . "<br/>";
        echo "JK    : " . $this->gender . "<br/>";
    }
}

class ayah extends manusia {
    function pekerjaan() {
        echo "Pegawai Negeri Sipil<br/>";
    }
}

class ibu extends manusia {
    function pekerjaan() {
        echo "Ibu Rumah Tangga<br/>";
    }
}

class anak extends manusia {
    function pekerjaan() {
        echo "Pelajar<br/>";
    }
}

// --- Buat object ayah ---
$objectAyah = new ayah();
$objectAyah->nama = "Joko";
$objectAyah->umur = 45;
$objectAyah->gender = "Laki-laki";
$objectAyah->biodata();
$objectAyah->getInfo();
$objectAyah->pekerjaan();

echo "<br/>";

// --- Buat object ibu ---
$objectIbu = new ibu();
$objectIbu->nama = "Susi";
$objectIbu->umur = 38;
$objectIbu->gender = "Perempuan";
$objectIbu->biodata();
$objectIbu->getInfo();
$objectIbu->pekerjaan();

echo "<br/>";

// --- Buat object anak ---
$objectAnak = new anak();
$objectAnak->nama = "Andi";
$objectAnak->umur = 15;
$objectAnak->gender = "Laki-laki";
$objectAnak->biodata();
$objectAnak->getInfo();
$objectAnak->pekerjaan();
?>