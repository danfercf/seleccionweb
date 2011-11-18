<?php

class ActivitiesController extends AppController {

    var $name = 'Activities';
    var $layout = 'private';

    function beforeFilter() {
        $this->Auth->loginError = "No válido nombre de usuario o contraseña.";
        $this->Auth->authError = "No tiene permisos para acceder a esa ubicación.";
        $this->Auth->deny('*'); // = array('controller'=>'pages', 'action'=>'home');
    }

    function index() {
        $this->Activity->recursive = 0;
        $this->loadModel('User');
        //$this->loadModel('Activity');
       $condiciones = array();
        if (!empty($this->data)) {
            //$condiciones = array();
            if ($this->data['Activity']['user'] != '') {
                $user = $this->User->read(null, $this->data['Activity']['user']);
               // print_r($user);
                array_push($condiciones, array('Activity.user' => $user['User']['owner']));
            }
            if ($this->data['Activity']['from'] != '' and $this->data['Activity']['to'] != '') {
                $first_date =  $this->data['Activity']['from'];
                $second_date = $this->data['Activity']['to'];
                
                
                //array_push($condiciones, array('Activity.created BETWEEN ? AND ?' => array($this->data['Activity']['from'], $this->data['Activity']['to'])));
                array_push($condiciones, array('Activity.created BETWEEN ? AND ?' => array($first_date, $second_date)));
            
            }
            $this->paginate = array( 'limit' => 12,'order' => array('Activity.id' => 'desc'));
            $this->set('activities', $this->paginate($condiciones));
        } else {
           
           $this->paginate = array( 'limit' => 12,'order' => array('Activity.id' => 'desc'));
           $this->set('activities', $this->paginate());
        }

        $this->set('users', $this->User->find('list', array('conditions' => array('User.id !=' => 1), 'order' => 'User.id')));
    }
    
    function read() {
        //print_r($this->data);
       // echo $this->Auth->user('role');
        $this->layout = 'default3';
        $this->Activity->recursive = 0;
        $this->loadModel('User');
        //$this->loadModel('Activity');
       $condiciones = array();
        if (!empty($this->data)) {
            //$condiciones = array();
            if ($this->data['Activity']['user'] != '') {
                $user = $this->User->read(null, $this->data['Activity']['user']);
               // print_r($user);
                array_push($condiciones, array('Activity.user' => $user['User']['owner']));
            }
            if ($this->data['Activity']['from'] != '' and $this->data['Activity']['to'] != '') {
                $first_date =  $this->data['Activity']['from'];
                $second_date = $this->data['Activity']['to'];
                array_push($condiciones, array('Activity.created BETWEEN ? AND ?' => array($first_date, $second_date)));
            }
            // print_r($condiciones);
            
            $this->paginate = array( 'limit' => 12,'order' => array('Activity.id' => 'desc'));
            $this->set('activities', $this->paginate($condiciones));
        } else {
           
           $this->paginate = array( 'limit' => 12,'order' => array('Activity.id' => 'desc'));
           
           
           array_push($condiciones, array('Activity.user' => $this->Auth->user('owner')));
           
           $this->set('activities', $this->paginate($condiciones));
        }

         $users = $this->User->find('list', array('conditions'=>array('User.client_id'=>$this->Auth->user('client_id'))));
        // $users =  $this->Auth->user('owner');
        if($this->Auth->user('role')!="admin")
         $this->set('users', $users);
         else
         $this->set('users', $this->User->find('list', array('conditions' => array('User.id !=' => 1), 'order' => 'User.id')));
    }

    function view($id = null) {
        $this->layout = 'ajax';
        if (!$id) {
            $this->Session->setFlash('Registor invalido');
            $this->redirect(array('action' => 'index'));
        }
        $this->set('activity', $this->Activity->read(null, $id));
    }

    function report() {
        $this->Activity->recursive = 0;
        $this->layout = 'report';
        $this->loadModel('User');
        if (!empty($this->data)) {
            $condiciones = array();
            if ($this->data['Activity']['user'] != '') {
                $user = $this->User->read(null, $this->data['Activity']['user']);
                //print_r($user);
                array_push($condiciones, array('Activity.user' => $user['User']['owner']));
            }
            if ($this->data['Activity']['from'] != '' and $this->data['Activity']['to'] != '') {
                array_push($condiciones, array('Activity.created BETWEEN ? AND ?' => array($this->data['Activity']['from'], $this->data['Activity']['to'])));
            }

            $this->set('activities', $this->Activity->find('all', array('conditions' => $condiciones)));
        } else {
            $this->set('activities', $this->Activity->find('all'));
        }

        $this->set('users', $this->User->find('list', array('conditions' => array('User.id !=' => 1))));
    }

    function export() {
        App::import('Vendor', 'dompdf', array('file' => 'dompdf' . DS . 'dompdf_config.inc.php')); //use this with the 1.2 core
        //define("DOMPDF_TEMP_DIR", "../tmp");
        $dompdf = new DOMPDF();

        $dompdf->load_html($this->requestAction('/activities/report', array('return')));

        ini_set("memory_limit", "128M");
        //$dompdf->image("http://localhost:82/selweb/img/private/logo.png" );
        $dompdf->render();

        $dompdf->stream("export-" . time() . ".pdf");
    }

}

?>