<?php
$pinjaman = 1000000;
$bungaPersen = 10;
$totalPinjaman = $pinjaman + ($pinjaman * $bungaPersen / 100);
$lamaAngsuranBulan = 5;

$angsuranPerBulan = $totalPinjaman / $lamaAngsuranBulan;
$keterlambatanHari = 40;

$dendaPerHari = 0.0015 * $angsuranPerBulan;
$totalDenda = $dendaPerHari * $keterlambatanHari;

$besaranPembayaran = $angsuranPerBulan + $totalDenda;

echo "TOKO PEGADAIAN SYARIAH\n <br>";
echo "Jl. Keadilan No. 16\n <br>";
echo "Telp. 72353459\n <br> <br>";
echo "Program Perhitungan Besaran Angsuransi Hutang\n <br> <br>";
echo "Besaran Pinjaman : Rp." . number_format($pinjaman, 0, ',', '.')."\n <br>";
echo "Masukan besar bunga (%) : " . $bungaPersen . "\n <br>";
echo "Total Pinjaman : Rp." . number_format($totalPinjaman, 0, ",,.")."\n <br>";
echo "Lama angsuran (bulan) : " . $lamaAngsuranBulan . "\n <br>";
echo "Besar Angsuran : Rp." . number_format($angsuranPerBulan, 0, ",,.")."\n <br>";
echo "Keterlambatan Angsuran (Hari): " . $keterlambatanHari . "\n <br>";
echo "Denda Keterlambatan : Rp." . number_format($totalDenda, 0, ",,.")."\n <br>";
echo "Besaran Pembayaran : Rp." . number_format($besaranPembayaran, 0, ",,.")."\n <br>";

?>
