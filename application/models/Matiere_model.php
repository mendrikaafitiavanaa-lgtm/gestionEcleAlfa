<?php
class Matiere_model extends CI_Model {
   private $count;


   public function __construct()
   {
     parent::__construct();
      $this->count = 0;
   }
   
   public function findAll($start,$offset) 
   {
       $query = $this->db->get('matiere ',$start,$offset);
       $this->count = $query->num_rows();
       return $query->result();
   }
   
   public function find($idmatiere)
   {       
       $query = $this->db->get_where('matiere ', array('idmatiere' => $idmatiere));
       return $query->row();
   }

   public function  getCount()
   {
       return $this->count;
   }

   public function  getCountTable()
   {
       $query = $this->db->get('matiere');
       return $query->num_rows();
       
   }
   
   
   function add($data)
   {
      $this->db->insert('idmatiere', $data);
      //return $this->db->insert_id();
   }
   
   public function update($idmatiere,$data)
   {
      $this->db->where('idmatiere', $idmatiere);
      $this->db->update('matiere', $data);
   }
   
   public function delete($idmatiere)
   {
       $this->db->delete('matiere', array('idmatiere' => $idmatiere));
   }

   public function getIdMatiere(){
    $query = $this->db->query('SELECT idmatiere FROM matiere ORDER BY idmatiere');
    return $query->result();
 }
}
