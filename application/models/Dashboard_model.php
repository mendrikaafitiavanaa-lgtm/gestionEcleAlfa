<?php
class Dashboard_model extends CI_Model {
   private $count;


   public function __construct()
   {
     parent::__construct();
      $this->count = 0;
   }
  
   
    public function countCarNumber(){

        $this->db->where('Immatriculation IS NOT NULL', null, false);
        return $this->db->count_all_results('Prestataire');
   }

    public function getRotationsBySite()
    {
        $this->db->select('SUM(NbreRotation) AS total, NomSite');
        $this->db->from('Rotation');
        $this->db->where('MONTH(DateRotation)', date('m'), false);
        $this->db->where('YEAR(DateRotation)', date('Y'), false);
        $this->db->where_in('NomSite', [
            'CONCENTRIX',
            'LFT',
            'FUTURMAP',
            'MISTERCALL'
        ]);

        $this->db->group_by('NomSite');

        return $this->db->get()->result_array();
    }
   
    public function getRoles($userId) {
        $this->db->select('ROLE');
        $this->db->where('ID_USER', $userId);
        $query = $this->db->get('user');

         if ($query->num_rows() > 0) {
            return $query->row()->ROLE;  // Retourner le rôle de l'utilisateur
        }
    
        return null; 
        //return $query->result();
    }
}

?>