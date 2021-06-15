<?php

class ModelTransaksi
{
    private $table = "tbl_order";
    private $tableJoin = "tbl_orderitem";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function insertTransaksi($data)
    {
        $query1 = "INSERT INTO $this->table VALUES (:id,:ord_date,:cus_id,:total_amount)";
        $query2 = "INSERT INTO $this->tableJoin VALUES (null,:ord_id,:prod_id,:quantity)";

        $this->db->query($query1);
        $this->db->bind('id', $data['id_order']);
        $this->db->bind('ord_date', $data['order_date']);
        $this->db->bind('cus_id', $data['id_cs']);
        $this->db->bind('total_amount', $data['total']);
        $this->db->execute();

        $this->db->query($query2);
        $this->db->bind('ord_id', $data['id_order']);
        $this->db->bind('prod_id', $data['produk_id']);
        $this->db->bind('quantity', $data['qty']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getAllProduct()
    {
        $query = "SELECT * FROM tbl_product";
        $this->db->query($query);
        return $this->db->resultSet();
    }
    public function getTransaksiById($id)
    {
        $query = "SELECT tbl_product.unit_price as price, tbl_orderitem.prod_id as prod_id, tbl_order.id as id_order, tbl_customer.id as id_cs, tbl_customer.name as name_cs, tbl_product.prod_name as name_prdk, tbl_orderitem.quantity as qty, tbl_order.total_amount as total , tbl_order.ord_date as ord_date FROM tbl_product JOIN tbl_orderitem on tbl_orderitem.prod_id=tbl_product.id JOIN tbl_order ON tbl_order.id=tbl_orderitem.ord_id JOIN tbl_customer ON tbl_customer.id=tbl_order.cus_id WHERE tbl_order.id=:id";
        $this->db->query($query);
        $this->db->bind('id',$id);
        return $this->db->single();
    }
    public function getAllTransaksi(){
        $query = "SELECT tbl_order.id as id_order, tbl_customer.id as id_cs, tbl_customer.name as name_cs, tbl_product.prod_name as name_prdk, tbl_orderitem.quantity as qty, tbl_order.total_amount as total , tbl_order.ord_date as ord_date FROM tbl_product JOIN tbl_orderitem on tbl_orderitem.prod_id=tbl_product.id JOIN tbl_order ON tbl_order.id=tbl_orderitem.ord_id JOIN tbl_customer ON tbl_customer.id=tbl_order.cus_id";
        $this->db->query($query);
        return $this->db->resultSet();
    }
    public function updateTransaksi($data){
        $query1 = "UPDATE $this->table SET ord_date=:ord_date ,total_amount=:total_amount WHERE id=:id";
        $query2 = "UPDATE $this->tableJoin SET prod_id=:prod_id,quantity=:quantity WHERE ord_id=:ord_id";

        $this->db->query($query1);
        $this->db->bind('ord_date', $data['order_date']);
        $this->db->bind('total_amount', $data['total']);
        $this->db->bind('id', $data['id_order']);
        $this->db->execute();

        $this->db->query($query2);
        $this->db->bind('prod_id', $data['produk_id']);
        $this->db->bind('quantity', $data['qty']);
        $this->db->bind('ord_id', $data['id_order']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function deleteTransaksi($id){
        $query = "DELETE FROM $this->table WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id',$id);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function searchTransaksi(){
        $keyword = $_POST['keyword'];
        $query = "SELECT tbl_order.id as id_order, tbl_customer.id as id_cs, tbl_customer.name as name_cs, tbl_product.prod_name as name_prdk, tbl_orderitem.quantity as qty, tbl_order.total_amount as total , tbl_order.ord_date as ord_date FROM tbl_product JOIN tbl_orderitem on tbl_orderitem.prod_id=tbl_product.id JOIN tbl_order ON tbl_order.id=tbl_orderitem.ord_id JOIN tbl_customer ON tbl_customer.id=tbl_order.cus_id WHERE tbl_customer.name LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword',"%$keyword%");
        return $this->db->resultSet();
    }
}
