<?php

/**
 * Securimage-Driven Captcha Component
 * @author debuggeddesigns.com
 * @license MIT
 * @version 0.1
 */

//cake's version of a require_once() call
//vendor('securimage'.DS.'securimage'); //use this with the 1.1 core
App::import('Vendor','Securimage' ,array('file'=>'securimage'.DS.'securimage.php')); //use this with the 1.2 core


//the local directory of the vendor used to retrieve files
define('SECURIMAGE_VENDOR_DIR', APP . 'vendors' . DS . 'securimage/');

class SecurimageComponent extends Object {

    //size configuration
    var $_image_height = 75; //the height of the captcha image
    var $_image_width = 350; //the width of the captcha image


    //background configuration
    var $_draw_lines = true; //whether to draw horizontal and vertical lines on the image
    var $_draw_lines_over_text = false; //whether to draw the lines over the text
    var $_draw_angled_lines = true; //whether to draw angled lines on the image

    var $_line_color = '#cccccc'; //the color of the lines drawn on the image
    var $_line_distance = 15; //how far apart to space the lines from eachother in pixels
    var $_line_thickness = 2; //how thick to draw the lines in pixels
    var $_arc_line_colors = '#999999,#cccccc'; //the colors of arced lines


    //text configuration
    var $_use_gd_font = false; //whether to use a gd font instead of a ttf font
    var $_use_multi_text = true; //whether to use multiple colors for each character
    var $_use_transparent_text = true; //whether to make characters appear transparent
    var $_use_word_list = false; //whether to use a word list file instead of random code

    var $_charset = 'ABCDEFGHKLMNPRSTUVWYZ23456789'; //the character set used in image
    var $_code_length = 5; //the length of the code to generate
    var $_font_size = 45; //the font size
    var $_gd_font_size = 50; //the approxiate size of the font in pixels
    var $_text_color = '#000000'; //the color of the text - ignored if $_multi_text_color set
    var $_text_transparency_percentage = 45; //the percentage of transparency, 0 to 100
    var $_text_angle_maximum = 21; //maximum angle of text in degrees
    var $_text_angle_minimum = -21; //minimum angle of text in degrees
    var $_text_maximum_distance = 70; //maximum distance for spacing between letters in pixels
    var $_text_minimum_distance = 68; //minimum distance for spacing between letters in pixels
    var $_text_x_start = 10; //the x-position on the image where letter drawing will begin


    //filename and/or directory configuration
    var $_audio_path = 'audio/'; //the full path to wav files used
    var $_ttf_file = 'AHGBold.ttf'; //the path to the ttf font file to load
    var $_wordlist_file = 'words/words.txt'; //the wordlist to use


    function startup( &$controller ) {

        //add local directory name to paths
        $this->_ttf_file = SECURIMAGE_VENDOR_DIR.$this->_ttf_file;
        $this->_audio_path = SECURIMAGE_VENDOR_DIR.$this->_audio_path;
        $this->_wordlist_file = SECURIMAGE_VENDOR_DIR.$this->_wordlist_file;
        //CaptchaComponent instance of controller is replaced by a securimage instance
        $controller->Securimage =& new securimage();
        $controller->Securimage->arc_line_colors = $this->_arc_line_colors;
        $controller->Securimage->audio_path = $this->_audio_path;
        $controller->Securimage->charset = $this->_charset;
        $controller->Securimage->code_length = $this->_code_length;
        $controller->Securimage->draw_angled_lines = $this->_draw_angled_lines;
        $controller->Securimage->draw_lines = $this->_draw_lines;
        $controller->Securimage->draw_lines_over_text = $this->_draw_lines_over_text;
        $controller->Securimage->font_size = $this->_font_size;
        $controller->Securimage->gd_font_size = $this->_gd_font_size;
        $controller->Securimage->image_height = $this->_image_height;
        $controller->Securimage->image_width = $this->_image_width;
        $controller->Securimage->line_distance = $this->_line_distance;
        $controller->Securimage->line_thickness = $this->_line_thickness;
        $controller->Securimage->text_angle_maximum = $this->_text_angle_maximum;
        $controller->Securimage->text_angle_minimum = $this->_text_angle_minimum;
        $controller->Securimage->text_maximum_distance = $this->_text_maximum_distance;
        $controller->Securimage->text_minimum_distance = $this->_text_minimum_distance;
        $controller->Securimage->text_transparency_percentage = $this->_text_transparency_percentage;
        $controller->Securimage->text_x_start = $this->_text_x_start;
        $controller->Securimage->ttf_file = $this->_ttf_file;
        $controller->Securimage->use_multi_text = $this->_use_multi_text;
        $controller->Securimage->use_transparent_text = $this->_use_transparent_text;
        $controller->Securimage->use_word_list = $this->_use_word_list;
        $controller->Securimage->wordlist_file = $this->_wordlist_file;

        $controller->set('securimage',$controller->Securimage);
        $controller->set('captcha_image_url', Router::url('/'.$controller->plugin.'/'.$controller->name.'/securimage/0',true)); //url for the captcha image

        if($controller->params['action'] == 'securimage')
        {
          $this->showme($controller);
        }
    }

    function showme(&$controller)
    {
      $controller->autoLayout = false; //a blank layout

      //override variables set in the component - look in component for full list
      $controller->Securimage->image_height = 75;
      $controller->Securimage->image_width = 350;
      $controller->Securimage->code_length = 5;
      $controller->Securimage->font_size = 45;

      $controller->set('captcha_data', $controller->Securimage->show()); //dynamically creates an image
    }
}