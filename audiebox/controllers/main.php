<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	//
	// HOME
	public function index() {
		// LOAD PAGE
		$this->load->view('includes/header');
		$this->load->view('main_home');
		$this->load->view('includes/footer');
	}
	//
	// CONTACT US
	public function contact_us() {
		// LOAD PAGE
		$this->load->view('includes/header');
		$this->load->view('contact_us');
		$this->load->view('includes/footer');
	}	
		
	//
// USER REGISTRATION
	public function sign_up() {
		$location = new Model\Location();
		$user = new Model\User();
		$data['formdata']->username = '';
		$data['formdata']->first_name = '';
		$data['formdata']->last_name = '';
		$data['formdata']->location_name = '';
		$data['formdata']->denomination = '';
		$data['formdata']->address = '';
		$data['formdata']->city = '';
		$data['formdata']->state = '';
		$data['formdata']->zip = '';
		$data['formdata']->location_phone = '';
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$data['formdata']->username = $this->input->post('username', TRUE);
			$data['formdata']->first_name = $this->input->post('first_name', TRUE);
			$data['formdata']->last_name = $this->input->post('last_name', TRUE);
			$data['formdata']->location_phone = $this->input->post('name', TRUE);
			$data['formdata']->address = $this->input->post('address', TRUE);
			$data['formdata']->city = $this->input->post('city', TRUE);
			$data['formdata']->state = $this->input->post('state', TRUE);
			$data['formdata']->zip = $this->input->post('zip', TRUE);
			$data['formdata']->location_phone = $this->input->post('location_phone', TRUE);
			// GENERATE NUMBER
			require "./twilio/Services/Twilio.php";
			$AccountSid = "#";
			$AuthToken = "#";
			$client = new Services_Twilio($AccountSid, $AuthToken);
			$SearchParams = array();
			$SearchParams['AreaCode'] = $this->input->post('area_code', TRUE);
			$numbers = $client->account->available_phone_numbers->getList('US', 'Local', $SearchParams);
			if(empty($numbers->available_phone_numbers)) {
				$err = "We didn't find any phone numbers by that search";
				echo $err;
			} else {
				$my_number = $numbers->available_phone_numbers[0]->phone_number;
				$number = $client->account->incoming_phone_numbers->create(array(
					'PhoneNumber' => $my_number
				));
				// GET LOCATION DATA
				$location->location_name = $this->input->post('location_name', TRUE);
				$location->denomination = $this->input->post('denomination', TRUE);
				$location->address = $this->input->post('address', TRUE);
				$location->city = $this->input->post('city', TRUE);
				$location->state = $this->input->post('state', TRUE);
				$location->zip = $this->input->post('zip', TRUE);
				$location->location_phone = $this->input->post('location_phone', TRUE);
				$location->type = 'Primary';
				// SAVE LOCATION
				if ($location->save(TRUE)) {
					$location_id = Model\Location::last_created()->id;
					// GET USER DATA
					$user->username = $this->input->post('username', TRUE);
					$user->password = $this->encrypt->sha1($this->input->post('password'));
					$user->first_name = $this->input->post('first_name', TRUE);
					$user->last_name = $this->input->post('last_name', TRUE);
					$user->role = 'Primary Admin';
					$user->status = 'Active';
					// SAVE USER
					if ($user->save(TRUE)) {
						$user_id = Model\User::last_created()->id;
						$location = Model\Location::find($location_id);
						$location->twilio_number = $my_number;
						$location->user_id = $user_id;
						$location->save();
						// GO ON
						$this->session->set_flashdata('tmp_id',$user_id);
						redirect('main/success/', 'location');
					}
				}
			}
		}
// LOAD STATE HELPER
// 		$this->load->helper('state');
	// USER REGISTRATION
	// public function sign_up() {
	// 	$data['formdata']->username = '';
	// 	$data['formdata']->first_name = '';
	// 	$data['formdata']->last_name = '';
	// 	// LOAD PAGE
	// 	$this->load->view('includes/header');
	// 	$this->load->view('signup_form', $data);
	// 	$this->load->view('includes/footer');
	// }
	//
	// SUCCESS
	public function success() {
		$tmp_id = $this->session->flashdata('tmp_id');
		$user = Model\User::find($tmp_id);
		echo 'Congratulations ' . $user->first_name . "! You're all signed up.";
	}
	public function get_location() {
		$my_number = '+19015551234';
		//$location = Model\Location::find(5);
		$location = Model\Location::find_by_twilio_number($my_number);
		//$active_users = Model\User::find_by_active('1');
		//$location = Model\location::all();
		//echo $location->location_phone;
		foreach ($location as $location) {
	        echo $location->location_phone;
		}
		
	}
	public function test_feedback() {
		$feedback = new Model\Feedback();
		$feedback->feedback = 'Test';
		$feedback->customer_number = '+19015551234';
		$feedback->location_id = 5;
		$feedback->save(TRUE);
	}
	//
	// SEND MESSAGE
	public function receive_message() {
		// GRAB INCOMING VARS
		$customer_body = $this->input->post('Body', TRUE);
		$customer_number = $this->input->post('From', TRUE);
		$client_number = $this->input->post('To', TRUE);
		if (!$customer_body == '' AND !$customer_number == '' AND !$client_number == '') {
			/* SETUP TWILIO CONNECTION */
			require "./twilio/Services/Twilio.php";
			$AccountSid = "#";
			$AuthToken = "#";
			$client = new Services_Twilio($AccountSid, $AuthToken); 
			/* GET LOCATION NUMER */
			$location = Model\Location::find_by_twilio_number($client_number);
			if (isset($location)) {
				foreach ($location as $location) {
					/* ACCOUNT TWILIO NUMBER */
					$from = $location->twilio_number;
					/* ACCOUNT PHONE NUMBER */	        
					$to = $location->location_phone;
					// MESSAGE PREF
					$message_pref = $location->message_pref;
					// USER ID
					$user_id = $location->user_id;
				}
				// GET EMAIL ADDRESS
				$user = Model\User::limit(1)->find($user_id, FALSE);			
				// BUILD BODY
				$body = $customer_body;
				if ($message_pref == 1) {
					// SEND MESSAGE VIA EMAIL
					$this->load->library('email');					
					$this->email->from('email@domain.com', 'Audiebox Mailman');
					$this->email->to($user->username); 
					$this->email->subject('Audiebox Message');
					$this->email->message($body);	
					$this->email->send();
					// SEND MESSAGE VIA TEXT
					$client->account->sms_messages->create($from, $to, $body);					
				} else if ($message_pref == 2) {
					// SEND MESSAGE VIA TEXT
					$client->account->sms_messages->create($from, $to, $body);				
				} else if ($message_pref == 3) {
					// SEND MESSAGE VIA EMAIL
					$this->load->library('email');					
					$this->email->from('email@domain.com', 'Audiebox Mailman');
					$this->email->to($user->username); 
					$this->email->subject('Audiebox Message');
					$this->email->message($body);	
					$this->email->send();				
				} else {
					// NO ACTION			
				}
				// RESPONSE TO CUSTOMER
				$from = $location->twilio_number;
				$to = $customer_number;
				// BUILD BODY
				$body = $location->auto_reply;
				// SEND MESSAGE
				$client->account->sms_messages->create($from, $to, $body);
				// SAVE THE MESSSAGE
				$feedback = new Model\Feedback();
				$feedback->feedback = $customer_body;
				$feedback->customer_number = $customer_number;
				$feedback->location_id = $location->id;
				$feedback->save(TRUE);
			}
		}
	}
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */