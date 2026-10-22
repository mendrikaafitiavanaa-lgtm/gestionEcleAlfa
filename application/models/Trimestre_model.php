<?php
class Trimestre_model extends CI_Model {
   private $count;


   public function __construct()
   {
     parent::__construct();
      $this->count = 0;
   }
   
   public function findAll($start,$offset) 
   {
       $query = $this->db->get('trimestre ',$start,$offset);
       $this->count = $query->num_rows();
       return $query->result();
   }
   
   public function find($numtrimestre)
   {       
       $query = $this->db->get_where('trimestre ', array('numtrimestre' => $numtrimestre));
       return $query->row();
   }

   public function  getCount()
   {
       return $this->count;
   }

   public function  getCountTable()
   {
       $query = $this->db->get('trimestre');
       return $query->num_rows();
       
   }
   
   
   function add($data)
   {
      $this->db->insert('trimestre', $data);
      //return $this->db->insert_id();
   }
   
   public function update($numtrimestre,$data)
   {
      $this->db->where('numtrimestre', $numtrimestre);
      $this->db->update('trimestre', $data);
   }
   
   public function delete($numtrimestre)
   {
       $this->db->delete('trimestre', array('numtrimestre' => $numtrimestre));
   }

   public function getNumTrimestre(){
      $query = $this->db->query('SELECT numtrimestre FROM trimestre ORDER BY numtrimestre');
      return $query->result();
   }

   public function getLibelleTrimestre(){
      $query = $this->db->query('SELECT libtrimestre FROM trimestre ORDER BY numtrimestre ');
      return $query->result();
   }

   public function getSearchTrimestre($numtrimestre) {
      $query = $this->db->query("SELECT numtrimestre, libtrimestre FROM trimestre WHERE numtrimestre LIKE '%$numtrimestre%' ");
      return $query->result();

  }
}
