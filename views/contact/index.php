<h1>Listes des derniers contacts</h1>
<?php foreach ($params['contacts'] as $contact) : ?>
    <div class="card mb-3">
        <div class="card-body">
            <h2><?= $contact->nom ?> <?= $contact->prenom ?></h2>
            <h3><?= $contact->numero_tel ?></h3>
            <div>
                <?php foreach ($contact->getTypes() as $type) : ?>
                    <span class="badge badge-success"><a href="/ges_contact_simplon/types/<?= $type->id ?>" class="text-white"><?= $type->libelle ?></a></span>
                <?php endforeach ?>
            </div>
            <p><small class="text-info">Ajouté le <?= $contact->getCreatedAt() ?></small></p>
            <p><?= $contact->getButton() ?></p>
        </div>
    </div>
<?php endforeach ?>
