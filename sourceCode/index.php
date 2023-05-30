<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> MDLapTop welcome to you! </title>

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
            <div class="l_s">
            	<button type="button" id="myLogin"><i class="ti-user"></i> Đăng nhập</button>
            	<button type="button" id="mySignup"><i class="ti-stamp"></i> Đăng ký</button>
            </div>      
        </div>
        
        <!-- menu -->
        <div id="menu">
        	<b> <a href="index.php" style="text-decoration:none; margin-right:100px;">TRANG CHỦ</a> 
            	<a href="admin.php" style="text-decoration:none">QUẢN LÝ</a></b>
           <div style="width:35%; float:right">
            	<form action="index.php" method="get">
                	<input type="text" name="txtSearchPrice" id=""/>
                	<input type="submit" value="Tìm theo giá"/>
                </form>
            </div>   
            <div style="width:35%; float:right; margin-left:10px">
            	<form action="index.php" method="get">
                	<input type="text" name="txtSearch" id=""/>
                	<input type="submit" value="Tìm theo tên"/>
                </form>
            </div>
        </div>
        
        <!-- danh sách sản phẩm -->
        <table id="main" style = "text-align: center; width: 100%; border: none;">
        <tr>
            <td id = "left" style="border: none; text-decoration: none; float: left; padding:15px">
				<b><h3  style="color: #000; margin-bottom::10px;">DANH MỤC LAPTOP</h3></b>
                <?php
                	include_once("View/vCompany.php");
                    $c = new ViewCompany();
                    $c -> ViewAllCompany();
                ?>
            </td>
            <td id = "right" style="border: none;text-decoration: none; padding-right: 20px; ">
				<h3>DANH SÁCH SẢN PHẨM</h3>
                <?php
					include_once("View/vProduct.php");
					$p = new ViewProduct();
					if(isset($_REQUEST["CompID"])) {
						$p -> ViewAllProductByCompany($_REQUEST["CompID"]);
					}else if(isset($_REQUEST["txtSearch"])){
                        // goi ham hien thi san pham theo Search
                        $p -> ViewAllProductBySearch($_REQUEST["txtSearch"]);
                    }else if(isset($_REQUEST["txtSearchPrice"])){
                        // goi ham hien thi san pham theo Search
                        $p -> ViewAllProductByPrice($_REQUEST["txtSearchPrice"]);
                    }else{
							$p -> ViewAllProduct();
					}
				?>
            </td>
        </tr>
    </table>
        
        <!-- QUẢNG CÁO -->
            <div id="adv">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                    </ol>
                    
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="image/1.jpg" alt="quang cao">
                        </div>
                        <div class="item">
                            <img src="image/2.jpg" alt="quang cao">
                        </div>
                        <div class="item">
                            <img src="image/3.jpg" alt="quang cao">
                        </div>
                        <div class="item">
                            <img src="image/4.jpg" alt="quang cao">
                        </div>
                    </div>   
            	</div>
            </div>
		<!--  -->
		

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