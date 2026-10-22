<div class="container" style="min-height: 100vh;">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">

            <!-- Bouton retour -->
            <div class="mb-3 text-center">
                <?php echo anchor('eleve/index', 'Liste des élèves', 'class="btn btn-sm btn-success"'); ?>
            </div>
            
            <?php echo form_open('eleve/'.$mode); ?>

            <fieldset class="border rounded-3 p-3 shadow-sm bg-light">
                <legend class="float-none w-auto px-2 fs-6 fw-semibold mb-3">
                    Remplir ces informations
                </legend> 

                <!-- Ligne 1 : Matricule / Numero -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="matricule" class="form-label small">
                            <i class="bi bi-person-vcard"></i> Matricule :
                        </label>
                        <?php if ($mode == 'add') { ?>
                            <input name="matricule" id="matricule" type="text" 
                                   class="form-control form-control-sm"
                                   value="<?php echo isset($eleve->matricule) ? $eleve->matricule : set_value('matricule'); ?>" autofocus>
                        <?php } else { ?>
                            <input name="matricule" id="matricule" type="text" 
                                   class="form-control form-control-sm" readonly
                                   value="<?php echo isset($eleve->matricule) ? $eleve->matricule : set_value('matricule'); ?>">
                        <?php } ?>
                        <?php echo form_error('matricule'); ?>
                    </div>

                    <div class="col-md-6">
                        <label for="numerodeclasse" class="form-label small">Numéro :</label>
                        <input name="numerodeclasse" id="numerodeclasse" type="text" class="form-control form-control-sm"
                               value="<?php echo isset($eleve->numerodeclasse) ? $eleve->numerodeclasse : set_value('numerodeclasse'); ?>">
                        <?php echo form_error('numerodeclasse'); ?>
                    </div>
                </div>
                <!-- Ligne 1 : Classe / N° de Classe -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="idclasse" class="form-label small">Classe :</label>
                        <select name="idclasse" id="idclasse" class="form-select form-select-sm">
                            <?php foreach($liste_Classes as $classe): ?>
                                <option value="<?php echo $classe->idclasse; ?>"
                                    <?php echo (isset($eleve->idclasse) && $eleve->idclasse == $classe->idclasse) ? 'selected' : ''; ?>>
                                    <?php echo $classe->idclasse; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <?php echo form_error('idclasse'); ?>
                    </div>
                    <div class="col-md-6">
                        <label for="nom" class="form-label small">Nom  Classe:</label>
                        <input name="libclasse" id="libclasse" type="text" class="form-control form-control-sm"
                               value="<?php //echo isset($eleve->libclasse) ? $eleve->nom : set_value('libclasse'); ?>">
                        <?php echo form_error('libclasse'); ?>
                    </div>
                </div>



                <!-- Ligne 2 : Nom / Prénom -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nom" class="form-label small">Nom :</label>
                        <input name="nom" id="nom" type="text" class="form-control form-control-sm"
                               value="<?php echo isset($eleve->nom) ? $eleve->nom : set_value('nom'); ?>">
                        <?php echo form_error('nom'); ?>
                    </div>
                    <div class="col-md-6">
                        <label for="prenom" class="form-label small">Prénom :</label>
                        <input name="prenom" id="prenom" type="text" class="form-control form-control-sm"
                               value="<?php echo isset($eleve->prenom) ? $eleve->prenom : set_value('prenom'); ?>">
                        <?php echo form_error('prenom'); ?>
                    </div>
                </div>

                <!-- Ligne 3 : Date de naissance / Sexe -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="naiss" class="form-label small">Date de naissance :</label>
                        <input name="naiss" id="naiss" type="date" class="form-control form-control-sm"
                               value="<?php echo isset($eleve->naiss) ? $eleve->naiss : set_value('naiss'); ?>">
                        <?php echo form_error('naiss'); ?>
                    </div>
                    <div class="col-md-6">
                        <label for="sexe" class="form-label small">Sexe :</label>
                        <select name="sexe" id="sexe" class="form-select form-select-sm">
                            <option value="M" <?php echo (isset($eleve->sexe) && $eleve->sexe == 'M') ? 'selected' : ''; ?>>Masculin</option>
                            <option value="F" <?php echo (isset($eleve->sexe) && $eleve->sexe == 'F') ? 'selected' : ''; ?>>Féminin</option>
                        </select>
                        <?php echo form_error('sexe'); ?>
                    </div>
                </div>

                <!-- Ligne 4 : Email / Téléphone -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="mail" class="form-label small">Email :</label>
                        <input name="mail" id="mail" type="email" class="form-control form-control-sm"
                               value="<?php echo isset($eleve->mail) ? $eleve->mail : set_value('mail'); ?>">
                        <?php echo form_error('mail'); ?>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label small">Téléphone :</label>
                        <input name="phone" id="phone" type="text" class="form-control form-control-sm"
                               value="<?php echo isset($eleve->phone) ? $eleve->phone : set_value('phone'); ?>">
                        <?php echo form_error('phone'); ?>
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
