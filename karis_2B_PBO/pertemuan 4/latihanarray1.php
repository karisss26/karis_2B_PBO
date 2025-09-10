<?php

class Mahasiswa {
    var $nama;
    var $kelas;
    var $mataKuliah;
    var $nilai;

    function setNama($nama) {
        $this->nama = $nama;
    }

    function setKelas($kelas) {
        $this->kelas = $kelas;
    }

    function setMataKuliah($mataKuliah) {
        $this->mataKuliah = $mataKuliah;
    }

    function setNilai($nilai) {
        $this->nilai = $nilai;
    }

    function getNama() {
        return $this->nama;
    }

    function getKelas() {
        return $this->kelas;
    }

    function getMataKuliah() {
        return $this->mataKuliah;
    }

    function getNilai() {
        return $this->nilai;
    }

    function statusKuis() {
        if ($this->nilai >= 75) {
            return "Lulus Kuis";
        } else {
            return "Tidak Lulus Kuis";
        }
    }
}

$mahasiswaList = [];

$mhs1 = new Mahasiswa();
$mhs1->setNama("Aditya");
$mhs1->setKelas("SI 2");
$mhs1->setMataKuliah("Pemrograman Berorientasi Objek");
$mhs1->setNilai(80);

$mhs2 = new Mahasiswa();
$mhs2->setNama("Shinta");
$mhs2->setKelas("SI 2");
$mhs2->setMataKuliah("Pemrograman Berorientasi Objek");
$mhs2->setNilai(75);

$mhs3 = new Mahasiswa();
$mhs3->setNama("Ineu");
$mhs3->setKelas("SI 2");
$mhs3->setMataKuliah("Pemrograman Berorientasi Objek");
$mhs3->setNilai(55);

$mahasiswaList[] = $mhs1;
$mahasiswaList[] = $mhs2;
$mahasiswaList[] = $mhs3;

foreach ($mahasiswaList as $mhs) {
    echo "Nama : " . $mhs->getNama() . "<br>";
    echo "Kelas : " . $mhs->getKelas() . "<br>";
    echo "Mata Kuliah : " . $mhs->getMataKuliah() . "<br>";
    echo "Nilai : " . $mhs->getNilai() . "<br>";
    echo $mhs->statusKuis() . "<br>";
    echo "<hr>";
}

?>