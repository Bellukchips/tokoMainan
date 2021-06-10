<?php

class Customer extends Controller
{

    public function index()
    {
        //passing data
        $data['title'] = 'Customer';
        $data['customer'] = $this->model('ModelCustomer')->getAllCustomer();
        //folder view
        $this->view('templates/header', $data);
        $this->view('customer/index', $data);
        $this->view('templates/footer');
    }

    public function insert(){
        if ($this->model('ModelCustomer')->insertCustomer($_POST) > 0) {
            FlashMsg::setFlash('berhasil', 'ditambahkan', 'success','Customer');
            header('Location: ' . BASEURL . 'Customer');
            exit;
        } else {
            FlashMsg::setFlash('gagal', 'ditambahkan', 'danger','Customer');
            header('Location: ' . BASEURL . 'Customer');
            exit;
        }
    }
    public function delete($id)
    {
        if ($this->model("ModelCustomer")->deleteCustomer($id) > 0) {
            FlashMsg::setFlash('berhasil', 'dihapus', 'success','Customer');
            header('Location: ' . BASEURL . 'Customer');
            exit;
        } else {
            FlashMsg::setFlash('gagal', 'dihapus', 'danger','Customer');
            header('Location: ' . BASEURL . 'Customer');
            exit;
        }
    }
    public function getUbah(){
        echo json_encode($this->model('ModelCustomer')->getCustomerById($_POST['id']));

    }
    public function update(){
        if ($this->model('ModelCustomer')->updateCustomer($_POST) > 0) {
            FlashMsg::setFlash('berhasil', 'diubah', 'success','Customer');
            header('Location: ' . BASEURL . 'Customer');
            exit;
        } else {
            FlashMsg::setFlash('gagal', 'diubah', 'danger','Customer');
            header('Location: ' . BASEURL . 'Customer');
            exit;
        }
    }
}
