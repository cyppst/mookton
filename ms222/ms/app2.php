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
            header( 'Location: index_lv2.php' );
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
        ,staff_department='".$_POST['department2']."'";

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
                    header( 'Location: edit_staff.php?IDedit='.$id.'#profile' );
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
                header( 'Location: edit_staff.php?IDedit='.$id.'#profile' );
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
                header( 'Location: index_lv2.php' );
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










////////////////////ประวัติการศึกษา
if(isset($_POST['eduMethod'])){
    $id=$_SESSION['IDedit'];
    if($_POST['addlv']=="" or $_POST['addfaculty']=="" or $_POST['addname']=="" or $_POST['addyear_edu']==""){
        $_SESSION['message'] = 'กรุณากรอกข้อมูลให้ครบถ้วน';
        $_SESSION['message2'] = 'warning';
        header('Location: edit_staff.php?IDedit='.$id.'#education');   
        
    }else{
        
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUploadadd"]["name"]);
        //$uploadOk = 1;
        //$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        
            if (move_uploaded_file($_FILES["fileToUploadadd"]["tmp_name"], $target_file)) {
                $namefile="". basename( $_FILES["fileToUploadadd"]["name"]). "";
                $sql_add = "insert into education (edu_lv,edu_faculty,edu_name,edu_year,edu_doc,staff_ID) values ('".$_POST['addlv']."','".$_POST['addfaculty']."','".$_POST['addname']."','".$_POST['addyear_edu']."','".$namefile."','".$_SESSION['IDedit']."')";
                $query_add = $db_connection->query($sql_add);
                if($query_add){
                    $_SESSION['message'] = 'เพิ่มเสร็จสิ้น';
                    $_SESSION['message2'] = 'success';
                    header( 'Location: edit_staff.php?IDedit='.$id.'#education' );
                }else{
                    echo "No";
                }
            }//ปิด if move upload
    }//else ==""
}else{//ของ isset edumethos
    if(isset($_POST['eduMethod2'])){
        $id=$_SESSION['IDedit'];
        $str = "edu_lv='".$_POST['lv']."',edu_faculty='".$_POST['faculty']."',edu_name='".$_POST['name']."',edu_year='".$_POST['year2']."' ";
        if($_FILES['fileToUpload']['size']>0){
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "ชื่อไฟล์". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                $namefile="". basename( $_FILES["fileToUpload"]["name"]). "";
                $str .=",edu_doc='".$namefile."'";
                $sql_update = "update education set ".$str." where edu_ID='".$_POST['idedu']."'";
                $query_update = $db_connection->query($sql_update);
                if($query_update){
                    $_SESSION['message'] = 'แก้ไขเสร็จสิ้น';
                    $_SESSION['message2'] = 'success';
                    header( 'Location: edit_staff.php?IDedit='.$id.'#education' );
                }else{
                    header("location:app.php");
                    echo "No";
                }
            }else{
                echo "Not Upload";
            }
        }else{//ปีกกาปิด if size
			$sql_update = "update education set ".$str." where edu_ID='".$_POST['idedu']."'";
            $query_update = $db_connection->query($sql_update);
            if($query_update){
                $_SESSION['message'] = 'แก้ไขเสร็จสิ้น';
                $_SESSION['message2'] = 'success';
                header( 'Location: edit_staff.php?IDedit='.$id.'#education' );
            }else{
                header("location:app.php");
                echo "No";
            }
        }
    }else{//else isset edu2
        
 if(isset($_GET['Deledu'])){
    $id=$_SESSION['IDedit'];
    $sql = "delete from education where edu_ID='".$_GET['Deledu']."'";
    $query = $db_connection->query($sql);
    if($query){
        $_SESSION['message'] = 'ลบเสร็จสิ้น';
        $_SESSION['message2'] = 'success';
        header( 'Location: edit_staff.php?IDedit='.$id.'#education' );
    }
    else{
        echo "<script>alert('ไม่สามารถลบได้');</script>";
        echo "<script>window.location.href = window.location.href;</script>";
        exit();
    }
    exit();
}

    }// close isset edu 2
}//ปิดของ else isset edumethod





/////////////////////// job
if(isset($_POST['jobMethod'])){
    $id=$_SESSION['IDedit'];
    if($_POST['addposition']=="" or $_POST['adddepartment']=="" or $_POST['addyear']==""){
        $_SESSION['message'] = 'กรุณากรอกข้อมูลให้ครบถ้วน';
        $_SESSION['message2'] = 'warning';
        header( 'Location: edit_staff.php?IDedit='.$id.'#job' );
    }else{//else ==""
        
        $sql_add = "insert into job (job_position,job_department,job_year,staff_ID) values ('".$_POST['addposition']."','".$_POST['adddepartment']."','".$_POST['addyear']."','".$_SESSION['IDedit']."')";
        $query_add = $db_connection->query($sql_add);
        if($query_add){
            $_SESSION['message'] = 'เพิ่มเสร็จสิ้น';
            $_SESSION['message2'] = 'success';
            header( 'Location: edit_staff.php?IDedit='.$id.'#job' );
        }
        else{
            echo "<script>alert('ไม่สามารถเพิ่มได้กรุณาลองใหม่');</script>";
            echo "<script>window.location.href = window.location.href;</script>";
            exit();
        }
    }//ปีกกาปิด else if==""
}else{//else isset jobMethod
    if(isset($_POST['jobMethod2'])){
        $id=$_SESSION['IDedit'];
        $str = "job_position='".$_POST['position']."',job_department='".$_POST['department']."',job_year='".$_POST['year']."'";
        $sql_update = "update job set ".$str." where job_ID='".$_POST['id']."'";
        $query_update = $db_connection->query($sql_update); 
        if($query_update){
            $_SESSION['message'] = 'แก้ไขเสร็จสิ้น';
            $_SESSION['message2'] = 'success';
            header( 'Location: edit_staff.php?IDedit='.$id.'#job' );
            // exit;
        }
        else{
            echo "<script>alert('ไม่สามารถเพิ่มได้กรุณาลองใหม่');</script>";
            echo "<script>window.location.href = window.location.href;</script>";
            exit();
        } 
    }else{//else isset jobMethod2
        if(isset($_GET['Deljob'])){
            $id=$_SESSION['IDedit'];
            $sql = "delete from job where job_ID='".$_GET['Deljob']."'";
            $query = $db_connection->query($sql);
            if($query){
                $_SESSION['message'] = 'ลบเสร็จสิ้น';
                $_SESSION['message2'] = 'success';
                header( 'Location: edit_staff.php?IDedit='.$id.'#job' );
            }
            else{
                echo "<script>alert('ไม่สามารถลบได้');</script>";
                echo "<script>window.location.href = window.location.href;</script>";
                exit();
            }
            exit();
        }
    }
}//ปิกกาปิด else isset jobMethod




////////////////////////// การฝึกอบรม
if(isset($_POST['trainMethod'])){
    $id=$_SESSION['IDedit'];
    if($_POST['addsub']=="" or $_POST['adddepartmenttrain']==""  or $_POST['addlocation']=="" or $_POST['addyeartrain']==""){
        $_SESSION['message'] = 'กรุณากรอกข้อมูลให้ครบถ้วน';
        $_SESSION['message2'] = 'warning';
        header( 'Location: edit_staff.php?IDedit='.$id.'#train' );
    }else{
        
        $sql_add = "insert into train (train_sub,train_department,train_location,train_year,staff_ID) values ('".$_POST['addsub']."','".$_POST['adddepartmenttrain']."','".$_POST['addlocation']."','".$_POST['addyeartrain']."','".$_SESSION['IDedit']."')";
        $query_add = $db_connection->query($sql_add);
        if($query_add){
            $_SESSION['message'] = 'เพิ่มเสร็จสิ้น';
            $_SESSION['message2'] = 'success';
            header( 'Location: edit_staff.php?IDedit='.$id.'#train' );
            }
        else{
            echo "<script>alert('ไม่สามารถเพิ่มได้กรุณาลองใหม่');</script>";
            echo "<script>window.location.href = window.location.href;</script>";
            exit();
        }
    }
    
}else{
    if(isset($_POST['trainMethod2'])){
        
        $id=$_SESSION['IDedit'];
        $str = "train_sub='".$_POST['sub']."',train_department='".$_POST['departmenttrain']."',train_location='".$_POST['location']."',train_year='".$_POST['yeartrain']."'";
        $sql_update = "update train set ".$str." where train_ID='".$_POST['idtrain']."'";
        $query_update = $db_connection->query($sql_update); 
        if($query_update){
            $_SESSION['message'] = 'แก้ไขเสร็จสิ้น';
            $_SESSION['message2'] = 'success';
            header( 'Location: edit_staff.php?IDedit='.$id.'#train' );
        }
        else{
            echo "<script>alert('ไม่สามารถเพิ่มได้กรุณาลองใหม่');</script>";
            echo "<script>window.location.href = window.location.href;</script>";
            exit();
        }
    }else{
           
    if(isset($_GET['Deltrain'])){
        $id=$_SESSION['IDedit'];
        $sql = "delete from train where train_ID='".$_GET['Deltrain']."'";
        $query = $db_connection->query($sql);
        if($query){
            $_SESSION['message'] = 'ลบเสร็จสิ้น';
            $_SESSION['message2'] = 'success';
            header( 'Location: edit_staff.php?IDedit='.$id.'#train' );
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


//////////////////// ไปราชการ
if(isset($_POST['gojobMethod'])){
    $id=$_SESSION['IDedit'];
    if($_POST['addsubgojob']=="" or $_POST['addyeargojob']==""  or $_POST['addnogojob']==""){
        $_SESSION['message'] = 'กรุณากรอกข้อมูลให้ครบถ้วน';
        $_SESSION['message2'] = 'warning';
        header( 'Location: edit_staff.php?IDedit='.$id.'#gojob' );
    }else{
       
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["addfilegojob"]["name"]);
        //$uploadOk = 1;
        //$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        
            if (move_uploaded_file($_FILES["addfilegojob"]["tmp_name"], $target_file)) {
                $namefile="". basename( $_FILES["addfilegojob"]["name"]). "";
                $sql_add = "insert into gojob (gojob_no,gojob_sub,gojob_year,gojob_doc,staff_ID) values ('".$_POST['addnogojob']."','".$_POST['addsubgojob']."','".$_POST['addyeargojob']."','".$namefile."','".$_SESSION['IDedit']."')";
                $query_add = $db_connection->query($sql_add);
                if($query_add){
                    $_SESSION['message'] = 'เพิ่มเสร็จสิ้น';
                    $_SESSION['message2'] = 'success';
                    header( 'Location: edit_staff.php?IDedit='.$id.'#gojob' );
                }else{
                    echo "No";
                }
            }//ปิด if move upload
    }
}else{// else isset gojobMethod
    if(isset($_POST['gojobMethod2'])){

        $id=$_SESSION['IDedit'];
        $str = "gojob_no='".$_POST['nogojob']."',gojob_sub='".$_POST['subgojob']."',gojob_year='".$_POST['yeargojob']."' ";
        if($_FILES['fileToUpload3']['size']>0){
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload3"]["name"]);
            $uploadOk = 1;
            if (move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $target_file)) {
                echo "ชื่อไฟล์". basename( $_FILES["fileToUpload3"]["name"]). " has been uploaded.";
                $namefile="". basename( $_FILES["fileToUpload3"]["name"]). "";
                $str .=",gojob_doc='".$namefile."'";

                $sql_update = "update gojob set ".$str." where gojob_ID='".$_POST['idgojob']."'";
                $query_update = $db_connection->query($sql_update);
                if($query_update){
                    $_SESSION['message'] = 'แก้ไขเสร็จสิ้น';
                    $_SESSION['message2'] = 'success';
                    header( 'Location: edit_staff.php?IDedit='.$id.'#gojob' );
                }else{
                    header("location:app.php");
                    echo "No";
                }
            }else{
                echo "Not Upload";
            }
        }else{//ปีกกาปิด if size
			$sql_update = "update gojob set ".$str." where gojob_ID='".$_POST['idgojob']."'";
            $query_update = $db_connection->query($sql_update);
            if($query_update){
                $_SESSION['message'] = 'แก้ไขเสร็จสิ้น';
                $_SESSION['message2'] = 'success';
                header( 'Location: edit_staff.php?IDedit='.$id.'#gojob' );
            }else{
                header("location:app.php");
                echo "No";
            }
        }

    }else{//else isset gojob2

        
 if(isset($_GET['Delgojob'])){
    $id=$_SESSION['IDedit'];
    $sql = "delete from gojob where gojob_ID='".$_GET['Delgojob']."'";
    $query = $db_connection->query($sql);
    if($query){
        $_SESSION['message'] = 'ลบเสร็จสิ้น';
        $_SESSION['message2'] = 'success';
        header( 'Location: edit_staff.php?IDedit='.$id.'#gojob' );
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




////////////////////////////////การเลื่อนขั้น

if(isset($_POST['salaryMethod'])){
    $id=$_SESSION['IDedit'];
    if($_POST['adddatesalary']=="" or $_POST['addpositionsalary']==""  or $_POST['addlvsalary']=="" or $_POST['addstepsalary']=="" or $_POST['addcomsalary']==""){
        $_SESSION['message'] = 'กรุณากรอกข้อมูลให้ครบถ้วน';
        $_SESSION['message2'] = 'warning';
        header( 'Location: edit_staff.php?IDedit='.$id.'#salary' );
    }else{
        
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["addfilesalary"]["name"]);
        //$uploadOk = 1;
        //$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        
            if (move_uploaded_file($_FILES["addfilesalary"]["tmp_name"], $target_file)) {
                $namefile="". basename( $_FILES["addfilesalary"]["name"]). "";
                $sql_add = "insert into salary (salary_date,salary_position,salary_lv,salary_step,salary_command,salary_doc,staff_ID) values ('".$_POST['adddatesalary']."','".$_POST['addpositionsalary']."','".$_POST['addlvsalary']."','".$_POST['addstepsalary']."','".$_POST['addcomsalary']."','".$namefile."','".$_SESSION['IDedit']."')";
                $query_add = $db_connection->query($sql_add);
                if($query_add){
                    $_SESSION['message'] = 'เพิ่มเสร็จสิ้น';
                    $_SESSION['message2'] = 'success';
                    header( 'Location: edit_staff.php?IDedit='.$id.'#salary' );
                }else{
                    echo "No";
                }
            }//ปิด if move upload
    }
}else{
    if(isset($_POST['salaryMethod2'])){
     
        $id=$_SESSION['IDedit'];
        $str = "salary_date='".$_POST['datesalary']."',salary_position='".$_POST['positionsalary']."',salary_lv='".$_POST['lvsalary']."',salary_step='".$_POST['stepsalary']."',salary_command='".$_POST['comsalary']."' ";

        if($_FILES['fileToUpload5']['size']>0){
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload5"]["name"]);
            $uploadOk = 1;
            if (move_uploaded_file($_FILES["fileToUpload5"]["tmp_name"], $target_file)) {
                echo "ชื่อไฟล์". basename( $_FILES["fileToUpload5"]["name"]). " has been uploaded.";
                $namefile="". basename( $_FILES["fileToUpload5"]["name"]). "";
                $str .=",salary_doc='".$namefile."'";
                $sql_update = "update salary set ".$str." where salary_ID='".$_POST['idsalary']."'";
                $query_update = $db_connection->query($sql_update);
                if($query_update){
                    $_SESSION['message'] = 'แก้ไขเสร็จสิ้น';
                    $_SESSION['message2'] = 'success';
                    header( 'Location: edit_staff.php?IDedit='.$id.'#salary' );
                }else{
                    header("location:app.php");
                    echo "No";
                } 
            }else{
                echo "Not Upload";
            }
        }else{
            $sql_update = "update salary set ".$str." where salary_ID='".$_POST['idsalary']."'";
            $query_update = $db_connection->query($sql_update);
            if($query_update){
                $_SESSION['message'] = 'แก้ไขเสร็จสิ้น';
                $_SESSION['message2'] = 'success';
                header( 'Location: edit_staff.php?IDedit='.$id.'#salary' );
            }else{
                header("location:app.php");
                echo "No";
            } 
        }
    }else{
        if(isset($_GET['Delsalary'])){
            $id=$_SESSION['IDedit'];
            $sql = "delete from salary where salary_ID='".$_GET['Delsalary']."'";
            $query = $db_connection->query($sql);
            if($query){
                //echo "<script>window.top.location.reload();</script>";
                $_SESSION['message'] = 'ลบเสร็จสิ้น';
                $_SESSION['message2'] = 'success';
                header( 'Location: edit_staff.php?IDedit='.$id.'#salary' );
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





/////////////////////// rank
if(isset($_POST['rankMethod'])){
    $id=$_SESSION['IDedit'];
    if($_POST['addrankyear']=="" or $_POST['addranklv']=="" or $_POST['addranksub']==""){
        $_SESSION['message'] = 'กรุณากรอกข้อมูลให้ครบถ้วน';
        $_SESSION['message2'] = 'warning';
        header( 'Location: edit_staff.php?IDedit='.$id.'#rank' ); 
    }else{//else ==""
        
        $sql_add = "insert into rank (rank_year,rank_lv,rank_sub,rank_part,rank_page,rank_no,rank_date,staff_ID) values ('".$_POST['addrankyear']."','".$_POST['addranklv']."','".$_POST['addranksub']."','".$_POST['addrankpart']."','".$_POST['addrankpage']."','".$_POST['addrankno']."','".$_POST['addrankdate']."','".$_SESSION['IDedit']."')";
        $query_add = $db_connection->query($sql_add);
        if($query_add){
            $_SESSION['message'] = 'เพิ่มเสร็จสิ้น';
            $_SESSION['message2'] = 'success';
            header( 'Location: edit_staff.php?IDedit='.$id.'#rank' );
        }
        else{
            echo "<script>alert('ไม่สามารถเพิ่มได้กรุณาลองใหม่');</script>";
            echo "<script>window.location.href = window.location.href;</script>";
            exit();
        }
    }//ปีกกาปิด else if==""
}else{//else isset jobMethod
    if(isset($_POST['rankMethod2'])){
        $id=$_SESSION['IDedit'];
        $str = "rank_year='".$_POST['rankyear']."',rank_lv='".$_POST['ranklv']."',rank_sub='".$_POST['ranksub']."',rank_part='".$_POST['rankpart']."',rank_page='".$_POST['rankpage']."',rank_no='".$_POST['rankno']."',rank_date='".$_POST['rankdate']."'";
        $sql_update = "update rank set ".$str." where rank_ID='".$_POST['idrank']."'";
        $query_update = $db_connection->query($sql_update); 
        if($query_update){
            $_SESSION['message'] = 'แก้ไขเสร็จสิ้น';
            $_SESSION['message2'] = 'success';
            header( 'Location: edit_staff.php?IDedit='.$id.'#rank' );
        }
        else{
            echo "<script>alert('ไม่สามารถเพิ่มได้กรุณาลองใหม่');</script>";
            echo "<script>window.location.href = window.location.href;</script>";
            exit();
        } 
    }else{//else isset jobMethod2
        if(isset($_GET['Delrank'])){
            $id=$_SESSION['IDedit'];
            $sql = "delete from rank where rank_ID='".$_GET['Delrank']."'";
            $query = $db_connection->query($sql);
            if($query){
                $_SESSION['message'] = 'ลบเสร็จสิ้น';
                $_SESSION['message2'] = 'success';
                header( 'Location: edit_staff.php?IDedit='.$id.'#rank' );
            }
            else{
                echo "<script>alert('ไม่สามารถลบได้');</script>";
                echo "<script>window.location.href = window.location.href;</script>";
                exit();
            }
            exit();
        }
    }
}//ปิกกาปิด else isset jobMethod







////////////////////////////////การลา

if(isset($_POST['leaveMethod'])){
    $id=$_SESSION['IDedit'];
    if($_POST['addleavetype']=="" or $_POST['addleavedate']==""  or $_POST['addleaveok']==""){
        $_SESSION['message'] = 'กรุณากรอกข้อมูลให้ครบถ้วน';
        $_SESSION['message2'] = 'warning';
        header( 'Location: edit_staff.php?IDedit='.$id.'#leave' );
    }else{
        
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["addleavefile"]["name"]);
        //$uploadOk = 1;
        //$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        
            if (move_uploaded_file($_FILES["addleavefile"]["tmp_name"], $target_file)) {
                $namefile="". basename( $_FILES["addleavefile"]["name"]). "";
                $sql_add = "insert into historyleave (leave_type,leave_date,leave_ok,leave_doc,staff_ID) values ('".$_POST['addleavetype']."','".$_POST['addleavedate']."','".$_POST['addleaveok']."','".$namefile."','".$_SESSION['IDedit']."')";
                $query_add = $db_connection->query($sql_add);
                if($query_add){
                    $_SESSION['message'] = 'เพิ่มเสร็จสิ้น';
                    $_SESSION['message2'] = 'success';
                    header( 'Location: edit_staff.php?IDedit='.$id.'#leave' );
                }else{
                    echo "No";
                }
            }//ปิด if move upload
    }
}else{
    if(isset($_POST['leaveMethod2'])){
     
        $id=$_SESSION['IDedit'];
        $str = "leave_type='".$_POST['leavetype']."',leave_date='".$_POST['leavedate']."',leave_ok='".$_POST['leaveok']."',leave_doc='".$_POST['leavedoc']."'";

        if($_FILES['leavefile2']['size']>0){
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["leavefile2"]["name"]);
            $uploadOk = 1;
            if (move_uploaded_file($_FILES["leavefile2"]["tmp_name"], $target_file)) {
                echo "ชื่อไฟล์". basename( $_FILES["leavefile2"]["name"]). " has been uploaded.";
                $namefile="". basename( $_FILES["leavefile2"]["name"]). "";
                $str .=",leave_doc='".$namefile."'";
                $sql_update = "update historyleave set ".$str." where leave_ID='".$_POST['idleave']."'";
                $query_update = $db_connection->query($sql_update);
                if($query_update){
                    $_SESSION['message'] = 'แก้ไขเสร็จสิ้น';
                    $_SESSION['message2'] = 'success';
                    header( 'Location: edit_staff.php?IDedit='.$id.'#leave' );
                }else{
                    header("location:app.php");
                    echo "No";
                } 
            }else{
                echo "Not Upload";
            }
        }else{
            $sql_update = "update historyleave set ".$str." where leave_ID='".$_POST['idleave']."'";
            $query_update = $db_connection->query($sql_update);
            if($query_update){
                $_SESSION['message'] = 'แก้ไขเสร็จสิ้น';
                $_SESSION['message2'] = 'success';
                header( 'Location: edit_staff.php?IDedit='.$id.'#leave' );
            }else{
                header("location:app.php");
                echo "No";
            } 
        }
    }else{
        if(isset($_GET['Delleave'])){
            $id=$_SESSION['IDedit'];
            $sql = "delete from historyleave where leave_ID='".$_GET['Delleave']."'";
            $query = $db_connection->query($sql);
            if($query){
                $_SESSION['message'] = 'ลบเสร็จสิ้น';
                $_SESSION['message2'] = 'success';
                header( 'Location: edit_staff.php?IDedit='.$id.'#leave' );
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