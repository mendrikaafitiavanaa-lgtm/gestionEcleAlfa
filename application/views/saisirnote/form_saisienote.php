<div class="container-fluid py-3 small">

    <!-- Bouton retour -->
    <div class="text-center mb-4">
        <?php echo anchor(
            'saisirnote/index',
            '<i class="bi bi-arrow-left-circle"></i> Retour',
            'class="btn btn-success btn-sm px-4"'
        ); ?>
    </div>

     <!-- Titre -->
     <div class="row mb-4">
        <div class="col-12">
            <h3 class="fw-bold text-primary">
                <i class="bi bi-pencil-square"></i>
                <?php echo "Saisie Note"; ?>
            </h3>
            <hr>
        </div>
    </div>

     <!-- Informations -->
     <div class="card shadow-sm mb-4">

<div class="card-header bg-primary text-white">
    Informations
</div>

<div class="card-body">

    <div class="row g-3">

        <div class="col-md-6">

            <label for="numtrimestre" class="form-label fw-semibold">
                N° Trimestre
            </label>

            <input
                class="form-control form-control-sm bg-light"
                type="text"
                readonly
                id="numtrimestre"
                name="numtrimestre"
                value="<?php echo $numtrimestre; ?>">

            <?php echo form_error('numtrimestre'); ?>

        </div>

        <div class="col-md-6">

            <label for="libclasse" class="form-label fw-semibold">
                Classe
            </label>

            <input
                name="libclasse"
                id="libclasse"
                type="text"
                class="form-control form-control-sm"
                value="<?php echo isset($classe->libclasse) ? $classe->libclasse : set_value('libclasse'); ?>">

            <?php echo form_error('libclasse'); ?>

        </div>

    </div>

    <div class="row g-3 mt-2">

        <div class="col-md-6">

            <label for="idmatiere" class="form-label fw-semibold">
                Matière
            </label>

            <input
                class="form-control form-control-sm bg-light"
                type="text"
                readonly
                id="idmatiere"
                name="idmatiere"
                value="<?php echo $idmatiere; ?>">

            <?php echo form_error('idmatiere'); ?>

        </div>

        <div class="col-md-6">

            <label for="libclasse" class="form-label fw-semibold">
                Libellé
            </label>

            <input
                name="libclasse"
                id="libclasse"
                type="text"
                class="form-control form-control-sm"
                value="<?php echo isset($classe->libclasse) ? $classe->libclasse : set_value('libclasse'); ?>">

            <?php echo form_error('libclasse'); ?>

        </div>

    </div>

</div>

</div>
    <!-- ======= Tableau ======= -->
    <div class = "table-responsive">
			<?php $i = 0 ;?>
			<?php $array = array() ;?>
            <?php
                
                echo "<table border=\"0\" class=\"table table-striped table-sm \">";
                

                 echo "<thead>";
                 echo "<tr>";
                 echo "<th scope=\"col\">Matricule</th>";
                 echo " <th scope=\"col\">N° Classe</th>";
                 echo " <th scope=\"col\">Nom</th>";
                 echo " <th scope=\"col\">Notes DS </th>";
                 echo "<th scope=\"col\">Notes Cahier</th>";
                 echo " <th scope=\"col\">Notes Comportement</th>";
                 echo "<th scope=\"col\">Action</th>";
                 echo "<tr>";
                echo "</thead>" ;


            ?>
			<?php if(!is_null($liste_eleveparclasses)) : ?>
				<?php foreach ($liste_eleveparclasses as $row) :?>
					<?php
						
                        echo "<tr id = \"\">";
                        
                        echo "<td class=\"fw-semibold align-middle\" >";
                        echo  "<label class = \" matricule mb-0\" id = \"$row->matricule\">  $row->matricule  </label>" ;
                        
                        $array [$i] = $row->matricule;
                        echo "</td>";

                        echo "<td class=\"text-center align-middle\">";
                            echo "<span class=\"badge bg-secondary\">";
                            echo $row->numerodeclasse;
                        echo "</span>";
                       
                        $array [$i] = $row->matricule;
                        echo "</td>";

                        echo "<td class=\"align-middle\">";
                            echo "<span class=\"fw-semibold\">";
                                echo $row->nom;
                            echo "</span>";
                            echo "<br>";
                            echo "<small class=\"text-muted\">";
                                 echo $row->prenom;
                            echo "</small>";
                        echo "</td>";

                        $noteparEtudiantMatiere = $this->Saisirnote_model->find($numtrimestre, $row->matricule, $idmatiere);
                        //var_dump( $noteparEtudiantMatiere);
                        if(!is_null($noteparEtudiantMatiere)) {

                            echo "<td class=\"text-center\">";
                            
                                echo "<input type=\"text\" class=\"form-control form-control-sm text-center noteds\"
                                id=\"noteds\"  name=\"\" readonly value=\"  $noteparEtudiantMatiere->noteds \">";
                            echo "</td>";

                            echo "<td>";
                            
                                echo "<input type=\"text\" class=\"form-control form-control-sm text-center notecahier\"
                                id=\"notecahier\" name=\"notecahier\" readonly value=\"$noteparEtudiantMatiere->notecahier\">";                
                            echo "</td>";

                            echo "<td>";
                            
                            echo "<input type=\"text\" class=\"form-control form-control-sm text-center notecomportement\"
                                    id=\"notecomportement\"
                                    name=\"\" readonly
                                    value=\"$noteparEtudiantMatiere->notecomportement\">";
                            echo "</td>";
                        } else{
                            echo "<td class=\"text-center\">";
                           
                            echo "<input type=\"text\" class=\"form-control form-control-sm text-center noteds\"
                            id=\"noteds\"  name=\"\" readonly value=\"  0 \">";
                            echo "</td>";

                            echo "<td>";
                            
                                echo "<input type=\"text\" class=\"form-control form-control-sm text-center notecahier\"
                                id=\"notecahier\" name=\"notecahier\" readonly value=\"0\">";                
                            echo "</td>";

                            echo "<td>";
                            
                            echo "<input type=\"text\" class=\"form-control form-control-sm text-center notecomportement\"
                                    id=\"notecomportement\"
                                    name=\"\" readonly
                                    value=\"0\">";
                            echo "</td>";

                        }

                        echo "<td>";                       
                        echo "<button class=\"btn btn-outline-primary btn-sm ajouter\" id=\"$row->matricule\" title=\"Enregistrer\">";
                        echo "<i class=\"bi bi-save\"></i>";
                        echo "</button>";

                        echo "<td>";                       
                        echo "<button class=\"btn btn-outline-primary btn-sm modifier\" id=\"$row->matricule\" title=\"Editer\">";
                        echo "<i class=\"bi bi-pen\"></i>";
                        echo "</button>";

                        $array [$i] = $row->matricule;
                        echo "</td>";


                        echo "<td class = \"ok\">";
                        
                        echo "</tr>";
					?>
					
				<?php $i++; ?>
				<?php endforeach ;?>
			<?php  endif ;?>
            <?php 
                
                echo "</table>"; 
            ?>
		</div>
    </div>
</div>

<!-- Modal Bootstrap pour gestion erreur note -->
<div class="modal fade" id="noteErreurModal" tabindex="-1" aria-labelledby="noteErreurModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">

      <!-- Bouton fermer en haut à droite -->
      <div class="position-absolute top-0 end-0 p-3" style="z-index: 10;">
        <button type="button" class="btn btn-sm btn-light rounded-circle border-0 shadow-sm d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" data-bs-dismiss="modal" aria-label="Fermer">
          <i class="bi bi-x-lg text-secondary"></i>
        </button>
      </div>

      <!-- Bandeau supérieur -->
      <div class="bg-danger bg-opacity-10 text-center pt-5 pb-3">
        <div class="d-inline-flex align-items-center justify-content-center bg-danger bg-opacity-25 rounded-circle p-3 mb-2">
          <i class="bi bi-exclamation-triangle-fill text-danger fs-1"></i>
        </div>
        <h5 class="modal-title fw-bold text-danger mt-2" id="noteErreurModalLabel">
          Oups, une erreur !
        </h5>
      </div>

      <div class="modal-body text-center px-4 py-3">
        <p class="text-secondary mb-0" id="noteErreurMessage">
          Veuillez remplir tous les champs.
        </p>
      </div>

      <hr class="my-0 opacity-25">

      <div class="modal-footer border-0 justify-content-center py-3">
        <button type="button" class="btn btn-danger px-4 rounded-pill" data-bs-dismiss="modal">
          <i class="bi bi-check2 me-1"></i>J'ai compris
        </button>
      </div>

    </div>
  </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const noteErreurModal = new bootstrap.Modal(document.getElementById('noteErreurModal'));

    function showNoteError(message) {
        const erreurMessage = document.getElementById('noteErreurMessage');
        erreurMessage.textContent = message;
        noteErreurModal.show();
    }

    document.addEventListener('click', function (event) {
        const button = event.target.closest('.ajouter');
        if (!button) {
            return;
        }

        const row = button.closest('tr');
        if (!row) {
            return;
        }

        const noteInputs = [
            row.querySelector('.noteds'),
            row.querySelector('.notecahier'),
            row.querySelector('.notecomportement')
        ];

        let hasEmptyField = false;

        for (const input of noteInputs) {
            if (!input) {
                showNoteError('Veuillez remplir tous les champs.');
                return;
            }

            if (input.value.trim() === '') {
                hasEmptyField = true;
            }
        }

        if (hasEmptyField) {
            showNoteError('Veuillez remplir tous les champs.');
            return;
        }

        for (const input of noteInputs) {
            const value = input.value.trim();
            const regex = /^\d+(?:[.,]\d+)?$/;
            const numericValue = Number(value.replace(',', '.'));

            if (!regex.test(value) || !Number.isFinite(numericValue) || numericValue < 0 || numericValue > 20) {
                showNoteError('Les notes doivent être comprises entre 0 et 20 et ne contenir que des chiffres.');
                return;
            }
        }
    });
});
</script>
