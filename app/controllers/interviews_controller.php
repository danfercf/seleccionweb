<?php
class InterviewsController extends AppController
{
    var $name = 'Interviews';
    var $layout = 'private';
    function beforeFilter()
    {
        $this->Auth->loginError = "No válido nombre de usuario o contraseña.";
        $this->Auth->authError = "No tiene permisos para acceder a esa ubicación.";
        $this->Auth->deny('index', 'delete', 're_interview', 'view');
        $this->Auth->allow('add');
    }
    function index($nombre = null)
    {
       
        $this->Interview->Applicant->recursive = 1;
        //preparamos los parametros
        $condiciones = array();
        // echo $this->data['Ranking']['id'];
        if (isset($nombre))
            $this->set('nombre', $nombre);
        else
            $this->set('nombre', "xxx");
        if (!empty($this->data)) {
            if (isset($this->data['Applicant']['selecction_id']) && isset($this->data['User']['id'])) {
                if ($this->data['User']['id'] != "Todos")
                    array_push($condiciones, array('Applicant.selecction_id' => $this->data['Applicant']['selecction_id']));
            }
            if (isset($this->data['Applicant']['gender'])) {
                array_push($condiciones, array('Applicant.gender' => $this->data['Applicant']['gender']));
            }
            if (isset($this->data['Applicant']['status'])) {
                array_push($condiciones, array('Applicant.status' => $this->data['Applicant']['status']));
            }
            if (isset($this->data['Applicant']['general'])) {
                array_push($condiciones, array('Applicant.general' => $this->data['Applicant']['general']));
            }
        }
        $this->set('rol', $this->Auth->user('role'));
        $this->set('id_us', $this->Auth->user('id'));
        $compartidos = $this->Interview->Applicant->Selecction->Stream->find('list',
            array('fields' => array('Stream.selecction_id'), 'conditions' => array('Stream.value' =>
            $this->Auth->user('id'), 'Stream.type' => 'compartir')));
        if ($this->Auth->user('role') == 'admin') {
            if (isset($this->data['User']['id']) && $this->data['User']['id'] != "Todos") {
                $users = $this->Interview->Applicant->Selecction->User->find('list', array('conditions' =>
                    array('User.id' => $this->data['User']['id'], 'User.client_id' => $this->data['Client']['id'])));
            } else {
                $users = $this->Interview->Applicant->Selecction->User->find('list', array('conditions' =>
                    array('User.id !=' => 1)));
            }
            $client = $this->Interview->Applicant->Selecction->User->Client->find('list',
                array('conditions' => array('Client.id !=' => 1)));
            $this->set('client', $client);
            $selecctions = $this->Interview->Applicant->Selecction->find('list', array('conditions' =>
                array('Selecction.user_id' => array_keys($users), 'Selecction.status' => '1')));
        } else {
            if (isset($this->data['User']['id']) && $this->data['User']['id'] != "Todos") {
                $users = $this->Interview->Applicant->Selecction->User->find('list', array('conditions' =>
                    array('User.id' => $this->data['User']['id'])));
                $selecctions = $this->Interview->Applicant->Selecction->find('list', array('conditions' =>
                    array('Selecction.user_id' => array_keys($users), 'Selecction.status' => '1')));
            } else {
                if ($this->Auth->user('role') == 'administrador') {
                    //$us =  $this->User->read('list', array('conditions' => array('User.id' => $this->Auth->user('id'))));
                    //print_r($us);
                    $users = $this->Interview->Applicant->Selecction->User->find('list', array('conditions' =>
                        array('User.client_id' => $this->Auth->user('client_id'))));
                    $selecctions = $this->Interview->Applicant->Selecction->find('list', array('conditions' =>
                        array('Selecction.user_id' => array_keys($users), 'Selecction.status' => '1')));
                } else {
                    $users = $this->Interview->Applicant->Selecction->User->find('list', array('conditions' =>
                        array('User.id' => $this->Auth->user('id'))));
                    $selecctions = $this->Interview->Applicant->Selecction->find('list', array('conditions' =>
                        array('Selecction.user_id' => $this->Auth->user('id'), 'Selecction.status' =>
                        '1')));
                }
            }
            $this->set('client', '');
        }
        $selec = $this->Interview->Applicant->Selecction->find('list', array('conditions' =>
            array('Selecction.user_id' => $this->Auth->user('id'), 'Selecction.status' =>
            '1')));
        $fil = array('Applicant.selecction_id' => array_keys($selec));
        $selecc = $this->Interview->Applicant->Selecction->find('list', array('conditions' =>
            array('Selecction.id' => $compartidos, 'Selecction.status' => '1')));
        // print_r($compartidos);
        //echo "<hr>";
        $selecctions = $selecctions + $selecc;
        //print_r($selecc);
        //echo "<hr>";
        //print_r($selecctions);
        $sel = $this->Interview->Applicant->Selecction->find('all', array('conditions' =>
            array('Selecction.user_id' => array_keys($users))));
        $filtro = array('Applicant.selecction_id' => array_keys($selecctions));
        if (!empty($condiciones)) {
            array_push($filtro, $condiciones);
        }
        //  'Applicant.user_id'=>$this->Auth->user('id')
        $cond = array('Applicant.ready' => '0');
        array_push($cond, $fil);
        $ready = $this->Interview->Applicant->find('all', array('conditions' => $cond));
        $this->set('ready', $ready);
        $interviews = $this->Interview->Applicant->find('all', array('conditions' => $filtro,
            'order' => array('Applicant.selecction_id' => 'asc','Applicant.status' => 'asc', 'Applicant.gender' => 'asc'))); 
        if ($this->Auth->user('role') == 'admin') {
            if (isset($this->data['Client']['id'])) {
                $users = $this->Interview->Applicant->Selecction->User->find('list', array('conditions' =>
                    array('User.client_id' => $this->data['Client']['id'])));
            } else
                $users = $this->Interview->Applicant->Selecction->User->find('list', array('conditions' =>
                    array('User.id !=' => 1)));
        } else {
            $users = $this->Interview->Applicant->Selecction->User->find('list', array('conditions' =>
                array('User.client_id' => $this->Auth->user('client_id'))));
        }
        //$selecctions = $this->Selecction->read('list', array('conditions'=>array('Selecction.id'=>  array_keys($selecctions))));
        $this->set(compact('interviews', 'selecctions', 'users', 'sel'));
    }
    function readys()
    {
        if ($this->Auth->user('role') == 'admin') {
            $users = $this->Interview->Applicant->Selecction->User->find('list', array('conditions' =>
                array('User.id !=' => 1)));
            $client = $this->Interview->Applicant->Selecction->User->Client->find('list',
                array('conditions' => array('Client.id !=' => 1)));
            $this->set('client', $client);
        } else {
            $users = $this->Interview->Applicant->Selecction->User->find('list', array('conditions' =>
                array('User.client_id' => $this->Auth->user('client_id'))));
            $this->set('client', '');
        }
        //$selecctions = $this->Interview->Applicant->Selecction->find('list', array('conditions'=>array('Selecction.user_id'=>  array_keys($users),'Selecction.status'=>  '1')));
        $selecctions = $this->Interview->Applicant->Selecction->find('list', array('conditions' =>
            array('Selecction.user_id' => $this->Auth->user('id'), 'Selecction.status' =>
            '1')));
        $filtro = array('Applicant.selecction_id' => array_keys($selecctions));
        if (!empty($condiciones)) {
            array_push($filtro, $condiciones);
        }
        $cond = array('Applicant.ready' => '0');
        array_push($cond, $filtro);
        $ready = $this->Interview->Applicant->find('all', array('conditions' => $cond));
        return $ready;
    }
    function view($id = null)
    {
        $this->layout = 'ajax';
        if (!$id) {
            $this->Session->setFlash('Postulante invalido');
            $this->redirect(array('action' => 'index'));
        }
        $this->_log("Reviso la entrevista del postulante nro " . $id);
        //print_r($preg['Question']);
        $preg = $this->Interview->Applicant->read(null, $id);
        $preg = $preg['Selecction'];
        $preg = $this->Interview->Applicant->Selecction->read(null, $preg['id']);
        //print_r($preg['Question']);
        $this->set('question', $preg['Question']);
        $this->set('interview', $this->Interview->Applicant->read(null, $id));
    }
    function player()
    {
        $this->layout = 'ajax';
        $this->set('rtmp', $this->params['form']['rtmp']);
        $this->set('img', $this->params['form']['img']);
    }
    function re_interview($id = null)
    {
        $this->layout = 'private';
        if (!$id) {
            $this->Session->setFlash($_('Invalid interview', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Una nueva solicitud de entrevista fue enviado al cooreo del postulante');
        $this->redirect(array('action' => 'index'));
    }
    function add()
    {
        $this->layout = "ajax";
        $this->data['Interview']['applicant_id'] = $this->params['form']['id_user'];
        $this->data['Interview']['url_interview'] = $this->params['form']['rtmp_url'] .
            "/" . $this->params['form']['video_url'];
        $this->data['Interview']['photo'] = "clients/mini/" . $this->params['form']['id_e'] .
            "_" . $this->params['form']['id_user'] . ".jpg";
        if (!empty($this->data)) {
            $this->Interview->create();
            if ($this->Interview->save($this->data)) {
                $this->_log("El postulante " . $this->params['form']['id_user'] .
                    "realizo una entrevista");
                $this->set('guardado', true);
            } else {
                $this->set('guardado', false);
            }
        }
    }
    function edit($id = null)
    {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid interview', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Interview->save($this->data)) {
                $this->Session->setFlash(__('The interview has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The interview could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Interview->read(null, $id);
        }
        $applicants = $this->Interview->Applicant->find('list');
        $this->set(compact('applicants'));
    }
    function delete($id = null)
    {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for interview', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Interview->delete($id)) {
            $this->Session->setFlash(__('Interview deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Interview was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }
    function tabla()
    {
        $this->layout = 'ajax';
        $this->Interview->Applicant->recursive = 1;
        //preparamos los parametros
        $condiciones = array();
        // echo $this->data['Ranking']['id'];
        if (!empty($this->data)) {
            if (isset($this->data['Applicant']['selecction_id']) && $this->data['Applicant']['selecction_id'] !=
                "Todos") {
                array_push($condiciones, array('Applicant.selecction_id' => $this->data['Applicant']['selecction_id']));
            }
            if (isset($this->data['Applicant']['gender'])) {
                array_push($condiciones, array('Applicant.gender' => $this->data['Applicant']['gender']));
            }
            if (isset($this->data['Applicant']['status'])) {
                array_push($condiciones, array('Applicant.status' => $this->data['Applicant']['status']));
            }
            /*
            if(isset ($this->data['Ranking']['id'])){
            array_push($condiciones, array('Applicant.selecction_id'=>$this->data['Ranking']['id']));
            }*/
        }
        $this->set('rol', $this->Auth->user('role'));
        if ($this->Auth->user('role') == 'admin') {
            if (isset($this->data['Client']['id']) && $this->data['Client']['id'] != "Todos") {
                if (isset($this->data['User']['id']))
                    $users = $this->Interview->Applicant->Selecction->User->find('list', array('conditions' =>
                        array('User.id' => $this->data['User']['id'], 'User.client_id' => $this->data['Client']['id'])));
                else
                    $users = $this->Interview->Applicant->Selecction->User->find('list', array('conditions' =>
                        array('User.client_id' => $this->data['Client']['id'])));
            } else {
                if (isset($this->data['User']['id'])) {
                    $users = $this->Interview->Applicant->Selecction->User->find('list', array('conditions' =>
                        array('User.id !=' => 1, 'User.id' => $this->data['User']['id'])));
                } else {
                    $users = $this->Interview->Applicant->Selecction->User->find('list', array('conditions' =>
                        array('User.id !=' => 1)));
                }
            }
            $client = $this->Interview->Applicant->Selecction->User->Client->find('list',
                array('conditions' => array('Client.id !=' => 1)));
            $this->set('client', $client);
        } else {
            if (isset($this->data['User']['id']) && $this->data['User']['id'] != "Todos") {
                $users = $this->Interview->Applicant->Selecction->User->find('list', array('conditions' =>
                    array('User.id' => $this->data['User']['id'])));
            } else {
                $users = $this->Interview->Applicant->Selecction->User->find('list', array('conditions' =>
                    array('User.client_id' => $this->Auth->user('client_id'))));
            }
            $this->set('client', '');
        }
        $selecctions = $this->Interview->Applicant->Selecction->find('list', array('conditions' =>
            array('Selecction.user_id' => array_keys($users), 'Selecction.status' => '1')));
        $filtro = array('Applicant.selecction_id' => array_keys($selecctions));
        if (!empty($condiciones)) {
            array_push($filtro, $condiciones);
        }
        $cond = array('Applicant.ready' => '0');
        array_push($cond, $filtro);
        $ready = $this->Interview->Applicant->find('all', array('conditions' => $cond));
        $this->set('ready', $ready);
        $interviews = $this->Interview->Applicant->find('all', array('conditions' => $filtro,
            'order' => array('Applicant.selecction_id' => 'desc')));
        if ($this->Auth->user('role') == 'admin') {
            if (isset($this->data['Client']['id']) && isset($this->data['Client']['id'])) {
                $users = $this->Interview->Applicant->Selecction->User->find('list', array('conditions' =>
                    array('User.client_id' => $this->data['Client']['id'])));
            } else
                $users = $this->Interview->Applicant->Selecction->User->find('list', array('conditions' =>
                    array('User.id !=' => 1)));
        } else {
            $users = $this->Interview->Applicant->Selecction->User->find('list', array('conditions' =>
                array('User.client_id' => $this->Auth->user('client_id'))));
        }
        $this->set(compact('interviews', 'selecctions', 'users'));
    }
}
?>