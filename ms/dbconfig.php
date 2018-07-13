<?php
	session_start();
	$db_host = "127.0.0.1";
	$db_user = "root";
	$db_pass = "123456";
	$db_prefix = "tb_";
	$db_name = "project";
	$db_connection = new mysqli($db_host,$db_user,$db_pass,$db_name);
	if ($db_connection->connect_errno) {
   		printf("Connect failed: %s\n", $db_connection->connect_error);
    	exit();
	}
	$db_connection->set_charset("utf8");
	
	
?>
<?php
//	 session_start();
//	 $db_host = "localhost";
//	 $db_user = "root";
//	 $db_pass = "";
//	 $db_prefix = "tb_";
//	 $db_name = "novimed";
//	 $db_connection = new mysqli($db_host,$db_user,$db_pass,$db_name);
//	 if ($db_connection->connect_errno) {
//  	 	printf("Connect failed: %s\n", $db_connection->connect_error);
//   	 exit();
//	 }
//	 $db_connection->set_charset("utf8");
//	 // include_once 'class.menu.php';
//	 // $MENU = new MENU($DB_CONNECTION);
//	 include('app.php');
?>