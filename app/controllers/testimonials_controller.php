<?php
class TestimonialsController extends AppController
{
    var $name = 'Testimonials';
    function beforeFilter()
    {
        $this->Auth->loginError = "No válido nombre de usuario o contraseña.";
        $this->Auth->authError = "No tiene permisos para acceder a esa ubicación.";
        $this->Auth->deny('delete');
        $this->Auth->allow('*');
    }
    function index()
    {
        $this->Testimonial->recursive = 0;
        $this->set('testimonials', $this->Testimonial->find('all', array('conditions' =>
            array('Testimonial.active' => '1'), 'order' => array('Testimonial.created' =>
            'DESC'), 'limit' => 3)));
    }
    function add()
    {
        if (!empty($this->data)) {
            $ema = $this->data['Testimonial']['email'];
            $nam = $this->data['Testimonial']['name'];
            $test = $this->data['Testimonial']['testimonial'];
            //$this->Testimonial->create();
            if ($this->Testimonial->save($this->data)) {
                $this->Session->setFlash('Su testimonio ha sido guardado.');
                $dato = array('from' => $ema, 'to' => 'candidatos@seleccionweb.com',
                    'subject' => 'Testimonios', 'data' => array('id' => $this->Testimonial->id,
                    'name' => $nam, 'email' => $ema, 'test' => $test));
                $this->_sendMail($dato, 'testimonial');
                $dato = array('from' => 'candidatos@seleccionweb.com',
                    'to' => $ema, //$ema
                    'subject' => 'Agradecimientos', 'data' => array('name' => $nam));
                $this->_sendMail($dato, 'agradece');
                $this->redirect(array('controller' => 'pages', 'action' => 'home'));
            } else {
                $this->Session->setFlash('No se pudo guardar su tetimonio');
            }
        }
    }
    function delete($id = null)
    {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for testimonial', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Testimonial->delete($id)) {
            $this->Session->setFlash(__('Testimonial deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Testimonial was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }
    function confirm($id = null)
    {
        $this->layout = 'default';
        if (!$id) {
            $this->Session->setFlash('Testimonio invalido');
            $this->redirect(array('controller' => 'users', 'action' => 'profile'));
        }
        $this->data = $this->Testimonial->read(null, $id);
        $this->data['Testimonial']['active'] = '1';
        $this->Testimonial->save($this->data);
        $this->Session->setFlash('Testimonio activado');
        $this->redirect(array('controller' => 'users', 'action' => 'profile'));
    }
}
?>