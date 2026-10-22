<?php
class Eleve_model extends CI_Model {
   private $count;


   public function __construct()
   {
     parent::__construct();
      $this->count = 0;
   }
   
   public function findAll($limit, $offset) 
{
    $query = $this->db->get('eleve', $limit, $offset);
    $this->count = $query->num_rows();
    return $query->result(); // renvoie toujours un tableau, même vide
}

   
   public function find($matricule)
   {       
       $query = $this->db->get_where('eleve', array('matricule' => $matricule));
       return $query->row();
   }

   public function  getCount()
   {
       return $this->count;
   }

   public function  getCountTable()
   {
       $query = $this->db->get('eleve');
       return $query->num_rows();
       
   }
   
   
   function add($data)
   {
      $this->db->insert('eleve', $data);
      //return $this->db->insert_id();
   }
   
   public function update($matricule,$data)
   {
      $this->db->where('matricule', $matricule);
      $this->db->update('eleve', $data);
   }
   
   public function delete($matricule)
   {
       $this->db->delete('eleve', array('matricule' => $matricule));
   }

   public function getEleveParClasse($idclasse)
   {
        $query = $this->db->get_where('eleve', array('idclasse' => $idclasse));
        return $query->result();
   }

  
    // public function getEleveParClasse($idclasse, $numtrimestre) {
    //     $query = $this->db->query(" SELECT idclasse, Eleve.matricule,Eleve.nom, Eleve.prenom,ELeve.numerodeclasse, numtrimestre, idmatiere, noteds, notecahier, notecomportement
    //     FROM Eleve INNER JOIN Note ON Eleve.matricule = Note.matricule
    //         WHERE Eleve.idclasse = '$idclasse' AND Note.numtrimestre = '$numtrimestre';  ");
    //     return $query->result();
  
    // }
   


//    public function getEleveParClasse($idclasse, $numtrimestre)
//    {
//         $sql = "SELECT idclasse, Eleve.matricule, Eleve.numerodeclasse, Eleve.nom, Eleve.prenom, numtrimestre,
//                     idmatiere, noteds, notecahier, notecomportement
//                 FROM Eleve
//                 INNER JOIN Note ON Eleve.matricule = Note.matricule
//                 WHERE Eleve.idclasse = ?
//                 AND Note.numtrimestre = ?";

//         $query = $this->db->query($sql, array($idclasse, $numtrimestre));

//         return $query->result();
//     }
 
}
