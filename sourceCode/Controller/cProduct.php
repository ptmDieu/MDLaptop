<?php
    include_once("Model/mProduct.php");
    class ControlProduct{
        
        function GetAllProduct()
        {
            $p = new ModelProduct();
            $tbl = $p -> SelectAllProduct();
            return $tbl;
        }
        
        function GetOneProduct($prodID)
        {
            $p = new ModelProduct();
            $tbl = $p -> SelectOneProduct($prodID);
            return $tbl;
        }
        
        function GetAllProductByCompany($compID)
        {
            $p = new ModelProduct();
            $tbl = $p -> SelectAllProductByCompany($compID);
            return $tbl;
        }
        
        //lấy sản phẩm theo tên tìm kiếm
        function getAllProductBySearch($key)
        {
            $p = new ModelProduct();
            $tbl = $p -> SelectAllProductBySearch($key);
            if(!$tbl){
                return false;
            }else if(mysql_num_rows($tbl)>0){
                return $tbl;
            }else {
                return 0;
            }
        }
		
		//lấy sản phẩm theo giá đã tìm
		function getAllProductByPrice($price)
        {
            $p = new ModelProduct();
            $tbl = $p -> SelectAllProductByPrice($price);
            if(!$tbl){
                return false;
            }else if(mysql_num_rows($tbl)>0){
                return $tbl;
            }else {
                return 0;
            }
        }
		
		//thêm sp
        function AddProduct($ten,$gia,$hinh,$mota,$danhMuc)
        {
            $loai = $hinh["type"];
            $kthuoc = $hinh["size"];
            $name = $hinh["name"];
            $tenhinh = $ten.strstr($name,".");
            $anh = $hinh["tmp_name"];
            if($loai == "image/jpeg" || $loai == "image/png"){
                if($kthuoc < 2*1024*1024){
                    $dir = "image/".$tenhinh;
                    if(move_uploaded_file($anh,$dir)){
                        $p = new ModelProduct();
                        $tblProduct = $p -> insertProduct($ten,$gia,$tenhinh,$mota,$danhMuc);
                        if(!$tblProduct){
                            return 0; // insert fail
                        }else {
                            return 1; // insert success
                        }
                    }else {
                        return -3; // upload failed
                    }
                }else{
                    return -2;//kichthuoc k hop le
                }
            }else {
                return -1; // size anh k hop le
            }
        }
        function DeleteProduct($prod)
        {
            $p = new ModelProduct();
            $result = $p -> deleteProduct($prod);
            return $result;
        }
        
        function UpdateProductKhongHinh($ten,$gia,$mota,$danhMuc,$prodI)
        {
            $p = new ModelProduct();
            $result = $p -> updateProductKhongHinh($ten,$gia,$mota,$danhMuc,$prodI);
            return $result;
        }
        
        function UpdateProduct($ten,$gia,$hinh,$mota,$danhMuc,$prodID)
        {
            $loai = $hinh["type"];
            $kthuoc = $hinh["size"];
            $name = time().'_'.$hinh["name"];
            $anh = $hinh["tmp_name"];
            $dir = "image/".$name;
            if($loai == "image/jpeg" || $loai == "image/png"){
                if($kthuoc < 2*1024*1024){
                    if(move_uploaded_file($anh,$dir)){
                        $p = new ModelProduct();
                        $tblProduct = $p -> updateProduct($ten,$gia,$name,$mota,$danhMuc,$prodID); 
                        if(!$tblProduct){
                            return 0; // update fail
                        }else {
                            return 1; // update success
                        }
                    }else {
                        return -3; // upload failed
                    }
                }else{
                    return -2;//kichthuoc k hop le
                }
            }else {
                return -1; // size anh k hop le
            }
        }
    }
?>