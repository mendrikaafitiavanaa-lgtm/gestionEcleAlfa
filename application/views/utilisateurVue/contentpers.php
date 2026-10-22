<div class="container-fluid" style="font-size: 0.85rem;">
    
    <div class="row mb-3">
        <div class="col-12">
            <h1 class="fw-semibold mb-3" style="font-size: 1.2rem;">
                <?php echo 'Liste des Utilisateurs'; ?>
            </h1>
        </div>
    </div>

	<!-- Bouton Liste -->
	<div class="row mb-3">
		<div class="col-md-10 text-left">
			<?php echo anchor('utilisateur/index', 'LISTE', 'class="btn btn-sm btn-success"'); ?> 
		</div>
	</div>

	<!-- ======= Tableau ======= -->
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-sm align-middle">
                    <thead class="table-light">
                        <tr>
                            <th></th>
                            <!--<th>Identifiant </th>--> 
                            <th>Login </th> 
                            <th>Mot de passe </th>
                            <th>Role </th> 
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
					<tbody>
                        <!--<?php //var_dump($liste_users);die(); ?>-->
                        <?php foreach($liste_users as $user): ?> 
                            <tr>
                                <td><input type="checkbox" /></td>
                                <!--<td><?php echo $user->Id_User;  ?></td>--> 
                                <td><?php echo $user->Login;  ?></td>
                                <td><?php echo $user->Password;   ?></td>
                                <td><?php echo $user->Role;   ?></td>
                                <td class="text-center">
                                    <?php echo anchor('utilisateur/show_update/'.$user->Id_User,
                                        '<i class="bi bi-pencil"></i>',
                                        'class="btn btn-primary btn-sm me-1" title="Modifier"'); ?>
                                    <?php echo anchor('utilisateur/suppression/'.$user->Id_User,
                                        '<i class="bi bi-trash"></i>',
                                        'class="btn btn-danger btn-sm" title="Supprimer"'); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php if (empty($liste_users)) : ?>
    	            <tr>
        	            <td colspan="8" class="text-center">Aucun utilisateur trouvée.</td>
    	            </tr>
                <?php endif; ?>
            </tbody>
        </table>
        </div>

			<p class="mt-3">
                <?php echo $this->pagination->create_links(); ?>
            </p>
        </div>
  </div>
</div>
