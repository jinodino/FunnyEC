<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ProductModel extends CI_model {

	

    /**
    * login function
    * @param  string  $id 
    * @param  string  $pw 
    * @return integer 1, 0 
    */
    public function productView($productType) {
        try {
            
            $sql = "SELECT num FROM main_category WHERE name = '$productType'";

            $categoryNum = $this->db->query($sql)->result();
            // id, pw select query 
            $sql = "SELECT * FROM product WHERE main_category = " . $categoryNum[0]->num;
            // query result 
            $result = $this->db->query($sql)->result();
            

            if(!$result) return 0;

        } catch (\Throwable $th) {
            //throw $th;
        }

        return $result;
    }

    public function productMenu($productType) {

        try {
            //code...

            $sql = "SELECT num FROM main_category WHERE name = '$productType'";

            $categoryNum = $this->db->query($sql)->result();

            $sql = "SELECT name FROM sub_category WHERE main_num = " . $categoryNum[0]->num;
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