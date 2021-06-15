<?php

class Transaksi extends Controller
{

    public function index()
    {
        //passing data
        $data['title'] = 'Transaksi';
        $data['produk'] = $this->model("ModelTransaksi")->getAllProduct();
        $data['cs'] = $this->model("ModelCustomer")->getAllCustomer();
        $data['transaksi'] = $this->model("ModelTransaksi")->getAllTransaksi();
        //folder view
        $this->view('templates/header', $data);
        $this->view('transaksi/index', $data);
        $this->view('templates/footer');
    }

    public function insert()
    {
        if ($this->model('ModelTransaksi')->insertTransaksi($_POST) > 0) {
            FlashMsg::setFlash('berhasil', 'ditambahkan', 'success', 'Transaksi');
            header('Location: ' . BASEURL . 'Transaksi');
            exit;
        } else {
            FlashMsg::setFlash('gagal', 'ditambahkan', 'danger', 'Transaksi');
            header('Location: ' . BASEURL . 'Transaksi');
            exit;
        }
    }
    public function update()
    {
        if ($this->model('ModelTransaksi')->updateTransaksi($_POST) > 0) {
            FlashMsg::setFlash('berhasil', 'diubah', 'success', 'Transaksi');
            header('Location: ' . BASEURL . 'Transaksi');
            exit;
        } else {
            FlashMsg::setFlash('gagal', 'diubah', 'danger', 'Transaksi');
            header('Location: ' . BASEURL . 'Transaksi');
            exit;
        }
    }
    public function delete($id)
    {
        if ($this->model('ModelTransaksi')->deleteTransaksi($id) > 0) {
            FlashMsg::setFlash('berhasil', 'dihapus', 'success', 'Transaksi');
            header('Location: ' . BASEURL . 'Transaksi');
            exit;
        } else {
            FlashMsg::setFlash('gagal', 'dihapus', 'danger', 'Transaksi');
            header('Location: ' . BASEURL . 'Transaksi');
            exit;
        }
    }
    //get id barang
    public function getId()
    {
        echo json_encode($this->model('ModelBarang')->getProductById($_POST['id']));
    }
    public function getUbah()
    {
        echo json_encode($this->model('ModelTransaksi')->getTransaksiById($_POST['id']));
    }
    public function search(){
         //passing data
         $data['title'] = 'Transaksi';
         $data['produk'] = $this->model("ModelTransaksi")->getAllProduct();
         $data['cs'] = $this->model("ModelCustomer")->getAllCustomer();
         $data['transaksi'] = $this->model("ModelTransaksi")->searchTransaksi();
         //folder view
         $this->view('templates/header', $data);
         $this->view('transaksi/index', $data);
         $this->view('templates/footer');
    }
}
