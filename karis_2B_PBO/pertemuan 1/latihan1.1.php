<?php
Class Mobil {
    var $jumlahRoda=4;
    var $warna="Pink";
    var $bahanbakar="Pertanax";
    var $harga=120000000;
    var $merek='A';

        public function getjumlahRoda(){
            return "$this->jumlahRoda";
        }

        public function getstatusHarga(){
            if ($this->harga > 50000000) $status = " Mahal";
            else $status = " Murah";
            return "$status";
        }

}

$object1 = new Mobil();
$object2 =new Mobil();
$object3 = new Mobil(); 

echo $object1->getjumlahRoda();
echo $object1->getstatusHarga();
?>