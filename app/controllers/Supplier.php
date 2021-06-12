<?php

class Supplier extends Controller{
    public function index(){
         //passing data
         $data['title'] = 'Supplier';
         $data['supplier'] = $this->model("ModelSupplier")->getAllSupplier();
         //folder view
         $this->view('templates/header',$data);
         $this->view('supplier/index',$data);
         $this->view('templates/footer');
    }
    public function insert(){

    }
    public function update(){

    }
    public function delete($id){

    }
    public function getUbah(){

    }
    public function search(){
        
    }
}