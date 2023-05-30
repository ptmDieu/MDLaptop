<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Quản lý MDLapTop...</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="icon/themify-icons/themify-icons.css">    

    <script src="Js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<div id="wrapper">    
        <!-- header -->
        <div id="header">
            <div class="imgHeader"><img src="image/logo.jpg" alt="logo_MDLapTop" /></div>
            <div class="search" style="float:left;">
            	<form action="">
                	<input type="search" id="txtSearch" placeholder="Search the site..." size="80"  style="border:2px solid rgb(239, 22, 73); margin-left: 150px; margin-top:80px; float:left;">
             	</form>
            </div>  
            <div class="l_s">
            	<button type="button" id="myLogin"><i class="ti-user"></i> Đăng nhập</button>
            	<button type="button" id="mySignup"><i class="ti-stamp"></i> Đăng ký</button>
            </div>      
        </div>
        <!-- menu -->
        <div id="menu">
        	<b> <a href="index.php" style="text-decoration:none; margin-right:100px;">TRANG CHỦ</a> 
            	<a href="admin.php" style="text-decoration:none">QUẢN LÝ</a></b>
        </div>
		<!-- phần secsion -->
		<div id="sec">
    		 <table style=" width: 100%"> 
            <tr >
                <td id="left" style="border: none; text-decoration: none; float: left; text-align: left; color: rgb(245, 120, 245); margin-left:30px">
                    <b> <a href="admin.php?CompID" style = "text-decoration:none">Quản Lý Danh Mục LAPTOP</a>
                    <br>
                    <a href="admin.php?ProdID" style = "text-decoration:none">Quản Lý Sản Phẩm Laptop</a> <b>
                </td>
                <td id="right" style="border: none; text-align: center;">
                    <?php
                    	if (isset($_REQUEST['CompID'])) {
							include_once("View/vCompany.php");
							$c = new ViewCompany();
							$c -> ViewAllCompanyAdmin();
						} elseif (isset($_REQUEST['ProdID'])){
							include_once("View/vProduct.php");
							$p = new ViewProduct();
							$p -> ViewAllProductAdmin();
						}elseif (isset($_REQUEST['AddProd'])){
							include_once("View/vAddProduct.php");
						}elseif (isset($_REQUEST['delete'])){
							include_once("View/vDelProduct.php");
						}elseif (isset($_REQUEST['updateProdID'])){
							include_once("View/vUpdateProduct.php");
						}else {
							echo "<h2>Xin chào ADMIN</h2>";
						}						
					?>
                </td>
            </tr>
        </table>	
    	</div>

        <!-- footer -->
        <div id="footer" class="aa">
            <div style="width:23%; float:left; margin-left:50px">
                <h5>CEO</h5>
                <h6><a href="#">Phung Thi My Dieu - 20119711</a></h6>
            </div>
            <div style="width:23%; float:left;">
                <h5>CHÍNH SÁCH</h5>
                <h6><a href="#">Chính sách bảo hành</a></h6>
                <h6><a href="#">Chính sách đổi trả</a></h6>
                <h6><a href="#">Quy chế hoạt động</a></h6>
                <h6><a href="#">Kinh doanh bán hàng</a></h6>
            </div>
            <div style="width:25%; float:left;">
                <h5>KẾT NỐI VỚI CHÚNG TÔI</h5>
                	<a href="#"><i class="ti-facebook"></i></a>
                	<a href="#"><i class="ti-instagram"></i>
                    <a href="#"><i class="ti-twitter-alt"></i></a>
                    <a href="#"><i class="ti-skype"></i></a>
                    <br><br>
                    <a href="#"><i class="ti-yahoo"></i></a>
                    <a href="#"><i class="ti-wordpress"></i></a>
                    <a href="#"><i class="ti-youtube"></i></a>
                    <a href="#"><i class="ti-google"></i></a>
            </div>
            <div style="width:23%; float:left;">
                <h5>LIÊN HỆ</h5>
                <p><a href="#">0866485827</p></a>
                <p><a href="#">MDlaptop@gmail.com.vn</p></a>
            </div>
    </div>
</body>
</html>