<? php
$rows = 5; 

for ($i = 1; $i <= $rows; $i++) {
    
    for ($j = $rows - $i; $j > 0; $j--) {
        echo "&nbsp;&nbsp;";
    }

    // Membuat bintang
    for ($k = 1; $k <= (2 * $i - 1); $k++) {
        echo "*";
    }

    // Pindah ke baris baru
    echo "<br>";
}
?>
