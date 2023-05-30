<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>

<?php
    include_once("Controller/cProduct.php");
    if(isset($_REQUEST["btnSubmit"])){
        $ten = $_REQUEST["txtTenSanPham"];
        $gia = $_REQUEST["txtGiaSanPham"];
        $mota = $_REQUEST["txtMoTa"];
        $file = $_FILES["fileAnh"];
        $danhMuc = $_REQUEST["txtSelect"];
        $p = new ControlProduct();
        $kq = $p -> AddProduct($ten,$gia,$file,$mota,$danhMuc);
        if($kq == 1){
            echo "<script>alert('Insert Thành Công')</script>";
            echo header("refresh:0;url='admin.php?ProdID'");
        }elseif ($kq == 0 ){
            echo "<script>alert('Insert Không Thành Công')</script>";
        }elseif ($kq == -1 ){
            echo "<script>alert('Loại Ảnh Bị Sai')</script>";
        }elseif ($kq == -2 ){
            echo "<script>alert('Kích Thước Ảnh Bị Sai')</script>";
        }else{
            echo "<script>alert('Upload Ảnh Không Thành Công')</script>";
        }
        
    }
?>
<body>
    <form action="#" method="post" enctype = "multipart/form-data">
        
        <table style = "margin:auto">
            <center><h2>Thêm Sản Phẩm</h2></center>
            <tr>
                <td>
                    Tên Sản Phẩm
                </td>
                <td>
                    <input type="text" name="txtTenSanPham" id="" required>
                </td>
            </tr>
            <tr>
                <td>
                    Giá Sản Phẩm
                </td>
                <td>
                    <input type="number" name="txtGiaSanPham" id="" required>
                </td>
            </tr>
            <tr>
                <td>
                    Hình Ảnh Sản Phẩm
                </td>
                <td>
                    <input type="file" name="fileAnh" id="" required>
                </td>
            </tr>
            <tr>
                <td>
                    Mô Tả
                </td>
                <td>
                    <textarea name="txtMoTa" id="" cols="22" rows="5"></textarea>
                </td>
            </tr>
            <tr>
                <td>Loại Sản Phẩm</td>
                <td>
                    <?php
                        include_once("Controller/cCompany.php");
                        $c = new ControlCompany();
                        $tblCompany = $c-> getAllCompany();
                        if(mysql_num_rows($tblCompany))
                        {
                            echo '<select name="txtSelect" required>';
                                while ($row = mysql_fetch_assoc($tblCompany)) {
                                    echo '<option value="'.$row['CompID'].'">'.$row['CompName'].'</option>';
                                }
                            echo '</select>';
                        }else {
                            echo 'Không có dữ liệu';
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Thêm" name ="btnSubmit">
                    <input type="reset" value="Nhập Lại">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>