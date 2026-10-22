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

<div class="container ">
	<div class="row">
		<div class="col-md-10">
			<h1 class ="newh1"> <?php echo 'Listes des Matieres'; ?></h1><!--$titre_edit-->
	</div>
		
		

	<div class="row mt-3">
        <div class="col-md-12">
		<p ><?php echo anchor('matiere/show_add','➕ Ajouter','class = "btn btn-primary btn-sm px-3"') ; ?></p>
		
		<div class="table-responsive"  >
			<table class='table table-striped table-hover col-md-10' >
				<thead >
					<tr>
						<td><?php echo "<input type=\"checkbox\"/>"; ?></td>
						<th> Identification </th> <th> Nom </th><th>Actions </th>  
						
					</tr>
				</thead>
			

			<?php foreach($liste_matieres as $matieres):  ?>
					<?php //var_dump($classes);die();  ?>
				<tr>
					<td><?php echo "<input type=\"checkbox\"/>"; ?></td>
						<td><?php echo $matieres->idmatiere; ?></td>
					<td><?php echo $matieres->nommatiere; ?></td>
								
					
					<td><?php echo anchor('matiere/show_update/'.$matieres->idmatiere,'<i class="bi bi-pen"></i>' ,'class = "btn btn-success"'); ?>
					<?php echo anchor('matiere/suppression/'.$matieres->idmatiere,'<i class="bi bi-trash"></i>' , 'class = "btn btn-danger menu_delete_article"'); ?></td>
				</tr>
			<?php endforeach; ?>
			</table>
			
			<!-- Pagination en bas -->
			<div class="d-flex justify-content-center mt-3">
                <?php echo $this->pagination->create_links(); ?>
            </div>
		</div>
	</div>
</div>