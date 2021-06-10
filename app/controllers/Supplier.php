<?php

class Supplier extends Controller{
    public function index(){
         //passing data
         $data['title'] = 'Supplier';
         //folder view
         $this->view('templates/header',$data);
         $this->view('supplier/index');
         $this->view('templates/footer',$data);
    }
}