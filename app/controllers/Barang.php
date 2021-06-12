<?php 

class Barang extends Controller{
    
    public function index(){
         //passing data
         $data['title'] = 'Barang';
         $data['produk'] = $this->model("ModelBarang")->getAllProduct();
         $data['supplier'] = $this->model("ModelBarang")->getAllSupplier();
         //folder view
         $this->view('templates/header',$data);
         $this->view('barang/index',$data);
         $this->view('templates/footer');
    }

    public function insert(){

    }
    public function delete($id){

    }
    public function getUbah(){

    }

    public function update(){

    }
    public function search(){
        
    }
}