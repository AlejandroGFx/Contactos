<?php
namespace Contactos\models\db;

use Contactos\db\DBModel;

class Contact extends DBModel
{
    public string $table = 'contacts';

    public string $idName = 'id';
}