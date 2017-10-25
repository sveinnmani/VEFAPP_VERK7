<?php
    require dirname(__FILE__).'../../../steamauth/steamauth.php';
    # You would uncomment the line beneath to make it refresh the data every time the page is loaded
    // unset($_SESSION['steam_uptodate']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MINI3</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
</head>
<body>

    <!-- navigation -->
    <div class="navigation">
        <a href="<?php echo URL; ?>">home</a>
        <a href="<?php echo URL; ?>home/signUp">home/signup</a>
        <a href="<?php echo URL; ?>home/login">home/login</a>
        <a href="<?php echo URL; ?>admin">admin</a>
        <?php
            if(!isset($_SESSION['steamid'])) {

            echo "welcome guest! please login<br><br>";
            loginbutton(); //login button
    
        }  else {
            include ('steamauth/userInfo.php');

             //Protected content
            echo "Welcome back " . $steamprofile['personaname'] . "</br>";
            echo "here is your avatar: </br>" . '<img src="'.$steamprofile['avatarfull'].'" title=""        alt="" /><br>'; // Display their avatar!
            
            logoutbutton();
}    
?>  
    </div>
