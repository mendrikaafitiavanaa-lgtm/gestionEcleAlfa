<?php
class Enseignant_model extends CI_Model {
   private $count;


   public function __construct()
   {
     parent::__construct();
      $this->count = 0;
   }
   
   public function findAll($limit, $offset) 
{
    $query = $this->db->get('enseignant', $limit, $offset);
    $this->count = $query->num_rows();
    return $query->result(); // renvoie toujours un tableau, même vide
}

   
   public function find($matrienseignant)
   {       
       $query = $this->db->get_where('enseignant', array('matrienseignant' => $matrienseignant));
       return $query->row();
   }

   public function  getCount()
   {
       return $this->count;
   }

   public function  getCountTable()
   {
       $query = $this->db->get('enseignant');
       return $query->num_rows();
       
   }
   
   
   function add($data)
   {
      $this->db->insert('enseignant', $data);
      //return $this->db->insert_id();
   }
   
   public function update($matrienseignant,$data)
   {
      $this->db->where('matrienseignant', $matrienseignant);
      $this->db->update('enseignant', $data);
   }
   
   public function delete($matrienseignant)
   {
       $this->db->delete('enseignant', array('matrienseignant' => $matrienseignant));
   }

   public function getNumEnseignant(){
    $query = $this->db->query('SELECT matrienseignant FROM enseignant ORDER BY matrienseignant');
    return $query->result();
 }


 
}
