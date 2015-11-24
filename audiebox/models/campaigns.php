<?php
namespace Model;

use \Gas\Core;
use \Gas\ORM;

class Campaign extends ORM {
	// MODEL PROPERTIES
	public $table = 'campaigns';
	//
	// FIELD DEFINITION
		self::$fields = array(
				'id' => ORM::field('auto[11]'),
				'campaign' => ORM::field('varchar[35]'),
				'created_at' => ORM::field('datetime'),
				'updated_at' => ORM::field('datetime'),
		);
		//
		// SETUP DATETIME ASSOCIATION
		$this->ts_fields = array('updated_at','[created_at]');
	}
}
/* End of file user.php */
/* Location: ./application/models/user.php */	

// <?php
// namespace Model;
// 
// use \Gas\Core;
// use \Gas\ORM;
// 
// class User extends ORM {
// 	// MODEL PROPERTIES
// 	public $table = 'users';
// 	//
// 	// INIT FUNCTION
// 	function _init() {
// 		// FIELD DEFINITION
// 		self::$fields = array(
// 				'id' => ORM::field('auto[11]'),
// 				'first_name' => ORM::field('char[255]', array('required')),
// 				'last_name' => ORM::field('char[255]', array('required')),
// 				'username' => ORM::field('email', array('required','is_unique[users.username]')),
// 				'password' => ORM::field('string', array('required')),
// 				'role' => ORM::field('char[255]'),
// 				'status' => ORM::field('char[255]'),
// 				'created_at' => ORM::field('datetime'),
// 				'updated_at' => ORM::field('datetime')
// 		);
// 		//
// 		// SETUP DATETIME ASSOCIATION
// 		$this->ts_fields = array('updated_at','[created_at]');
// 	}
// }
// /* End of file user.php */
// /* Location: ./application/models/user.php */	