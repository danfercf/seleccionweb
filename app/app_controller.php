<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 */

 
class AppController extends Controller {

    var $components = array('Auth', 'Email', 'Session','Cookie');
   
    function beforeFilter() {
        $this->Auth->loginError = "No válido nombre de usuario o contraseña.";
        $this->Auth->authError = "No tiene permisos para acceder a esa ubicación.";
        $this->Auth->allow('*'); // = array('controller'=>'pages', 'action'=>'home');
    }

    function _sendMail($datos, $template) {
        $this->Email->reset();
        /*
        $smtpOptions = array(
            'port' => '25',
            'host' => 'localhost',
            'username' => 'Mercury',
            'password' => '',
            'auth' => true
        );*/
        
        $smtpOptions = array(
            'port' => '25',
            'host' => 'mail.seleccionweb.com',
            'username' => 'info',
            'password' => '123456',
            'auth' => true
        );
        
        $this->Email->delivery = 'smtp';
        
        $this->Email->from = $datos['from'];
        $this->Email->to = $datos['to'];
        $this->Email->subject = $datos['subject'];
        $this->Email->sendAs = 'html';
        $this->Email->template = $template;
        //pasamos los datos al template
        foreach ($datos['data'] as $key => $value) {
            $this->set($key, $value);
        }
        $this->Email->send();
    }
    function _log($datos){
        $this->loadModel('Activity');
        $activity = array('Activity' => array(
                'user' => $this->Auth->user('owner'),
                'description' => $datos
                ));
        $this->Activity->save($activity);
    }
    
function _lang( $texto){
  if($this->Cookie->read('lang'))
    $idioma=$this->Cookie->read('lang');
  else $idioma="es";
  
  $text_array=$this->_split($texto);
  foreach($text_array as $lang => $traduccion){
  if($lang==$idioma)
    $para_retorno = $traduccion;
  }
  return $para_retorno;
}
function _joiner($texto = null)
    {
        $result="";
        foreach($texto as $lang => $lang_content) {
        		$result.="<!--:".$lang."-->".$lang_content."<!--:-->";
        	}
        return  $result;
    }
function _split($text, $quicktags = true) {
    
    $q_config['enabled_languages'] = array('0' => 'es','1' => 'en', '2' => 'pt', '3' => 'fr');
	//init vars
	$split_regex = "#(<!--[^-]*-->|\[:[a-z]{2}\])#ism";
	$current_language = "";
	$result = array();
	foreach($q_config['enabled_languages'] as $language) {
		$result[$language] = "";
	}
	// split text at all xml comments
	$blocks = preg_split($split_regex, $text, -1, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE);
	foreach($blocks as $block) {
		# detect language tags
		if(preg_match("#^<!--:([a-z]{2})-->$#ism", $block, $matches)) {
			if(in_array($matches[1], $q_config['enabled_languages'])) {
				$current_language = $matches[1];
			} else {
				$current_language = "invalid";
			}
			continue;
		// detect quicktags
		} elseif($quicktags && preg_match("#^\[:([a-z]{2})\]$#ism", $block, $matches)) {
			if(in_array($matches[1], $q_config['enabled_languages'])) {
				$current_language = $matches[1];
			} else {
				$current_language = "invalid";
			}
			continue;
		// detect ending tags
		} elseif(preg_match("#^<!--:-->$#ism", $block, $matches)) {
			$current_language = "";
			continue;
		// detect defective more tag
		} elseif(preg_match("#^<!--more-->$#ism", $block, $matches)) {
			foreach($q_config['enabled_languages'] as $language) {
				$result[$language] .= $block;
			}
			continue;
		}
		// correctly categorize text block
		if($current_language == "") {
			// general block, add to all languages
			foreach($q_config['enabled_languages'] as $language) {
				$result[$language] .= $block;
			}
		} elseif($current_language != "invalid") {
			// specific block, only add to active language
			$result[$current_language] .= $block;
		}
	}
	foreach($result as $lang => $lang_content) {
		$result[$lang] = preg_replace("#(<!--more-->|<!--nextpage-->)+$#ism","",$lang_content);
	}
	return $result;
}
function _p($data){
    echo("<pre>");
    print_r($data);
    echo("</pre>");
    
}


}
?>
