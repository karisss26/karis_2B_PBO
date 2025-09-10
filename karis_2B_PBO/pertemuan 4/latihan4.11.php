<?php
class Perulangan {
    public function loop() {
        $i = 0;
        do {
            $i++;
            echo $i . '<br />';
        } while ($i <= 9);
    }
}

$objekPerulangan = new Perulangan();
echo $objekPerulangan->loop() . "<br />";

?>