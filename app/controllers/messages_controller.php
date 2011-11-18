<?php



class MessagesController extends AppController {



    var $name = 'Messages';

    var $components = array('Email');

    function index() {

        $this->Message->recursive = 0;

        $this->set('messages', $this->paginate());

    }



    function view($id = null) {

        if (!$id) {

            $this->Session->setFlash(__('Invalid message', true));

            $this->redirect(array('action' => 'index'));

        }

        $this->set('message', $this->Message->read(null, $id));

    }



    function add() {

        if (!empty($this->data)) {

            $this->Message->create();

            if ($this->Message->save($this->data)) {

                $this->Session->setFlash(__('The message has been saved', true));

                $this->redirect(array('action' => 'index'));

            } else {

                $this->Session->setFlash(__('The message could not be saved. Please, try again.', true));

            }

        }

        $selecctions = $this->Message->Selecction->find('list');

        $this->set(compact('selecctions'));

    }



    function edit($id = null) {

        if (!$id && empty($this->data)) {

            $this->Session->setFlash(__('Invalid message', true));

            $this->redirect(array('action' => 'index'));

        }

        if (!empty($this->data)) {

            if ($this->Message->save($this->data)) {

                $this->Session->setFlash(__('The message has been saved', true));

                $this->redirect(array('action' => 'index'));

            } else {

                $this->Session->setFlash(__('The message could not be saved. Please, try again.', true));

            }

        }

        if (empty($this->data)) {

            $this->data = $this->Message->read(null, $id);

        }

        $selecctions = $this->Message->Selecction->find('list');

        $this->set(compact('selecctions'));

    }



    function delete($id = null) {

        if (!$id) {

            $this->Session->setFlash(__('Invalid id for message', true));

            $this->redirect(array('action' => 'index'));

        }

        if ($this->Message->delete($id)) {

            $this->Session->setFlash(__('Message deleted', true));

            $this->redirect(array('action' => 'index'));

        }

        $this->Session->setFlash(__('Message was not deleted', true));

        $this->redirect(array('action' => 'index'));

    }



    function contact() {

        $this->Email->reset();

        $smtpOptions = array(

            'port' => '25',

            'host' => 'mail.seleccionweb.com',

            'username' => 'info',

            'password' => '123456',

            'auth' => true

        );

        $this->Email->delivery = 'smtp';

        $this->Email->from = $this->params['form']['email'];

        $this->Email->to = 'soporte@seleccionweb.com';

        $this->Email->subject = 'Consulta general SeleccionWeb.com';

        $this->Email->sendAs = 'html';

        $mensage = "<b>" . $this->params['form']['name'] . "</b> dice: <p>" . $this->params['form']['comment'] . "<p>";

        if (isset($this->params['form']['corporate']) and $this->params['form']['corporate'] != '') {

            $mensage .="<p> <b>Empresa:</b> " . $this->params['form']['corporate'] . "</p>";

        }

        $this->Email->send($mensage);

        //mandamso el email al cliente

        $this->Email->reset();

        $smtpOptions = array(

            'port' => '25',

            'host' => 'mail.seleccionweb.com',

            'username' => 'info',

            'password' => '123456',

            'auth' => true

        );

        $this->Email->delivery = 'smtp';

        $this->Email->from = 'soporte@seleccionweb.com';

        $this->Email->to = $this->params['form']['email'];

        $this->Email->subject = 'Gracias por su consulta a  SeleccionWeb.com';

        $this->set('nombre', $this->params['form']['name']);

        $this->Email->template = 'consulta';

        $this->Email->sendAs = 'html';

        $this->Email->send();

        $this->Session->setFlash('Se ha enviado su consulta, gracias por contactarnos');

        $this->redirect($this->referer());

    }

    function news(){

        return 0;

    }



}



?>