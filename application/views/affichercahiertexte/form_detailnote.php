<<br><br>

<div class="container py-4">

    <!-- En-tête -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">

        <div>
            <h1 class="h3 fw-bold text-primary mb-1">
                <?php echo $titre_edit; ?>
            </h1>
            <p class="text-muted mb-0">
                Consultation du relevé de notes
            </p>
        </div>
		<!-- Bouton retour -->
        <div class="mt-3 mt-md-0">
            <?php echo anchor(
                'affichernote/index',  '<i class="bi bi-arrow-left-circle me-1"></i> Retour', 'class="btn btn-success px-4"'  ); ?>
        </div>

    </div>
	<!-- Carte principale -->
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">


            <!-- Trimestre -->
            <div class="row mb-4">

                <div class="col-md-3 col-lg-2">

                    <label class="form-label fw-semibold text-secondary">
                        Trimestre
                    </label>

                    <input
                        class="form-control bg-light fw-semibold" type="text" readonly id="matricule" name="matricule"
                        value="<?php echo $numtrimestre ?>" >

                </div>

            </div>
			
			<!-- Informations élève -->
            <div class="border rounded-3 p-3 bg-light mb-4">

                <h5 class="fw-bold text-primary mb-3"> <i class="bi bi-person-circle me-2"></i>
                    Informations de l'élève
                </h5>

                <div class="row g-3">

                    <div class="col-md-6 col-lg-2">

                        <label class="form-label small fw-semibold text-secondary">
                            Matricule
                        </label>

                        <input
                            class="form-control form-control-sm bg-white" type="text" readonly id="matricule" name="matricule"
                            value="<?php echo $eleve->matricule ?>" >

                    </div>


                    <div class="col-md-6 col-lg-2">

                        <label class="form-label small fw-semibold text-secondary">
                            Numéro
                        </label>

                        <input
                            class="form-control form-control-sm bg-white" type="text" readonly id="numero" name="numero"
                            value="<?php echo $eleve->numerodeclasse ?>" >

                    </div>


                    <div class="col-md-6 col-lg-2">

                        <label class="form-label small fw-semibold text-secondary">
                            Nom
                        </label>

                        <input
                            class="form-control form-control-sm bg-white" type="text" readonly id="nom" name="nom"
                            value="<?php echo $eleve->nom ?>" >

                    </div>


                    <div class="col-md-6 col-lg-3">

                        <label class="form-label small fw-semibold text-secondary">
                            Prénom
                        </label>

                        <input
                            class="form-control form-control-sm bg-white" type="text" readonly id="prenom" name="prenom"
                            value="<?php echo $eleve->prenom ?>" >

                    </div>


                    <div class="col-md-6 col-lg-2">

                        <label class="form-label small fw-semibold text-secondary">
                            Id Classe
                        </label>

                        <input
                            class="form-control form-control-sm bg-white" type="text" readonly id="idclasse" name="idclasse"
                            value="<?php echo $eleve->idclasse ?>" >

                    </div>

                </div>

            </div>
			
			<!-- Tableau des notes -->
            <div class="d-flex align-items-center mb-3">

                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2"
                     style="width: 38px; height: 38px;">

                    <i class="bi bi-journal-text"></i>

                </div>

                <div>
                    <h5 class="fw-bold mb-0">
                        Notes du trimestre
                    </h5>

                    <small class="text-muted">
                        Détail des résultats par matière
                    </small>
                </div>

            </div>


            <?php

            echo '<div class="table-responsive rounded-3 border">';

            echo '<table class="table table-hover table-bordered align-middle mb-0">';

                echo '<thead class="table-primary">';

                    echo '<tr>';

                        echo '<th scope="col">Id Matière</th>';

                        echo '<th scope="col">Matière</th>';

                        echo '<th scope="col" class="text-center">Note DS</th>';

                        echo '<th scope="col" class="text-center">Note Cahier</th>';

                        echo '<th scope="col" class="text-center">Comportement</th>';

                        echo '<th scope="col" class="text-center">Moyenne</th>';

                    echo '</tr>';

                echo '</thead>';

                echo '<tbody>';


                    $moytrim = 0;


                    foreach ($listenotes as $listenote) {

                        echo '<tr>';

                            echo '<td class="fw-semibold">' . $listenote->idmatiere . '</td>';

                            echo '<td class="fw-semibold text-primary">' . $listenote->nommatiere . '</td>';

                            echo '<td class="text-center">' . $listenote->noteds . '</td>';

                            echo '<td class="text-center">' . $listenote->notecahier . '</td>';

                            echo '<td class="text-center">' . $listenote->notecomportement . '</td>';

                            echo '<td class="text-center fw-bold">' . $listenote->moyenne . '</td>';

                        echo '</tr>';

                    }


                    foreach ($trimestre as $trim) {

                        $moygentrim = $trim->moygen;

                    }


                    /*
                    * Moyenne générale
                    */

                    echo '<tr class="table-success">';

                        echo '<td colspan="4"></td>';

                        echo '<td class="text-center fw-bold">';

                            echo '<i class="bi bi-award me-1"></i>';

                            echo 'Moyenne';

                        echo '</td>';

                            echo '<td class="text-center fw-bold fs-5 text-success">';

                            echo $moygentrim;

                        echo '</td>';

                    echo '</tr>';


                    /*
                    * Rang
                    */

                    foreach ($rangtrimestre as $rangtrim) {

                        $rangpartrim = $rangtrim->rang;

                    }

                    echo '<tr class="table-warning">';

                        echo '<td colspan="4"></td>';

                        echo '<td class="text-center fw-bold">';

                            echo '<i class="bi bi-trophy me-1"></i>';

                            echo 'Rang';

                        echo '</td>';

                        echo '<td class="text-center fw-bold fs-5 text-warning">';

                             echo $rangpartrim;

                        echo '</td>';

                    echo '</tr>';


                    echo '</tbody>';

            echo '</table>';

            ?>

            </div>


        </div>

    </div>


    <!-- Pied de page -->
    <div class="text-center mt-4">

        <small class="text-muted">
            Relevé de notes — Consultation
        </small>

    </div>

</div>

			
			
			
			