<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Contact;
use App\Models\Type;

class ContactController extends Controller {

    public function index()
    {
        //$this->isAdmin();

        $contacts = (new Contact($this->getDB()))->all();

        return $this->view('admin.contact.index', compact('contacts'));
    }

    public function create()
    {
        //$this->isAdmin();

        $types = (new Type($this->getDB()))->all();

        return $this->view('admin.contact.form', compact('types'));
    }

    public function createContact()
    {
        //$this->isAdmin();

        $contact = new Contact($this->getDB());

        $types = array_pop($_POST);

        $result = $contact->create($_POST, $types);

        if ($result) {
            return header('Location: /ges_contact_simplon/admin/contacts');
        }
    }

    public function edit(int $id)
    {
        //$this->isAdmin();

        $contact = (new Contact($this->getDB()))->findById($id);
        $types = (new Type($this->getDB()))->all();

        return $this->view('admin.contact.form', compact('contact', 'types'));
    }

    public function update(int $id)
    {
             //$this->isAdmin();

        $contact = new Contact($this->getDB());

        $types = array_pop($_POST);

        $result = $contact->update($id, $_POST, $types);

        if ($result) {
            return header('Location: /ges_contact_simplon/admin/contacts');
        }
    }

    public function destroy(int $id)
    {
        //$this->isAdmin();

        $contact = new Contact($this->getDB());
        $result = $contact->destroy($id);

        if ($result) {
            return header('Location: /ges_contact_simplon/admin/contacts');
        }
    } 
}
