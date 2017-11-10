<?php
	$leikir = array(440, 730, 578080);
	$fylkilengd = count($leikir);
	$url;

	for($x = 0; $x < $fylkilengd; $x++)	{
		$url = "http://api.steampowered.com/ISteamNews/GetNewsForApp/v0002/?appid=". $leikir[$x] ."&count=5&maxlength=300&format=json";
		//$url1 = "http://api.steampowered.com/ISteamUserStats/GetUserStatsForGame/v0002/?appid=730&key=AFF824E1547B93172F0918DE382825BF&steamid=76561198062319125";

		$json = file_get_contents($url);
		$decode = json_decode($json, true);
		
		if ($x == 0) {
			echo '<h3>Team Forteress 2</h3>';
		}
		else if ($x == 1) {
			echo '<h3>Counter Strike Global Offensive</h3>';
		}
		else if ($x == 2) {
			echo "<h3>PLAYERUNKNOWN'S BATTLEGROUNDS</h3>";
		}
		for ($i=0; $i < count($decode['appnews']['newsitems']); $i++) { 
			echo '<h1 class="ui header">' . $decode['appnews']['newsitems'][$i]['title'] .'</h1>';
			echo '
			<div class="descripction">
				<h5>' . $decode['appnews']['newsitems'][$x]['contents']. '</h5>
			</div>';
		}

		//print_r($decode['appnews']['newsitems'][$x]['title']);
		
		//
	}
?>