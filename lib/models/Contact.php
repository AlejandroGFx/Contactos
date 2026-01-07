<?php

namespace Contactos\models;

use Contactos\models\db\Contact as DbContact;

class Contact extends DbContact
{
    public function isValidEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function getAllContacts(): array{
        return $this->all($this->table);
    }
}