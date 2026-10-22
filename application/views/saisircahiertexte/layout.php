
<!-- MAIN -->
 <br>
<div class="main ">
   
      <!-- FORMULAIRES -->
      <div class="row">
      

<title><?php echo $titre; ?></title>
		

		<?php If($context=='list'): ?>
			<?php $this->load->view('saisircahiertexte/content',$liste_saisircahiertextes); ?>
		<?php Elseif($context=='edit'): ?>
			<?php $this->load->view('saisircahiertexte/form_saisircahiertexte',$saisircahiertexte); ?>
		<?php Elseif($context=='message'): ?>
			<?php //$this->load->view('editSuccess'); ?>  
			<?php redirect ('saisircahiertexte'); ?>
		<?php Else: ?>
			Enregistrement inexistant !!!!
		<?php Endif;?>
	
		</div>
    
		</div>
