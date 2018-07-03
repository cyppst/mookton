<?php
require("dbconfig.php");
if(isset($_POST['staffMethod'])){
    if($_POST['no']=="" or $_POST['name_staff']=="" or $_POST['user']=="" or $_POST['pass']=="" or $_FILES["fileToUploadimg"]["name"]==""){
        $_SESSION['message'] = 'กรุณากรอกข้อมูลให้ครบถ้วน';
        $_SESSION['post_data'] = $_POST;
        header('Location: add_staff.php');   
     }else{
        
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUploadimg"]["name"]);

            if (move_uploaded_file($_FILES["fileToUploadimg"]["tmp_name"], $target_file)) {
                $namefile="". basename( $_FILES["fileToUploadimg"]["name"]). "";
        
        $sql_add = "insert into staff (staff_no,staff_name,staff_birth,staff_nationality,staff_race,staff_sex,staff_email,staff_phone,staff_religion,staff_statuslove,staff_user,staff_pass,staff_actfor,staff_help,staff_position,staff_group,staff_emtype,staff_department,staff_lv,staff_img) values 
        ('".$_POST['no']."','".$_POST['name_staff']."','".$_POST['birth']."','".$_POST['nationality']."','".$_POST['race']."','".$_POST['sex']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['religion']."','".$_POST['statuslove']."','".$_POST['user']."','".$_POST['pass']."','".$_POST['actfor']."','".$_POST['help']."','".$_POST['position_staff']."','".$_POST['emtype']."','".$_POST['department2']."','".$_POST['group']."','1','".$namefile."')";
        $query_add = $db_connection->query($sql_add);
        if($query_add){
            $_SESSION['message'] = 'เพิ่มเสร็จสิ้น';
            $_SESSION['message2'] = 'success';
            header( 'Location: index_lv3.php' );
        }
        else{
            echo "<script>alert('ไม่สามารถเพิ่มได้กรุณาลองใหม่');</script>";
            echo "<script>window.location.href = window.location.href;</script>";
            exit();
        }
    }//ปีกกาปิดของ move_upload
    }
}
?>