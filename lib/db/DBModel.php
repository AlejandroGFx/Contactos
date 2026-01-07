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

    public  function save(string $table, array $data): bool
    {
        $keys = array_keys($data);
        $fields = implode(', ', $keys);
        $placeholders = ':' . implode(', :', $keys);
        $sql = "INSERT INTO $table ($fields) VALUES ($placeholders)";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }
}