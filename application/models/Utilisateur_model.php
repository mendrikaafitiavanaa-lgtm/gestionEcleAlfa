<?php 
class Utilisateur_model extends CI_Model {
    private $count;

    public function __construct()
    {
        parent::__construct();
        $this->count = 0;
    }

    public function findAll($limit,$offset)
    {
        $query = $this->db->get('user',$limit,$offset);  
        $this->count = $query->num_rows();
        return $query->result();
    }

    public function find($login)
    {
        $query = $this->db->get_where('user', ['login' => $login]); 
        return $query->row();
    }

    public function getCountTable()
    {
        $query = $this->db->get('user');
        return $query->num_rows();
    }

    public function add($data)
    {
        $this->db->insert('user', $data);
    }

    public function update($login,$data)
    {
        $this->db->where('login', $login);
        $this->db->update('user', $data);
    }

    public function delete($login)
    {
        $this->db->delete('user', ['login' => $login]); 
    }

    public function check_login($login, $password){
        $query = $this->db->get_where('user', ['login' => $login]);

        if ($query->num_rows() !== 1) {
            return false;
        }

        $user = $query->row();

        if ($user->password === md5($password)) {
            return $user;
        }

        return false;
    }
}
