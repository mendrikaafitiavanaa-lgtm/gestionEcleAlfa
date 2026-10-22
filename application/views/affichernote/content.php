<div class="container" style="min-height: 100vh;">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">

            <!-- Bouton retour -->
            <div class="text-center mb-4">
                <?php echo anchor(
                    'admin/index',
                    '<i class="bi bi-arrow-left-circle"></i> Retour',
                    'class="btn btn-success btn-sm px-4"'
                ); ?>
            </div>
            
            <?php echo form_open('affichernote/afficher_form'); ?>

            <fieldset class="border rounded-3 p-3 shadow-sm bg-light">
                <legend class="float-none w-auto px-2 fs-6 fw-semibold mb-3">Remplir ces informations</legend> 

                <!-- Ligne 1 : Id Classe -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="idclasse" class="form-label small">Id Classe :</label>
                        
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
                        <label for="libclasse" class="form-label small">Libellé :</label>
                        <input name="libclasse" id="libclasse" type="text" class="form-control form-control-sm"
                               value="<?php echo isset($classe->libclasse) ? $classe->libclasse : set_value('libclasse'); ?>">
                        <?php echo form_error('libclasse'); ?>
                    </div>
                </div>

                 <!-- Ligne 2 : Num Trimestre -->
                 <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="numtrimestre" class="form-label small">N° Trimestre :</label>
                        
                        <select name="numtrimestre" id="numtrimestre" class="form-select form-select-sm">
                            <?php foreach($liste_trimestres as $trimestre): ?>
                                <option value="<?php echo $trimestre->numtrimestre; ?>"
                                    <?php //echo (isset($trimestre->numtrimestre) && $trimestre->numtrimestre == $trimestre->numtrimestre) ? 'selected' : ''; ?>>
                                    <?php echo $trimestre->numtrimestre; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <?php echo form_error('numtrimestre'); ?>
                    </div>

                    <div class="col-md-6">
                        <label for="libclasse" class="form-label small">Libellé :</label>
                        <input name="libclasse" id="libclasse" type="text" class="form-control form-control-sm"
                               value="<?php echo isset($classe->libclasse) ? $classe->libclasse : set_value('libclasse'); ?>">
                        <?php echo form_error('libclasse'); ?>
                    </div>
                </div>

               

                
               <!-- Bouton -->
               <div class="text-center mt-3">
                    <input type="submit" class="btn btn-outline-primary btn-sm " title="Valider" value="Valider">
                </div>
            </fieldset>
 
            <?php echo form_close(); ?>
        </div>
    </div>
</div>