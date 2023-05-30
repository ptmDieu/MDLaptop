<?php
    include_once("Model/mCompany.php");
    class ControlCompany{
        function getAllCompany()
        {
            $p = new ModelCompany();
            $tbl = $p -> SelectAllCompany();
            if(!$tbl){
                return false;
            }else if(mysql_num_rows($tbl)>0){
                return $tbl;
            }else {
                return 0;
            }
        }
    }
?>