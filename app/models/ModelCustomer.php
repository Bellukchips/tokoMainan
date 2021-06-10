<?php

class ModelCustomer{
    private $table = "tbl_customer";
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }


    public function getAllCustomer(){
        $this->db->query('SELECT * FROM '.$this->table);
        return $this->db->resultSet();
       
    }

    public function getCustomerById($id){
        $this->db->query('SELECT * FROM '.$this->table.' WHERE id=:id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }
    public function insertCustomer($data){
        $query = "INSERT INTO $this->table VALUES (:id,:name,:city,:country,:phone)";
        $this->db->query($query);
        $this->db->bind('id',$data['id_cs']);
        $this->db->bind('name',$data['name_cs']);
        $this->db->bind('city',$data['city_cs']);
        $this->db->bind('country',$data['country_cs']);
        $this->db->bind('phone',$data['phone_cs']);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function updateCustomer($data){
        $query = "UPDATE $this->table SET name=:name,city=:city,country=:country,phone=:phone WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('name',$data['name_cs']);
        $this->db->bind('city',$data['city_cs']);
        $this->db->bind('country',$data['country_cs']);
        $this->db->bind('phone',$data['phone_cs']);
        $this->db->bind('id',$data['id_cs']);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function deleteCustomer($id){
        $query = "DELETE FROM $this->table WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id',$id);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function searchCustomer(){
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM $this->table WHERE name LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword',"%$keyword%");
        return $this->db->resultSet();
    }
}