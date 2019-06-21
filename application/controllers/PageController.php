<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PageController extends CI_Controller {

    // cart page
    public function cart() 
    {
        
        $this->load->view('cart/cart');
    
    }

}

