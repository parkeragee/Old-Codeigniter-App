<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class twilio_demo extends CI_Controller {

	function index() {
		/* Include the Twilio Helper client library. */
		require "./twilio/Services/Twilio.php";
		
		/* Set our AccountSid and AuthToken */
		$AccountSid = "#";
		$AuthToken = "#";
		
		/* Instantiate a new Twilio Rest Client */
		$client = new Services_Twilio($AccountSid, $AuthToken);
		
		require "./twilio/demo.php";
	}
}

/* End of file twilio_demo.php */