<?php

class Supplier extends Controller
{
    public function index()
    {
        //passing data
        $data['title'] = 'Supplier';
        $data['supplier'] = $this->model("ModelSupplier")->getAllSupplier();
        //folder view
        $this->view('templates/header', $data);
        $this->view('supplier/index', $data);
        $this->view('templates/footer');
    }
    public function insert()
    {
        if ($this->model("ModelSupplier")->insertSupplier($_POST) > 0) {
            FlashMsg::setFlash("berhasil", 'ditambahkan', 'success', 'Supplier');
            header('Location: ' . BASEURL . 'Supplier');
            exit;
        } else {
            FlashMsg::setFlash("gagal", 'ditambahkan', 'danger', 'Supplier');
            header('Location: ' . BASEURL . 'Supplier');
            exit;
        }
    }
    public function update()
    {
        if ($this->model("ModelSupplier")->updateSupplier($_POST) > 0) {
            FlashMsg::setFlash("berhasil", 'diubah', 'success', 'Supplier');
            header('Location: ' . BASEURL . 'Supplier');
            exit;
        } else {
            FlashMsg::setFlash("gagal", 'diubah', 'danger', 'Supplier');
            header('Location: ' . BASEURL . 'Supplier');
            exit;
        }
    }
    public function delete($id)
    {
        if ($this->model("ModelSupplier")->deleteSupplier($id) > 0) {
            FlashMsg::setFlash("berhasil", 'dihapus', 'success', 'Supplier');
            header('Location: ' . BASEURL . 'Supplier');
            exit;
        } else {
            FlashMsg::setFlash("gagal", 'dihapus', 'danger', 'Supplier');
            header('Location: ' . BASEURL . 'Supplier');
            exit;
        }
    }
    public function getUbah()
    {
        echo json_encode($this->model('ModelSupplier')->getSupplierById($_POST['id']));
    }
    public function search()
    {
         //passing data
         $data['title'] = 'Supplier';
         $data['supplier'] = $this->model("ModelSupplier")->searchSupplier();
         //folder view
         $this->view('templates/header', $data);
         $this->view('supplier/index', $data);
         $this->view('templates/footer');
    }
}
