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
	<?php  
		for ($i=0; $i < $totalgame; $i++) { 
			echo '<div class="gameowned"> 
					<p>Appid: ' . $achievName[$i] . '</p>
					<p>Playtime: ' . $playtime[$i] . '</p>
					<br>
					</div>';
		}
	?>

</div>