<?php

class customException extends Exception {
    private $email;

    public function __construct($message, $email = '') {
        parent::__construct($message);
        $this->email = $email;
    }

    public function errorMessage() {
        return "Error: Email '" . $this->email . "' tidak mengandung kata 'lab4' dan E-mail tidak valid";
    }
}

// Data array email
$emails = [
    'lab4a@polsub.ac.id',
    'lab4b@polsub.ac.id',
    'lab4d@polsub.ac.id',
    'lab4f@polsub.ac.id',
    'lab5a@polsub.ac.id',
    'lab5b@polsub.ac.id',
    'lab5c@polsub.ac.id',
    'someone@example...com', // Contoh email tidak valid
    'lab4-contoh@polsub.ac.id' // Contoh email valid
];

$validCount = 0;
$invalidCount = 0;

echo "<h3>Hasil Validasi Email</h3>";

foreach ($emails as $email) {
    try {
        // Validasi format email
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
            throw new Exception("Email tidak valid");
        }

        // Validasi kata kunci 'lab4'
        if (strpos($email, 'lab4') === FALSE) {
            throw new customException("Email tidak mengandung 'lab4'", $email);
        }

        // Jika lolos semua validasi
        echo "Email **{$email}** valid.<br>";
        $validCount++;

    } catch (customException $e) {
        // Tangani custom exception (email tidak mengandung 'lab4')
        echo $e->errorMessage() . "<br>";
        $invalidCount++;
    } catch (Exception $e) {
        // Tangani exception umum (format email tidak valid)
        echo "Error: Email '" . $email . "' tidak valid. " . $e->getMessage() . "<br>";
        $invalidCount++;
    }
}

echo "<br>";
echo "<h4>Rekapitulasi</h4>";
echo "Jumlah email valid: {$validCount}<br>";
echo "Jumlah email tidak valid: {$invalidCount}<br>";

?>