<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProductController extends CI_Controller {

    // product view
	public function view() {
        
        $this->load->model('ProductModel');

        $productType = $_POST['productType'];
        $productView = $this->ProductModel->productView($productType);
        $productMenu = $this->ProductModel->productMenu($productType);

        $result = array('view' => $productView, 'menu' => $productMenu);

        echo json_encode($result);
    
    }

    public function productInfo() {
        $aa = $_GET['productNum'];
        $this->load->view('product/productInfo');
    }
}

