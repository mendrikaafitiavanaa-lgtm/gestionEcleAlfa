<div class="container">
  <div class="row">
    <div class="col-md-12">
      <?= heading($title); ?>
      <hr />
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <?php $this->load->view('eleve/delete_' . $action); ?>
    </div>
  </div>
</div>