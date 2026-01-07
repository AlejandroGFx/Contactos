<?php

namespace Contactos\db;

use PDO;

abstract  class  DBModel
{
    protected PDO $db;

    public function __construct(PDO $db){
        $this->db = $db;
    }

    public  function all(string $table): array
    {
        $stmt = $this->db->query("SELECT * FROM $table ORDER BY id DESC");
        return $stmt->fetchAll();
    }
}