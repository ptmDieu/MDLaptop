<?php
    class KetNoiDataBase{
        function Connect(& $conn)
        {
            $conn = mysql_connect("localhost","myDieu","12345");
            mysql_set_charset('utf8');
            if ($conn) {
                $db = mysql_select_db("mdlaptop");
                return $db;
            } else {
                return false;
            }
        }
        function DisConnect($conn)
        {
            mysql_close($conn);
        }
    }
?>