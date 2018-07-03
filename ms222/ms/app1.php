
<?php
include("dbconfig.php");
//แก้ไขประวัติส่วนตัว

        if($_POST['staffMethod']==2){
            if(isset($_SESSION['staff_user'])){
                if($_SESSION['staff_lv']==1){
                   
                        $id=$_SESSION['staff_ID'];
                        $str = "staff_pass='".$_POST['pass']."'";


                        $sql_update = "update staff set ".$str." where staff_ID='".$_POST['idstaff']."'";
                        $query_update = $db_connection->query($sql_update); 
                        if($query_update){
                            header("location:index_lv1.php?removed=3");
                            exit();
                        }
                        else{
                            echo "No";
                            
                        }
                    
                    
                }
                exit();
            }
            exit();
        }
   
     //ลบประวัติการศึกษา
?>