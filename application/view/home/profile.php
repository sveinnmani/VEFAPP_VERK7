<?php
	if (!isset($_SESSION["steamid"])) {
		header("location: http://174.138.67.190/SessionMini3Demo/");
	}
	else
	{	
        $url = 'http://api.steampowered.com/IPlayerService/GetOwnedGames/v0001/?key=AFF824E1547B93172F0918DE382825BF&steamid='. $steamprofile['steamid'] .'&format=json'; //replace "CLIENT-ID"
        $json = file_get_contents($url);
        $gameowned = json_decode($json, true);
        $totalgame = $gameowned['response']['game_count'];
        for ($i=0; $i < $totalgame; $i++) { 
        	$appid[] = $gameowned['response']['games'][$i]['appid'];
        	$playtime[] = $gameowned['response']['games'][$i]['playtime_forever'];
        }

		
		logoutbutton();
	}
	
?>
<div class="container">
	<?php  
		for ($i=0; $i < $totalgame; $i++) { 
			echo '<div class="gameowned"> 
					<p>Appid: ' . $appid[$i] . '</p>
					<p>Playtime: ' . $playtime[$i] . '</p>
					<br>
					</div>';
		}
	?>

</div>