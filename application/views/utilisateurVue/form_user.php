<div class="container" style="min-height: 100vh;">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">

            <div class="mb-3 text-center">
                <?php echo anchor('utilisateur/index', 'Liste des Utilisateurs', 'class="btn btn-sm btn-success"'); ?>
            </div>
            
            <?php echo form_open('utilisateur/'.$mode); ?>

            <fieldset class="border rounded-3 p-3 shadow-sm bg-light">
                <legend class="float-none w-auto px-2 fs-6 fw-bold mb-3">Remplir ces informations</legend> 

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="login" class="form-label small">Login : <span style='color: red;'>*</span></label>
                        <input name="Login" id="login" type="text" class="form-control form-control-sm"
                               value="<?php echo isset($majuser->login) ? $majuser->login : set_value('Login'); ?>" required>
                        <?php echo form_error('Login'); ?>
                    </div>

                    <div class="col-md-6">
                        <label for="role" class="form-label small">Profil : <span style='color: red;'>*</span></label>
                        <select id="role" name="Role" class="form-select form-select-sm" required>
                            <option value="">Sélectionner..</option>
                            <option value="admin" <?= (isset($majuser->role) && $majuser->role == 'admin') ? 'selected' : '' ?>>Admin</option>
                            <option value="super_Admin" <?= (isset($majuser->role) && $majuser->role == 'super_Admin') ? 'selected' : '' ?>>Super Admin</option>
                        </select>
                        <?php echo form_error('Role'); ?>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="Password" class="form-label small">Mot de passe : <span style='color: red;'>*</span></label>
                        <input name="Password" id="Password" type="password" class="form-control form-control-sm"
                               value="<?php echo set_value('Password'); ?>" required>
                        <?php echo form_error('Password'); ?>
                    </div>

                    <div class="col-md-6">
                        <label for="password_confirm" class="form-label small">Confirmation : <span style='color: red;'>*</span></label>
                        <input name="password_confirm" id="password_confirm" type="password" class="form-control form-control-sm"
                               value="<?php echo set_value('password_confirm'); ?>" required>
                        <?php echo form_error('password_confirm'); ?>
                    </div>
                </div>

                <div class="text-center mt-3">
                    <input type="submit" class="btn btn-sm btn-primary" value="<?php echo $mode_titre; ?>">
                </div>
            </fieldset>

            <?php echo form_close(); ?>
        </div>
    </div>
</div>
