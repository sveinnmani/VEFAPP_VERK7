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
    <link href="<?php echo URL; ?>css/semantic.css" rel="stylesheet">
</head>
<body>

    <!-- navigation -->
    <div class="ui secondary pointing menu">
        <a class="item"  href="<?php echo URL; ?>">home</a>
        <?php  
            if (isset($_SESSION['steamid'])) {
                # code...
            

        ?>
        <a class='item' href="<?php echo URL; ?>home/profile">home/profile</a>
        <?php 
            }
         ?>
        <!--<a href="<?php echo URL; ?>home/signUp">home/signup</a>-->
        <!--<a href="<?php echo URL; ?>home/login">home/login</a>-->
        <a class='item' href="<?php echo URL; ?>admin">admin</a>
        <?php
            if(!isset($_SESSION['steamid'])) {

            //echo "welcome guest! please login<br><br>";
            loginbutton(); //login button
    
        }  else {
            include dirname(__FILE__).'../../../steamauth/userInfo.php';

             //Protected content
            //echo "Welcome back " . $steamprofile['personaname'] . "</br>";
            //echo "here is your avatar: </br>" . '<img src="'.$steamprofile['avatarfull'].'" title=""        alt="" /><br>'; // Display their avatar!
            echo "<img class='ui avatar image' src=".$steamprofile['avatarfull'].">";
            
            echo '<div class="ui simple dropdown item">
                    <span>' . $steamprofile['personaname'] . '</span>
                    <i class="dropdown icon"></i>
                    <div class="menu">
                    <div class="item" href="<?php echo URL; ?>home/profile">home/profile">Profile</div>
                    <div class="item">Choice 2</div>
                    <div class="item">Choice 3</div>
                    '. logoutbutton(); .'
                    </div>
                    </div>
                    </div>';
            
}    
?>  
    </div>
<script src="<?php echo URL; ?>css/semantic.js"></script>
