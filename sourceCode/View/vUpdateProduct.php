<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
</head>

<?php
    include_once("Controller/cProduct.php");
    $p = new ControlProduct();
    $id1 = $_GET["updateProdID"];
    $tbl = $p -> GetOneProduct($id1);
    $row = mysql_fetch_assoc($tbl);
    $id = $row['CompID'];

    if(isset($_REQUEST["btnUpdate"])){
        $ten = $_REQUEST["txtTenSanPhamNew"];
        $gia = $_REQUEST["txtGiaSanPhamNew"];
        $hinh = $_FILES["fileAnhNew"];
        $mota = $_REQUEST["txtMoTaNew"];
        $danhMuc = $_REQUEST["txtSelectNew"];
        if (!empty($hinh['name'])){
            $kq = $p -> UpdateProduct($ten,$gia,$hinh,$mota,$danhMuc,$id1);
            if($kq == 1){
                echo "<script>alert('Update Thành Công')</script>";
                echo header("refresh:0;url='admin.php?ProdID'");
            }elseif ($kq == 0 ){
                echo "<script>alert('Update Không Thành Công')</script>";
            }elseif ($kq == -1 ){
                echo "<script>alert('Size Ảnh Bị Sai')</script>";
            }elseif ($kq == -2 ){
                echo "<script>alert('Kích Thước Ảnh Bị Sai')</script>";
            }else{
                echo "<script>alert('Upload Ảnh Không Thành Công')</script>";
            }
        } else {
            $kq = $p -> UpdateProductKhongHinh($ten,$gia,$mota,$danhMuc,$id1);
            if ($kq) {
                echo "<script>alert('Update Thành Công')</script>";
                echo header("refresh:0;url='admin.php?ProdID'");
            } else {
                echo "<script>alert('Update khÔng Thành Công')</script>";
                echo header("refresh:0;url='admin.php?ProdID'");
            }
            
        }
    }
    
?>
<body>
    <form action="" method="post" enctype = "multipart/form-data">
        
        <table style = "margin:auto">
            <center><h2>Sản Phẩm: <?php echo "".$row["ProdName"].""; ?></h2></center>
            <tr>
                <td>
                    Tên Sản Phẩm
                </td>
                <td>
                    <input type="text" name="txtTenSanPhamNew" id=""  value = "<?php echo "".$row["ProdName"].""; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Giá Sản Phẩm
                </td>
                <td>
                    <input type="number" name="txtGiaSanPhamNew" id=""  value ="<?php echo "".$row["ProdPrice"].""; ?>">
                </td>
            </tr>
            
            <tr>
                <td></td>
                <td>
                    <input type="file" name="fileAnhNew">
                </td>
            </tr>

            <tr>
                <td>
                    Hình Ảnh
                </td>
                <td>
                    <span><img src="image/<?php echo $row["ProdImage"];?>" width = "140px" height = "150px"></span>
                </td>
            </tr>
            <tr>
                <td>
                    Mô Tả
                </td>
                <td>
                    <textarea name="txtMoTaNew" id="" cols="22" rows="5" value ="<?php echo "".$row["ProdDescription"].""; ?>"></textarea>
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
                            echo '<select name="txtSelectNew" >';
                            while ($row = mysql_fetch_assoc($tblCompany)) {
                                $selected = $row['CompID'] == $id ? "selected" : "";
                                    echo '<option value="'.$row['CompID'].'" '.$selected.'>'.$row['CompName'].'</option>';
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
                    <input type="submit" value="Cập Nhật" name ="btnUpdate">
                    <a href="admin.php?ProdID" style ="text-decoration:none">Quay Lại</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>