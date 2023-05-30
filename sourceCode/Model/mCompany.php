<?php
    include_once("ketnoi.php");
    class ModelCompany{
        function SelectAllCompany(){
            $conn;
            $p = new KetNoiDataBase();
            if($p -> Connect($conn)){
                $query = "select * from company";
                $tbl = mysql_query($query);
                $p -> DisConnect($conn);
                return $tbl;
            }else {
                return false;
            }
        }
    }
?>