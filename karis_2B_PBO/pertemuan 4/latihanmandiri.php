<?php
class Segitiga {
    private $tinggi;
    
    function setTinggi($tinggi) {
        $this->tinggi = $tinggi;
    }
    
    function getTinggi() {
        return $this->tinggi;
    }
    
    function segitigaKiri() {
        $t = $this->getTinggi();
        for ($i = 1; $i <= $t; $i++) {
            echo str_repeat("* ", $i) . "<br>";
        }
    }
    
    function segitigaTengah() {
        $t = $this->getTinggi();
        for ($i = 1; $i <= $t; $i++) {
            echo str_repeat(" ", $t - $i);
            echo str_repeat("*", $i) . "<br>";
        }
    }
    
    function segitigaKanan() {
        $t = $this->getTinggi();
        for ($i = 1; $i <= $t; $i++) {
            echo str_repeat(" ", $t - $i);
            echo str_repeat("* ", $i) . "<br>";
        }
    }
}

$segitiga = new Segitiga();
$segitiga->setTinggi(6);

echo "<pre>";
$segitiga->segitigaKiri();
echo "\n";
$segitiga->segitigaTengah();
echo "\n";
$segitiga->segitigaKanan();
echo "</pre>";

?>