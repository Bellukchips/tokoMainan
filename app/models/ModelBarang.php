<?php

class ModelBarang
{
    private $table = "tbl_product";
    private $tableJoin = "tbl_supplier";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllProduct()
    {
        $query = "SELECT * FROM $this->table JOIN $this->tableJoin ON $this->table.supplier_id=$this->tableJoin.id";
        $this->db->query($query);
        return $this->db->resultSet();
    }
    public function getProductById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    public function insertProduct()
    {
    }
    public function insertProduct(){
        $query = "INSERT INTO $this->table VALUES (:id,:)"
    }
    public function updateProduct($data){

    }
    public function deleteProduct($id)
    {
    }
    public function searchProduct()
    {
    }
    public function getAllSupplier()
    {
        $query = "SELECT * FROM $this->tableJoin";
        $this->db->query($query);
        return $this->db->resultSet();
    }
}
