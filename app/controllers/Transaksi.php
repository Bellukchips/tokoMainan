<?php

class Transaksi extends Controller{
    
    public function index(){
         //passing data
         $data['title'] = 'Transaksi';
         //folder view
         $this->view('templates/header',$data);
         $this->view('transaksi/index');
         $this->view('templates/footer');
    }
}