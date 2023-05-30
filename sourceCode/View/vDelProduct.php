<?php
    include_once("Controller/cProduct.php");
    $p = new ControlProduct();
    $kq = $p -> DeleteProduct($_REQUEST["delete"]);
    if($kq){
        echo "<script>alert('Xóa dữ liệu thành công!')</script>";
        echo header("refresh:0;url='admin.php?ProdID'");
    }
?>