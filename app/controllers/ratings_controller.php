<?php

class RatingsController extends AppController {

    var $name = 'Ratings';

    function beforeFilter() {
        $this->Auth->loginError = "No válido nombre de usuario o contraseña.";
        $this->Auth->authError = "No tiene permisos para acceder a esa ubicación.";
        $this->Auth->deny('*');
    }

    function qualify($id = null, $tag=null, $score=0) {
        $this->layout = 'ajax';
        if (!$id and !$tag) {
            $this->set('score', 0);
        }
        
        $this->data['Rating']['id'] = $id;
        $this->data['Rating'][$tag] = $score;
        
        
        if (!empty($this->data)) {
            if ($this->Rating->save($this->data)) {
                $actual = $this->Rating->find('first', array('conditions'=>array('Rating.id'=> $id )));
                $promedio=($actual['Rating']['personality']+$actual['Rating']['knowledge']+ $actual['Rating']['presentation'])/3;
                /*echo " promedio;  ";
                echo($promedio);
                echo " - ";
                echo($actual['Applicant']['general']);
                echo " - ";
                */
                $actual['Applicant']['general'] = $promedio;
                //$this->Rating->Applicant->save($actual);
                
                $this->Rating->Applicant->id = $actual['Applicant']['id'];
                $this->Rating->Applicant->saveField('general', $promedio);
                
                $this->set('score', $score);
                echo($actual['Applicant']['general']);
                
            } else {
                $this->set('score', 0);
            }
        }
    }

}

?>