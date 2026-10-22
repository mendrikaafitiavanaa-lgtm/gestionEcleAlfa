
<!-- MAIN -->
 <br>
<div class="main ">
   
      <!-- FORMULAIRES -->
      <div class="row">
      

<title><?php echo $titre; ?></title>
		

		<?php If($context=='list'): ?>
			<?php $this->load->view('voircahiertexte/content',$liste_saisircahiertextes); ?>
		<?php Elseif($context=='detailnote'): ?>
			<?php $this->load->view('voircahiertexte/form_detailnote', $listenotes); ?>
		<?php Elseif($context=='message'): ?>
			<?php //$this->load->view('editSuccess'); ?>  
			<?php redirect ('voirnote'); ?>
		<?php Else: ?>
			Enregistrement inexistant !!!!
		<?php Endif;?>
	
		</div>
    
		</div>
