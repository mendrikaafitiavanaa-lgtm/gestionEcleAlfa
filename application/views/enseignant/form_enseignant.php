<div class="container" style="min-height: 100vh;">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">

            <!-- Bouton retour -->
            <div class="mb-3 text-center">
                <?php echo anchor('enseignant/index', 'Liste des enseignants', 'class="btn btn-sm btn-success"'); ?>
            </div>
            
            <?php echo form_open('enseignant/'.$mode); ?>

            <fieldset class="border rounded-3 p-3 shadow-sm bg-light">
                <legend class="float-none w-auto px-2 fs-6 fw-semibold mb-3">
                    Remplir ces informations
                </legend> 

                <!-- Ligne 1 : Matricule / Numero -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="matrienseignant" class="form-label small">
                            <i class="bi bi-person-vcard"></i> Matricule :
                        </label>
                        <?php if ($mode == 'add') { ?>
                            <input name="matrienseignant" id="matrienseignant" type="text" 
                                   class="form-control form-control-sm"
                                   value="<?php echo isset($enseignant->matrienseignant) ? $enseignant->matrienseignant : set_value('matrienseignant'); ?>" autofocus>
                        <?php } else { ?>
                            <input name="matrienseignant" id="matrienseignant" type="text" 
                                   class="form-control form-control-sm" readonly
                                   value="<?php echo isset($enseignant->matrienseignant) ? $enseignant->matrienseignant : set_value('matricule'); ?>">
                        <?php } ?>
                        <?php echo form_error('matrienseignant'); ?>
                    </div>

                    
                </div>
                <!-- Ligne 1 : Classe / N° de Classe -->
                

                <!-- Ligne 2 : Nom / Prénom -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nomenseignant" class="form-label small">Nom :</label>
                        <input name="nomenseignant" id="nomenseignant" type="text" class="form-control form-control-sm"
                               value="<?php echo isset($enseignant->nomenseignant) ? $enseignant->nomenseignant : set_value('nomenseignant'); ?>">
                        <?php echo form_error('nomenseignant'); ?>
                    </div>
                    <div class="col-md-6">
                        <label for="preenseignant" class="form-label small">Prénom :</label>
                        <input name="preenseignant" id="preenseignant" type="text" class="form-control form-control-sm"
                               value="<?php echo isset($enseignant->preenseignant) ? $enseignant->preenseignant : set_value('preenseignant'); ?>">
                        <?php echo form_error('preenseignant'); ?>
                    </div>
                </div>

                <!-- Ligne 3 : Date de naissance / Sexe -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="naissenseignant" class="form-label small">Date de naissance :</label>
                        <input name="naissenseignant" id="naissenseignant" type="date" class="form-control form-control-sm"
                               value="<?php echo isset($enseignant->naissenseignant) ? $enseignant->naissenseignant : set_value('naissenseignant'); ?>">
                        <?php echo form_error('naissenseignant'); ?>
                    </div>
                    <div class="col-md-6">
                        <label for="sexeenseignant" class="form-label small">Sexe :</label>
                        <select name="sexeenseignant" id="sexeenseignant" class="form-select form-select-sm">
                            <option value="M" <?php echo (isset($enseignant->sexeenseignant) && $enseignant->sexeenseignant == 'M') ? 'selected' : ''; ?>>Masculin</option>
                            <option value="F" <?php echo (isset($enseignant->sexeenseignant) && $enseignant->sexeenseignant == 'F') ? 'selected' : ''; ?>>Féminin</option>
                        </select>
                        <?php echo form_error('sexeenseignant'); ?>
                    </div>
                </div>

                <!-- Ligne 4 : Email / Téléphone -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="mailenseignant" class="form-label small">Email :</label>
                        <input name="mailenseignant" id="mailenseignant" type="email" class="form-control form-control-sm"
                               value="<?php echo isset($enseignant->mailenseignant) ? $enseignant->mailenseignant : set_value('mail'); ?>">
                        <?php echo form_error('mailenseignant'); ?>
                    </div>
                    <div class="col-md-6">
                        <label for="phoneenseignant" class="form-label small">Téléphone :</label>
                        <input name="phoneenseignant" id="phoneenseignant" type="text" class="form-control form-control-sm"
                               value="<?php echo isset($enseignant->phoneenseignant) ? $enseignant->phoneenseignant : set_value('phoneenseignant'); ?>">
                        <?php echo form_error('phoneenseignant'); ?>
                    </div>
                </div>

                <!-- Bouton -->
                <div class="text-center mt-3">
                    <input type="submit" class="btn btn-sm btn-primary" value="<?php echo $mode_titre; ?>">
                </div>
            </fieldset>
 
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
