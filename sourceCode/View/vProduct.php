<?php
    include_once("Controller/cProduct.php");
    class ViewProduct{
        function ViewAllProduct()
        {
            $p = new ControlProduct();
            $tbl = $p -> GetAllProduct();
            $this -> DisplayAllProduct($tbl);
        }

        function ViewAllProductByCompany($compID)
        {
            $p = new ControlProduct();
            $tbl = $p -> GetAllProductByCompany($compID);
            $this -> DisplayAllProduct($tbl);
        }
        
        //hiển thị theo tên sản phẩm
        function ViewAllProductBySearch($key)
        {
            $p = new ControlProduct();
            $tbl = $p -> getAllProductBySearch($key);
            $this -> DisplayAllProduct($tbl);
        }
		
		//hiển thị theo giá sản phẩm
		function ViewAllProductByPrice($price)
        {
          	$p = new ControlProduct();
            $tbl = $p -> getAllProductByPrice($price);
            $this -> DisplayAllProduct($tbl);
        }
		
        //
        function DisplayAllProduct($tbl)
        {
            if($tbl){
                if (mysql_num_rows($tbl)>0) {
                    $p = new ControlProduct();
                    $dem = 0;
                    echo '<table style = "width:100%">';
                        while ($row = mysql_fetch_assoc($tbl)) {
                            if($dem==0){
                                echo '<tr>';
                            }
                            echo '<td style = "text-align:center;width:25%;height:100px">';
                            echo '<img src="image/'.$row['ProdImage'].'" height="200px" width = "200px">'."<br>";
                            echo '<b>'.$row['ProdName'].'</b>'.'<br>';
                            echo '<b style="color:red">'.$row['ProdPrice'].' VNĐ</b>'.'<br>';
                            echo '</td>';
                            $dem++;
                            if($dem%5==0){
                                echo '</tr>';
                                $dem = 0;
                            }
                        }
                    echo '</table>';
                }else{
                    echo "0 Results";
                }
            }else{
                echo "ERROR";
            }
        }
		
        function ViewAllProductAdmin()
        {
            $p = new ControlProduct();
            $tbl = $p -> GetAllProduct();
            $this -> DisplayAllProductAdmin($tbl);
        }
        function DisplayAllProductAdmin($tbl)
        {
            if($tbl){
                if(mysql_num_rows($tbl)>0){
                    echo '<h2 style = "text-align:center;color:red">Quản lý sản phẩm</h2>';
                    echo '<h3 style = "text-align:center"><a href="admin.php?AddProd" style = "text-decoration:none">Thêm sản phẩm</a></h3>';
                    echo '<table border="1px solid" style = "width:100%;margin-left:-70px">';
                    echo '
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Image</th>
                            <th>CompID</th>
                            <th>Action</th>
                        </tr>
                    ';
                    while ($row = mysql_fetch_assoc($tbl)) {
                        echo '
                        <tr>
                            <td>'.$row['ProdID'].'</td>
                            <td>'.$row['ProdName'].'</td>
                            <td>'.$row['ProdPrice'].'</td>
                            <td><img src="image/'.$row['ProdImage'].'" width="140px" height ="150px"></td>
                            <td>'.$row['CompID'].'</td>
                            <td>
                                <a href="admin.php?updateProdID='.$row['ProdID'].'" style = "text-decoration:none">Sửa</a>|<a href="admin.php?delete='.$row['ProdID'].'" style = "text-decoration:none" onclick= "return del()">Xóa</a>
                            </td>
                        </tr>
                        ';
                    }
                    echo '</table><br>';
                }else {
                    echo '0 Results';
                }
                
            }else{
                echo "ERROR";
            }
        }
    }
?>