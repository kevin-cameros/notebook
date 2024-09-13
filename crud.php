<?php
header('Content-Type: application/json'); // Asegúrate de enviar siempre un JSON

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db.php';

// Decodificar los datos enviados desde JS (JSON)
$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    // Asignar valores
    $nombre = $data['nombre'];
    $apellido = $data['apellido'];
    $password = password_hash($data['password'], PASSWORD_DEFAULT);
    $username = $data['usuario'];
    $email = $data['email'];

    // Preparar la consulta
    $sql = "INSERT INTO usuarios (usuario,nombre,apellido,correo,contraseña) VALUES (?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $username, $nombre, $apellido, $email, $password);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo json_encode(["message" => "Registro insertado exitosamente."]);
    } else {
        echo json_encode(["error" => "Error al insertar el registro: " . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["error" => "Datos no válidos."]);
}
?>