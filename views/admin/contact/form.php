<h1><?= $params['contact']->nom ?? 'Créer un nouvel contact' ?></h1>

<form action="<?= isset($params['contact']) ? "/ges_contact_simplon/admin/contacts/edit/{$params['contact']->id}" : "/ges_contact_simplon/admin/contacts/create" ?>" method="POST">
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" name="nom" id="nom" value="<?= $params['contact']->nom ?? '' ?>">
    </div>
    <div class="form-group">
        <label for="prenom">Prenom</label>
        <input type="text" class="form-control" name="prenom" id="prenom" value="<?= $params['contact']->prenom ?? '' ?>">
    </div>
    <div class="form-group">
        <label for="numero_tel">Numéro de téléphone</label>
        <input type="text" class="form-control" name="numero_tel" id="numero_tel" value="<?= $params['contact']->numero_tel ?? '' ?>">
    </div>
    <div class="form-group">
        <label for="types">Type de contact</label>
        <select multiple class="form-control" id="types" name="types[]">
            <?php foreach ($params['types'] as $type) : ?>
                <option value="<?= $type->id ?>"
                <?php if (isset($params['contact'])) : ?>
                <?php foreach ($params['contact']->getTypes() as $contactType) {
                    echo ($type->id === $contactType->id) ? 'selected' : '';
                }
                ?>
                <?php endif ?>><?= $type->libelle ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary"><?= isset($params['contact']) ?'Enregistrer les modifications' : 'Enregistrer mon contact' ?></button>
</form>
