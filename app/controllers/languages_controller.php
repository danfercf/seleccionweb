<?php
class LanguagesController extends AppController 
{
    var $name = 'Languages';
    var $layout = 'private';
    
    function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->deny('add', 'delete', 'home', 'index', 'profile', 'view'); // = array('controller'=>'pages', 'action'=>'home');
        $this->Auth->allow('reader','reader_lang','get');
        $this->set('tab','config');
    }
   
    function index()
    {
        $this->layout = 'private';
        $this->set('tab','config');
        $languages=$this->Language->find('all', array('conditions' => array('Language.user_id' => '1')));
        $this->set('languages',$languages);
       // $this->_p($languages);
        
    }
    function admin()
    {
        //$this->layout = 'ajax';
        $this->layout = 'private';
        $languages=$this->Language->find('all', array('conditions' => array('Language.user_id' => '1','Language.layout' => 'languages')));
        $this->set('languages',$languages);
        //$this->_p($languages);
    }

    function active($id = null,$status = null)
    {
        $this->layout = 'ajax';
        $this->data = $this->Language->read(null, $id);
        $this->data['Language']['active'] = $status;
        $this->Language->save($this->data);
    }
    function read($id = null,$tipo= null)
    {
        $this->layout = 'ajax';
        $texto=$this->Language->find('first', array('conditions' => array('Language.id' => $id )));
        
        $this->set('texto',$texto);
        $this->set('array_texto',$this->_split($texto["Language"]["text"]));
        
        $this->set('tipo',$tipo);
        
    }
    
    function traslator($layout = null,$key= null)
    {
        $this->layout = 'ajax';
        $languages=$this->Language->find('all', array('conditions' => array('Language.user_id' => '1','Language.layout' => 'languages')));
        $this->set('languages',$languages);
        $edit=$this->Language->find('first', array('conditions' => array('Language.layout' => $layout,'Language.key' => $key)));
        $this->set('edit',$edit);
    }
    function save($id = null,$tipo = null)
    {   
        $this->data=$this->Language->find('first', array('conditions' => array('Language.id' => $id)));
        $array=$this->_split($this->data["Language"]["text"]);
        $array[$tipo]=utf8_decode($this->params['form']['texto']);
        $this->data['Language']['text']=$this->_joiner($array);
        $this->Language->save($this->data);
    }
    function get($key= null)
    {
        $this->Cookie->write('lang', $key, false, '20 days');
    }
    function reader($tipo= null)
    {
        $this->layout = 'ajax';
        $retorno=Array();
        $texto=$this->Language->find('all', array('conditions' => array('Language.layout' => $tipo )));
        
        foreach($texto as $row){
            $retorno[$row['Language']['key']]=utf8_encode($this->_lang($row['Language']['text']));
        }
        
        return $retorno;
    }
    function reader_lang()
    {
        $this->layout = 'ajax';
        $retorno=Array();
        $retorno=$this->Language->find('all', array('conditions' => array('Language.user_id' => '1','Language.layout' => 'languages','Language.active' => '1')));
        return $retorno;
    }
    
    
    


}
?>