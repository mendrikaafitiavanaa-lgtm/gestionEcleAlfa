<div class="container" style="min-height: 100vh;">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">

            <!-- Bouton retour -->
            <div class="mb-3 text-center">
                <?php echo anchor('classe/index', 'Liste des Classes', 'class="btn btn-sm btn-success"'); ?>
            </div>
            
            <?php echo form_open('classe/'.$mode); ?>

            <fieldset class="border rounded-3 p-3 shadow-sm bg-light">
                <legend class="float-none w-auto px-2 fs-6 fw-semibold mb-3">Remplir ces informations</legend> 

                <!-- Ligne 1 : Id Classe -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="idclasse" class="form-label small">Id Classe :</label>
                        <?php if ($mode == 'add') { ?>
                            <input name="idclasse" id="idclasse" type="text" class="form-control form-control-sm"
                                   value="<?php echo isset($classe->idclasse) ? $classe->idclasse : set_value('idclasse'); ?>" autofocus>
                        <?php } else { ?>
                            <input name="idclasse" id="idclasse" type="text" class="form-control form-control-sm" readonly
                                   value="<?php echo isset($classe->idclasse) ? $classe->idclasse : set_value('idclasse'); ?>">
                        <?php } ?>
                        <?php echo form_error('idclasse'); ?>
                    </div>

                    <div class="col-md-6">
                        <label for="libclasse" class="form-label small">Libellé :</label>
                        <input name="libclasse" id="libclasse" type="text" class="form-control form-control-sm"
                               value="<?php echo isset($classe->libclasse) ? $classe->libclasse : set_value('libclasse'); ?>">
                        <?php echo form_error('libclasse'); ?>
                    </div>
                </div>

                <?php if ($mode == 'update'): ?>
                    <input type="hidden" name="idclasse" value="<?php echo $classe->idclasse; ?>">
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
