<?php

require_once "../Models/Token.php";

// Rutas
if (
    $_SERVER['REQUEST_METHOD'] === 'POST') {
        //  && $_SERVER['REQUEST_URI'] ===
    // '../Models/Token.php'
    // Simulando un login (en un caso real, validarías con una base de datos)
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    if (($username === 'pepe' || $username === 'lala') && $password === 'asd123') {
        $token = createToken($username);
        echo json_encode(['token' => $token]);
    } else {
        http_response_code(401);
        echo json_encode(['error' => 'Credenciales inválidas']);
    }
} elseif (
    $_SERVER['REQUEST_METHOD'] === 'GET') {
    $headers = getallheaders();
    $token = $headers['Authorization'] ?? '';
    
    // Veriﬁcar el token
    $decoded = verifyToken(str_replace('Bearer ', '', $token));
    if ($decoded) {
        echo json_encode(['message' => 'Acceso permitido', 'username' =>
        $decoded['username']]);
    } else {
        http_response_code(401);
        echo json_encode(['error' => 'Token inválido']);
    }
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Ruta no encontrada']);
}
