<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManagerCtrl extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		
		$this->load->model('Manager_model');
		$is_logged_in = $this->Manager_model->is_user_logged_in();
		
	if (!$is_logged_in) {
		redirect('Accounts/login');
	}
	$this->load->model('ScheduleModel');
	$this->load->model('UserModel');
	$this->load->model('PR_Model');
	}
	public function index()
	{
		$this->load->view('Manager/login');
		
	}
    public function dashboard()
	{
		
		$data['title'] = "Dashboard | iDrive Tutorial";
		
		date_default_timezone_set('Asia/Manila');
		$data['today_date'] = date('Y-m-d');
		$gen_notif['count'] =$this->PR_Model->count_notif();
		$data['get_due'] = $this->ScheduleModel->payment_schedule_list();
		$data['get'] = $this->ScheduleModel->getPayment();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/navbar',$gen_notif);
		$this->load->view('Manager/dashboard',$data);
		$this->load->view('templates/Graph_script');
        $this->load->view('templates/footer');
	

		
	}
	public function branch_dashboard(){

		date_default_timezone_set('Asia/Manila');
		$data['get'] = $this->ScheduleModel->getPayment();
		$data['today_date'] = date('Y-m-d');
		$notif['count'] =$this->PR_Model->count_notif();
		$data['get_due'] = $this->ScheduleModel->payment_schedule_list();
		$data['title'] = "Dashboard | iDrive Tutorial";
		$this->load->view('branch_temp/branch_header',$data);
        $this->load->view('branch_temp/navbar',$notif);
		$this->load->view('branch_temp/branch_dashboard',$data);
		$this->load->view('templates/Graph_script');
        $this->load->view('branch_temp/branch_footer');
	}

	public function branch_profile($id){
		$notif['count'] =$this->PR_Model->count_notif();
		$data['title'] = "profile | iDrive Tutorial";
		$this->update_profile($id);
		$data['branch'] = $this->UserModel->get_branch($id);
		$data['edituser'] = $this->UserModel->get_user($id);
		$this->load->view('branch_temp/branch_header',$data);
        $this->load->view('branch_temp/navbar',$notif);
		$this->load->view('branch_temp/branch_profile',$data);
        $this->load->view('branch_temp/branch_footer');
	}

	public function update_profile($id){
		if($this->input->post('updateProfile'))
		{

			$this->form_validation->set_rules('fname','First Name','trim|required');
			$this->form_validation->set_rules('mname','Middle Name','trim|required');
			$this->form_validation->set_rules('lname','Last Name','trim|required');
			$this->form_validation->set_rules('username','Username','trim|required');
			

			if($this->form_validation->run() != FALSE)
		{
		
				$response = $this->UserModel->update_profile();//true
				if ($response) 
				{
					$this->session->set_flashdata('create_user_success','The data was successfully updated!');
					
				}
				else
				{
					$this->session->set_flashdata('create_user_error','Opps Something Wrong!');//display message
					
				}
				redirect('ManagerCtrl/branch_profile/'.$id);
		}
		
		}
}


public function branch_change_profile($id){
	$notif['count'] =$this->PR_Model->count_notif();
	$data['edituser'] = $this->UserModel->get_user($id);
	$this->upload_profile($id);
	$data['title'] = "Change Profile Picture | iDrive Tutorial";
	$data['profile'] = $this->UserModel->get_user($id);
	$this->load->view('branch_temp/branch_header',$data);
    $this->load->view('branch_temp/navbar',$notif);
	$this->load->view('branch_temp/branch_change_profile',$data);
    $this->load->view('branch_temp/branch_footer');
	
}
	public function upload_profile($id){
		
		if ($this->input->post('upload')) {
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'jpg|png';
	
	
			$this->load->library('upload', $config);
	
			if ( ! $this->upload->do_upload('profile_picture'))
			{
					$this->session->set_flashdata('create_user_error', 'Opps Something Wrong!');

			}
			else
			{
				$this->session->set_flashdata('create_user_success','Profile Picture Successfully upload!');
				
					$file_name = $this->upload->data('file_name');
					
					$response  = $this->UserModel->update_profile_picture_post($file_name);
					if ($response) 
					{
						$this->session->set_flashdata('success','Profile picture was successfully inserted');//display message
						
					}
					else
					{
						$this->session->set_flashdata('error','Something Wrong');//display message
						
					}
				
	
			}
			redirect('UserCtrl/change_profile/'.$id);
		}
		
	
}

	public function gen_notif(){
		$title['title'] = "Notification Purchase Request | iDrive Tutorial";
		$gen_notif['count'] =$this->PR_Model->count_notif();
		$this->load->view('templates/header',$title);
		$this->load->view('templates/navbar',$notif);
		//$this->load->view('branch_temp/branch_notification',$data);
		$this->load->view('templates/footer');
	}



	public function branch_ledger()
	{
        $this->load->view('templates/header');
        $this->load->view('branch_temp/navbar');
		$this->load->view('branch_temp/branch_ledger');
        $this->load->view('templates/footer');
	}

	public function branch_Reports_supplier()
	{
        $this->load->view('templates/header');
        $this->load->view('branch_temp/navbar');
		$this->load->view('branch_temp/branch_reports_supplier');
        $this->load->view('templates/footer');
	}
	
	public function branch_Reports_PO()
	{
        $this->load->view('templates/header');
        $this->load->view('branch_temp/navbar');
		$this->load->view('branch_temp/branch_reports_PO');
        $this->load->view('templates/footer');
	}


}