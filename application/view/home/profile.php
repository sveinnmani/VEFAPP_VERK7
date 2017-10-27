<?php
	if (!isset($_SESSION["steamid"])) {
		# code...
		header("location: http://174.138.67.190/SessionMini3Demo/");
	}
	else
	{
		logoutbutton();
	}
	
?>