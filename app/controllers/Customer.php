<?php

class Customer extends Controller{
    
    public function index(){
        //passing data
        $data['title'] = 'Customer';
        //folder view
        $this->view('templates/header',$data);
        $this->view('customer/index');
        $this->view('templates/footer');
    }
}