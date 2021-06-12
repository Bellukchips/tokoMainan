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

    }
    public function updateSupplier($data){

    }
    public function insertSupplier($data){

    }
    public function deleteSupplier($id){

    }
    public function searchSupplier(){

    }
}