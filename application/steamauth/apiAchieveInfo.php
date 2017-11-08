<?php  

include('./gameOwnApi.php');

if (isset($_SESSION["steamid"])) {
	$url1 = 'http://api.steampowered.com/ISteamUserStats/GetUserStatsForGame/v0002/?appid=' . $appid[2] . '&key=AFF824E1547B93172F0918DE382825BF&steamid='. $steamprofile['steamid'];

	$json1 = file_get_contents($url1);
	$getachiev = json_decode($json1, true);

	for ($i=0; $i < $totalgame; $i++) { 
            $achievName[] = $getachiev['playerstats']['achievements'][$i]['name'];
        }

}




?>