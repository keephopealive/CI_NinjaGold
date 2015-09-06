<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!($this->session->userdata("user")))
		{
			$this->session->set_userdata('user', array(
				'totalMessage' => "",
				'totalGold' => 0));
		}
	}

	public function index()
	{	
		$this->load->view('home', array(
			'totalGold' => $this->session->userdata("user")['totalGold'],
			'totalMessage' => $this->session->userdata("user")['totalMessage']
		));
	}

	public function clearAll()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

	// All forms go to this function
	public function process_money()
	{
		if($this->input->post('building'))
		{
			// Set gold on post via key/value dependency
			if( $this->input->post('building') == 'farm')
				$gold = rand(10,20);
			else if( $this->input->post('building') == 'cave')
				$gold = rand(5,10);
			else if( $this->input->post('building') == 'house')
				$gold = rand(2,5);
			else if( $this->input->post('building') == 'casino')
				$gold = rand(-50,50);

			// SET / ADD to Total Gold
			if($this->session->userdata('user')){
				$this->session->set_userdata('totalGold', ($this->session->userdata('totalGold') + $gold));
				if($this->session->userdata('totalGold') < 0)
					$this->session->set_userdata('totalGold', 0);
			}
			else
				$this->session->set_userdata('totalGold', $gold);

			// Create Message
			if(($this->input->post('building') == 'casino') && ($gold < 0 ))
				$message = "<p>Entered a casino and lost " . ($gold*-1) . " gold... Ouch...</p>";
			else if ( $gold == 0)
				$message = "<p>You broke even!</p>";
			else
				$message = "<p>Earned " . $gold . " gold from the " . $this->input->post('building') . "!</p>";

			// Concatinate & Store Message
			if($this->session->userdata('totalMessage'))
				$this->session->set_userdata('totalMessage', ($message . $this->session->userdata('totalMessage')));
			else
				$this->session->set_userdata('totalMessage', $message);
			
			// Session and Redirect
			$this->session->set_userdata('user', array(
				'totalMessage' => $this->session->userdata('totalMessage'),
				'totalGold' => $this->session->userdata('totalGold')));
		}
		redirect('/');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */