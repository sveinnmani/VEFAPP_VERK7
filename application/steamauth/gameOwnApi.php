<?php 

if (isset($_SESSION["steamid"])) {
        <?php 
    //error_reporting(0);
    $url = 'http://api.steampowered.com/IPlayerService/GetOwnedGames/v0001/?key=AFF824E1547B93172F0918DE382825BF&steamid=76561198062319125&format=json'; //replace "CLIENT-ID"
    $json = file_get_contents($url);
    $gameowned = json_decode($json, true);
    $totalgame = $gameowned['response']['game_count'];
    for ($i=0; $i < $totalgame; $i++) {
        $appid[] = $gameowned['response']['games'][$i]['appid'];
    }
    for ($i=0; $i < $totalgame; $i++) { 
        $game_url[] = 'http://store.steampowered.com/api/appdetails/?appids='. $appid[$i];
        $game_json[] = file_get_contents($game_url[$i]);
        if ($game_json[$i] === false)   {
            var_dump('Json doesnt exist');
        }
        else   {   
            $gameArray[] = json_decode($game_json[$i], true);
            if (isset($gameArray[$i])) {
                if (!empty($gameArray[$i][$appid[$i]]['data']['name'])) {
                    $gameName[] = $gameArray[$i][$appid[$i]]['data']['name'];
                    $playtime[] = $gameowned['response']['games'][$i]['playtime_forever'];
                    $bannerName[] = $gameArray[$i][$appid[$i]]['data']['header_image'];  
                }
            }
                    
                            
       }
                
    }
?>
}
?>


