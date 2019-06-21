<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProductController extends CI_Controller {

    // product view
    public function view() 
    {
        
        $this->load->model('ProductModel');

        $productType = $_POST['productType'];
        $productView = $this->ProductModel->productView($productType);
        $productMenu = $this->ProductModel->productMenu($productType);

        $result = array('view' => $productView, 'menu' => $productMenu);

        echo json_encode($result);
    
    }

    public function categoryView()
    {
        $this->load->model('ProductModel');
        

        $categoryType = $_POST['categoryType']; 
        
        switch ($categoryType) {
            case 'Casul':
            $productView = $this->ProductModel->productView($categoryType);
            break;
            case 'Sport':
            $productView = $this->ProductModel->productView($categoryType);
            break;
            case 'Baby':
            $productView = $this->ProductModel->productView($categoryType);
            break;
            case 'Business':
            $productView = $this->ProductModel->productView($categoryType);
            break;
            default:
            $productView = $this->ProductModel->productCategoryView($categoryType);
            break;
        }

        echo json_encode($productView);
    }

    public function productInfo() 
    {
        $productCode = $_GET['productCode'];

        $this->load->model('ProductModel');

        $productInfo = $this->ProductModel->productInfoView($productCode);
        $productSize = $this->ProductModel->productSizeView($productCode);

         
        $result = array('info' => $productInfo, 'size' => $productSize);
       
        $this->load->view('product/productInfo', $result);
    }
}

