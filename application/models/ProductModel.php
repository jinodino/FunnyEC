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

    public function productCategoryView($categoryType) 
    {

        try {
            $sql = "SELECT num FROM sub_category WHERE name = '$categoryType'";

            $subCategoryNum = $this->db->query($sql)->result();

            $sql = "SELECT * FROM product WHERE sub_category = " . $subCategoryNum[0]->num;

            $result = $this->db->query($sql)->result();

            if(!$result) return 0;

        } catch (\Throwable $th) {
            //throw $th;
        }

        return $result;
    }


    // info page
    # info, size, category
    public function productInfoView($productCode)
    {
        
        try {
            $sql  = "SELECT p.*, mc.name AS mname, sc.name AS sname ";
            $sql .= "FROM ec.product AS p ";
            $sql .= "JOIN ec.main_category AS mc "; 
            $sql .= "ON p.main_category = mc.num ";
            $sql .= "JOIN ec.sub_category AS sc ";
            $sql .= "ON p.sub_category = sc.num ";
            $sql .= "WHERE p.code = $productCode";

            $result = $this->db->query($sql)->result();


            // $sql = "SELECT * FROM sub_category WHERE sub_category = " . $subCategoryNum[0]->num;

            // $result = $this->db->query($sql)->result();

            if(!$result) return 0;

        } catch (\Throwable $th) {
            //throw $th;
        }

        return $result;
    }

    public function productSizeView($productCode)
    {
        try {

           $sql = "SELECT size FROM ec.product_size WHERE product_code = $productCode";

           $result = $this->db->query($sql)->result();

           if(!$result) return 0; 

        } catch (\Throwable $th) {
            //throw $th;
        }
        
        return $result;

    }
}

?>