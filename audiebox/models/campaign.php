<?php
namespace Model;

use \Gas\Core;
use \Gas\ORM;

class Campaign extends ORM {
	// MODEL PROPERTIES
	public $table = 'campaign';
	//
	// INIT FUNCTION
	function _init() {
		// FIELD DEFINITION
		self::$fields = array(
				'id' => ORM::field('auto[11]'),
				'campaign' => ORM::field('varchar[35]'),
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