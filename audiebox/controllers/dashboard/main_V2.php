<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	public function __construct() {
		parent::__construct();
    }
    //
	// HOME
	public function index() {
		if (!$this->session->userdata('logged_in')) {
			redirect('dashboard/login', 'location');
		}
		$location = Model\Location::limit(1)->find_by_user_id($this->session->userdata('user_id'), FALSE);
		$data['feedback'] = Model\Feedback::order_by('created_at', 'DESC')->find_by_location_id($location->id);
		$this->load->view('includes/header');
		$this->load->view('dashboard/home', $data);
		$this->load->view('includes/footer');
	}
	//
	// LOCATIONS
	public function locations() {
		if (!$this->session->userdata('logged_in')) {
			redirect('dashboard/login', 'location');
		}	
		$data['location'] = Model\Location::limit(1)->find_by_user_id($this->session->userdata('user_id'), FALSE);
		$this->load->view('includes/header');
		$this->load->view('dashboard/locations', $data);
		$this->load->view('includes/footer');
	}
	//
	// LOCATIONS UPDATE PREFS
	public function locations_update_prefs() {
		if (!$this->session->userdata('logged_in')) {
			redirect('dashboard/login', 'location');
		}		
		$location = Model\Location::find($this->input->post('location_id', TRUE));
		$location->message_pref = $this->input->post('message_pref', TRUE);
		$location->auto_reply = $this->input->post('auto_reply', TRUE);
		$location->save();
		redirect('dashboard/main/locations', 'location');
	}
	//
	// LOCATION INFO UPDATE PREFS
	public function locations_info_prefs() {
		if (!$this->session->userdata('logged_in')) {
			redirect('dashboard/login', 'location');
		}		
		$location = Model\Location::find($this->input->post('location_id', TRUE));
		$location->location_name = $this->input->post('location_name', TRUE);
		$location->address = $this->input->post('address', TRUE);
		$location->city = $this->input->post('city', TRUE);
		$location->state = $this->input->post('state', TRUE);
		$location->zip = $this->input->post('zip', TRUE);
		$location->save();
		redirect('dashboard/main/locations', 'location');
	}
	//
	// LOCATION PHONE UPDATE PREFS
	public function locations_phone_prefs() {
		if (!$this->session->userdata('logged_in')) {
			redirect('dashboard/login', 'location');
		}		
		$location = Model\Location::find($this->input->post('location_id', TRUE));
		$location->location_phone = $this->input->post('location_phone', TRUE);
		$location->save();
		redirect('dashboard/main/locations', 'location');
	}
	//
	// REPLY TO A MESSAGE
	public function reply() {
		if (!$this->session->userdata('logged_in')) {
			redirect('dashboard/login', 'location');
		}		
		$data['feedback_id'] = $this->uri->segment(4);	
		$data['feedback'] = Model\Feedback::find($data['feedback_id']);
		$data['error'] = "";
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$data['reply'] = $this->input->post('reply', TRUE);
			if ($data['reply'] == '') {
				$data['error'] = 'Empty words don\'t hold water.';	
			} else {
				$reply = new Model\Reply();
				$reply->reply = $data['reply'];
				$reply->feedback_id = $data['feedback_id'];
				$reply->user_id = $this->session->userdata('user_id');
				if ($reply->save(TRUE)) {
					// GRAB INCOMING VARS
					$customer_number = $data['feedback']->customer_number;
					/* GET LOCATION NUMER */
					$location = Model\Location::find($data['feedback']->location_id);
					/* SETUP TWILIO CONNECTION */
					require "./twilio/Services/Twilio.php";
					$AccountSid = "#";
					$AuthToken = "#";
					$client = new Services_Twilio($AccountSid, $AuthToken); 
					if (isset($location)) {
						// RESPONSE TO CUSTOMER
						$from = $location->twilio_number;
						$to = $customer_number;
						// BUILD BODY
						$body = $data['reply'];
						// SEND MESSAGE
						$client->account->sms_messages->create($from, $to, $body);
					}
					$data['error'] = "Success!!!";
				}
				//$data['reply']
				// ADD IN SEND MESSAGE STUFF			
			}
		}
		$this->load->view('includes/header_widget');
		$this->load->view('dashboard/reply_form', $data);
		$this->load->view('includes/footer_widget');
	}
	//
	// LOGIN
	 public function login() {
		// RESET LOGIN STATUS
		$this->session->set_userdata('logged_in', FALSE);
		// SET MESSAGE
		if ($this->session->flashdata('message_type')) {
			$data['message_type'] = $this->session->flashdata('message_type');
			$data['message'] = $this->session->flashdata('message');			
		} else {
			$data['message_type'] = "";
			$data['message'] = "";			
		}
		// PROCESS IF POSTING FORM
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			// PROCESS IF BOTH USERNAME AND PASSWORD ARE PASSED IN
			if ($this->input->post('username', TRUE) AND $this->input->post('password', TRUE)) {
				// PREP DATA
				$username = $this->input->post('username', TRUE);
				$password = $this->encrypt->sha1($this->input->post('password', TRUE));
				// AUTHENTICATE
				$user = Model\User::limit(1);
				$user = Model\User::find_by_username($username, FALSE);
				$user = Model\User::find_by_password($password, FALSE);
				// IF USER FOUND > PROCESS
				if ($user == NULL) {
					$data['message_type'] = "error";
					$data['message'] = "User not found.";
					$this->load->view('includes/header');
					$this->load->view('dashboard/login_form', $data);
					$this->load->view('includes/footer');
				} else {
					// SET UP SESSION
					$this->session->set_userdata('logged_in', TRUE);
					// GET USER INFO
					$this->session->set_userdata('full_name', $user->first_name . " " . $user->last_name);
					$this->session->set_userdata('first_name', $user->first_name);
					$this->session->set_userdata('role', $user->role);
					$this->session->set_userdata('user_id', $user->id);
					redirect('/dashboard/', 'location');					
				}			
			} else {
				$data['message_type'] = "error";
				$data['message'] = "Complete all fields.";
				$this->load->view('includes/header');
				$this->load->view('dashboard/login_form', $data);
				$this->load->view('includes/footer');
			}							
		} else {
			// LOAD PAGE
			$this->load->view('includes/header');
			$this->load->view('dashboard/login_form', $data);
			$this->load->view('includes/footer');
		}
	}
	//
	// ACCESS DENIED
	public function no_access() {
		echo 'ACCESS DENIED';
	}	
}

/* End of file main.php */
/* Location: ./application/controllers/dashboard/main.php */