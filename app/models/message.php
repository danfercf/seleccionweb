<?php
class Message extends AppModel {
	var $name = 'Message';
	var $displayField = 'message';
	var $validate = array(
		'selecction_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Selecction' => array(
			'className' => 'Selecction',
			'foreignKey' => 'selecction_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>