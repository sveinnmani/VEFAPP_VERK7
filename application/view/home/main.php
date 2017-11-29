<?php
	//include 'main.php';
	$servername = "tsuts.tskoli.is";
	$username = "2512982709";
	$password = "mypassword";
	$dbname = "2512982709_loginkerfi"; 
	// Create connection
	$con = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($con->connect_error) {
    	die("Connection failed: " . $cnn->connect_error);
	} 
	$sql = "SELECT article_title, article_main FROM articles";
	$results = mysqli_query($con, $sql);

	if (mysqli_num_rows($results) > 0) {
		while ($row = mysqli_fetch_assoc($results)) {
		//echo "<h1>" . $row["article_title"] . "</h1> <p>" . $row["article_main"] . "</p>";
			echo 
			'
			<div class="ui center aligned grid">
				<div class="justified row">
					<div class="ten wide column">									
						<h1 class="ui large header">' . $row["article_title"] . '</h1>
					</div>	
				</div>
				<div class="justified row">								
					<div class="ten wide column">
						<p>' . $row["article_main"] . '</p>										
					</div>								
				</div>	
			</div>
					';
				}
			} else {
				
			}
	$leikir = array(440, 730, 578080, 271590, 4000, 252490);
	$fylkilengd = count($leikir);
	$url;

	for($x = 0; $x < $fylkilengd; $x++)	{
		$url = "http://api.steampowered.com/ISteamNews/GetNewsForApp/v0002/?appid=". $leikir[$x] ."&count=5&maxlength=300&format=json";
		//$url1 = "http://api.steampowered.com/ISteamUserStats/GetUserStatsForGame/v0002/?appid=730&key=AFF824E1547B93172F0918DE382825BF&steamid=76561198062319125";

		$json = file_get_contents($url);
		$decode = json_decode($json, true);
		
		if ($x == 0) {
			echo '<h3 class="justified row">Team Forteress 2</h3>';
		}
		else if ($x == 1) {
			echo '<h3 class="justified rowjustified row">Counter Strike Global Offensive</h3>';
		}
		else if ($x == 2) {
			echo "<h3 class='justified rowjustified rowjustified row'>PLAYERUNKNOWN'S BATTLEGROUNDS</h3>";
		}
		else if ($x == 3) {
			echo '<h3 class="justified row">Grand Theft Auto V</h3>';
		}
		else if ($x == 4) {
			echo "<h3 class='justified row'>Garry's Mod</h3>";
		}
		else if ($x == 5) {
			echo '<h3 class="justified row">Rust</h3>';
		}
		for ($i=0; $i < count($decode['appnews']['newsitems']); $i++) { 
			if (!empty($decode['appnews']['newsitems'][$i]['author'])) {
				echo '
				<div class="ui center aligned grid">
					<div class="justified row">
						<div class="ten wide column">
							<h1 class="ui large header">' . $decode['appnews']['newsitems'][$i]['title'] .'</h1>
								Written by: <a>' . $decode['appnews']['newsitems'][$i]['author'] . '</a>
						</div>						
					</div>
					<div class="row">
						<div class="ten wide column">
							<p>' . $decode['appnews']['newsitems'][$i]['contents'] . '</p>
						</div>						
					</div>
				</div>
			';
			}
			else {
				echo '
				<div class="ui center aligned grid">
					<div class="justified row">
						<div class="ten wide column">
							<h1 class="ui large header">' . $decode['appnews']['newsitems'][$i]['title'] .'</h1>
						</div>
					</div>
					<div class="row">
						<div class="ten wide column">
							<p>' . $decode['appnews']['newsitems'][$i]['contents'] . '</p>
						</div>
					</div>
				</div>
			';
			}
		}
	}
?>