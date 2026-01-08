<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../lib/db/db.php'; // Aquí obtenemos el objeto $pdo
use Contactos\models\Contact;

$json = file_get_contents('php://input');
$data = json_decode($json, true);

if (!$data || !isset($data['name']) || !isset($data['email'])){
    http_response_code(400);
    echo json_encode(["error" => 'Nombre y email son obligatorios']);
    exit;
}
$contactModel = new Contact($pdo);

if (!$contactModel->isValidEmail($data['email'])) {
    http_response_code(400);
    echo json_encode(["error" => 'El formato del email no es válido']);
    exit;
}

$success = $contactModel->save(($contactModel->table), [
    'name' => $data['name'],
    'email' => $data['email']
]);

if ($success){
    echo  json_encode(["message" => "Contacto creado correctamente"]);
}else{
    http_response_code(500);
    echo  json_encode(["error" => "Error interno al intentar guardar"]);
}