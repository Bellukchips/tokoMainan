<?php

class Home extends Controller
{
    public function index()
    {
        //passing data
        $data['title']= 'Home';
        $this->view('templates/header',$data);
        //folder view
        $this->view('home/index');
        //
        $this->view('templates/footer');
    }
}
