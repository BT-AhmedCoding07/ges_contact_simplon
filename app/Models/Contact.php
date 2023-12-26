<?php

namespace App\Models;

use DateTime;

class Contact extends Model {

    protected $table = 'contacts';

    public function getCreatedAt(): string
    {
        return (new DateTime($this->created_at))->format('d/m/Y à H:i');
    }

    // public function getExcerpt(): string
    // {
    //     return substr($this->content, 0, 200) . '...';
    // }

    public function getButton(): string
    {
        return <<<HTML
        <a href="/ges_contact_simplon/contacts/$this->id" class="btn btn-primary">Voir details</a>
HTML;
    }
//regarder d'où la fonction est appéle
    public function getTypes()
    {
        return $this->query(
            "SELECT t.* FROM types t
            INNER JOIN contact_type ct ON ct.type_id = t.id
            WHERE ct.contact_id = ?
        ", [$this->id]);
    }

    public function create(array $data, ?array $relations = null)
    {
        parent::create($data);

        $id = $this->db->getPDO()->lastInsertId();

        foreach ($relations as $typeId) {
            $stmt = $this->db->getPDO()->prepare("INSERT contact_type (contact_id, type_id) VALUES (?, ?)");
            $stmt->execute([$id, $typeId]);
        }

        return true;
    }

    public function update(int $id, array $data, ?array $relations = null)
    {
        parent::update($id, $data);

        $stmt = $this->db->getPDO()->prepare("DELETE FROM contact_type WHERE contact_id = ?");
        $result = $stmt->execute([$id]);

        foreach ($relations as $typeId) {
            $stmt = $this->db->getPDO()->prepare("INSERT contact_type (contact_id, type_id) VALUES (?, ?)");
            $stmt->execute([$id, $typeId]);
        }

        if ($result) {
            return true;
        }

    }
}
