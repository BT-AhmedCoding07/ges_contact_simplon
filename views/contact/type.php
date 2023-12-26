<h1><?= $params['type']->libelle ?></h1>

<?php foreach ($params['type']->getContacts() as $contact) : ?>
    <div class="card mb-3">
        <div class="card-body">
            <a><a href="/ges_contact_simplon/contacts/<?= $contact->id ?>"><?= $contact->nom ?></a></a>
        </div>
    </div>
<?php endforeach ?>
