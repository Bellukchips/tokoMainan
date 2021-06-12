<?php

class ModelBarang{
    private $table = "tbl_product";
    private $tableJoin = "tbl_supplier";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllProduct(){
        $query = "SELECT * FROM $this->table JOIN $this->tableJoin ON $this->table.supplier_id=$this->tableJoin.id";
        $this->db->query($query);
        return $this->db->resultSet();
    }
    public function getProductById($id){

    }
    public function insertProduct(){

    }
    public function updateProduct($data){

    }
    public function deleteProduct($id){

    }
    public function searchProduct(){

    }
    public function getAllSupplier(){
        $query = "SELECT * FROM $this->tableJoin";
        $this->db->query($query);
        return $this->db->resultSet();
    }
}