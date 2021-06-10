<?php 

class Barang extends Controller{
    
    public function index(){
         //passing data
         $data['title'] = 'Barang';
         //folder view
         $this->view('templates/header',$data);
         $this->view('barang/index');
         $this->view('templates/footer');
    }
}