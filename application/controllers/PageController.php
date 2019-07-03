<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PageController extends CI_Controller {
  
    public function __construct() {
        parent::__construct();
        $this->load->library('cart');

    }

    // cart page
    public function cart() 
    {
        
        $this->load->view('cart/cart');
    
    }

    // sign up page
    public function signup()
    {
        $this->load->view('signup/signup');
    }

}

