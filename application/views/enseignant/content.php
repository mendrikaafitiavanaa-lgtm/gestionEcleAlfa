<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Suppression</h4>
			</div>
			<div class="modal-body" id="deleteModalContent">
				
			</div>
		</div>
	</div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h1 class="newh1">Listes des enseignants</h1>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <p>
                <?php echo anchor('enseignant/show_add','➕ Ajouter','class="btn btn-primary btn-sm px-3"'); ?>
            </p>

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table">
                        <tr>
                            <th><input type="checkbox"/></th>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Naissance</th>
                            <th>Sexe</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($liste_enseignant)): ?>
                            <?php foreach($liste_enseignant as $enseignant): ?>
                                <tr>
                                    <td><input type="checkbox"/></td>
                                    <td><?php echo $enseignant->matrienseignant; ?></td>
                                   
                                    <td><?php echo $enseignant->nomenseignant; ?></td>
                                    <td><?php echo $enseignant->preenseignant; ?></td>
                                    <td><?php echo strftime("%d-%m-%Y",strtotime($enseignant->naissenseignant)); ?></td>
                                    <td><?php echo $enseignant->sexeenseignant; ?></td>
                                    <td><?php echo $enseignant->mailenseignant; ?></td>
                                    <td><?php echo $enseignant->phoneenseignant; ?></td>
                                    
                                    <td>
                                        <?php echo anchor('enseignant/show_update/'.$enseignant->matrienseignant,'<i class="bi bi-pen"></i>','class="btn btn-sm btn-primary"'); ?>
                                        <?php echo anchor('enseignant/suppression/'.$enseignant->matrienseignant,'<i class="bi bi-trash"></i>','class="btn btn-sm btn-danger menu_delete_article"'); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="11" class="text-center">Aucun enseignant trouvé</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination en bas -->
            <div class="d-flex justify-content-center mt-3">
                <?php echo $this->pagination->create_links(); ?>
            </div>
        </div>
    </div>
</div>
