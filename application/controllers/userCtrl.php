<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserCtrl extends CI_Controller {
    

    public function __construct(){

        parent:: __construct();
        $this->load->model('Manager_model');
		$is_logged_in = $this->Manager_model->is_user_logged_in();
		
	if (!$is_logged_in) {
		redirect('Accounts/login');
	}
        $this->load->model('UserModel');
		$this->load->model('PR_Model');
		
    }

	public function index()
	{
		$gen_notif['count'] =$this->PR_Model->count_notif();
		$data['title'] = "User | iDrive Tutorial";
		$this->load->view('templates/header',$data);
        $this->load->view('templates/navbar',$gen_notif);
        $this->load->view('User_Module/user');
        $this->load->view('templates/footer');
		$this->load->view('templates/script');
	
	}


	public function create_user(){
		$gen_notif['count'] =$this->PR_Model->count_notif();
		$data['title'] = "Create User | iDrive Tutorial";
		$this->create();
		$this->load->view('templates/header',$data);
        $this->load->view('templates/navbar',$gen_notif);
		$data1['branch'] = $this->UserModel->getbranch_list();
		$this->load->view('User_Module/adduser',$data1);
        $this->load->view('templates/footer');
		$this->load->view('templates/script');
	}

	public function create() {
	
		if ($this->input->post('AddUser')) {

			
			$this->form_validation->set_rules('fname', 'First Name', 'required|callback_alpha_character');
			$this->form_validation->set_rules('mname', 'Middle Name', 'required|callback_alpha_character');
			$this->form_validation->set_rules('lname', 'Last Name','required|callback_alpha_character');

			$this->form_validation->set_rules('branch','Branch','required');
			$this->form_validation->set_rules('position','Position','required');
			$this->form_validation->set_rules('username','Username','trim|required|min_length[5]|max_length[15]|is_unique[tbl_user.username]');
			$this->form_validation->set_rules('password','Password','trim|required');
			$this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]');

			if($this->form_validation->run() != FALSE){

			$response = $this->UserModel->add_user();
			
			if ($response) {

				$this->session->set_flashdata('create_user_success', 'Successfully Created!');
				//redirect('UserCtrl/create_user');
			}else{
				$this->session->set_flashdata('create_user_error', 'Create Failed!');

			}
		
			redirect('UserCtrl/create_user');
			}

		}
			
	}
	public function alpha_character($str){
		if (!preg_match("/^([a-zA-Z ])+$/i",$str)) {
			$this->form_validation->set_message('alpha_character','The %s can only contains alphabet/s');
			return false;
		}else{
			return true;
		}
	}
	
	public function update_user($id){
		$gen_notif['count'] =$this->PR_Model->count_notif();
		$data['title'] = "Update User | iDrive Tutorial";
		$data['superr'] = $this->UserModel->getbranch_list();
		$this->edit_user_submit($id);
		$this->load->view('templates/header',$data);
        $this->load->view('templates/navbar',$gen_notif);
		$data['edituser'] = $this->UserModel->get_user($id);
		$this->load->view('User_Module/update_user',$data);
        $this->load->view('templates/footer');
		$this->load->view('templates/script');
	
	}

	public function edit_user_submit($id)
	{
	
		if($this->input->post('updateUser'))
		{

			$this->form_validation->set_rules('fname', 'First Name', 'required|callback_alpha_character');
			$this->form_validation->set_rules('mname', 'Middle Name', 'required|callback_alpha_character');
			$this->form_validation->set_rules('lname', 'Last Name','required|callback_alpha_character');
			$this->form_validation->set_rules('branch_id','Branch','required');
			$this->form_validation->set_rules('position','Position','required');
			$this->form_validation->set_rules('username','Username','trim|required|min_length[5]|max_length[15]');
			$this->form_validation->set_rules('password','Password','trim|required|min_length[5]|max_length[15]');
			
		

			//$this->form_validation->set_rules('role','role','trim|required');

			if($this->form_validation->run() != FALSE)
		{
		
				$response = $this->UserModel->update_user();//true
				if ($response) 
				{
					$this->session->set_flashdata('create_user_success','Successfully Updated!');
					
				}
				else
				{
					$this->session->set_flashdata('create_user_error','Update Failed!');//display message
					
				}
				redirect('UserCtrl/update_user/'.$id);
		}
		
		}
	
    }


	public function profile($id){
		$gen_notif['count'] =$this->PR_Model->count_notif();
		$data['title'] = "profile | iDrive Tutorial";
		$this->update_profile($id);
		$data['branch'] = $this->UserModel->get_branch($id);
		$this->load->view('templates/header',$data);
		$data['edituser'] = $this->UserModel->get_user($id);
        $this->load->view('templates/navbar',$gen_notif);
		
		$this->load->view('User_Module/profile',$data);
        $this->load->view('templates/footer');
		$this->load->view('templates/script');
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
					$this->session->set_flashdata('create_user_success','Successfully Updated!');
					
				}
				else
				{
					$this->session->set_flashdata('create_user_error','Updated Failed!');//display message
					
				}
				redirect('UserCtrl/profile/'.$id);
		}
		
		}
}

public function Change_Profile($id){
	$gen_notif['count'] =$this->PR_Model->count_notif();
	$data['edituser'] = $this->UserModel->get_user($id);
	$this->upload_profile($id);
	$data['title'] = "Change Profile Picture | iDrive Tutorial";
	$data['profile'] = $this->UserModel->get_user($id);
	$this->load->view('templates/header',$data);
	$this->load->view('templates/navbar',$gen_notif);
	$this->load->view('User_Module/change_profile',$data);
	$this->load->view('templates/footer');
	$this->load->view('templates/script');
	
}
	public function upload_profile($id){
		
		if ($this->input->post('upload')) {
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'jpg|png';
	
	
			$this->load->library('upload', $config);
	
			if ( ! $this->upload->do_upload('profile_picture'))
			{
					$this->session->set_flashdata('create_user_error', 'Create Failed!');

			}
			else
			{
				$this->session->set_flashdata('create_user_success','Profile Picture Successfully upload!');
				
					$file_name = $this->upload->data('file_name');
					
					$response  = $this->UserModel->update_profile_picture_post($file_name);
					if ($response) 
					{
						$this->session->set_flashdata('success','Successfully Created!');//display message
						
					}
					else
					{
						$this->session->set_flashdata('error','Unsuccessfully Created!');//display message
						
					}
				
	
			}
			redirect('UserCtrl/change_profile/'.$id);
		}
		
	
}


	public function view_user($id){
		$gen_notif['count'] =$this->PR_Model->count_notif();
		$data['title'] = "User | iDrive Tutorial";
		$this->load->view('templates/header',$data);
        $this->load->view('templates/navbar',$gen_notif);
		$data['view_user'] = $this->UserModel->get_user($id);
		$this->load->view('User_Module/view_user',$data);
        $this->load->view('templates/footer');
	
}

public function search(){
	$query ='';

	if ($this->input->post('query')) {
		$query = $this->input->post('query');
	}

	$data = $this->UserModel->search_user($query);

	if ($data->num_rows() > 0)
	 {
		?>
<div class="row mt-4">
    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
        <div class="card flex-fill" id="card">
            <table class="table table-hover my-0" id="table">
                <thead>
                    <tr>

                        <th class="txt" id="tbl_th">Name</th>
                        <th class="d-none d-md-table-cell txt" id="tbl_th">Username</th>
                        <th class="d-none d-xl-table-cell txt" id="tbl_th">Position</th>
                        <th class="d-none d-xl-table-cell txt" id="tbl_th">Branch</th>
                        <th class="txt" id="tbl_th">Status</th>
                        <th class="d-none d-md-table-cell text-center txt" id="tbl_th">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 

		foreach ($data->result() as $row) {
			$user_id = $row->User_ID;
			$name = ucfirst($row->First_Name).' '. $row->Middle_Name. ' '. ucfirst($row->Last_Name);
			
			$username = $row->Username;
			$position = $row->Position;
			$branch_name = $row->branch_name;
			$status=$row->Status;
                ?>

                    <tr>

                        <td class="text-center"><?= $name ?></td>
                        <td class="text-center"><?= $username ?></td>
                        <td class="text-center"><?= $position?></td>
                        <td class="text-center"><?= $branch_name ?></td>

                        <?php if($user_id == $_SESSION['User_ID']) {?>
                        <td class=" text-center"><span class="badge bg-success status">Current</span>
                        </td>
                        <?php
					}elseif($status == 'active'){
							?>
                        <td class=" text-center"><span class="badge badge-success"><a
                                    href="<?=site_url('UserCtrl/status/'.$user_id);?>"
                                    onclick="return confirm('Are you sure you want to Deactivate?')"
                                    style="text-decoration:none; font-size:13px; color:black"><?php echo ucfirst($status); ?></a></span>
                        </td>
                        <?php
					}else{

							?>
                        <td class=" text-center"><span class="badge badge-danger"><a
                                    href="<?=site_url('UserCtrl/status_active/'.$user_id);?>"
                                    onclick="return confirm('Are you sure you want to Activate?')"
                                    style="text-decoration:none; font-size:13px; color:black"><?php echo ucfirst($status); ?></a></span>
                        </td>
                        <?php

								}
									?>

                        <?php if($user_id == $_SESSION['User_ID']){?>

                        <td class="d-none d-md-table-cell action text-center">
                            <a href="<?= site_url('userCtrl/view_user/'.$user_id);?>"><i
                                    class="fa-solid fa-eye view_btn text-center"></i></a>
                        </td>
                        <?php }else{

							?>
                        <td class="d-none d-md-table-cell action text-center">
                            <a href="<?= site_url('userCtrl/view_user/'.$user_id);?>"><i
                                    class="fa-solid fa-eye view_btn text-center"></i></a>

                            <a href="<?php echo site_url('UserCtrl/update_user/'.$user_id); ?>"><i
                                    class="fa-regular fa-pen-to-square text-center"></i></a>

                        </td>

                        <?php
						}
						
						
						?>
                    </tr>

                    <?php
	}
	?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php

}
else
{
?>
<div>

    <h2 class="text-center text-danger mt-4"><i class="fa-solid fa-circle-exclamation fa-2xl"></i><br><br>No Data Found
    </h2>

</div>
<?php

}

}

public function status($id){

	$response = $this->UserModel->getStatus($id);
	if ($response) 
		{
			$this->session->set_flashdata('create_user_success','Successfully Deactivated!');//display message
						
		}
		else
		{
		$this->session->set_flashdata('create_user_error',' Deactivate Failed!');//display message
						
		}

	redirect('UserCtrl/');
}
public function status_active($id){

	$response = $this->UserModel->getStatus_active($id);
	if ($response) 
		{
			$this->session->set_flashdata('create_user_success','Successfully Activated!');//display message
						
		}
		else
		{
		$this->session->set_flashdata('create_user_error',' Deactivate Failed!');//display message
						
		}

	redirect('UserCtrl/');
}

}