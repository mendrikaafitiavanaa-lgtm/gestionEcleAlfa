<div class="container-fluid" style="font-size: 0.85rem;">
    <div class="row mb-3">
        <div class="col-12">
            <h1 class="fw-semibold mb-3" style="font-size: 1.2rem;">
                Liste des Utilisateurs
            </h1>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-10 text-left">
            <?php echo anchor('utilisateur/show_add', '➕ Ajouter', 'class="btn btn-sm btn-success"'); ?> 
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-sm align-middle">
                    <thead class="table-light">
                        <tr>
                            <th></th>
                            <th>Login</th> 
                            <th>Mot de passe</th>
                            <th>Role</th> 
                            <th>Tentatives</th>
                            <th>Bloqué</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($liste_users)): ?>
                            <?php foreach($liste_users as $user): ?> 
                                <tr>
                                    <td><input type="checkbox" /></td>
                                    <td><?php echo $user->login; ?></td>
                                    <td><?php echo $user->password; ?></td>
                                    <td><?php echo $user->role; ?></td>
                                    <td><?php echo $user->nbrtentative; ?></td>
                                    <td><?php echo $user->bloque; ?></td>
                                    <td class="text-center">
                                        <?php echo anchor('utilisateur/show_update/'.$user->login,
                                            '<i class="bi bi-pencil"></i>',
                                            'class="btn btn-primary btn-sm me-1" title="Modifier"'); ?>
                                        <?php echo anchor('utilisateur/suppression/'.$user->login,
                                            '<i class="bi bi-trash"></i>',
                                            'class="btn btn-danger btn-sm" title="Supprimer"'); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center">Aucun utilisateur trouvé.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="text-center mt-3">
                <?php echo $this->pagination->create_links(); ?>
            </div>
        </div>
    </div>
</div>
