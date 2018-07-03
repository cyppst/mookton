

<?php
		include("dbconfig.php");		
		$db_connection->set_charset("utf8");
		$sql = "SELECT * FROM staff where staff_user= '".($_POST['txtUsername'])."' 
		and staff_pass = '".($_POST['txtPassword'])."'";
		$result = $db_connection->query($sql);
		if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
				$_SESSION["staff_ID"] = $row["staff_ID"];
				$_SESSION["staff_user"] = $row["staff_user"];
				$_SESSION["staff_pass"] = $row["staff_pass"];
				$_SESSION["staff_lv"] = $row["staff_lv"];

	
			if($row["staff_lv"]==1){
				header('Location:index_lv1.php');
			}else{
				if($row["staff_lv"]==2){
					header('Location:index_lv2.php');
			}else{
				header('Location:index_lv3.php');
			}
			}
			

		}else{
			
				echo "<script type='text/javascript'>alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');</script>";
				
				
			}
		
	
	
	/*
	$db_connection->set_charset("utf8");
	$sql_contact = "select * from regis";
	$query_contact = $db_connection->query($sql_contact);
	$result_contact = $query_contact->fetch_assoc();
	if(isset($_POST['txtUsername']) and !isset($_SESSION['id'])){
		$sql_login = "select * from test where user='".$_POST['txtUsername']."' and pass='".md5($_POST['txtPassword'])."'";
		$query_login = $db_connection->query($sql_login);
		if($query_login->num_rows>0){
			$result_login = $query_login->fetch_assoc();
			$_SESSION['id'] = $result_login['id'];
			$_SESSION['user'] = $result_login['user'];
			echo "<script>window.location.href=window.location.href;</script>";
			exit();
		}
		else{
			echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');</script>";
		}
	}

	/*
	$strSQL = "SELECT * FROM test WHERE user = '".mysql_real_escape_string($_POST['txtUsername'])."' 
	and pass = '".mysqli_real_escape_string($_POST['txtPassword'])."'";
	$objQuery = mysqli_query($strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if(!$objResult)
	{
			echo "Username and Password Incorrect!";
	}
	else
	{
			$_SESSION["UserID"] = $objResult["UserID"];
			$_SESSION["Status"] = $objResult["Status"];

			
				header("location:index.php");
			
	}
	mysqli_close();*/
?>
