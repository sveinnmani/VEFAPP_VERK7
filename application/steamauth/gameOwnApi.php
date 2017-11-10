<?php 

if (isset($_SESSION["steamid"])) {
        //error_reporting(0);
        $url = 'http://api.steampowered.com/IPlayerService/GetOwnedGames/v0001/?key=AFF824E1547B93172F0918DE382825BF&steamid='. $steamprofile['steamid'] .'&format=json'; //replace "CLIENT-ID"
        $json = file_get_contents($url);
        $gameowned = json_decode($json, true);
        $totalgame = $gameowned['response']['game_count'];
        for ($i=0; $i < $totalgame; $i++) {
            $appid[] = $gameowned['response']['games'][$i]['appid'];
            $playtime[] = $gameowned['response']['games'][$i]['playtime_forever'];
        }
        for ($i=0; $i < $totalgame; $i++) {
            // create both cURL resources
            $ch[] = curl_init();
        
            
            // set URL and other appropriate options
            curl_setopt($ch[$i], CURLOPT_URL, 'http://api.steampowered.com/ISteamUserStats/GetUserStatsForGame/v0002/?appid=' . urlencode($appid[$i]) . '&key=AFF824E1547B93172F0918DE382825BF&steamid=' . urlencode($steamprofile['steamid']));
            curl_setopt($ch[$i], CURLOPT_RETURNTRANSFER, true);
            
            //create the multiple cURL handle
            $mh = curl_multi_init();
            
            //add the two handles
            curl_multi_add_handle($mh,$ch[$i]);
            
            $active = null;
            //execute the handles

            do {
                $mrc = curl_multi_exec($mh, $active);
                

                            $achievGame[] = json_decode($mrc);
                            for ($a=0; $a < count($achievGame[$i]['playerstats']['achievements']); $a++) { 

                                $achievName[] = $achievGame[$i]['playerstats']['achievements'][$a]['name'];
                                print_r($achievName[$a]);
                            }
                    
            
            
            } while ($mrc == CURLM_CALL_MULTI_PERFORM);

            /*while ($active && $mrc == CURLM_OK) {
                if (curl_multi_select($mh) != -1) {
                    do {
                        $mrc = curl_multi_exec($mh, $active);
                        if(curl_getinfo($ch, CURLINFO_HTTP_CODE) === 200) {

                            $achievGame[] = json_decode($mrc);
                            for ($a=0; $a < count($achievGame[$i]['playerstats']['achievements']); $a++) { 

                                $achievName[] = $achievGame[$i]['playerstats']['achievements'][$a]['name'];
                                print_r($achievName[$a]);
                            }
                    
            
                        }

                    } while ($mrc == CURLM_CALL_MULTI_PERFORM);
                }
            }*/
            
            //close the handles
            curl_multi_remove_handle($mh, $ch[$i]);
            curl_multi_close($mh);

        }

        /*$ch = curl_init();
        for ($i=0; $i < $totalgame; $i++) {
            curl_setopt($ch, CURLOPT_URL, 'http://api.steampowered.com/ISteamUserStats/GetUserStatsForGame/v0002/?appid=' . urlencode($appid[$i]) . '&key=AFF824E1547B93172F0918DE382825BF&steamid=' . urlencode($steamprofile['steamid']));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $achieve = curl_exec($ch);
   
            if(curl_getinfo($ch, CURLINFO_HTTP_CODE) === 200) {
                

                $achievGame[] = json_decode($achieve);

                
                        for ($a=0; $a < count($achievGame[$i]['playerstats']['achievements']); $a++) { 

                            $achievName[] = $achievGame[$i]['playerstats']['achievements'][$a]['name'];
                        }
                    
            
            }
        }
        curl_close($ch);*/
       
        /*for ($i=0; $i < $totalgame; $i++) {

            $ach_url[] ='http://api.steampowered.com/ISteamUserStats/GetUserStatsForGame/v0002/?appid=' . $appid[$i] . '&key=AFF824E1547B93172F0918DE382825BF&steamid=' . $steamprofile['steamid'];
            $ach_json[] = file_get_contents($ach_url[$i]);

            if($ach_json === false){
            echo 'Nothing here!';   
            } else {
                
                $achievGame[] = json_decode($ach_json[$i], true);

                
                for ($i=0; $i < $totalgame; $i++) {
                    for ($a=0; $a < count($achievGame[$i]['playerstats']['achievements']); $a++) { 

                        $achievName[] = $achievGame[$i]['playerstats']['achievements'][$a]['name'];
                    }
                }
               
            }
        }*/
        
        
        
  			    


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


