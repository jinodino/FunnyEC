<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OrderController extends CI_Controller {
  
    public function __construct() {
        parent::__construct();
        $this->load->library('cart');
        // $this->load->library('email');
    }

    // cart page
    public function orderPage() 
    {
        
        //  post 
        $code  = $_GET['code'];
        $qty   = $_GET['qty'];
        $price = $_GET['price'];
        $name  = $_GET['name'];
        // option 'options' => array('Size' => 'L', 'Color' => 'Red')
        $img   = $_GET['img'];
        $size  = $_GET['size'];

        $arr = array();
        
        $orderArr = array(
            'code'        => $code,
            'qty'       => $qty,
            'price'     => $price,
            'name'      => $name,
            'size'      => $size,
            'img'       => $img
        );

        array_push($arr, $orderArr);

        $data = array('info' => array( 
            'test' => $arr
        ));
    
        $this->load->view('order/order', $data);

    }

    public function cartOrderPage()
    {

        $arr = array();
        
        foreach ($this->cart->contents() as $items) {
            $orderArr = array (
                'code'  => $items['id'],
                'qty'   => $items['qty'],
                'price' => $items['price'],
                'name'  => $items['name'],
                'size'  => $this->cart->product_options($items['rowid'])['size'],
                'img'   => $this->cart->product_options($items['rowid'])['img']
            );
            array_push($arr, $orderArr);
        }

        

        $data = array('info' => array( 
            'test' => $arr
        ));

        $this->load->view('order/order', $data);
    }

    public function order()
    {
        $member      = $_POST['member'];
        $email       = $_POST['email'];
        $phone       = $_POST['phone'];
        $reName      = $_POST['reName'];
        $rePhone     = $_POST['rePhone'];
        $destination = $_POST['destination'];
        $memo        = $_POST['memo'];
        $payment     = $_POST['payment'];
        $money       = $_POST['money'];
        
        $this->load->library('email');
        $config['protocol'] = "smtp";
        $config['mailtype'] = "html";
        $config['smtp_host'] = "smtp.naver.com";
        $config['smtp_user'] = "sonjh32";
        $config['smtp_pass'] = "wlsgh950";
        $config['smtp_port'] = "587";
        $config['smtp_crypto'] = "tls";         
        $config['charset']  = 'utf-8';
        /* Naver */
        

        $this->email->initialize($config);
            
        $this->email->from('asdasd@naver.com', 'asd');        
        
        $this->email->to('sonjh32@naver.com'); 
            
        $this->email->subject('메일 제목');
        $this->email->message('asd');  
            
        if ( ! $this->email->send())
        {
                // Generate error
                echo "ERROR";
        } else {
                    echo "Successfully";
        }        
        echo $this->email->print_debugger();


 
        // cart delete
        // $this->cart->destroy();
    }

}

