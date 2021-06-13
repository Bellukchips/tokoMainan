<?php

class App
{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];
    public function __construct()
    {
        $url = $this->parseURL();

        //mengambil nama controller dari url pada index ke 0
        //jika ada pada folder controllers maka akan di timpa pada attribut controller
        error_reporting(0);
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
            // var_dump($url);
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        //method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // //params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        //jalankan controller & method , serta kirim params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            //menghilangkan url dari tanda (/) untuk mengambil string
            $url = rtrim($_GET['url'], '/');
            //membersihkan url dari karakter aneh
            $url = filter_var($url, FILTER_SANITIZE_URL);

            //memisahkan url dari tanda (/)
            $url = explode('/', $url);
            error_reporting(0);

            return $url;
        }
    }
}
