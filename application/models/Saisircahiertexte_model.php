<?php
class Saisircahiertexte_model extends CI_Model {
   private $count;


   public function __construct()
   {
     parent::__construct();
      $this->count = 0;
   }
   
   public function findAll($start,$offset)
   {
       $query = $this->db->get('cahiertexte',$start,$offset);
       $this->count = $query->num_rows();
       return $query->result();
   }
   
   public function find($matrienseignant, $idclasse, $idmatiere, $datecours)
   {       
       $query = $this->db->get_where('cahiertexte', array('matrienseignant' => $matrienseignant, 'idclasse' => $idclasse,  'idmatiere' => $idmatiere,  'datecours' => $datecours ));
       return $query->row();
    }

   public function  getCount()
   {
       return $this->count;
   }

   public function  getCountTable()
   {
       $query = $this->db->get('cahiertexte');
       return $query->num_rows();
       
   }
   
   
   function add($data)
   {
      $this->db->insert('cahiertexte', $data);
      //return $this->db->insert_id();
   }

   public function insertion($matrienseignant, $idclasse, $idmatiere, $datecours, $heuredebut, $heurefin,  $titre, $contenu, $travailafaire)
   {
      
      $query = $this->db->query("INSERT INTO cahiertexte VALUES ('$matrienseignant', '$idclasse', '$idmatiere', '$datecours', '$heuredebut', '$heurefin',  '$titre', '$contenu', '$travailafaire' )  ");
      
   } 

   
   public function update($matrienseignant, $idclasse, $idmatiere, $datecours, $heuredebut, $heurefin,  $titre, $contenu, $travailafaire)
   {
      
      $query = $this->db->query("UPDATE cahiertexte SET heuredebut = '$heuredebut', heurefin = '$heurefin', titre = '$titre' , contenu = '$contenu' , travailafaire = '$travailafaire' 
               WHERE matrienseignant ='$matrienseignant' AND idclasse = '$idclasse' AND idmatiere = '$idmatiere'  AND datecours = '$datecours' ");
      //return $query->result();
   }
   
   public function delete($matrienseignant, $idclasse, $idmatiere, $datecours)
   {
       //$this->db->delete('appartenir', array('MONTANT' => $MONTANT));
      $query = $this->db->query("DELETE FROM cahiertexte 
                WHERE matrienseignant ='$matrienseignant' AND idclasse = '$idclasse' AND idmatiere = '$idmatiere'  AND datecours = '$datecours'  ");
   }

   public function isCahierTexteExists($matrienseignant, $idclasse, $idmatiere, $datecours)
   {
       $query = $this->db->get_where('cahiertexte', array('matrienseignant'=>$matrienseignant , 'idclasse' => $idclasse,  'idmatiere' => $idmatiere,  'datecours' => $datecours));
   
      return $query->num_rows() > 0  ;
   }

   public function getCahierTexteParEnseignant($matrienseignant) {
      $query = $this->db->query(" SELECT matrienseignant, idclasse, idmatiere, datecours,
                   heuredebut, heurefin, titre, contenu, travailafaire 
                      FROM cahiertexte 
                         WHERE matrienseignant = '$matrienseignant' 
                            ORDER BY datecours DESC;   ");
      return $query->result();

  }

  public function getCahierTexteParDate($datecours) {
   $query = $this->db->query(" SELECT matrienseignant, idclasse, idmatiere, datecours,
                heuredebut, heurefin, titre, contenu, travailafaire 
                   FROM cahiertexte 
                      WHERE datecours = '$datecours' 
                         ORDER BY datecours DESC;   ");
   return $query->result();

}
   

}
