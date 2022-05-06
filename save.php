<?php
	
	$config = array(
		"db_host"  => "127.0.0.1",
		"db_login" => "root",
		"db_password" => "",
		"db_name"  => "user_details"
	);

	//making connection to database
	$conn = mysqli_connect($config['db_host'],$config['db_login'],$config['db_password'],$config['db_name']);
	if(mysqli_connect_errno()){
		echo 'connection has failed sir...'.'<br>';
		echo'hello';
	}
	
	echo 'connection was succesful!'.'<br>';

	//selecting the database
	$select = mysqli_select_db($conn, 'user_details');
	if(!$select){
		echo 'no database selected'.'<br>';
	}

	echo 'database was succesfully selected sir!!'.'<br>';
	
	//collecting variables to store in table
	$filename = $_POST['filename'];
	$code_snippet = $_POST['code'];

	//////////GO AND GET THE OTHER VARIABLES///////////////
	$cookie_name = "user";
	if(!isset($_COOKIE[$cookie_name])){
		echo 'cookie is not set'.'<br>';
	}else{
		echo 'cookie is set sir!'.'<br>';
	}

	//querying the database;
	$sql_query = "INSERT INTO $_COOKIE[$cookie_name] (file_name, code_snippet) VALUES ('$filename', '$code_snippet')";
	if($conn->query($sql_query) === TRUE){
		echo 'New record added sir!'.'<br>';
		header("Location: http://192.168.1.7/brython-runner/index.html");
        exit();
	}else{
		echo'failed to add to table'.'<br>';
		header("Location: http://192.168.1.7/brython-runner/index.html");
        exit();
	}

	$conn->close();	

?>
