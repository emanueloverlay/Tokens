<?php

// Clave secreta para firmar el token
$secretKey = 'asd123'; // Cambia esto a una clave segura

// Función para crear un token
function createToken($username)
{
    global $secretKey;
    // Crear el token como una cadena de texto (puedes usar un método más seguro)
    $token = base64_encode(json_encode(['username' => $username, 'exp' => time() +
        30]));
    $signature = hash_hmac('sha256', $token, $secretKey);
    return $token . '.' . $signature; // Formato: token.signature
}
// Función para verificar el token
function verifyToken($token)
{
    global $secretKey;
    list($encodedPayload, $signature) = explode('.', $token);

    // Verificar la firma
    if (hash_hmac('sha256', $encodedPayload, $secretKey) !== $signature) {
        return null; // Token inválido
    }
    $payload = json_decode(base64_decode($encodedPayload), true);

    // Veriﬁcar si el token ha expirado
    if ($payload['exp'] < time()) {
        return null; // Token expirado
    }
    return $payload; // Token válido
}