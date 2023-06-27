<? php
$nilai = $_POST['nilai'];

if ($nilai >= 85 && $nilai <= 100) {
    echo "Nilai Anda $nilai, Anda mendapatkan nilai huruf A";
} elseif ($nilai >= 70 && $nilai < 85) {
    echo "Nilai Anda $nilai, Anda mendapatkan nilai huruf B";
} elseif ($nilai >= 60 && $nilai < 70) {
    echo "Nilai Anda $nilai, Anda mendapatkan nilai huruf C";
} elseif ($nilai >= 40 && $nilai < 60) {
    echo "Nilai Anda $nilai, Anda mendapatkan nilai huruf D";
} elseif ($nilai < 40 && $nilai >= 0) {
    echo "Nilai Anda $nilai, Anda mendapatkan nilai huruf E";
} else {
    echo "Nilai tidak valid";
}
?>