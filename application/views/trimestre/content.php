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
			<h1 class ="newh1"> <?php echo 'Listes des trimestre'; ?></h1><!--$titre_edit-->
	</div> 
	


	<div class="row mt-3">
        <div class="col-md-12">
			
			<p ><?php echo anchor('trimestre/show_add','➕ Ajouter','class = "btn btn-primary btn-sm px-3"') ; ?></p>
			
			<div class="table-responsive"  >
				<table class='table table-striped table-hover col-md-10' >
					<thead >
						<tr>
							<td><?php echo "<input type=\"checkbox\"/>"; ?></td>
							<th> Numero </th> <th> Libellé </th><th>Actions </th>  
							
						</tr>
					</thead>
				

					<?php foreach($liste_trimestre as $trimestre):  ?>
							<?php //var_dump($classes);die();  ?>
						<tr>
							<td><?php echo "<input type=\"checkbox\"/>"; ?></td>
								<td><?php echo $trimestre->numtrimestre; ?></td>
							<td><?php echo $trimestre->libtrimestre; ?></td>
										
							
							<td><?php echo anchor('trimestre/show_update/'.$trimestre->numtrimestre,'<i class="bi bi-pen"></i>' ,'class = "btn btn-success"'); ?>
						<?php echo anchor('trimestre/suppression/'.$trimestre->numtrimestre,'<i class="bi bi-trash"></i>' , 'class = "btn btn-danger menu_delete_article"'); ?></td>
						</tr>
					<?php endforeach; ?>
				</table>
				
			</div>

				<!-- Pagination en bas -->
			<div class="d-flex justify-content-center mt-3">
				<?php echo $this->pagination->create_links(); ?>
			</div>
		</div>
	</div>
</div>