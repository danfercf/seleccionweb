<?php

class ApplicantsController extends AppController {

    var $name = 'Applicants';

    function beforeFilter() {
        $this->Auth->loginError = "No válido nombre de usuario o contraseña.";
        $this->Auth->authError = "No tiene permisos para acceder a esa ubicación.";
        $this->Auth->deny('delete', 'index', 'view');
         $this->Auth->allow('add','photo','_resizeFit','comprobe');
    }

    function index() {
        $this->layout = 'private';
        $this->Applicant->recursive = 2;

        if ($this->Auth->user('role') == 'admin') {
            $this->set('applicants', $this->paginate());
        } else {
            $users = $this->Applicant->Selecction->User->find('list', array('conditions' => array('User.client_id' => $this->Auth->user('client_id'))));
            
            $selecctions = $this->Applicant->Selecction->find('list', array('conditions' => array('Selecction.user_id' => array_keys($users))));
            $filtro = array('Applicant.selecction_id' => array_keys($selecctions));
            $applicants = $this->paginate($filtro);
            $this->set(compact('applicants', 'selecctions'));
        }

        $this->set('selecciones', $this->Applicant->Selecction->find('list'));
    }

    function view($id = null) {
        $this->layout = 'ajax';
        if (!$id) {
            $this->Session->setFlash(__('Invalid applicant', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('applicant', $this->Applicant->read(null, $id));
    }

    function add() {
        $this->data['Applicant']['name'] = $this->params['form']['nombre'] . " " . $this->params['form']['apellido'];
        $this->data['Applicant']['selecction_id'] = $this->params['form']['id_e'];
        $this->data['Applicant']['profesion'] = $this->params['form']['profesion'];
        $this->data['Applicant']['description'] = "";
        $this->data['Applicant']['email'] = $this->params['form']['email'];
        $this->data['Applicant']['phone'] = $this->params['form']['telefono'];
        $this->data['Applicant']['edad'] = $this->params['form']['edad'];
        $this->data['Applicant']['celular'] = $this->params['form']['celular'];
        $this->data['Applicant']['documento'] = $this->params['form']['documento'];
        $this->data['Applicant']['address'] = $this->params['form']['ciudad'] . " - " . $this->params['form']['provincia'];
        $this->data['Applicant']['pais'] = $this->params['form']['pais'];

        
        
        
        $this->layout = 'ajax';
        if (!empty($this->data)) {
            $registrado = $this->Applicant->find('count',
                            array(
                                'conditions' => array(
                                    'Applicant.selecction_id' => $this->data['Applicant']['selecction_id'],
                                    'Applicant.email' => $this->data['Applicant']['email']
                                )
                            )
            );
            //echo $registrado;
            if ($registrado > 0) {
                $this->set('estatus', -1);
            } else {
                $this->Applicant->create();
                $rating = array('Rating' => array('personality' => 0, 'knowledge' => 0, 'presentation' => 0));

                if ($this->Applicant->save($this->data)) {
                    $this->_log("Se registro un nuevo postulante a la video Seleccion Nro: " . $this->params['form']['id_e']);
                    $rating = array('Rating' => array('applicant_id' => $this->Applicant->id, 'personality' => 0, 'knowledge' => 0, 'presentation' => 0));
                    $this->Applicant->Rating->save($rating);
                    $this->set('id_applicant', $this->Applicant->id);
                    $this->_log("Se registor el postulante  " . $this->data['Applicant']['name']);
                    $this->set('estatus', 1);
                } else {
                    $this->set('estatus', 0);
                }
            }
        }
    }

    function activate($id = null, $status=0) {
        $this->layout = 'ajax';
        if ($id) {
            $this->Applicant->id = $id;
            $this->Applicant->saveField('status', $status);
            $this->_log("Se puso en activo al postulante Nro: " . $id);
            echo "Se puso en activo al postulante Nro: " . $id;
        }
    }
    
    function gen($id = null, $status = null) {
        $this->layout = 'ajax';
        if ($id) {
            $this->Applicant->id = $id;
            $this->Applicant->saveField('general', $status);
        }
    }
    
    function fn_megusta($id = null, $status="m") {
        $this->layout = 'ajax';
        if ($id) {
            $this->Applicant->id = $id;
            $this->Applicant->saveField('gender', $status);
        }
    }
    
    function vista($id = null, $status=null) {
        $this->layout = 'ajax';
        if ($id) {
            $this->Applicant->id = $id;
            $this->Applicant->saveField('ready', $status);
        }
    }
    
    function comprobe() {
        
        $this->layout = 'ajax';
        $email = $this->params['form']['email'];
        $ide = $this->params['form']['ide'];
        $apl = $this->Applicant->find('list', array('conditions' => array('Applicant.email' => $email,'Applicant.selecction_id' => $ide)));
        if(count($apl)>0){
        $this->set('estatus', 0);
        }
        else{
        $this->set('estatus', 1);
         
        }

    }
    
    function add_comm($id = null, $com=null) {
        $this->layout = 'ajax';
        if ($id) {
            $this->Applicant->id = $id;
            $this->Applicant->saveField('description', $com);
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash('Postulante invalido');
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Applicant->delete($id)) {
            $this->Session->setFlash('Postulate Eliminado');
            $this->_log("Se Elimino al postulante Nro:" . $id);
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('No se pudo eliminar al Postulante, intentelo nuevamente por favor');
        $this->redirect(array('action' => 'index'));
    }

    function photo() {
        $this->layout = 'ajax';
        $client_id = $this->params['form']['id_user'];
        //error_reporting(0);
        $w = (int) $this->params['form']['width'];
        $h = (int) $this->params['form']['height'];

        $dir = WWW_ROOT . "/img/";

        $img = imagecreatetruecolor($w, $h);
        imagefill($img, 0, 0, 0xFFFFFF);
        $rows = 0;
        $cols = 0;
        for ($rows = 0; $rows < $h; $rows++) {
            $c_row = explode(",", $this->params['form']['px' . $rows]);
            for ($cols = 0; $cols < $w; $cols++) {
                $value = $c_row[$cols];
                if ($value != "") {

                    $hex = $value;
                    while (strlen($hex) < 6) {
                        $hex = "0" . $hex;
                    }
                    $r = hexdec(substr($hex, 0, 2));
                    $g = hexdec(substr($hex, 2, 2));
                    $b = hexdec(substr($hex, 4, 2));
                    $test = imagecolorallocate($img, $r, $g, $b);
                    imagesetpixel($img, $cols, $rows, $test);
                }
            }
        }

        imagejpeg($img, $dir . "/applicants/" . $this->params['form']['nombre_img'] . ".jpg", 90);

        $im = imagecreatefromjpeg($dir . "/applicants/" . $this->params['form']['nombre_img'] . ".jpg");

        $resized = $this->_resizeFit($im, 74, 64);
        imagejpeg($resized, $dir . "/applicants/mini/" . $this->params['form']['nombre_img'] . ".jpg", 90);

        imagedestroy($img);
        imagedestroy($resized);
        $this->Applicant->id = $client_id;

        if ($this->Applicant->saveField('photo', $this->params['form']['nombre_img'] . ".jpg")) {
            echo "estatus=ok";
        } else {
            echo "estatus=no";
        }
    }

    function _resizeFit($im, $width, $height) {
        //Original sizes
        $ow = imagesx($im);
        $oh = imagesy($im);

        //To fit the image in the new box by cropping data from the image, i have to check the biggest prop. in height and width
        if ($width / $ow > $height / $oh) {
            $nw = $width;
            $nh = ($oh * $nw) / $ow;
            $px = 0;
            $py = ($height - $nh) / 2;
        } else {
            $nh = $height;
            $nw = ($ow * $nh) / $oh;
            $py = 0;
            $px = ($width - $nw) / 2;
        }

        //Create a new image width requested size
        $new = imagecreatetruecolor($width, $height);

        //Copy the image loosing the least space
        imagecopyresampled($new, $im, $px, $py, 0, 0, $nw, $nh, $ow, $oh);

        return $new;
    }

}

?>