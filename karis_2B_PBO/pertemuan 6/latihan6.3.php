<?php
class KonversiSuhu {
private $celsius;

// Constructor
public function __construct($celsius) {
$this->celsius = $celsius;
}

// Fungsi konversi (array)
public function konversiSemua() {
return [
"celsius" => $this->celsius,
"kelvin" => $this->celsius + 273.15,
"fahrenheit" => (9/5) * $this->celsius + 32,
"reamur" => (4/5) * $this->celsius
];
}
}

// === INPUT GET ===
$c = isset($_GET['c']) ? $_GET['c'] : 36; // default 36 derajat

// === BUAT OBJEK ===
$suhu = new KonversiSuhu($c);

// === HASIL ===
$hasil = $suhu->konversiSemua();

echo "Konversi Suhu dari Celcius <br/>";

// === PERULANGAN + PERCABANGAN ===
foreach ($hasil as $satuan => $nilai) {
if ($satuan == "celsius") {
echo "Suhu dalam Celsius = $nilai derajat <br>";
} elseif ($satuan == "kelvin") {
echo "Suhu dalam Kelvin = $nilai derajat <br>";
} elseif ($satuan == "fahrenheit") {
echo "Suhu dalam Fahrenheit = $nilai derajat <br>";
} elseif ($satuan == "reamur") {
echo "Suhu dalam Reamur = $nilai derajat <br>";
}
}
echo "Sekian konversi suhu yang bisa ditampilkan
";
?>