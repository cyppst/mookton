<?php
require("dbconfig.php");
if(isset($_POST['staffMethod'])){
    if($_POST['no']=="" or $_POST['name_staff']=="" or $_POST['user']=="" or $_POST['pass']=="" or $_FILES["fileToUploadimg"]["name"]==""){
        $_SESSION['message'] = 'กรุณากรอกข้อมูลให้ครบถ้วน';
        $_SESSION['post_data'] = $_POST;
        header('Location: index_lv1.php');   
     }else{
        
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUploadimg"]["name"]);

            if (move_uploaded_file($_FILES["fileToUploadimg"]["tmp_name"], $target_file)) {
                $namefile="". basename( $_FILES["fileToUploadimg"]["name"]). "";
        
        $sql_add = "insert into staff (staff_no,staff_name,staff_birth,staff_nationality,staff_race,staff_sex,staff_email,staff_phone,staff_religion,staff_statuslove,staff_user,staff_pass,staff_actfor,staff_help,staff_position,staff_group,staff_emtype,staff_department,staff_lv,staff_img,USERID) values 
        ('".$_POST['no']."','".$_POST['name_staff']."','".$_POST['birth']."','".$_POST['nationality']."','".$_POST['race']."','".$_POST['sex']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['religion']."','".$_POST['statuslove']."','".$_POST['user']."','".$_POST['pass']."','".$_POST['actfor']."','".$_POST['help']."','".$_POST['position_staff']."','".$_POST['emtype']."','".$_POST['department2']."','".$_POST['group']."','1','".$namefile."','".$_POST['USERID']."')";
        $query_add = $db_connection->query($sql_add);
        if($query_add){
            $_SESSION['message'] = 'เพิ่มเสร็จสิ้น';
            $_SESSION['message2'] = 'success';
            header( 'Location: index_lv1.php' );
        }
        else{
            echo "<script>alert('ไม่สามารถเพิ่มได้กรุณาลองใหม่');</script>";
            echo "<script>window.location.href = window.location.href;</script>";
            exit();
        }
    }//ปีกกาปิดของ move_upload
    }
}else{//elseของif(isset($_POST['staffMethod']
    if(isset($_POST['staffMethod_edit'])){

        $id=$_SESSION["IDedit"];
        $str = "staff_no='".$_POST['no']."'
        ,staff_name='".$_POST['name_staff']."'
        ,staff_birth='".$_POST['birth']."'
        ,staff_nationality='".$_POST['nationality']."'
        ,staff_race='".$_POST['race']."'
        ,staff_sex='".$_POST['sex']."'
        ,staff_email='".$_POST['email']."'
        ,staff_phone='".$_POST['phone']."'
        ,staff_religion='".$_POST['religion']."'
        ,staff_statuslove='".$_POST['statuslove']."'
        ,staff_user='".$_POST['user']."'
        ,staff_pass='".$_POST['pass']."'
        ,staff_actfor='".$_POST['actfor']."'
        ,staff_help='".$_POST['help']."'
        ,staff_position='".$_POST['position_staff']."'
        ,staff_group='".$_POST['group']."'
        ,staff_emtype='".$_POST['emtype']."'
        ,staff_department='".$_POST['department2']."'
        ,USERID='".$_POST['USERID']."'";

        if($_FILES['file']['size']>0){
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["file"]["name"]);
            $uploadOk = 1;
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                echo "ชื่อไฟล์". basename( $_FILES["file"]["name"]). " has been uploaded.";
                $namefile="". basename( $_FILES["file"]["name"]). "";
                $str .=",staff_img='".$namefile."'";
                $sql_update = "update staff set ".$str." where staff_ID='".$_POST['idstaff']."'";
                $query_update = $db_connection->query($sql_update);
                if($query_update){
                    $_SESSION['message'] = 'แก้ไขเสร็จสิ้น';
                    $_SESSION['message2'] = 'success';
                    header( 'Location: index_lv1.php?IDedit='.$id.'#profile' );
                }else{
                    header("location:app.php");
                    echo "No";
                }
            }else{
                echo "Not Upload";
            }
        }else{
            $sql_update = "update staff set ".$str." where staff_ID='".$_POST['idstaff']."'";
            $query_update = $db_connection->query($sql_update); 
            if($query_update){
                $_SESSION['message'] = 'แก้ไขเสร็จสิ้น';
                $_SESSION['message2'] = 'success';
                header( 'Location: index_lv1.php?IDedit='.$id.'#profile' );
            }
            else{
                echo "No";
                
            }
        }
         
    
    }else{
        if(isset($_GET['Delstaff'])){
            
            $sql = "delete from staff where staff_ID='".$_GET['Delstaff']."'";
            $query = $db_connection->query($sql);
            if($query){
                $_SESSION['message'] = 'ลบเสร็จสิ้น';
                $_SESSION['message2'] = 'success';
                header( 'Location: index_lv1.php' );
            }
            else{
                echo "<script>alert('ไม่สามารถลบได้');</script>";
                echo "<script>window.location.href = window.location.href;</script>";
                exit();
            }
            exit();
        }
    }
}


?>