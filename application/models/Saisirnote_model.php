<?php
class Saisirnote_model extends CI_Model {
   private $count;


   public function __construct()
   {
     parent::__construct();
      $this->count = 0;
   }
   
   public function findAll($start,$offset)
   {
       $query = $this->db->get('note',$start,$offset);
       $this->count = $query->num_rows();
       return $query->result();
   }
   
   public function find($numtrimestre, $matricule, $idmatiere)
   {       
       $query = $this->db->get_where('note', array('numtrimestre' => $numtrimestre, 'matricule' => $matricule,  'idmatiere' => $idmatiere ));
       return $query->row();
    }

   public function  getCount()
   {
       return $this->count;
   }

   public function  getCountTable()
   {
       $query = $this->db->get('note');
       return $query->num_rows();
       
   }
   
   
   function add($data)
   {
      $this->db->insert('note', $data);
      //return $this->db->insert_id();
   }

   public function insertionnote($numtrimestre, $matricule, $idmatiere, $noteds, $notecahier, $notecomportement )
   {
      
      $query = $this->db->query("INSERT INTO note VALUES ('$numtrimestre',  '$matricule', '$idmatiere','$noteds', '$notecahier', '$notecomportement' )  ");
      
   } 

   
   public function update($numtrimestre, $matricule, $idmatiere, $noteds, $notecahier, $notecomportement)
   {
      
      $query = $this->db->query("UPDATE note SET noteds = '$noteds', notecahier = '$notecahier', notecomportement = '$notecomportement' WHERE numtrimestre ='$numtrimestre' AND matricule = '$matricule' AND idmatiere = '$idmatiere' ");
      //return $query->result();
   }
   
   public function delete($numbulletin, $idmatiere)
   {
       //$this->db->delete('appartenir', array('MONTANT' => $MONTANT));
      $query = $this->db->query("DELETE FROM note WHERE numtrimestre ='$numtrimestre' AND matricule = '$matricule' AND idmatiere = '$idmatiere' ");
   }

   public function isNoteExists($numtrimestre, $matricule, $idmatiere)
   {
       $query = $this->db->get_where('note', array('numtrimestre'=>$numtrimestre , 'matricule' => $matricule,  'idmatiere' => $idmatiere));
   
      return $query->num_rows() > 0  ;
   }

   public function getNoteParCLasseTrimestre($idclasse, $numtrimestre) {
        $query = $this->db->query(" SELECT idclasse, eleve.matricule,eleve.nom, eleve.prenom,
                     eleve.numerodeclasse, numtrimestre 
                        FROM eleve INNER JOIN note ON eleve.matricule = note.matricule
                           WHERE eleve.idclasse = '$idclasse' AND note.numtrimestre = '$numtrimestre'
                              GROUP BY numtrimestre ,  eleve.matricule;   ");
        return $query->result();
  
    }

    public function getNoteParMatriTrimestre($matricule, $numtrimestre) {
      $query = $this->db->query(" SELECT idclasse, eleve.matricule,eleve.nom, eleve.prenom,eleve.numerodeclasse,
            note.numtrimestre, note.idmatiere, nommatiere, note.noteds, note.notecahier, note.notecomportement,
              ROUND(((note.noteds + note.notecahier + note.notecomportement) / 3) ,2) AS moyenne
               FROM eleve INNER JOIN note ON eleve.matricule = note.matricule
                          INNER JOIN matiere ON matiere.idmatiere = note.idmatiere
                           WHERE eleve.matricule = '$matricule' AND note.numtrimestre = '$numtrimestre' ; ");
      return $query->result();

  }

  public function getMoyenneParMatriTrimestre($matricule, $numtrimestre) {
   $query = $this->db->query(" SELECT idclasse, eleve.matricule,
   ROUND(AVG(((note.noteds + note.notecahier + note.notecomportement) / 3)),2) AS moygen
         FROM eleve INNER JOIN note ON eleve.matricule = note.matricule
            INNER JOIN matiere ON matiere.idmatiere = note.idmatiere
            WHERE eleve.matricule = '$matricule' AND note.numtrimestre = '$numtrimestre'
            GROUP BY  note.matricule; 
            ");
   return $query->result();

}

public function getRangParMatriTrimestre($matricule, $numtrimestre) {
   $query = $this->db->query(" SELECT  m.matricule, m.idclasse,  m.moygen, 1 + (
      SELECT COUNT(*) FROM (
          SELECT e2.matricule, e2.idclasse, ROUND(AVG((n2.noteds + n2.notecahier + n2.notecomportement) / 3), 2 ) AS moygen
              FROM eleve e2 INNER JOIN note n2 ON e2.matricule = n2.matricule
                   WHERE n2.numtrimestre = '$numtrimestre'
                       GROUP BY e2.matricule,  e2.idclasse ) AS classement
                           WHERE classement.idclasse = m.idclasse AND classement.moygen > m.moygen ) AS rang
                              FROM (
                                  SELECT e.matricule, e.idclasse,
                                  ROUND(AVG((n.noteds + n.notecahier + n.notecomportement) / 3),2 ) AS moygen
                                      FROM eleve e INNER JOIN note n ON e.matricule = n.matricule
                                           WHERE e.matricule = '$matricule' AND n.numtrimestre = '$numtrimestre'
                                              GROUP BY e.matricule, e.idclasse ) AS m;
            ");
   return $query->result();

}

}
