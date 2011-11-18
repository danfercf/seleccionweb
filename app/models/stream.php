<?php
class Stream extends AppModel {
	var $name = 'Stream';
	var $displayField = 'type';

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