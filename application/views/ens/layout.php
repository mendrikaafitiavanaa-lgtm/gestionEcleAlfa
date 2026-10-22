<title><?php echo $titre; ?></title>
		

		<?php If($context=='list'): ?>
			<?php $this->load->view('ens/content'); ?>
		<?php Else: ?>
			Enregistrement inexistant !!!!
		<?php Endif;?>