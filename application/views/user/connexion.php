<div class="container-fluid min-vh-100 d-flex justify-content-center" style="padding-top: 60px;">
  <div class="w-100" style="max-width: 450px;">
    <div class="card shadow p-4 animate__animated animate__zoomIn"> <!-- ✅ animation sur tout le bloc -->
            
      <?php echo form_open('user'); ?>
            
        <div class="text-center mb-4">
          <img src="<?php echo base_url('assets/images/participant.png') ?>" alt="Logo" style="width: 130px;">
          <h5 class="mt-3 mb-0">Authentification</h5>
        </div>

        <div class="mb-3 small">
          <label for="LOGIN" class="form-label">Login : </label>
          <input type="text" class="form-control form-control-sm" name="login" placeholder="Entrer votre login..." id="LOGIN" required>
          <?php if(isset($error)): ?>
            <div id="loginError" class="text-danger small mt-1">
              <?php echo $error; ?>
            </div>
          <?php else: ?>
            <div id="loginError" class="text-danger small mt-1" style="display:none;"></div>
          <?php endif; ?>
        </div>

        <div class="mb-3 small">
          <label for="PASSWORD" class="form-label">Mot de passe :</label>
          <div class="input-group input-group-sm">
            <input type="password" class="form-control" name="password" placeholder="Entrer votre mot de passe..." id="PASSWORD" required>
            <span class="input-group-text" style="cursor:pointer" onclick="togglePassword()">
              <i class="bi bi-eye" id="toggleIcon"></i>
            </span>
          </div>
        </div>

        <div class="d-grid mt-3">
          <input type="submit" name="submit" id="addConnectUser" class="btn btn-primary btn-sm" value="Se connecter">
        </div>

      <?php echo form_close(); ?>

    </div>
  </div>
</div>


<!-- Afficher_Masquer mot de passe --> 
<script>
function togglePassword() {
    const passwordInput = document.getElementById('PASSWORD');
    const icon = document.getElementById('toggleIcon');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
    } else {
        passwordInput.type = 'password';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
    }
}
</script>

