
<!-- MAIN -->
 <br>
<div class="main ">
   
      <!-- FORMULAIRES -->
      <div class="row">
      

<title><?php echo $titre; ?></title>
		

		<?php If($context=='list'): ?>
			<?php $this->load->view('voirnote/content',$liste_affichernotes); ?>
		<?php Elseif($context=='detailnote'): ?>
			<?php $this->load->view('voirnote/form_detailnote', $listenotes); ?>
		<?php Elseif($context=='message'): ?>
			<?php //$this->load->view('editSuccess'); ?>  
			<?php redirect ('voirnote'); ?>
		<?php Else: ?>
			Enregistrement inexistant !!!!
		<?php Endif;?>
	
		</div>
    
		</div>
