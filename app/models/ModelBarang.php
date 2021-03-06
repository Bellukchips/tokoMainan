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
        $query = "SELECT $this->table.id,$this->table.prod_name,$this->table.unit_price,$this->table.package,$this->tableJoin.companyName FROM $this->table JOIN $this->tableJoin ON $this->table.supplier_id=$this->tableJoin.id";
        $this->db->query($query);
        
        return $this->db->resultSet();
    }
    public function getProductById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function insertProduct($data)
    {
        $query = "INSERT INTO $this->table VALUES (:id,:prod_name,:supplier_id,:unit_price,:package)";
        $this->db->query($query);
        $this->db->bind('id',$data['id_prdk']);
        $this->db->bind('prod_name',$data['name_prdk']);
        $this->db->bind('supplier_id',$data['supplier_prdk']);
        $this->db->bind('unit_price',$data['price_prdk']);
        $this->db->bind('package',$data['package_prdk']);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function updateProduct($data)
    {
        $query = "UPDATE $this->table SET prod_name=:prod_name,supplier_id=:supplier_id,unit_price=:unit_price,package=:package WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('prod_name',$data['name_prdk']);
        $this->db->bind('supplier_id',$data['supplier_prdk']);
        $this->db->bind('unit_price',$data['price_prdk']);
        $this->db->bind('package',$data['package_prdk']);
        $this->db->bind('id', $data['id_prdk']);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function deleteProduct($id)
    {
        $query = "DELETE FROM $this->table WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function searchProduct()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT $this->table.id,$this->table.prod_name,$this->table.unit_price,$this->table.package,$this->tableJoin.companyName FROM $this->table JOIN $this->tableJoin ON $this->table.supplier_id=$this->tableJoin.id WHERE prod_name LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");

        return $this->db->resultSet();
    }
    public function getAllSupplier()
    {
        $query = "SELECT * FROM $this->tableJoin";
        $this->db->query($query);

        return $this->db->resultSet();
    }
}
