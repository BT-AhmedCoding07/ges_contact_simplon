<h1>Administration des contacts</h1>

<a href="/ges_contact_simplon/admin/contacts/create" class="btn btn-success my-3">Créer un nouvel contact</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Prénom</th>
            <th scope="col">Nom</th>
            <th scope="col">Numéro</th>
            <th scope="col">Ajouté le</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($params['contacts'] as $contact) : ?>
            <tr>
                <th scope="row"><?= $contact->id ?></th>
                <td><?= $contact->nom ?></td>
                <td><?= $contact->prenom ?></td>
                <td><?= $contact->numero_tel ?></td>
                <td><?= $contact->getCreatedAt() ?></td>
                <td>
                    <a href="/ges_contact_simplon/admin/contacts/edit/<?= $contact->id ?>" class="btn btn-warning">Modifier</a>
                    <form action="/ges_contact_simplon/admin/contacts/delete/<?= $contact->id ?>" method="POST" class="d-inline">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                    <a href="/ges_contact_simplon/admin/contacts/edit/<?= $contact->id ?>" class="btn btn-info">Marquer comme faavori</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
