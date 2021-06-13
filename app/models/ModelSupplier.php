<?php

class ModelSupplier{
    private $table = "tbl_supplier";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllSupplier(){
        $query = "SELECT * FROM $this->table";
        $this->db->query($query);
        return $this->db->resultSet();
    }
    public function getSupplierById($id){
        $query = "SELECT * FROM $this->table WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id',$id);
        return $this->db->single();
    }
    public function updateSupplier($data){
        $query = "UPDATE $this->table SET companyName=:companyName,city=:city,country=:country,phone=:phone WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('companyName',$data['name_sp']);
        $this->db->bind('city',$data['asal_sp']);
        $this->db->bind('country',$data['negara_sp']);
        $this->db->bind('phone',$data['tlp_sp']);
        $this->db->bind('id',$data['id_sp']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function insertSupplier($data){
        $query = "INSERT INTO $this->table VALUES(:id,:companyName,:city,:country,:phone)";
        $this->db->query($query);
        $this->db->bind('id',$data['id_sp']);
        $this->db->bind('companyName',$data['name_sp']);
        $this->db->bind('city',$data['asal_sp']);
        $this->db->bind('country',$data['negara_sp']);
        $this->db->bind('phone',$data['tlp_sp']);
        $this->db->execute();
        return $this->db->rowCount();

    }
    public function deleteSupplier($id){
        $query = "DELETE FROM $this->table WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id',$id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function searchSupplier(){
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM $this->table WHERE companyName LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword',"%$keyword%");
        return $this->db->resultSet();
    }
}