<?php
class SelecctionsController extends AppController
{
    var $name = 'Selecctions';
    var $layout = 'private';
    function beforeFilter()
    {
        $this->Auth->loginError = "No válido nombre de usuario o contraseña.";
        $this->Auth->authError = "No tiene permisos para acceder a esa ubicación.";
        $this->Auth->deny('activate', 'add', 'delete', 'index', 'edit', 'view');
        $this->Auth->allow('interview', 'questions', 'done');
    }
    function activate($selection = null, $activate = 0)
    {
        if (!$selection) {
            $this->Session->setFlash('Seleccion invalida');
            $this->redirect($this->referer());
        }
        $seleccion = $this->Selecction->read(null, $selection);
        if ($activate == 0) {
            //devolvemos creditos
            $monto = $seleccion['User']['credit'] + ($seleccion['Selecction']['sent'] - $seleccion['Selecction']['answered']);
            $this->Selecction->User->id = $seleccion['User']['id'];
            $this->Selecction->User->saveField('credit', $monto);
            $this->Selecction->id = $selection;
            $this->Selecction->saveField('status', $activate);
            $this->Session->setFlash('La seleccion <strong>"' . $seleccion['Selecction']['name'] .
                '"</strong> ha concluido, le fueron devueltos <strong>' . ($seleccion['Selecction']['sent'] -
                $seleccion['Selecction']['answered']) .
                ' creditos</strong> que no fueron usados');
        } else {
            //volvemos a quitar creditos
            $monto = $seleccion['User']['credit'] - ($seleccion['Selecction']['sent'] - $seleccion['Selecction']['answered']);
            if ($monto > 0) {
                $this->Selecction->User->id = $seleccion['User']['id'];
                $this->Selecction->User->saveField('credit', $monto);
                $this->Selecction->id = $selection;
                $this->Selecction->saveField('status', $activate);
                $this->Session->setFlash('La seleccion <strong>"' . $seleccion['Selecction']['name'] .
                    '"</strong> esta nuevamente activa, le fueron restados <strong>' . ($seleccion['Selecction']['sent'] -
                    $seleccion['Selecction']['answered']) .
                    ' creditos</strong> para continuar la la video seleccion');
            } else {
                $this->Session->setFlash('NO se puede volver ha activar la video seleccion porque no tiene sificientes creditos para continuar.<br> Necesita minimamente ' .
                    ($seleccion['Selecction']['sent'] - $seleccion['Selecction']['answered']) .
                    ' creditos para voverla ha activar');
            }
        }
        $this->redirect($this->referer());
    }
    function index()
    {
        $this->Selecction->recursive = 1;
        $this->set('selecctions', $this->paginate());
        if ($this->Auth->user('role') != "admin") {
            $this->Session->setFlash('No esta autorizado');
            $this->redirect("/");
        }
        $this->set('rol', $this->Auth->user('role'));
    }
    function view($id = null)
    {
        if (!$id) {
            $this->Session->setFlash('Seleccion invalida');
            $this->redirect(array('controller' => 'users', 'action' => 'profile'));
        }
        $this->set('selecction', $this->Selecction->read(null, $id));
    }
    function add()
    {
        if (!empty($this->data)) {
            // print_r($this->data);
            //  print_r($this->params['form']);
            $this->data['Selecction']['user_id'] = ($this->data['Selecction']['user_id'] ==
                0) ? $this->Auth->user('id') : $this->data['Selecction']['user_id'];
            $this->Selecction->create();
            if ($this->Selecction->save($this->data)) {
                $this->_log("Ha creado la video seleccion " . $this->data['Selecction']['name']);
                if (!empty($this->params['form']['enviar'])) {
                    $this->Session->setFlash('Su seleccion fue guardada, selecciones a los potenciales postulantes');
                    $this->redirect(array('action' => 'send', $this->Selecction->id));
                }
                $this->Session->setFlash('Su selecci&oacute;n fue guardada satisfactoriamente, puede enviarla a los postulantes cuando lo desee');
                $this->redirect(array('controller' => 'users', 'action' => 'profile'));
            } else {
                $this->Session->setFlash('No se ha podido guardar la seleccion intentelo de nuevo porfavor');
            }
        }
        if ($this->Auth->user('role') == 'admin') {
            $users = $this->Selecction->User->find('list', array('conditions' => array('User.role' =>
                array('administrador', 'cliente'))));
        } else {
            $users = $this->Selecction->User->find('list', array('conditions' => array('User.client_id' =>
                $this->Auth->user('client_id')))); //, 'OR' => array('User.role' => 'administrador', 'User.role' => 'cliente'))));
        }
        $users[0] = 'Asignado a: ';
        ksort($users);
        $questions = $this->Selecction->Question->find('list');
        $this->set(compact('users', 'questions'));
    }
    function edit($id = null)
    {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash('Seleccion invalida');
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->Selecction->save($this->data)) {
                if ($this->params['form']['enviar']) {
                    $this->Session->setFlash('La seleccion ha sido actualizada, selecciones a los potenciales postulantes');
                    $this->redirect(array('action' => 'send', $this->Selecction->id));
                }
                $this->Session->setFlash('La seleccion ha sido actualizada');
                $this->_log("Ha editado la video seleccion " . $this->data['Selecction']['name']);
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('No se ha podido actualizar la seleccion, porfavor intentelo de nuevo');
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Selecction->read(null, $id);
        }
    }
    function send($id = null)
    {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash('Seleccion invalida');
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            $seleccion = $this->Selecction->read(null, $this->data['Selecction']['id']);
            $cc = $this->Selecction->User->read(null, $seleccion['User']['id']);
            if (empty($seleccion['Question'])) {
                $this->Session->setFlash('Su seleccion no tiene preguntas, agregele por lo menus 10+ preguntas para poder enviarla');
                $this->redirect($this->referer());
            }
            switch ($seleccion['Selecction']['status']) {
                case 2:
                    {
                        $this->data['Selecction']['status'] = 1;
                        $this->data['Selecction']['start'] = date('Y/m/d');
                        $this->data['Selecction']['end'] = date('Y/m/d', strtotime('now +7 days'));
                        $destinatarios = explode(',', $this->params['form']['applicants']);
                        $this->data['Selecction']['sent'] = count($destinatarios);
                        if (!empty($this->data['Message']['message']))
                            $msg = $this->data['Message']['message'];
                        else {
                            $this->data['Message']['message'] = "no hay mensaje";
                            $msg = false;
                        }
                        if (!empty($this->data['Message']['message']))
                            $img = $this->data['Selecction']['image'];
                        else
                            $img = false;
                        $user = $seleccion['User']['owner'];
                        $cl = $cc['Client']['name'];
                        $ecl = $cc['Client']['email'];
                        if ($this->Selecction->saveAll($this->data)) {
                            foreach ($destinatarios as $candidato) {
                                $datos = array('from' => 'candidatos@seleccionweb.com', 'to' => $candidato,
                                    'subject' => 'Invitacion a proceso de Preseleccion en SeleccionWeb', 'data' =>
                                    array('cliente' => $cl, 'ecliente' => $ecl, 'user' => $user, 'message' => $msg,
                                    'imagen' => $img, 'nombre_seleccion' => $seleccion['Selecction']['name'], 'url' =>
                                    'http://www.seleccionweb.com/selecctions/interview/' . $seleccion['Selecction']['id'] .
                                    '/' . md5($seleccion['Selecction']['name'])));
                                $this->_sendMail($datos, 'candidato');
                                $this->_log("Se ha enviado la seleccion " . $seleccion['Selecction']['name'] .
                                    "a " . count($destinatarios) . " los postulantes son" . $this->params['form']['applicants']);
                            }
                            $this->Session->setFlash('La seleccion a sido enviado a los potenciales postulantes');
                            $this->redirect(array('controller' => 'users', 'action' => 'profile'));
                        } else {
                            $this->Session->setFlash('No se ha podido enviar la seleccion, ententelo de nuevo porfavor');
                        }
                    }
                    break;
                case 1:
                    {
                        $this->setFlash('La Seleccion esta en proceso, y no se puede enviar mas invitaciones');
                        $this->redirect(array('controller' => 'users', 'action' => 'profile'));
                    }
                    break;
                case 0:
                    {
                        $this->setFlash('La Seleccion esta inactiva, y no se puede enviar mas invitaciones');
                        $this->redirect(array('controller' => 'users', 'action' => 'profile'));
                    }
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Selecction->read(null, $id);
            $Cliente = $this->Selecction->User->find('first', array('conditions' => array('User.id' =>
                $this->data['User']['id'])));
            $this->set('cliente', $Cliente);
            if (empty($this->data)) {
                $this->Session->setFlash('Seleccion invalida');
                $this->redirect(array('controller' => 'users', 'action' => 'profile'));
            }
        }
        $this->set('applicants', $this->Selecction->Applicant->find('list', array('fields' =>
            array('email', 'name'))));
        $this->set('selecctions', $this->Selecction->find('list'));
    }
    function delete($id = null)
    {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for selecction', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Selecction->delete($id)) {
            $this->Session->setFlash(__('Selecction deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Selecction was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }
    function interview($selecction = null, $hash = null)
    {
        //echo md5('Secretaria para gerencia');
        $this->set('wrapper_id', '_selections');
        $this->layout = 'default2';
        if (!$selecction) {
            $this->Session->setFlash('Seleccion invalida, si esto no deberia ser un error comuniquese con nosotros porfavor ');
            $this->redirect('/');
        }
        $valid = $this->Selecction->read(null, $selecction);
        if ($valid['Selecction']['status'] == '0') {
            $this->Session->setFlash('Esta Selección esta Finalizada');
            $this->redirect('/');
        }
        if ($valid['Selecction']['status'] == '2') {
            $this->Session->setFlash('Esta Selección no esta Activa');
            $this->redirect('/');
        }
        if (empty($this->data)) {
            $this->data = $this->Selecction->read(null, $selecction);
        }
        if ($this->data['Selecction']['sent'] >= $this->data['Selecction']['answered']) {
            $this->set('error', 0);
        } else {
            $this->set('error', 4);
        }
        /* if ($hash == md5($selecction['Selecction']['name'])) {
        switch ($selecction['Selecction']['status']) {
        case 0: {
        $this->set('error', 2);
        } break;
        case 1: {
        //fechas
        $inicio = strtotime($selecction['Selecction']['start']);
        $fin = strtotime($selecction['Selecction']['end']);
        $hoy = time();
        if ($hoy >= $inicio and $hoy <= $fin) {
        // verificamos si el correo electronico ya hizo una video seleccion
        $this->set('error', 0);
        } else {
        $this->set('error', 3);
        }
        }
        }
        } else {
        //$this->Session->setFlash('Seleccion invalida, si esto no deberia ser un error comuniquese con nosotros porfavor ');
        $this->set('error', 1);
        } */
    }
    function questions($selecction = null)
    {
        $this->layout = 'ajax';
        $this->set('selecction', $this->Selecction->read(null, $selecction));
    }
    function done()
    {
        $this->set('wrapper_id', '_registro');
        $selecction = isset($this->params['form']['seleccion']) ? $this->params['form']['seleccion'] : null;
        $applicant = isset($this->params['form']['postulante']) ? $this->params['form']['postulante'] : null;
        $this->layout = 'default';
        if (!$selecction and !$applicant) {
            $this->Session->setFlash('Intento accceder a un lugar priviligiado , porfavor inicie session o registrese para continuar');
            $this->redirect('/clients/register');
        }
        $seleccion = $this->Selecction->read(null, $selecction);
        $postulante = $this->Selecction->Applicant->find('first', array('conditions' =>
            array('Applicant.id' => $applicant, 'Applicant.status' => -1)));
        // print_r($seleccion);
        $seleccion['Selecction']['answered'] = $seleccion['Selecction']['answered'] + 1;
        $this->set('postulante', $postulante);
        if ($postulante) {
            if (($seleccion['User']['credit'] - 1) > 0) {
                $user = array('User' => array('id' => $seleccion['User']['id'], 'credit' => $seleccion['User']['credit'] -
                    1, 'counter' => $seleccion['User']['counter'] + 1));
                $this->_log("Se ha realizado un aentrevista en la seleccion " . $seleccion['Selecction']['name'] .
                    ", y se ha descontado un credito del usuario " . $seleccion['User']['owner']);
                $this->Selecction->User->save($user);
                $this->Selecction->id = $seleccion['Selecction']['id'];
                $this->Selecction->saveField('answered', $seleccion['Selecction']['answered']);
                //$this->Selecction->save($seleccion);
            }
        }
    }
}
?>