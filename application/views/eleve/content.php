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
            <h1 class="newh1">Listes des élèves</h1>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <p>
                <?php echo anchor('eleve/show_add','➕ Ajouter','class="btn btn-primary btn-sm px-3"'); ?>
            </p>

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table">
                        <tr>
                            <th><input type="checkbox"/></th>
                            <th>Matricule</th>
                            <th>Numéro de classe</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Naissance</th>
                            <th>Sexe</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Classe</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                            <?php foreach($liste_eleves as $eleve): ?>
                                <tr>
                                    <td><input type="checkbox"/></td>
                                    <td><?php echo $eleve->matricule; ?></td>
                                    <td><?php echo $eleve->numerodeclasse; ?></td>
                                    <td><?php echo $eleve->nom; ?></td>
                                    <td><?php echo $eleve->prenom; ?></td>
                                    <td><?php echo strftime("%d-%m-%Y",strtotime($eleve->naiss)); ?></td>
                                    <td><?php echo $eleve->sexe; ?></td>
                                    <td><?php echo $eleve->mail; ?></td>
                                    <td><?php echo $eleve->phone; ?></td>
                                    <td><?php echo $eleve->idclasse; ?></td>
                                    <td>
                                        <?php echo anchor('eleve/show_update/'.$eleve->matricule,'<i class="bi bi-pen"></i>','class="btn btn-sm btn-primary"'); ?>
                                        <?php echo anchor('eleve/suppression/'.$eleve->matricule,'<i class="bi bi-trash"></i>','class="btn btn-sm btn-danger menu_delete_article"'); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        
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
