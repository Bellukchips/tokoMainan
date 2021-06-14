<?php 

class Barang extends Controller{
    
    public function index(){
         //passing data
         $data['title'] = 'Barang';
         $data['produk'] = $this->model("ModelBarang")->getAllProduct();
         $data['supplier'] = $this->model("ModelBarang")->getAllSupplier();
         //folder view
         $this->view('templates/header',$data);
         $this->view('barang/index',$data);
         $this->view('templates/footer');
    }

    public function insert(){
        if ($this->model('ModelBarang')->insertProduct($_POST) > 0){
            FlashMsg::setFlash('berhasil', 'ditambahkan', 'success','Barang');
            header('Location: ' . BASEURL . 'Barang');
            exit;
        } else {
            FlashMsg::setFlash('gagal', 'ditambahkan', 'danger','Barang');
            header('Location: ' . BASEURL . 'Barang');
            exit;
        }
    }
    public function delete($id){
        if ($this->model("ModelBarang")->deleteProduct($id) > 0) {
            FlashMsg::setFlash('berhasil', 'dihapus', 'success','Barang');
            header('Location: ' . BASEURL . 'Barang');
            exit;
        } else {
            FlashMsg::setFlash('gagal', 'dihapus', 'danger','Barang');
            header('Location: ' . BASEURL . 'Barang');
            exit;
        }
    }
    public function getUbah(){
        echo json_encode($this->model('ModelBarang')->getProductById($_POST['id']));
    }

    public function update(){
        if ($this->model('ModelBarang')->updateProduct($_POST) > 0) {
            FlashMsg::setFlash('berhasil', 'diubah', 'success','Barang');
            header('Location: ' . BASEURL . 'Barang');
            exit;
        } else {
            FlashMsg::setFlash('gagal', 'diubah', 'danger','Barang');
            header('Location: ' . BASEURL . 'Barang');
            exit;
        }
    }
    public function search(){
        //passing data
        $data['title'] = 'Barang';
        $data['produk'] = $this->model('ModelBarang')->searchProduct();
        //folder view
        $this->view('templates/header', $data);
        $this->view('barang/index', $data);
        $this->view('templates/footer');
    }
}