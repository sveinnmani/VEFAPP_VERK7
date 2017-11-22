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
                    <div class="item">' ?>
                     <a class="item" href="<?php echo URL; ?>home/profile">home/profile</a></div>
                    <div class="item"><?php logoutbutton();
                    echo '</div>
                    </div>
                    </div>
                    </div>';
            } 
?> 
    </div>
<script src="<?php echo URL; ?>css/semantic.js"></script>
