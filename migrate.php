<?php

include 'encryption.php';
include 'db.php';

for ($i = 1; $i <= 10; $i++) {
    // Your code here
    $user = $conn->query("SELECT * FROM users WHERE id = $i")->fetch_assoc();

    $name = encryptText($user["name"]);
    $email = encryptText($user["email"]);
    $no_wa = encryptText($user["no_wa"]);
    $address = encryptText($user["address"]);

    $conn->query("UPDATE users SET name = '$name', email = '$email', no_wa = '$no_wa', address = '$address' WHERE id = $i");
}
