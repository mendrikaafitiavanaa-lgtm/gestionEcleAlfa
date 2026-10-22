<div class="container" style="min-height: 100vh;">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">

            <!-- Bouton retour -->
            <div class="mb-3 text-center">
                <?php echo anchor('matiere/index', 'Liste des Matières', 'class="btn btn-sm btn-success"'); ?>
            </div>
            
            <?php echo form_open('matiere/'.$mode); ?>

            <fieldset class="border rounded-3 p-3 shadow-sm bg-light">
                <legend class="float-none w-auto px-2 fs-6 fw-semibold mb-3">Remplir ces informations</legend> 

                <!-- Ligne 1 : Id Matiere-->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="idmatiere" class="form-label small">Id Matiere :</label>
                        <?php if ($mode == 'add') { ?>
                            <input name="idmatiere" id="idmatiere" type="text" class="form-control form-control-sm"
                                   value="<?php echo isset($matiere->idmatiere) ? $matiere->idmatiere : set_value('idmatiere'); ?>" autofocus>
                        <?php } else { ?>
                            <input name="idmatiere" id="idmatiere" type="text" class="form-control form-control-sm" readonly
                                   value="<?php echo isset($matiere->idmatiere) ? $matiere->idmatiere : set_value('idmatiere'); ?>">
                        <?php } ?>
                        <?php echo form_error('idmatiere'); ?>
                    </div>

                    <div class="col-md-6">
                        <label for="nommatiere" class="form-label small">Nom :</label>
                        <input name="nommatiere" id="nommatiere" type="text" class="form-control form-control-sm"
                               value="<?php echo isset($matiere->nommatiere) ? $matiere->nommatiere : set_value('nommatiere'); ?>">
                        <?php echo form_error('nommatiere'); ?>
                    </div>
                </div>

                <?php if ($mode == 'update'): ?>
                    <input type="hidden" name="idmatiere" value="<?php echo $matiere->idmatiere; ?>">
                <?php endif; ?>

                <!-- Bouton -->
                <div class="text-center mt-3">
                    <input type="submit" class="btn btn-sm btn-primary" value="<?php echo $mode_titre; ?>">
                </div>
            </fieldset>
 
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
