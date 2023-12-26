<?php

namespace App\Controllers;

use App\Models\Contact;
use App\Models\Type;

class ContactController extends Controller {

    public function welcome()
    {
        return $this->view('contact.welcome');
    }

    public function index()
    {
        $contact  = new Contact($this->getDB());
        $contacts = $contact->all();
        return $this->view('contact.index', compact('contacts'));
    }

    public function show(int $id)
    {
        $contact = new Contact($this->getDB());
        $contact = $contact->findById($id);

        return $this->view('contact.show', compact('contact'));
    }

    public function type(int $id)
    {
        $type = (new Type($this->getDB()))->findById($id);

        return $this->view('contact.type', compact('type'));
    }
}
