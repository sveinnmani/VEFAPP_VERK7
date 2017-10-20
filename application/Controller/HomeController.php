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
        // Vinnum úr login gögnum úr forminu.
        if(!empty($_POST['username']) && !empty($_POST['password'])){

          // hér kæmi authentication (vantar að útfæra)
          
          // start session
          if(session_status() == PHP_SESSION_NONE) session_start();
        
          // vistum í sessionbreytu notendnafn.
          $_SESSION['username'] = $_POST['username'];

          // færum okkur yfir á admin síðu (AdminController)
          header('location:'. URL.'admin/index' );

        } else {
            // load views
            require APP . 'view/_templates/header.php';
            require APP . 'view/home/login.php';
            require APP . 'view/_templates/footer.php';
        }
    }


}
