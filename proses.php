<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if ($username == "nopal" && $password == "nopal") {
        echo "Login berhasil!";
    } else {
        echo "Username atau password salah!";
    }
}
?>
