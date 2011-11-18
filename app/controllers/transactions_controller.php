<?php

class TransactionsController extends AppController {

    var $name = 'Transactions';

    function beforeFilter() {
        $this->Auth->loginError = "No válido nombre de usuario o contraseña.";
        $this->Auth->authError = "No tiene permisos para acceder a esa ubicación.";
        $this->Auth->deny('*');
    }

    function index() {
        $this->Transaction->recursive = 0;
        $this->set('transactions', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid transaction', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('transaction', $this->Transaction->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            $this->Transaction->create();
            if ($this->Transaction->save($this->data)) {
                $this->Session->setFlash(__('The transaction has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The transaction could not be saved. Please, try again.', true));
            }
        }
        $clients = $this->Transaction->Client->find('list');
        $this->set(compact('clients'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid transaction', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Transaction->save($this->data)) {
                $this->Session->setFlash(__('The transaction has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The transaction could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Transaction->read(null, $id);
        }
        $clients = $this->Transaction->Client->find('list');
        $this->set(compact('clients'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for transaction', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Transaction->delete($id)) {
            $this->Session->setFlash(__('Transaction deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Transaction was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

}

?>