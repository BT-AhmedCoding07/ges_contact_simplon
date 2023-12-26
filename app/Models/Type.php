<?php

namespace App\Models;

class Type extends Model
{

    protected $table = 'types';

    public function getContacts()
    {
        return $this->query("
            SELECT c.* FROM contacts c
            INNER JOIN contact_type ct ON ct.contact_id = c.id
            WHERE ct.type_id = ?
        ", [$this->id]);
    }
}
