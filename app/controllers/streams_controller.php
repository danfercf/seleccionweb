<?php
class StreamsController extends AppController
{
    // $this->data['Streams']['id'] = $id;
    // $this->data['Streams']['applicant_id'] = $id;
    // $this->data['Streams']['type'] = $id;
    // $this->data['Streams']['value'] = $id;
    // $this->data['Streams']['obs'] = $id;
    var $name = 'Streams';
    function beforeFilter()
    {
        $this->Auth->loginError = "No válido nombre de usuario o contraseña.";
        $this->Auth->authError = "No tiene permisos para acceder a esa ubicación.";
        $this->Auth->deny('*');
    }
    function add($id_user = null, $id_sel = null)
    {
        $this->layout = 'ajax';
        if ($id_sel) {
            //$this->Stream->create();
            $this->data['Stream']['type'] = "compartir";
            $this->data['Stream']['selecction_id'] = $id_sel;
            $this->data['Stream']['value'] = $id_user;
            $this->data['Stream']['obs'] = "value es id_user";
            if ($this->Stream->save($this->data)) {
                echo "guardado";
            }
        }
    }
    function delete($id_user = null, $id_sel = null)
    {
        $eli = $this->Stream->find('first', array('conditions' => array('Stream.value' =>
            $id_user, 'Stream.selecction_id' => $id_sel, 'Stream.type' => 'compartir')));
        print_r($eli);
        if ($this->Stream->delete($eli['Stream']['id'])) {
            $this->Session->setFlash(__('Selecction deleted', true));
        }
    }
    function read($id_user = null, $id_sel = null)
    {
        $eli = $this->Stream->find('count', array('conditions' => array('Stream.value' =>
            $id_user, 'Stream.selecction_id' => $id_sel, 'Stream.type' => 'compartir')));
        if ($eli > 0)
            return '1';
        else
            return '0';
    }
}
?>