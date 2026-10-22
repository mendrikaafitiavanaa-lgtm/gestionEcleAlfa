<div class="container-fluid py-3 small">

    <!-- Bouton retour -->
    <div class="text-center mb-4">
        <?php echo anchor(
            'affichernote/index',
            '<i class="bi bi-arrow-left-circle"></i> Retour',
            'class="btn btn-success btn-sm px-4"'
        ); ?>
    </div>

     <!-- Titre -->
     <div class="row mb-4">
        <div class="col-12">
            <h3 class="fw-bold text-primary">
                <i class="bi bi-pencil-square"></i>
                <?php echo "Affichage Note"; ?>
            </h3>
            <hr>
        </div>
    </div>

     <!-- Informations -->
     <div class="card shadow-sm mb-4">

<div class="card-header bg-primary text-white">
    Liste des Eleves
</div>


</div>
    <!-- ======= Tableau ======= -->
    <div class="table-responsive"  >
		<table class='table-condensed  table-striped col-md-10' >
			<thead >
				<tr>
					<th class="align-middle">#</th>
					<th class="align-middle"> Trimestre </th> 
					<th class="align-middle"> Matricule </th>
                    <th class="align-middle"> N° Classe </th>
                    <th class="align-middle"> Nom </th>
                    <th class="align-middle"> Prenom </th>	
				</tr>
			</thead>
		

		<?php foreach($liste_noteparcLassetrimestre as $row):  ?>
				<?php //var_dump($direction);die();  ?>
		    <tr>
		    	<td><?php echo "<input type=\"checkbox\"  class=\"form-check-input\"/>"; ?></td>
			    <td><?php echo $row->numtrimestre; ?></td>
                <td><?php echo $row->matricule; ?></td>
		        <td><?php echo $row->numerodeclasse; ?></td>
                <td><?php echo $row->nom; ?></td>
                <td><?php echo $row->prenom; ?></td>
		        
		        <td><?php echo anchor('affichernote/detailnote/'.$row->numtrimestre ."/". $row->matricule ,'Afficher Note' ,'class = "btn btn-primary btn-sm"'); ?></td>
		        <td ><?php echo anchor('exporterpdf/index/'.$row->numtrimestre ."/". $row->matricule ,'Exporter PDF' , 'class = "btn btn-primary btn-sm"'); ?></td>
		    </tr>
		<?php endforeach; ?>
		</table>
	</div>
</div>
