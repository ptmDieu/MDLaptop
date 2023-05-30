<?php
    include_once("ketnoi.php");
    class ModelProduct{
        function SelectAllProduct()
        {
            $conn;
            $p = new KetNoiDataBase();
            if($p -> Connect($conn)){
                $query = "select * from product";
                $tbl = mysql_query($query);
                $p -> DisConnect($conn);
                return $tbl;
            }else {
                return false;
            }
        }

        function SelectOneProduct($prodID)
        {
            $conn;
            $p = new KetNoiDataBase();
            if($p -> Connect($conn)){
                $query = "select * from product where ProdID = $prodID";
                $tbl = mysql_query($query);
                $p -> DisConnect($conn);
                return $tbl;
            }else {
                return false;
            }
        }
        
        function SelectAllProductByCompany($compID){
            $conn;
            $p = new KetNoiDataBase();
            if($p -> Connect($conn)){
                $query = "select * from product where CompID = ".$compID."";
                $tbl = mysql_query($query);
                $p -> DisConnect($conn);
                return $tbl;
            }else {
                return false;
            }
        }
        
        //tìm kiếm sản phẩm theo tên
        function SelectAllProductBySearch($key)
        {
            $conn;
            $p = new KetNoiDataBase();
            if($p -> Connect($conn)){
                $query = "select * from product where ProdName like N'%".$key."%'";
                $tbl = mysql_query($query);
                $p -> DisConnect($conn);
                return $tbl;
            }else {
                return false;
            }
            
        }
		
		//tìm kiếm sản phẩm theo giá
		function SelectAllProductByPrice($price)
		{
            $conn;
            $p = new KetNoiDataBase();
            if($p -> Connect($conn)){
                $query = "select * from product where ProdPrice like N'%".$price."%'";
                $tbl = mysql_query($query);
                $p -> DisConnect($conn);
                return $tbl;
            }else {
                return false;
            }
        }
		
		//thêm sản phẩm
        function insertProduct($ten,$gia,$hinh,$mota,$danhMuc)
        {
            $conn;
            $p = new KetNoiDataBase();
            if ($p -> Connect($conn)) {
                $string = "insert into product (ProdName,ProdPrice,ProdImage,ProdDescription,CompID) VALUES (N'$ten', $gia, N'$hinh', N'$mota' , $danhMuc)";
                $result = mysql_query($string);
                $p -> DisConnect($conn);
                return $result;
            }else {
                return false;
            }
        }
        function updateProduct($ten,$gia,$hinh,$mota,$danhMuc,$prodID) {
            $conn;
            $p = new KetNoiDataBase();
            if($p -> Connect($conn)) {
                $mota === " " ? null : $mota;
                $query = "update product set ProdName = N'$ten', ProdPrice = $gia, ProdImage = '$hinh', ProdDescription = '$mota', CompID = $danhMuc where ProdID = $prodID";
                $result = mysql_query($query);
                $p -> DisConnect($conn);
                return $result;
            } else {
                return false;
            }
        }

        function updateProductKhongHinh($ten,$gia,$mota,$danhMuc,$prodID) {
            $conn;
            $p = new KetNoiDataBase();
            if($p -> Connect($conn)) {
                $mota === " " ? null : $mota;
                $query = "update product set ProdName = N'$ten', ProdPrice = $gia, ProdDescription = '$mota', CompID = $danhMuc where ProdID = $prodID";
                $result = mysql_query($query);
                $p -> DisConnect($conn);
                return $result;
            } else {
                return false;
            }
        }

        function deleteProduct($prod)
        {
            $conn;
            $p = new KetNoiDataBase();
            if ($p -> Connect($conn)) {
                $string = "delete from product where ProdID = $prod";
                $result = mysql_query($string);
                $p -> DisConnect($conn);
                return $result;
            }else {
                return false;
            }
        }
    }
    
?>