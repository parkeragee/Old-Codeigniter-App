<?php
namespace Model;

use \Gas\Core;
use \Gas\ORM;

class Location extends ORM {
	// MODEL PROPERTIES
	public $table = 'locations';
	//
	// INIT FUNCTION
	function _init() {
		// FIELD DEFINITION
		self::$fields = array(
				'id' => ORM::field('auto[11]'),
				'location_name' => ORM::field('char[255]', array('required')),
				'denomination' => ORM::field('char[255]', array('required')),
				'address' => ORM::field('char[255]', array('required')),
				'city' => ORM::field('char[255]', array('required')),
				'state' => ORM::field('char[255]', array('required')),
				'zip' => ORM::field('char[255]', array('required','min_length[5]','max_length[5]','numeric')),
				'user_id' => ORM::field('int[11]'),
				'location_phone' => ORM::field('char[255]', array('required')),
				'twilio_number' => ORM::field('char[255]', array('required')),
				'created_at' => ORM::field('datetime'),
				'updated_at' => ORM::field('datetime')
		);
		//
		// SETUP DATETIME ASSOCIATION
		$this->ts_fields = array('updated_at','[created_at]');
	}
}
/* End of file location.php */
/* Location: ./application/models/location.php */	