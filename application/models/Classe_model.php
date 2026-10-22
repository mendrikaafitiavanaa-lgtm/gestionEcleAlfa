<?php
class Classe_model extends CI_Model {
   private $count;


   public function __construct()
   {
     parent::__construct();
      $this->count = 0;
   }
   
   public function findAll($start,$offset) 
   {
       $query = $this->db->get('classe ',$start,$offset);
       $this->count = $query->num_rows();
       return $query->result();
   }
   
   public function find($idclasse)
   {       
       $query = $this->db->get_where('classe ', array('idclasse' => $idclasse));
       return $query->row();
   }

   public function  getCount()
   {
       return $this->count;
   }

   public function  getCountTable()
   {
       $query = $this->db->get('classe');
       return $query->num_rows();
       
   }
   
   
   function add($data)
   {
      $this->db->insert('classe', $data);
      //return $this->db->insert_id();
   }
   
   public function update($idclasse,$data)
   {
      $this->db->where('idclasse', $idclasse);
      $this->db->update('classe', $data);
   }
   
   public function delete($idclasse)
   {
       $this->db->delete('classe', array('idclasse' => $idclasse));
   }

   public function getNumClasse(){
      $query = $this->db->query('SELECT idclasse FROM classe ORDER BY idclasse');
      return $query->result();
   }

   public function getLibelleClasse(){
      $query = $this->db->query('SELECT libclasse FROM classe ORDER BY idclasse ');
      return $query->result();
   }

   public function getSearchClasse($numClasse) {
      $query = $this->db->query("SELECT idclasse, libclasse FROM classe WHERE idclasse LIKE '%$idclasse%' ");
      return $query->result();

  }
}
