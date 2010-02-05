<?php 
/* SVN FILE: $Id$ */
/* FlowRate schema generated on: 2010-02-05 13:02:33 : 1265343453*/
class FlowRateSchema extends CakeSchema {
	var $name = 'FlowRate';

	function before($event = array()) {
		return true;
	}

	function after($event = array()) {
	}

	var $boards = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 64),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 64),
		'server' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 128),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $threads = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 128),
		'url' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 128),
		'rate' => array('type' => 'float', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'board_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'id' => array('column' => 'id', 'unique' => 1), 'rate' => array('column' => 'rate', 'unique' => 0), 'created' => array('column' => 'created', 'unique' => 0), 'modified' => array('column' => 'modified', 'unique' => 0))
	);
}
?>