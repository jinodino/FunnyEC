<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	// public function __construct() {
    //     parent::__construct();
    //     $this->load->library('session');
    // }
	

	// test main page
	public function gogo() {
		// $file_handle  = fopen("c:/dev/Apache24/logs/access.log", "r");

		// while (!feof($file_handle)) {

		// 	$line_of_text = fgets($file_handle);

		// 	$list
			
			
			
		// 	print $line_of_text . "\n";
		// 	flush();
			
		// }
        
    	// fclose($file_handle);
		$this->load->view('product/product_main');
	}

	// regist
	public function regist() {
		$this->load->model('RegistrationModel');

		$id   = $_POST['customerId'];
		$pw   = $_POST['customerPassword'];
		$name = $_POST['customerName'];
		$ph   = $_POST['customerPhone'];

		$result = $this->RegistrationModel->register($id, $pw, $name, $ph);
		
		if(!$result) echo 0;


		echo 1;
	}
	
	// login
	public function login()
	{
		$this->load->model('RegistrationModel');
		
	
        $id = $_POST['customerId'];
        $pw = $_POST['customerPassword'];
		
		$result_data = $this->RegistrationModel->login($id, $pw);

		if(!$result_data) { echo 0; }
		else { 
			// session set
			$_SESSION['id'] = $id;
			$_SESSION['password'] = $pw;
			$sessionData = array( 
				'id' => $id,
				'password' => $pw
			);

			echo json_encode($sessionData);
		}
	
	}

	// logout
	function logout() {
		session_start();
		session_destroy();
		echo 1;
	}

	// test function
	function test() {
		$this->load->view('test');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */