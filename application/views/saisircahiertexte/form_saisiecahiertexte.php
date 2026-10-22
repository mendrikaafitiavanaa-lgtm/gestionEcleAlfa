<div class="container-fluid py-4">

    <!-- =====================================================
         EN-TÊTE
    ====================================================== -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-journal-text text-primary"></i>
                Cahier de texte
            </h3>

            <small class="text-muted">
                Programme journalier de l'enseignant
            </small>
        </div>

        <!-- Bouton retour -->
        <div>
            <?php echo anchor(
                'saisircahiertexte/index',
                '<i class="bi bi-arrow-left-circle"></i> Retour',
                'class="btn btn-success btn-sm px-4"'
            ); ?>
        </div>

    </div>


     <!-- =====================================================
         INFORMATIONS DU COURS
    ====================================================== -->
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">
                <i class="bi bi-info-circle"></i>
                Informations du cours
            </h5>
        </div>

        <div class="card-body">

            <div class="row g-3">

                <!-- Enseignant -->
                <div class="col-md-3">
                    <label class="form-label fw-semibold">
                        <i class="bi bi-person"></i>
                        Enseignant
                    </label>
                    <input type="text" class="form-control" readonly
                        value="<?php echo $matrienseignant; ?>" >
                </div>


                <!-- Classe -->
                <div class="col-md-3">
                    <label class="form-label fw-semibold">
                        <i class="bi bi-people"></i>
                        Classe
                    </label>
                    <input type="text" class="form-control" readonly
                        value="<?php echo $idclasse; ?>" >

                </div>


                <!-- Matière -->
                <div class="col-md-3">
                    <label class="form-label fw-semibold">
                        <i class="bi bi-book"></i>
                        Matière
                    </label>
                    <input
                        type="text"  class="form-control" readonly
                        value="<?php echo $idmatiere; ?>" >
                </div>


                <!-- Date -->
                <div class="col-md-3">
                    <label class="form-label fw-semibold">
                        <i class="bi bi-calendar3"></i>
                        Date
                    </label>
                    <input
                        type="date" class="form-control" readonly
                        value="<?php echo $datecours; ?>" >
                </div>
            </div>
        </div>
    </div>


     <!-- =====================================================
         FORMULAIRE DU CAHIER DE TEXTE
    ====================================================== -->
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-header bg-light">
            <h5 class="mb-0 fw-bold">
                <i class="bi bi-pencil-square text-primary"></i>
                Saisie du cahier de texte
            </h5>
        </div>


        <div class="card-body">

            <?php echo form_open('saisircahiertexte/add'); ?>

            <!-- Clés étrangères cachées -->
            <input type="hidden" name="matrienseignant" value="<?php echo $matrienseignant; ?>" >

            <input type="hidden" name="idclasse" value="<?php echo $idclasse; ?>" >

            <input type="hidden" name="idmatiere" value="<?php echo $idmatiere; ?>" >

            <input type="hidden"  name="datecours" value="<?php echo $datecours; ?>">
            <?php //var_dump($cahiertexte);die() ; ?>
            <?php //foreach($cahiertexte as $col):  ?>
            <div class="row g-3">

                <!-- Heure début -->
                <div class="col-md-3">
                    <label class="form-label fw-semibold"> <i class="bi bi-clock"></i>
                        Heure de début
                    </label>
                    <input type="time" name="heuredebut" class="form-control" 
                    required  value="<?php //echo isset($col->heuredebut) ? $col->heuredebut : set_value('heuredebut'); ?>">
                </div>


                <!-- Heure fin -->
                <div class="col-md-3">
                    <label class="form-label fw-semibold"> <i class="bi bi-clock-history"></i>
                        Heure de fin
                    </label>
                    <input type="time" name="heurefin" class="form-control" required 
                    value="<?php //echo isset($col->heurefin) ? $col->heurefin : set_value('heurefin'); ?>">
                </div>


                <!-- Titre -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold"> <i class="bi bi-type"></i>
                        Titre de la séance
                    </label>
                    <input type="text" name="titre" class="form-control" placeholder="Ex : Introduction à PHP"
                        maxlength="255" required 
                        value="<?php //echo isset($col->titre) ? $col->titre : set_value('titre'); ?>">
                </div>


                <!-- Contenu -->
                <div class="col-12">
                    <label class="form-label fw-semibold"> <i class="bi bi-file-text"></i>
                        Contenu du cours
                    </label>
                    <textarea name="contenu" class="form-control" rows="6"
                        placeholder="Décrivez le contenu du cours..." required  >
                        <?php //echo isset($col->contenu) ? $col->contenu : set_value('contenu'); ?>
                    </textarea>

                </div>


                <!-- Travail à faire -->
                <div class="col-12">
                    <label class="form-label fw-semibold"> <i class="bi bi-pencil"></i>
                        Travail à faire
                    </label> 
                    <textarea name="travailafaire" class="form-control" rows="4"
                        placeholder="Ex : Faire les exercices 1 à 5..." >
                        <?php //echo isset($col->travailafaire) ? $col->travailafaire : set_value('travailafaire'); ?>
                    </textarea>
                </div>


                <!-- Boutons -->
                <div class="col-12">
                    <div class="d-flex justify-content-end gap-2">
                         <input type="reset" class="btn btn-secondary px-4" value="Annuler"> 
                        
                        <input type="submit" class="btn btn-primary px-4" value="Enregistrer">
                    
                    </div>
                </div>
            </div>
            <?php //endforeach; ?>
            <?php echo form_close(); ?>
        </div>
    </div>   
 

    </div>

</div>