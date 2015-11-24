<?php
namespace Model;

use \Gas\Core;
use \Gas\ORM;

class Reply extends ORM {
	// MODEL PROPERTIES
	public $table = 'replies';
	//
	// INIT FUNCTION
	function _init() {
		// Relationship definition
		self::$relationships = array(
				'feedback' => ORM::belongs_to('\\Model\\Feedback'),
		);
		// FIELD DEFINITION
		self::$fields = array(
				'id' => ORM::field('auto[11]'),
				'reply' => ORM::field('text'),
				'feedback_id' => ORM::field('int[11]'),
				'user_id' => ORM::field('int[11]'),
				'created_at' => ORM::field('datetime'),
				'updated_at' => ORM::field('datetime')
		);
		//
		// SETUP DATETIME ASSOCIATION
		$this->ts_fields = array('updated_at','[created_at]');
	}
}
/* End of file reply.php */
/* Location: ./application/models/reply.php */	