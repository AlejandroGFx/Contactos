<?php

header('Content-Type: application/json');
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../lib/db/db.php';

use Contactos\models\Contact;

$contactModel = new Contact($pdo);
$contacts = $contactModel->getAllContacts();

echo json_encode($contacts);