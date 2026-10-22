<?php
class User_model extends CI_Model {
   private $count;


   public function __construct()
   {
     parent::__construct();
      $this->count = 0;
   }
   
   public function findAll($start,$offset)
   {
       $query = $this->db->get('user',$start,$offset);
       $this->count = $query->num_rows();
       return $query->result();
   }
   
   public function find($id_user)
   {       
       $query = $this->db->get_where('user', array('login' => $login));
       return $query->row();
   }

   public function  getCount()
   {
       return $this->count;
   }

   public function  getCountTable()
   {
       $query = $this->db->get('user');
       return $query->num_rows();
       
   }
   
   
   function add($data)
   {
      $this->db->insert('user', $data);
      //return $this->db->insert_id();
   }
   
   public function update($login,$data)
   {
      $this->db->where('login', $login);
      $this->db->update('user', $data);
   }
   
   public function delete($login)
   {
       $this->db->delete('user', array('login' => $login));
   }

   public function getiduser(){
      $query = $this->db->query('SELECT login FROM user');
      return $query->result();
   }


    function check_login($user, $pass){
        $md5_pass = md5($pass);
        $sql = "SELECT * FROM user WHERE login = '$user' AND password = '$md5_pass'";
        $q = $this->db->query($sql);
        if($q->num_rows()){
            foreach ($q->result() as $row)
                return $row;
        }

    }

 
}

?>