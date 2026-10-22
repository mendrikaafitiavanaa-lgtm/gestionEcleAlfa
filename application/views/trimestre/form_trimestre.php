<div class="container" style="min-height: 100vh;">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">

            <!-- Bouton retour -->
            <div class="mb-3 text-center">
                <?php echo anchor('trimestre/index', 'Liste des Trimestres', 'class="btn btn-sm btn-success"'); ?>
            </div>
            
            <?php echo form_open('trimestre/'.$mode); ?>

            <fieldset class="border rounded-3 p-3 shadow-sm bg-light">
                <legend class="float-none w-auto px-2 fs-6 fw-semibold mb-3">
                    Remplir ces informations
                </legend> 

                <!-- Ligne 1 : Id / Libellé -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="numtrimestre" class="form-label small">
                            <i class="bi bi-calendar-week"></i> Id Trimestre :
                        </label>
                        <?php if ($mode == 'add') { ?>
                            <input name="numtrimestre" id="numtrimestre" type="text" 
                                   class="form-control form-control-sm"
                                   value="<?php echo isset($trimestre->numtrimestre) ? $trimestre->numtrimestre : set_value('numtrimestre'); ?>" autofocus>
                        <?php } else { ?>
                            <input name="numtrimestre" id="numtrimestre" type="text" 
                                   class="form-control form-control-sm" readonly
                                   value="<?php echo isset($trimestre->numtrimestre) ? $trimestre->numtrimestre : set_value('numtrimestre'); ?>">
                        <?php } ?>
                        <?php echo form_error('numtrimestre'); ?>
                    </div>

                    <div class="col-md-6">
                        <label for="libtrimestre" class="form-label small">
                            Libellé :
                        </label>
                        <input name="libtrimestre" id="libtrimestre" type="text" 
                               class="form-control form-control-sm"
                               value="<?php echo isset($trimestre->libtrimestre) ? $trimestre->libtrimestre : set_value('libtrimestre'); ?>">
                        <?php echo form_error('libtrimestre'); ?>
                    </div>
                </div>

                <?php if ($mode == 'update'): ?>
                    <input type="hidden" name="numtrimestre" value="<?php echo $trimestre->numtrimestre; ?>">
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
