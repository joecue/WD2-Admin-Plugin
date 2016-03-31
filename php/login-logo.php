<?php 

   function wp2_my_login_logo() { ?>
       <style type="text/css">
           .login h1 a {
               background-image: url(<?php echo plugins_url( 'images/LCCClogo2C.png', dirname(__FILE__) ); ?>);
               background-size: 363px 76px;
               padding-bottom: 30px;
               width: 363px;
               height: 76px;
               margin: 0 auto;
           }
       </style>
   <?php }
   add_action( 'login_enqueue_scripts', 'wp2_my_login_logo' );

?>