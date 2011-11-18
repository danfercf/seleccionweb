<?php
class ClientsController extends AppController {
    var $name = 'Clients';
    var $components = array('Email', 'Key', 'Paypal', 'Securimage');
    var $layout = 'private';
    function beforeFilter() {
        $this->Auth->loginError = "No válido nombre de usuario o contraseña.";
        $this->Auth->authError = "No tiene permisos para acceder a esa ubicación.";
        $this->Auth->deny('add', 'delete', 'index', 'edit', 'purchase', 'returnByPaypal', 'view');
        $this->Auth->allow('register','securimage','confirm','subir_logo','view_term');
    }
    function securimage($random_number) {
        $this->autoLayout = false; //a blank layout
        //override variables set in the component - look in component for full list
        $this->captcha->image_height = 50;
        $this->captcha->image_width = 100;
        $this->captcha->image_bg_color = '#ffffff';
        $this->captcha->line_color = '#cccccc';
        $this->captcha->arc_line_colors = '#999999,#cccccc';
        $this->captcha->code_length = 5;
        $this->captcha->font_size = 45;
        $this->captcha->text_color = '#000000';
        $this->set('captcha_data', $this->captcha->show()); //dynamically creates an image
    }
    function index($mode='full') {
        $this->Client->recursive = 1;
        $this->paginate = array( 'limit' => 12,'order' => array('Client.name' => 'asc'));
        $this->set('clients', $this->paginate(array('Client.id !=' => 1,'Client.active !=' => 0)));
        $this->set('mode', $mode);
        $this->set('rol', $this->Auth->user('role'));
    }
    function view($id = null) {
        $this->layout = 'ajax';
        if (!$id) {
            $this->Session->setFlash('Cliente invalido');
            $this->redirect(array('action' => 'index'));
        }
        $this->set('client', $this->Client->read(null, $id));
    }
    function view_term() {
        $this->layout = 'terminos';
    }
    function add() {
       // echo $this->Auth->user('role');
         $this->set('rol', $this->Auth->user('role'));
        //print_r($this->data);
        if (!empty($this->data)) {
            $this->Client->create();
            if ($this->Client->save($this->data)) {
                $this->Session->setFlash('El nuevo cliente ha sido registrado');
                //print_r($this->data);
                $cuenta = array(
                        'client_id' => $this->Client->id,
                        'owner' => utf8_encode(($this->data['Client']['type']==0) ? $this->data['Client']['name']." ".$this->data['Client']['last_name'] : $this->data['Client']['name']),
                        'username' => $this->data['Client']['email'],
                        'role' => 'administrador',
                        'password'=>$this->data['User']['password'],
                        'active'=>1
                    );
                //print_r($cuenta);
                    $this->Client->User->save($cuenta);
                    $this->Session->setFlash('Gracias por registrarse, le fue enviado un correo a su cuenta de email que especifico, revise su correo para poder continuar.');
                    $datos_mail = array(
                        'from'=>'info@seleccionweb.com',
                        'to'=> $this->data['Client']['email'],
                        'subject'=> 'Bienvenido a SeleccionWeb.com',
                        'data'=>array(
                            'owner'=> $this->data['Client']['name']." ".$this->data['Client']['last_name'],
                            'username'=> $this->data['Client']['email'],
                            'client'=> $cuenta,
                            'client_id'=> $this->Client->User->id,
                            'password'=>$this->data['User']['repetir_password']
                        )
                    );
                    $this->_sendMail($datos_mail, 'welcome-client');
                    $this->_log("Se registro un nuevo cliente: <br> Cliente: ".$this->data['Client']['name']."<br>Cuenta:".$this->data['Client']['email']);
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('No se pudo registra el nuevo cliente, intentelo de nuevo porfavor');
            }
        }
    }
    function s(){
        
        $user_destino="newuser@localhost";
          
        $cliente=$this->Client->read(null,100);  
       
        $dato = array(
                        'from'=>'info@seleccionweb.com',
                        //'to'=>'newuser@localhost',
                        'to'=> $user_destino,
                        'subject'=> 'Se esta quedando sin credito',
                        'data'=>array(
                            'owner'=> "owner",
                            'credito'=>$cliente['User'][0]['credit']
                        )
                    );
                $this->_sendMail($dato, 'no-credit');
              
    }
    function register() {
        $this->set('wrapper_id', '_registro');
        $this->layout = 'default';
        $this->pageTitle = 'Registrese gratis';
        //$this->set('captcha_form_url', $this->webroot . 'solicitudes/add');
        //$this->set('captcha_image_url', $this->webroot . 'solicitudes/securimage/0');
        $repass_error_msg = 'El valor repetir password es incorrecto';
        if (!empty($this->data)) {
            if($this->Client->find('count', array('conditions' => array('Client.email' => $this->data['Client']['email'])))>0){
                $this->Session->setFlash('El email: '.$this->data['Client']['email'].' ya esta registrado en SeleccionWeb');
                $this->redirect($this->referer());
            }
            $this->data['Client']['photo'] = 'private/logo-blank.png';
            $this->data['Client']['key'] = $this->Key->generar();
            $this->data['Client']['last_name'] = $this->data['Client']['surname'];
            $this->data['Client']['date_birth'] = $this->data['Client']['year']."-".$this->data['Client']['month']."-".$this->data['Client']['day'];  
            if ($this->data['Client']['password'] == $this->data['Client']['repeat-password']) {
                $this->set('error_password', '');
                if (isset($this->data['Client']['type'])) {
                    $this->data['Client']['contact_name'] = $this->data['Client']['contact_name'];
                    $this->data['Client']['cuit'] = $this->data['Client']['corporate'];
                }
                $this->Client->create();
                if ($this->Client->save($this->data)) {
                    $cuenta = array(
                        'client_id' => $this->Client->id,
                        'owner' => utf8_encode(isset($this->data['Client']['type']) ? $this->data['Client']['name'] : $this->data['Client']['name'].' '.$this->data['Client']['last_name']),
                        'username' => $this->data['Client']['email'],
                        'role' => 'administrador',
                        'password'=>$this->Auth->password($this->data['Client']['password'])
                    );
                    $this->Client->User->save($cuenta);
                    $password=$this->data['Client']['password'];
                    $this->Session->setFlash('Gracias por registrarse, le fue enviado un correo a su cuenta de email que especifico, revise su correo para poder continuar.');
                    $datos_mail = array(
                        'from'=>'info@seleccionweb.com',
                        'to'=> $this->data['Client']['email'],
                        'subject'=> 'Confirme su registro en SeleccionWeb.com',
                        'data'=>array(
                            'client'=> $cuenta,
                            //'client_id'=> $this->Client->User->id,
                            'client_id'=> $this->Client->id,
                            'password'=>$password
                        )
                    );
                    $this->_sendMail($datos_mail, 'confirm');
                   // $this->_sendMail($datos_mail, 'welcome-client');
                    $this->_log("Se registro un nuevo cliente: <br> Cliente: ".$this->data['Client']['name']."<br>Cuenta:".$this->data['Client']['email']);
                    $this->redirect($this->referer());
                 //$this->redirect(array('controller' => 'users', 'action' => 'login'));
                // $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash('Sus datos no fueron guardados, intentelo nuevamente por favor');
                }
            } else {
                //the code was incorrect - display an error message to user
                $this->set('error_password', $repass_error_msg); //set error msg
                $this->set('success_captcha', ''); //set success msg
            }
        }
        //$this->set('captcha_form_url', $this->webroot . 'clients/add');
        //$this->set('captcha_image_url', $this->webroot . 'clients/securimage/0');
    }
    function confirm($id=null,$pass=null, $key=null) {
        $this->set('wrapper_id', '_registro');
        $this->layout = 'default';
        if (!$id && empty($this->data)) {
            $this->Session->setFlash('Cliente invalido');
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            $cuenta = array('User' => $this->data['User'][0]);
            $cuenta = $this->Auth->hashPasswords($cuenta);
            $this->data['User'][0] = $cuenta['User'];
            if ($this->Client->saveAll($this->data)) {
                //$this->Client->User -> save($cuenta);
                $this->Session->setFlash('Su cuenta ha sido activada exitosamente, inicie session para continuar');
                $datos_mail = array(
                        'from'=>'info@seleccionweb.com',
                        'to'=> $this->data['Client']['email'],
                        'subject'=> 'Su cuenta ha sido activada exitosamente en SeleccionWeb.com',
                        //'subject'=> 'Confirme su registro en SeleccionWeb.com',
                        'data'=>array(
                            'client'=> $cuenta,
                            'client_id'=> $this->Client->User->id,
                             'owner'=> utf8_encode(isset($this->data['Client']['last_name']) ? $this->data['Client']['name'].' '.$this->data['Client']['last_name'] : $this->data['Client']['name']),
                             'username'=> $this->data['Client']['email'],
                             'password'=>$this->data['User'][0]['password']
                        )
                    );
                    $this->_sendMail($datos_mail, 'welcome-client');
                    $this->_log("El cliente ".$cuenta['User']['username']."a confirmado su registro");
                $this->redirect(array('controller' => 'users', 'action' => 'login'));
            } else {
                $this->Session->setFlash('Error al activar su cuenta intentelo de nuevo porfavor');
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Client->read(null, $id);
             $this->set('mode', $pass);
        }
    }
    function subir_logo() {
        $this->layout = 'ajax';
        if (!empty($this->data['Client']['logo'])) {
            if (is_uploaded_file($this->data['Client']['logo']['tmp_name'])) {
                $status = move_uploaded_file(
                                $this->data['Client']['logo']['tmp_name'],
                                WWW_ROOT . "img" . DS . "clients" . DS . $this->data['Client']['logo']['name']
                );
                if ($status) {
                    $file = $this->data['Client']['logo'];
                    echo '{"name":"' . $file['name'] . '","type":"' . $file['type'] . '","size":"' . $file['size'] . '"}';
                }
            }
        }
    }
    /*function profile() {
        $profile = $this->User->findByUsername($this->Session->read('user'));
        $this->set('profile', $profile);
        $more = $this->User->Client->Selection->find(
                        'all',
                        array(
                            'conditions' => array(
                                'Selection.client_id' => $profile['Client']['id']
                            )
                        )
        );
        $plan = $this->User->Client->ContractPlan->find(
                        'all',
                        array(
                            'conditions' => array(
                                'ContractPlan.client_id' => $profile['Client']['id']
                            )
                        )
        );
        $this->set('plan', $plan);
        $this->set('more', $more);
        if ($profile['User']['rol'] == 'admin') {
            $this->User->recursive = 0;
            $this->set('list_users', $this->User->find('all', array('conditions' => array('User.username !=' => 'admin'))));
        }
        $this->_log('El usuario inicio session');
    }*/
    function purchase() {
        $costo=$this->Client->User->read(null, 1);
        $this->set('costo', $costo['Payment']);
        if (!empty($this->data)) {
            //$pyapal_settings = Configure::read('paypal_settings');
            //print_r($this->data);
            if( $this->data['Client']['count']>9){
            $this->Paypal->paypalUserName = 'edcalo_1304542452_per@gmail.com';
            $this->Paypal->paypalPassword = 'hpscan5590jeT';
            //$this->Paypal->paypalSignature = 'AFcWxV21C7fd0v3bYYYRCpSSRl31Aco7T6X5HIEYklo9lIPtrmNyYVEg';
            $this->Paypal->returnSuccessUrl = "/selweb/clients/returnByPaypal/".$this->data['Client']['amount']."/pay?csid=" . session_id();
            $this->Paypal->returnCancelUrl = "/selweb//clients/returnByPaypal/0/cancel?csid=" . session_id();
            $ret = ($this->Paypal->doExpressCheckout($this->data['Client']['amount']*3, $this->data['Client']['amount'].' Video Selecciones ')); // use USD for dollar
            $this->Session->write('cantidad', $this->data['Client']['amount']);
            }else{
                $this->Session->setFlash('Tiene que comprar Video Selecciones mayor a 10');
                $this->redirect(array('action' => 'purchase'));
            }
        }
    }
    public function returnByPaypal($cantidad=0, $callback = null) {
        if ($callback == 'cancel') {
            $this->redirect(array('controller' => 'users', 'action' => 'profile'));
            exit;
        } else if ($callback == 'pay') {  
            $pyapal_settings = Configure::read('paypal_settings');
            $this->Paypal->paypalUserName = 'edcalo_1304463695_biz_api1.gmail.com';
            $this->Paypal->paypalPassword = '1304463715';
            $this->Paypal->paypalSignature = 'AFcWxV21C7fd0v3bYYYRCpSSRl31Aco7T6X5HIEYklo9lIPtrmNyYVEg'; 
            $paypalRespons = $this->Paypal->doPayment();
            //print_r($paypalRespons);
            if ($paypalRespons['ACK'] == 'Success') {
                $saldo = $this->Client->read('balance', $this->Auth->user('client_id'));
                $credito=$this->Client->User->read('credit', $this->Auth->user('id'));
                $this->Session->setFlash('Su compra fue exitosa. se le ha agregado '.$cantidad.' de creditos');
                $saldo['Client']['balance']=$saldo['Client']['balance']+$cantidad;
                $this->Client->save($saldo);
                $credito['User']['credit']=$credito['User']['credit']+$cantidad;
                $this->Client->User->save($credito);
                $this->_log("El usuario compro ".$cantidad." Video selecciones");
                $this->redirect(array('controller'=>'users', 'action'=>'profile'));
            }
        }
    }
    function edit() {
        $id = $this->data['Client']['id'];
        if (!$id && empty($this->data)) {
            $this->Session->setFlash('Cliente invalido');
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if (!empty($this->data['Client']['logo'])) {
                $imagen = $this->data['Client']['logo'];
                if (is_uploaded_file($imagen['tmp_name'])) {
                    if (move_uploaded_file($imagen['tmp_name'], WWW_ROOT . 'img' . DS . 'clients' . DS . $imagen['name'])) {
                        $this->data['Client']['logo'] = "clients/" . $imagen['name'];
                    } else {
                        $this->data['Client']['logo'] = 'private/logo-blank.png';
                    }
                } else {
                    $this->data['Client']['logo'] = 'private/logo-blank.png';
                }
            }
            if ($this->Client->save($this->data)) {
                $this->Session->setFlash('La informacion ha sido actualizada');
                $this->_log('El usuario modifico su informacion');
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash('Los datos no fueron guardados. Porfavor intentelo de nuevo');
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Client->read(null, $id);
        }
        $this->register(array('controller' => 'users', 'action' => 'profile'));
    }
    function editar($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash('Cliente Invalido');
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
           // print_r($this->data);
            if ($this->Client->save($this->data)) {
                $this->Session->setFlash('El cliente fue modificado');
                $this->_log('El usuario modifico su informacion');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('No se pudo modificar al cliente, intentelo de nuevo porfavor');
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Client->read(null, $id);
        }
        /* $clients = $this->Transaction->Client->find('list');
          $this->set(compact('clients')); */
    }
    function active($id = null) {
        if (!$id) {
            $this->Session->setFlash('Cliente Invalido');
            $this->redirect(array('action' => 'index'));
        }
        $this->Client->id = $id;
        if ($this->Client->saveField('active', '1')) {
            $this->Session->setFlash('Cliente Activado');
            $this->redirect(array('action' => 'index'));
            }
        $this->Session->setFlash('No se puede eliminar el cliente');
        $this->redirect(array('action' => 'index'));
        }
    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash('Cliente Invalido');
            $this->redirect(array('action' => 'index'));
        }
        /*
        if ($this->Client->delete($id)) {
            $this->Session->setFlash('Cliente eliminado');
            $this->redirect(array('action' => 'index'));
            $this->_log('Elimino al cliente nro '.$id);
        }*/
        $this->data = $this->Client->read(null, $id);
        $admin = $this->Client->read(null, 1);
        $this->Client->id = $id;
        if ($this->Client->saveField('active', '0')) {
                $dato = array(
                    'from'=>'info@seleccionweb.com',
                    //'to'=>'newuser@localhost',
                    'to'=> $admin['Client']['email'],
                    'subject'=> 'Cliente bloqueado',
                    'data'=>array(
                        'owner'=> $this->data['Client']['name'],
                        'id'=>$this->data['Client']['id'],
                        'email'=>$this->data['Client']['email']
                        )
                );
            $this->_sendMail($dato, 'active');
            $this->Session->setFlash('Cliente eliminado');
            $this->redirect(array('action' => 'index'));
            $this->_log('Elimino al cliente nro '.$id);
        }
        $this->Session->setFlash('No se puede eliminar el cliente');
        $this->redirect(array('action' => 'index'));
    }
}
?>