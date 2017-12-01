<?php

/**
 * Class HomeController
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Controller;

class HomeController
{
    /**
     * PAGE: index(default)
     */
    public function index()
    {
        // load views
        require dirname(__FILE__).'../../steamauth/steamauth.php';
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * Mjög einfalt sýnidæmi 
     */
    public function signUp()
    {
        if (isset($_POST["nyskra"])) {
            
            if(!empty($_POST['username']) && !empty($_POST['password'])){       
                
                // skráum notanda í gagnagrunn (vantar útfærslu)
                    
                // færum okkur yfir á innskrá síðu
                header('location:'. URL.'home/login' );

            } else {
                    // þarf að útfæra betur
                    echo "error gat ekki nýskráð";
            }

        } else {
            // load views
            require APP . 'view/_templates/header.php';
            require APP . 'view/home/sign_up.php';
            require APP . 'view/_templates/footer.php';
        } 
    }

    /**
    */
    public function login()
    {
      /*
      if(!empty($_POST['username']) && !empty($_POST['password'])){

          // hér kæmi authentication (vantar að útfæra)
          
          // start session
          if(session_status() == PHP_SESSION_NONE) session_start();
        
          // vistum í sessionbreytu notendnafn.
          $_SESSION['username'] = $_POST['username'];

          // færum okkur yfir á admin síðu (AdminController)
          header('location:'. URL.'admin/index' );

        }*/
        $error = '';
        
        if (isset($_POST['login'])) {


            $username = trim($_POST['username']);
            $password = trim($_POST['pwd']);
            $redirect = 'http://174.138.67.190/SessionMini3Demo/home/write';
            require_once dirname(__FILE__).'../../pdo_conn/authenticate_pdo.php';
        } 
        require dirname(__FILE__).'../../steamauth/steamauth.php';
       
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/login.php';
        require APP . 'view/_templates/footer.php';
        
    }
    public function write()
    {
      require dirname(__FILE__).'../../steamauth/steamauth.php';
      //include dirname(__FILE__).'../../view/home/databaseupload.php';
      require APP . 'view/_templates/header.php';
         

      require APP . 'view/home/write.php';
      
      require APP . 'view/_templates/footer.php';
    }

    public function profile()
    {
      require dirname(__FILE__).'../../steamauth/steamauth.php';
      require APP . 'view/_templates/header.php';
      if (!isset($_SESSION["steamid"])) {
          header("location: http://174.138.67.190/SessionMini3Demo/");
      }
      else
      {
          include dirname(__FILE__).'../../../steamauth/gameOwnApi.php';
      }
      require APP . 'view/home/profile.php';
      require APP . 'view/_templates/footer.php';
    }

    public function friends()
    {
      require dirname(__FILE__).'../../steamauth/steamauth.php';
      require APP . 'view/_templates/header.php';
      if (!isset($_SESSION["steamid"])) {
          header("location: http://174.138.67.190/SessionMini3Demo/");
      }
      else
      {
          include dirname(__FILE__).'../../steamauth/friendOwnApi.php';
      }
      require APP . 'view/home/friends.php';
      require APP . 'view/_templates/footer.php';
    }


}
