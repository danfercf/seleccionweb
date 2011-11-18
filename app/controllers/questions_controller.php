<?php

class QuestionsController extends AppController {

    var $name = 'Questions';
    var $paginate = array(
        'limit' => 10,
        'order' => array(
            'Question.order' => 'asc'
        )
    );

    function beforeFilter() {
        $this->Auth->loginError = "No válido nombre de usuario o contraseña.";
        $this->Auth->authError = "No tiene permisos para acceder a esa ubicación.";
        $this->Auth->deny('*');
    }

    function index() {
        $this->Question->recursive = 0;
        $this->set('questions', $this->paginate());
    }

    function order() {
        $this->layout = 'ajax';
        foreach ($this->params['form']['lista-preguntas'] as $order => $question) {
            $this->Question->id = $question;
            $this->Question->saveField('order', $order + 1);
        }
    }

    function favorite($id = null) {
        $this->layout = "ajax";
        if (!$id) {
            $this->set('respuesta', 'Pregunta invalida');
        } else {
            $this->Question->id = $id;
            $this->Question->saveField('favorite', 1);
            $this->set('respuesta', 'ok');
        }
    }
    
    function predetermin($id = null) {
        $this->Question->recursive = 0;
        //return $this->paginate(array('Question.user_id' => '0', 'Question.favorite' => $id));
        return $this->paginate(array('Question.user_id' => $id));
    }
    
    function favorites() {
        $this->Question->recursive = 0;
        return $this->paginate(array('Question.user_id' => $this->Auth->user('id'), 'Question.favorite' => true));
    }

    function add() {
        $this->layout = "ajax";
        if (isset($this->params['form']['question'])) {
            $this->Question->create();
            $datos = array('Question' => array(
                    'user_id' => $this->Auth->user('id'),
                    'question' => utf8_encode($this->params['form']['question']),
                    'duration' => 30,
                    'favorite' => isset($this->params['form']['favorite'])
                    ));
            if ($this->Question->save($datos)) {
                $this->set('respuesta', 'ok');
                $this->set('favorito', isset($this->params['form']['favorite']));
                $datos['Question']['id'] = $this->Question->id;
                $this->set('pregunta', $datos);
            } else {
                $this->set('respuesta', 'error');
            }
        }
    }

    function duration($id=null, $time=30) {
        $this->layout = "ajax";
        if (!$id) {
            $this->set('error', true);
        } else {
            //print_r($this->data);
            $this->Question->id = $id;
            if ($this->Question->saveField('duration', $time)) {
                $this->set('error', false);
            } else {
                $this->set('error', true);
            }
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash('Pregunat invalida');
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Question->delete($id)) {
            $this->Session->setFlash('Pregunta eliminada');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('No se pudo eliminar la pregunta');
        $this->redirect(array('action' => 'index'));
    }

}

?>