<script>
  console.log(
    'Bootstrap version:',
    window.bootstrap && bootstrap.Tooltip ? '5+ (OK)' : 'Incompatible or missing'
  );
</script>


<?php
//  if ($this->session->userdata('role') == 'admin'): ?>
  <!-- HEADER -->
<!-- HEADER -->
<header class="header d-flex justify-content-between align-items-center px-3 py-2 bg-dark text-white">
  <div class="header-left d-flex align-items-center">
    <button class="menu-toggle btn btn-sm btn-outline-light me-3" id="menuToggle" aria-label="Menu">
      <i class="bi bi-list"></i>
    </button>
    <h4 class="header-title mb-0">Elève</h4>
  </div>

  <div class="header-right">
    <a href="#" class="nav-link fw-bold text-white" data-bs-toggle="modal" data-bs-target="#logoutModal">
      <i class="bi bi-box-arrow-right me-2"></i> Déconnexion
    </a>
  </div>
</header>

<!-- Modal Bootstrap pour deconnecter
 -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutModalLabel">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        Voulez-vous vraiment vous déconnecter ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <a href="<?php echo site_url('User/logout'); ?>" class="btn btn-primary">Oui, déconnecter</a>
      </div>
    </div>
  </div>
</div>


<!-- SIDEBAR -->
<nav class="sidebar bg-secondary text-white" id="sidebarMenu">  
  <ul class="nav nav-pills flex-column w-100">
    <li class="nav-item">
      <?php echo anchor('ens','<i class="bi bi-speedometer2 me-2"></i>' .$this->lang->line('nav_ecole'), ['class' => 'nav-link active text-white']); ?>
    </li>
   
    <li class="nav-item">
      <?php echo anchor('voirnote','<i class="bi bi-calendar-week me-2"></i>' .$this->lang->line('nav_voirnote'), ['class' => 'nav-link text-white']); ?>
    </li>
    <li class="nav-item">
      <?php echo anchor('voircahiertexte','<i class="bi bi-people-fill me-2"></i>' .$this->lang->line('nav_voircahiertexte'), ['class' => 'nav-link text-white']); ?>
    </li>
    
    
  </ul>
</nav>

    
<?php //Endif;?>

<hr />

  

<!-- CONTENU PRINCIPAL -->
<!--<main class="col-md-10 main-content ms-sm-auto px-4 py-4" role="main">--> 
<main class="main-content" role="main">

    <div class="container-fluid" style="font-size:0.85rem;">
       
       