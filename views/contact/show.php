<h1><?= $params['contact']->nom ?> <?= $params['contact']->prenom ?></h1>
<div>
    <?php foreach ($params['contact']->getTypes() as $type) : ?>
        <span class="badge badge-info"><?= $type->libelle?></span>
    <?php endforeach ?>
</div>
<p><?= $params['contact']->numero_tel ?></p>
<a href="/ges_contact_simplon/contacts" class="btn btn-secondary">Retourner en arrière</a>
