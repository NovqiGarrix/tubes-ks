<?php

function getPublicKey()
{
    // URL: https://pub-f4f78a8f0c904b63aa27317491f0850e.r2.dev/public_key.pem
    $publicKeyUrl = "https://pub-f4f78a8f0c904b63aa27317491f0850e.r2.dev/public_key.pem";
    $publicKeyContents = file_get_contents($publicKeyUrl);
    return $publicKeyContents;
}

function getPrivateKey()
{
    // URL: https://pub-f4f78a8f0c904b63aa27317491f0850e.r2.dev/private_key.pem
    $privateKeyUrl = "https://pub-f4f78a8f0c904b63aa27317491f0850e.r2.dev/private_key.pem";
    // $privateKeyUrl = "./private_key.pem";
    $privateKeyContents = file_get_contents($privateKeyUrl);
    return $privateKeyContents;
}

function encryptText($text)
{
    // Load the public key
    $publicKey = openssl_pkey_get_public(getPublicKey());

    // Encrypt the text using the public key
    openssl_public_encrypt($text, $encryptedText, $publicKey);

    // Encode the encrypted text in base64 format
    $encodedText = base64_encode($encryptedText);

    // Return the encrypted and encoded text
    return $encodedText;
}

function decryptText($encryptedText)
{
    // Load the private key
    $privateKey = openssl_pkey_get_private(getPrivateKey());
    // Decode the encrypted text from base64 format
    $decodedText = base64_decode($encryptedText);
    // Decrypt the text using the private key
    openssl_private_decrypt($decodedText, $decryptedText, $privateKey);
    // Return the decrypted text
    return $decryptedText;
}
