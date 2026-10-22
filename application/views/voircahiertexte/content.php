<div class="container" style="min-height: 100vh;">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">

            <!-- Bouton retour -->
            <div class="text-center mb-4">
                <?php echo anchor(
                    'ens/index',
                    '<i class="bi bi-arrow-left-circle"></i> Retour',
                    'class="btn btn-success btn-sm px-4"'
                ); ?>
            </div>
            
            <?php echo form_open('voircahiertexte/affichercahiertexte'); ?>

            <fieldset class="border rounded-3 p-3 shadow-sm bg-light">
                <legend class="float-none w-auto px-2 fs-6 fw-semibold mb-3">Remplir ces informations</legend> 

              
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="datecours" class="form-label small">Date Cours :</label>
                        <input name="datecours" id="datecours" type="date" class="form-control form-control-sm"
                               value=" ">
                        <?php echo form_error('datecours'); ?>
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