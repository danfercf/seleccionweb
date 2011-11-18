<?php
class UsersController extends AppController
{
    var $name = 'Users';
    var $layout = 'private';
    var $components = array('Key');
    function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->userScope = array('User.active' => true);
        $this->Auth->loginRedirect = array('controller' => 'users', 'action' =>
            'profile');
        $this->Auth->deny('add', 'delete', 'home', 'index', 'profile', 'view'); // = array('controller'=>'pages', 'action'=>'home');
        $this->Auth->allow('login', 'logout', 'forgot_password', 'planes');
    }
    function login()
    {
        $this->layout = "default";
    }
    function logout()
    {
        $this->redirect($this->Auth->logout());
    }
    function index()
    {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }
    function planes()
    {
        $this->User->Payment->recursive = 0;
        $planes = $this->User->Payment->find('all', array('conditions' => array('Payment.user_id' => '1')));
        return $planes;
    }
    function config()
    {
        $this->layout = 'private';
        $this->set('tab','config');
        $lang=$this->User->Language->find('all', array('conditions' => array('Language.user_id' => '1')));
        $this->_p($lang);
        
    }
    
    function view($id = null)
    {
        $this->layout = 'ajax';
        if (!$id) {
            $this->Session->setFlash('Usuario Invalido');
            $this->redirect(array('action' => 'index'));
        }
        $this->set('user', $this->User->read(null, $id));
    }
    function add()
    {
        if (!$this->Auth->user()) {
            $this->redirect($this->Auth->login());
        }
        $this->layout = 'private';
        if (!empty($this->data)) {
            $password = $this->data['User']['password'];
            $this->data['User']['password'] = $this->Auth->password($this->data['User']['password']);
            $this->data['User']['username'] = $this->data['Client']['email'];
            $this->data['User']['owner'] = utf8_encode($this->data['Client']['name']);
            if (($this->data['User']['role'] == 'administrador')) {
                if ($this->User->Client->save($this->data)) {
                    $this->data['User']['client_id'] = $this->User->Client->id;
                } else {
                    $this->Session->setFlash('Error al crear en nuevo cliente, no se creo la cuenta.');
                }
            } else {
                // if($this->Auth->user('role')=="administrador")
                $this->data['User']['client_id'] = $this->Auth->user('client_id');
                //$this->data['User']['client_id'] = $userx['User']['client_id'];
                $this->data['User']['owner'] = utf8_encode($this->data['Client']['name']);
                $this->data['User']['credit'] = 0;
                $this->data['User']['active'] = 1;
            }
            if ($this->User->save($this->data)) {
                $this->Session->setFlash('La cuenta ha sido creada');
                $client = $this->User->Client->find('first', array('conditions' => array('Client.id' =>
                    $this->data['User']['client_id'])));
                $datos_mail = array('from' => 'info@seleccionweb.com', 'to' => $this->data['Client']['email'],
                    'subject' => 'Bienvenido a SeleccionWeb', 'data' => array('client' => $this->
                    data['User'],'user' => $this->data['Client'], 'client_id' => $this->User->id, 'password' => $password));
                $this->_sendMail($datos_mail, 'welcome-user');
                $this->redirect(array('action' => 'profile'));
            } else {
                $this->Session->setFlash('El usuario no puede ser creado. Por favor intentelo de nuevo');
            }
        }
        $this->set('clientes', $this->User->Client->find('list', array('conditions' =>
            array('Client.id !=' => 1))));
        if ($this->Auth->user('role') == 'admin') {
            $this->set('admin', true);
            $roles = array('administrador' => 'Cliente Administrador', 'cliente' =>
                'Usuario Cliente', 'video' => 'Video Usuario');
        } else {
            if ($this->Auth->user('role') == 'administrador') {
                $this->set('admin', true);
                $roles = array('cliente' => 'Usuario Cliente', 'video' => 'Video Usuario');
            } else {
                $this->set('admin', false);
                $roles = array('video' => 'Video Usuario');
            }
        }
        //$roles = array('administrador' =>'Cliente Administrador','cliente' =>'Usuario Cliente', 'video'=>'Video Usuario');
        //$roles = array('administrador' =>'Cliente Administrador','cliente' =>'Usuario Cliente', 'video'=>'Video Usuario');
        $this->set('roles', $roles);
    }
    function edit($id = null)
    {
        $this->layout = 'ajax';
        if (!$id && empty($this->data)) {
            $this->Session->setFlash('Usuario invalido');
            $this->redirect(array('action' => 'profile'));
        }
        if (!empty($this->data)) {
            //$user0 = $this->User->find('first', array('conditions' => array('User.id' => $this->data['User']['id'])));
            //echo "escritura";
            //$pas=$user0['User']['password'];
            //$newp=$this->data['User']['password'];
            if (isset($this->data['User']['password'])) {
                $this->data['User']['password'] = $this->Auth->password($this->data['User']['password']);
            }
            if (isset($this->data['User']['credit'])) {
                $saldo = 10;
                $userad = $this->User->read(null, $this->Auth->user('id'));
                if ($this->Auth->user('role') != 'admin') {
                    $saldo = $userad['User']['credit'] - $this->data['User']['credit'];
                    $userad['User']['credit'] = $saldo;
                }
                if ($saldo > 0) {
                    if ($this->Auth->user('role') != 'admin')
                        $this->User->save($userad);
                    $user = $this->User->read(null, $this->data['User']['id']);
                    $this->data['User']['credit'] = $user['User']['credit'] + $this->data['User']['credit'];
                    $dato = array('from' => 'info@seleccionweb.com', //'to'=>'froilan.q@gmail.com',
                        'to' => $user['User']['username'], 'subject' => 'Se agrego credito a su cuenta',
                        'data' => array('owner' => $user['User']['owner'], 'credito' => $this->data['User']['credit']));
                    $this->_sendMail($dato, 'add-credit');
                } else {
                    $this->Session->setFlash('No tiene bastante Credito');
                    $this->redirect(array('action' => 'profile'));
                }
            }
            if ($this->User->save($this->data)) {
                $this->Session->setFlash('Datos actualizados');
                $this->redirect(array('action' => 'profile'));
            } else {
                $this->Session->setFlash('No se ha podido actualizar. porfavor intentelo de nuevo');
            }
        }
        if (empty($this->data)) {
            //echo "lectura";
            $this->data = $this->User->read(null, $id);
            $this->set('us', $this->User->read(null, $id));
        }
    }
    function delete($id = null)
    {
        if (!$id) {
            $this->Session->setFlash('Usuario invalido');
            $this->redirect(array('action' => 'profile'));
        }
        $user = $this->User->read(null, $id);
        $credito = $user['User']['credit'];
        $clientid = $user['User']['client_id'];
        $user['User']['credit'] = '0';
        $user['User']['active'] = '0';
        //print_r($user);
        if ($this->User->save($user)) {
            $cliente = $this->User->Client->find('first', array('conditions' => array('Client.id' =>
                $clientid)));
            $cliente['Client']['balance'] = $cliente['Client']['balance'] + $credito;
            //   $this->User->Client->save($cliente);   //Guarda el balance
            $user = $this->User->find('first', array('conditions' => array('User.client_id' =>
                $clientid, 'User.role' => 'administrador')));
            $user['User']['credit'] = $user['User']['credit'] + $credito;
            ;
            $this->User->save($user);
            $this->Session->setFlash('Usuario Eliminado');
            $this->redirect(array('action' => 'profile'));
        }
        $this->Session->setFlash('No se ha podido eliminar el usuario');
        $this->redirect(array('action' => 'profile'));
    }
    function profile()
    {
        $this->User->recursive = 2;
        $userad = $this->User->read(null, $this->Auth->user('id'));
        
        $this->Session->write('username', $userad['User']['username']);
        $this->Session->write('password', $userad['User']['password']);
        
        if ($userad['Client']['active'] == 0) {
            $this->Session->setFlash('Su cuenta esta bloqueada, contactese con el administrador');
            $this->logout();
        }
        if ($userad['User']['credit'] < 3 && $userad['User']['role'] == "administrador") {
            $dato = array('from' => 'info@seleccionweb.com', //'to'=>'newuser@localhost',
                'to' => $userad['Client']['email'], 'subject' => 'Se esta quedando sin credito',
                'data' => array('owner' => $userad['User']['owner'], 'credito' => $userad['User']['credit']));
            $this->_sendMail($dato, 'no-credit');
        }
        //  array( 'limit' => 12,'order' => array('Activity.created' => 'desc'));
        //$profile = $this->User->read(null, $this->Auth->user('id'));
        $profile = $this->User->find('first', array('conditions' => array('User.id' => $this->
            Auth->user('id')), 'order' => array('User.owner' => 'desc')));
        //  print_r($profilex);
        $apl = $this->User->Selecction->Applicant->find('all', array('conditions' =>
            array('Applicant.ready' => '0')));
        $this->set('apl', $apl);
        $this->set('profile', $profile);
        $more = $this->User->Selecction->find('all', array('conditions' => array('Selecction.user_id' =>
            $profile['User']['id']), 'order' => array('Selecction.status' => 'asc')));
        $this->set('more', $more);
        if ($profile['User']['role'] == 'admin' || $profile['User']['role'] ==
            'administrador') {
            $this->User->recursive = 0;
            $this->set('list_users', $this->User->find('all', array('conditions' => array('User.username !=' =>
                'admin', ))));
        }
        $this->Session->write('rol', $profile['User']['role']);
        $this->Session->write('owner', $profile['User']['owner']);
        
        //$this->Cookie->write('lang', "en", false, '20 days');
        
        //echo($this->_lang("<!--:en-->ABOUT US<!--:--><!--:es-->Acerca de Nosotros<!--:--><!--:pt-->ABOUT US<!--:-->"));
        //$this->Cookie->read('lang');
    }
    function home()
    {
    }
    function forgot_password()
    {
        $this->layout = 'default';
        if (!empty($this->data)) {
            $user = $this->User->find('first', array('conditions' => array('User.username' =>
                $this->data['User']['username'])));
            $pass = $this->Key->generar();
            $newpass = array('User' => array('id' => $user['User']['id'], 'username' => $user['User']['username'],
                'password' => $this->Auth->password($pass)));
            if ($this->User->save($newpass)) {
                $this->Session->setFlash('Se le fue enviado un correo con su nueva contrase&ntilde;a');
                $dato = array('from' => 'info@seleccionweb.com', 'to' => $user['User']['username'],
                    'subject' => 'Su nueva contraseña', 'data' => array('owner' => $user['User']['owner'],
                    'username' => $user['User']['username'], 'password' => $pass));
                $this->_sendMail($dato, 'forgot');
            }
            $this->redirect('/');
        }
    }
    function purchase()
    {
        if ($this->Auth->user('role') == "admin") {
            if (!empty($this->params['form']['plan'])) {
                $costo = $this->User->Payment->read(null, $this->params['form']['plan'] + 1);
                $costo['Payment']['preguntas'] = $this->data['User']['p'];
                $costo['Payment']['cantidad'] = $this->data['User']['c'];
                $costo['Payment']['tiempo'] = $this->data['User']['m'];
                $costo['Payment']['costo'] = $this->data['User']['t'];
                //
                $this->User->Payment->save($costo);
                $this->Session->setFlash('Plan actualizado');
            }
            if (!empty($this->data['User']['amount'])) {
                $costo = $this->User->Payment->read(null, 1);
                $costo['Payment']['costo'] = $this->data['User']['amount'];
                $this->User->Payment->save($costo);
                $this->Session->setFlash('Costo unitario actualizado');
            }
            $this->User->Payment->recursive = 2;
            $pay = $this->User->Payment->read(null, 1);
            $this->set('costo', $pay['User']['Payment']);
            $this->set('co', $pay);
        } else {
            $this->Session->setFlash('No esta autorizado');
            $this->redirect('/');
        }
    }
}
?>