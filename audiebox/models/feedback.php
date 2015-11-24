<?php
namespace Model;

use \Gas\Core;
use \Gas\ORM;

class Feedback extends ORM {
	// MODEL PROPERTIES
	public $table = 'feedback';
	//
	// INIT FUNCTION
	function _init() {
		// Relationship definition
		self::$relationships = array(
				'reply' => ORM::has_many('\\Model\\Reply'),
		);
		// FIELD DEFINITION
		self::$fields = array(
				'id' => ORM::field('auto[11]'),
				'feedback' => ORM::field('text'),
				'customer_number' => ORM::field('char[255]'),
				'location_id' => ORM::field('int[11]'),
				'created_at' => ORM::field('datetime'),
				'updated_at' => ORM::field('datetime')
		);
		//
		// SETUP DATETIME ASSOCIATION
		$this->ts_fields = array('updated_at','[created_at]');
	}
}
/* End of file user.php */
/* Location: ./application/models/user.php */	