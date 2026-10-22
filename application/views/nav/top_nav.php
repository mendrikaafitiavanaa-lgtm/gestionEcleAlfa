<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top w-100">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold text-white" href="#">ALFA SCHOOL</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarNav" aria-controls="navbarNav" 
            aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <?php echo anchor('accueil',$this->lang->line('nav_accueil'),['class'=>'nav-link active text-white']); ?>
        </li>
        <li class="nav-item">
          <?php echo anchor('user',$this->lang->line('nav_connexion'),['class'=>'nav-link text-white']); ?>
        </li>
      </ul>
    </div>
  </div>
</nav>