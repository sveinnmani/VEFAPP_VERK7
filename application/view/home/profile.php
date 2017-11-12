<?php

	if (!isset($_SESSION["steamid"])) {
		header("location: http://174.138.67.190/SessionMini3Demo/");
	}
	else
	{
		include dirname(__FILE__).'../../../steamauth/gameOwnApi.php';
	}
	
	
?>
<div class="container">
	<img src="">
	<?php  
		for ($i=0; $i < count($gameName); $i++) { 
			echo '<div class="gameowned"> 
					<img src="' . $bannerName[$i] . '">
					<p>Game Owned: ' . $gameName[$i] . '</p>
					<p>Total Played: ' . $playtime[$i] . '</p>
					<br>
					</div>';
		}
	?>

</div>