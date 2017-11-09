<?php 

if (isset($_SESSION["steamid"])) {
        error_reporting(0);
        $url = 'http://api.steampowered.com/IPlayerService/GetOwnedGames/v0001/?key=AFF824E1547B93172F0918DE382825BF&steamid='. $steamprofile['steamid'] .'&format=json'; //replace "CLIENT-ID"
        $json = file_get_contents($url);
        $gameowned = json_decode($json, true);
        $totalgame = $gameowned['response']['game_count'];
        for ($i=0; $i < $totalgame; $i++) {
            $appid[] = $gameowned['response']['games'][$i]['appid'];
            $playtime[] = $gameowned['response']['games'][$i]['playtime_forever'];
        }
        $url_list = array();
        for ($i=0; $i < $totalgame; $i++) {

            array_push('http://api.steampowered.com/ISteamUserStats/GetUserStatsForGame/v0002/?appid=' . $appid[$i] . '&key=AFF824E1547B93172F0918DE382825BF&steamid=' . $steamprofile['steamid']);
            $ach_json[] = file_get_contents($ach_url[$i]);

            if($ach_json === false){
            echo 'Nothing here!';   
            } else {
                $achievGame[] = json_decode($ach_json[$i], true);
                for ($i=0; $i < $totalgame; $i++) {
                
                    $achievName = $achievGame['playerstats']['achievements'][0]['name'];
                
                }
                print_r(count($achievGame[1]['playerstats']['achievements']));
            }
        }
        
        
        
  			    


            /*$achieve_url = 'http://api.steampowered.com/ISteamUserStats/GetSchemaForGame/   v2/?key=AFF824E1547B93172F0918DE382825BF&appid='. $appid[3];
            $achieve_json = file_get_contents($achieve_url);
            $achieveArray = json_decode($achieve_json, true);
            $achieveName = $achieveArray['game']['achievements'][0]['name'];*/
		
        

        

      
        /*$achievName = $achievGame['playerstats']['achievements'][0]['name'];


        $achieve_url = 'http://api.steampowered.com/ISteamUserStats/GetSchemaForGame/v2/?key=AFF824E1547B93172F0918DE382825BF&appid='. $appid[3];
        $achieve_json = file_get_contents($achieve_url);
        $achieveArray = json_decode($achieve_json, true);*/
            

        /*for ($i=0; $i < $totalgame; $i++) { 
            $url1[] = 'http://api.steampowered.com/ISteamUserStats/GetUserStatsForGame/v0002/?appid=' . $appid[$i] . '&key=AFF824E1547B93172F0918DE382825BF&steamid='. $steamprofile['steamid'];
            $json1[] = file_get_contents($url1[$i]);
            $achievGame[] = json_decode($json1[$i], true);

            $achievName[] = $achievGame[1]['achievements'][$i]['name'];
          
        }*/


       

}
?>


