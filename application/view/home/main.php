<?php
	$leikir = array(440, 730, 578080, 271590, 4000, 252490);
	$fylkilengd = count($leikir);
	$url;

	for($x = 0; $x < $fylkilengd; $x++)	{
		$url = "http://api.steampowered.com/ISteamNews/GetNewsForApp/v0002/?appid=". $leikir[$x] ."&count=5&maxlength=300&format=json";
		//$url1 = "http://api.steampowered.com/ISteamUserStats/GetUserStatsForGame/v0002/?appid=730&key=AFF824E1547B93172F0918DE382825BF&steamid=76561198062319125";

		$json = file_get_contents($url);
		$decode = json_decode($json, true);
		
		if ($x == 0) {
			echo '<h3 class="header3">Team Forteress 2</h3>';
		}
		else if ($x == 1) {
			echo '<h3 class="header3">Counter Strike Global Offensive</h3>';
		}
		else if ($x == 2) {
			echo "<h3 class='header3'>PLAYERUNKNOWN'S BATTLEGROUNDS</h3>";
		}
		else if ($x == 3) {
			echo '<h3 class="header3">Grand Theft Auto V</h3>';
		}
		else if ($x == 4) {
			echo "<h3 class='header3'>Garry's Mod</h3>";
		}
		else if ($x == 5) {
			echo '<h3 class="header3">Rust</h3>';
		}
		for ($i=0; $i < count($decode['appnews']['newsitems']); $i++) { 
			if (!empty($decode['appnews']['newsitems'][$i]['author'])) {
				echo '
			<div class="ui center aligned grid">
				<div class="center aligned three column row">					
					<div class="column">
						<div class="ui segment">
							<h2 class="ui small header">' . $decode['appnews']['newsitems'][$i]['title'] .'</h2>
								Written by: <a>' . $decode['appnews']['newsitems'][$i]['author'] . '</a>
							<p>' . $decode['appnews']['newsitems'][$i]['contents'] . '</p>
						</div>
					</div>
				</div>
			</div>	
			';
			}
			else {
				echo '
			<div class="ui center aligned grid">
				<div class="center aligned three column row">					
					<div class="column">
						<div class="ui segment">
							<h2 class="ui small header">' . $decode['appnews']['newsitems'][$i]['title'] .'</h2>
							<p>' . $decode['appnews']['newsitems'][$i]['contents'] . '</p>
						</div>
					</div>
				</div>
			</div>	
			';
			}
		}
	}
?>