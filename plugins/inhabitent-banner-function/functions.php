<?php
/*
Plugin Name: Red banner
Plugin URI: redacademy.com
Description:Adding function to create a custom banner
Version: 0.1
Author: Your name
*/



 class camp_banner {
   function __construct(){
    self::check_image();
  }
  function check_image(){
    if ( !is_archive() && get_field("banner") ) {
        self::show_banner();
    } if(is_archive() || get_field("banner")==null) {
        self::hide_banner();
    }
  }
  function show_banner(){
    $this->output = 'class="flex home-banner" style=\'background-image:  linear-gradient( rgba(0,0,0,0.2),rgba(0,0,0,0.3)),
               url("'.get_field("banner").'"); height: 80vh;\'';
   self::render();
  }
   function hide_banner(){?>
     <?php
     $this->output = 'id="no-banner"';

     self::render();
   }
     function render(){
       echo $this->output;
     }
    function logo_options(){
      if(!is_archive() && get_field("banner")){
        echo 'white-logo';
      }
        if(is_archive() || get_field("banner")==null) {
          echo 'green-logo';
        }
    }
    function overlay_options(){
      if(!is_archive() && get_field("banner")){
        if(get_field('overlay_logo')){
          // echo get_field('overlay_logo');
        echo '<img src="'.get_field("overlay_logo").'">';
        }
        if(get_field('overlay_text')){
          echo '<h1>'.get_field("overlay_text").'</h1>';
        }
              //echo get_field("overlay_text") if show overlay text call function overlay title field      }
    }
  }
}?>
