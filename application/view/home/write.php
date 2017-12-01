<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="semantic.css">
	</head>
	<body>		
		<div class="ui center aligned grid">
			<div class="row">
				<div class="ten wide column">
					<form class="ui form" action="" method="POST">
						<div class="ui input">
							<input type="text" name="fyrirsogn">				
						</div><br><br>
						<div class="field">
							<textarea name="efni" rows="5"></textarea>
						</div><br><br>
						<input class="ui teal button" type="submit" name="submit">
					</form>
				</div>
			</div>
		</div>
			<?php
			if (isset($_POST['fyrirsogn'])) {
				# code...
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
					$fyrir = $_POST['fyrirsogn'];
					$ef = $_POST['efni'];
				try {			
					
					$sql = "INSERT INTO articles(article_title, article_main) VALUES('$fyrir', '$ef')";
					$con->exec($sql);
					echo"";
				} catch(Exception $e) {
					echo "Virkaði ekki + $e";
				}
			}
			
		?>
	</body>
</html>
	