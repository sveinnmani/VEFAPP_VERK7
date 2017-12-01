<?php
	$servername = "tsuts.tskoli.is";
	$username = "2512982709";
	$password = "mypassword";
	$dbname = "2512982709_loginkerfi"; 
	try {
		$con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
	/*
	$con = mysqli_connect($servername, $username, $password);

	if(!$con) {
		echo 'Not Connected to database';
	}

	if(!mysqli_select_db($con, $dbname)) {
		echo 'Database not selected';
	}

	$title = $_POST['fyrirsogn'];
	$efni = mysql_real_escape_string($_POST['efni']);

	$sqlQuery = "INSERT INTO articles(article_main) VALUES ('$efni')";

	if (!mysqli_query($con, $sqlQuery)) {
		echo 'Not Inserted';
	}
	else    {
		echo 'Inserted';
	}

	header("refresh:2; url=index.php");*/
	$title = $_POST['fyrirsogn'];
	$efni = $_POST['efni'];

	echo $efni;

	try {
		$sql = "INSERT INTO articles(article_title, article_main) VALUES('$title', '$efni')";
		$con->exec($sql);
		echo"virkaði";
	} catch(Exception $e) {
		echo "Virkaði ekki + $e";
	}


	header('location: http://174.138.67.190/SessionMini3Demo/ ');
?>