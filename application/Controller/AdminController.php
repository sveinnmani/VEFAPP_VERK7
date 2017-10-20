<?php

/**
 * Class AdminController
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Controller;

class AdminController
{

    public function index()
    {
       // start session 
       if(session_status() == PHP_SESSION_NONE) session_start();
       
       if(isset($_SESSION['username'])) {
          $username = $_SESSION['username'];
       } 
       else {
        //  aðgangi hafnða, prívat síða,  redirect á login síðu
        header('location:'. URL.'home/login' );
       }

      // load views
      require APP . 'view/_templates/header.php';
      require APP . 'view/admin/index.php';
      require APP . 'view/_templates/footer.php';
    }

}
