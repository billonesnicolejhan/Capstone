<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('UserModel');
		$this->load->model('Manager_model');
	}
	public function index()
	{
        $this->load->view('Manager/login');
	}
    public function login()
	{
		$this->_login_submit();
		$this->load->view('Manager/login');
	}

	public function _login_submit()
	{
		if ($this->input->post('submit')) 
		{
			$txtusername = $this->form_validation->set_rules('txtpassword','Password','trim|required');
			$txtusername = $this->form_validation->set_rules('txtusername','Username','trim|required');
		

		if ($txtusername) {
			$this->session->set_flashdata('error','Fill all the required field');	
		}

			if ($this->form_validation->run() != FALSE)
			
			{
				
				$response = $this->Manager_model->verify_login();

				if($response)
			{
						if (isset($_SESSION['Position']) && ($_SESSION['Position'] == 'manager')) {
							
							redirect('ManagerCtrl/branch_dashboard');
						}elseif(isset($_SESSION['Position']) && ($_SESSION['Position'] == 'gen_manager')){
							
							redirect('ManagerCtrl/dashboard');	
						}else{
							redirect('FinanceCtrl/finance_dashboard');


						}
				}
				else
				{
					$this->session->set_flashdata('error','Incorrect Username or Password');
					
					
				}
				redirect('Accounts/login');
			}
		}
	}

	public function logout(){
		$this->load->model('Manager_model');
		$this->Manager_model->logout();
		redirect('Accounts/login');
		


	}
	
}	
	