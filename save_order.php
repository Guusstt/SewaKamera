<?php
// Mendapatkan data yang diinputkan oleh pengguna
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$cart = $_POST['cart'];

// Menggabungkan data menjadi satu string
$orderData = "Nama: " . $name . "\n" .
             "Nomor Telepon: " . $phone . "\n" .
             "Email: " . $email . "\n\n" .
             "Barang yang Dipesan:\n" . $cart;

// Menyimpan data ke file teks
$filename = "order.txt";
file_put_contents($filename, $orderData, FILE_APPEND);
?>
