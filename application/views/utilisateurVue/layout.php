<title><?php echo $titre; ?></title>

<?php if($context=='list'): ?>
    <?php $this->load->view('utilisateurVue/content',['liste_users' => $liste_users]); ?>
<?php elseif($context=='list_pers'): ?>
    <?php $this->load->view('utilisateurVue/contentpers',['liste_users' => $liste_users]); ?> 
<?php elseif($context=='edit'): ?>
    <?php $this->load->view('utilisateurVue/form_user',$majuser ?? []); ?> 
<?php elseif($context=='message'): ?>
    <?php redirect('utilisateur'); ?> 
<?php else: ?>
    Enregistrement inexistant !!!!
<?php endif; ?>
