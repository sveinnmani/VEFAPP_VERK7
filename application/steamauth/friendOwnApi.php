<?php 

if (isset($_SESSION["steamid"])) {
    //error_reporting(0);
    $url = 'http://api.steampowered.com/ISteamUser/GetFriendList/v0001/?key=AFF824E1547B93172F0918DE382825BF&steamid='.$steamprofile['steamid'].'&relationship=friend'; //replace "CLIENT-ID"
    $json = file_get_contents($url);
    $friends = json_decode($json, true);
    $totalfriends = $friends['friendslist']['friends'];
    for ($i=0; $i < count($totalfriends); $i++) {
        $friendid[] = $friends['friendslist']['friends'][$i]['steamid'];
    }

    for ($i=0; $i < count($totalfriends); $i++) { 
        $friends_url[] = 'http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=AFF824E1547B93172F0918DE382825BF&steamids='. $friendid[$i];
        $friends_json[] = file_get_contents($friends_url[$i]);
        if ($friends_json[$i] === false)   {
            var_dump('Json doesnt exist');
        }
        else   {   
            $friendsArray[] = json_decode($friends_json[$i], true);
            if (isset($friendsArray[$i])) {
                if (!empty($friendsArray[$i]['response']['players'][0]['personaname'])) {
                    $friendspic[] = $friendsArray[$i]['response']['players'][0]['avatarmedium'];
                    $friendname[] = $friendsArray[$i]['response']['players'][0]['personaname'];       
                }
            }
                    
                            
       }
                
    }
    /*for ($i=0; $i < count($totalfriends); $i++) { 
        $friends_url[] = 'http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=AFF824E1547B93172F0918DE382825BF&steamids='. $friendid[$i];
        $friends_json[] = file_get_contents($friends_url[$i]); 
        $friendsArray[] = json_decode($friends_json[$i], true);
        $friendspic[] = $friendsArray[$i]['response']['players'][0]['avatarmedium'];
        $friendname[] = $friendsArray[$i]['response']['players'][0]['personaname'];        
    }*/
}
?>


