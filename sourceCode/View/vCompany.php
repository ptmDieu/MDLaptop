<?php
    include_once("Controller/cCompany.php");
    mysql_set_charset('utf8');
    class ViewCompany{
        function ViewAllCompany(){
            $p = new ControlCompany();
            $tbl = $p -> getAllCompany();
            if($tbl){
                if(mysql_num_rows($tbl)>0){
                    while ($row = mysql_fetch_assoc($tbl)) {
                        echo "<a href='index.php?CompID=".$row["CompID"]."' style='text-decoration:none;'>".$row["CompName"]."</a><br><br>";
                    }
                }else {
                    echo "0 Result";
                }
            }else {
                echo "Không Có Giá Trị";
            }
        }
        
        function ViewAllCompanyAdmin()
        {
           $p = new ControlCompany();
           $tbl = $p -> GetAllCompany();
           if ($tbl) {
                if(mysql_num_rows($tbl)>0){
                    echo '<h2 style="text-align:center;color:red">Quản Lý Danh Mục</h2>';
                    echo '<table style = "width:100%;margin:auto;margin-left:-70px;" border="1px solid">';
                    echo '
                    
                    <tr>
                         <th>Company ID</th>
                         <th>Company Name</th>
                         <th>Company Address</th>
                         <th>Company Email</th>
                         <th>Company Fax</th>
                    </tr>
                    ';
                    while ($row = mysql_fetch_array($tbl)) {
                        echo "
                        <tr>
                            <td>".$row['CompID']."</td>
                            <td>".$row['CompName']."</td>
                            <td>".$row['CompAddress']."</td>
                            <td>".$row['Email']."</td>
                            <td>".$row['CompPhone']."</td>
                        </tr>
                        ";
                    }
                    echo '</table><br>';
                }else {
                    echo "0 Result";
                }
           }else {
            echo "ERROR";
           }
        }
    }
?>
