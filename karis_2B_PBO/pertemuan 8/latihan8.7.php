<?php

//create function with an exception
function checkNum($number) {
    if ($number > 1) {
        throw new Exception("Value must be 1 or below");
    }
    return true;
}

//trigger exception in a "try" block
try {
    checkNum(2);
}

//catch exception
catch(Exception $e) {
    echo 'Error: ' . $e->getMessage();
}

?>