<?php
class User{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    //register user
    public function register($data){
        //insert query
        $this->db->query("INSERT INTO users(name, email, password) VALUES(:name, :email, :password)");
        
        //bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        //execute query
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    //email exist check
    public function findUserByEmail($email){
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind(':email', $email);
        $this->db->singleResult();
        
        if($this->db->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    //user login
    public function login($email, $password){
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind(':email', $email);
        $row = $this->db->singleResult();

        //check password
        $hashPassword = $row->password;
        if(password_verify($password, $hashPassword)){
            return $row;
        }else{
            return false;
        }
    }
}