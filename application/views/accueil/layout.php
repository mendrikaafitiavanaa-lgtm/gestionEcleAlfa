<title><?php echo $titre; ?></title>
		

		<?php If($context=='list'): ?>
			<?php $this->load->view('accueil/content'); ?>
		<?php Else: ?>
			Enregistrement inexistant !!!!
		<?php Endif;?>