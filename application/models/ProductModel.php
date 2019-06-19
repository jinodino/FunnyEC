<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ProductModel extends CI_model {

	

    /**
    * login function
    * @param  string  $id 
    * @param  string  $pw 
    * @return integer 1, 0 
    */
    public function productView() {
        try {

            // id, pw select query 
            $sql = "SELECT * FROM product";
            // query result 
            $result = $this->db->query($sql)->result();

            if(!$result) return 0;

        } catch (\Throwable $th) {
            //throw $th;
        }

        return $result;
    }
}

?>