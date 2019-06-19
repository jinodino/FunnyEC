<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProductController extends CI_Controller {

    // product view
	public function view() {
        
        $this->load->model('ProductModel');
        $result_data = $this->ProductModel->productView();

        echo json_encode($result_data);
    
    }

    public function productInfo() {
        $aa = $_GET['productNum'];
        $this->load->view('product/productInfo');
    }
}

