<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BranchCtrl extends CI_Controller {

    public function __construct(){
        parent:: __construct();
        $this->load->model('Manager_model');
		$is_logged_in = $this->Manager_model->is_user_logged_in();
		
	if (!$is_logged_in) {
		redirect('Accounts/login');
	}
        $this->load->model('BranchModel');
		$this->load->model('PR_Model');
    }

	public function index()
	{
		$gen_notif['count'] = $this->PR_Model->count_notif();
		$data['title'] = "Branch | iDrive Tutorial";
        $this->load->view('templates/header',$data);
        $this->load->view('templates/navbar',$gen_notif);
        $data['branch'] = $this->BranchModel->get_all_branch();
		$this->load->view('Branch_Module/branch',$data);
        $this->load->view('templates/footer');
		$this->load->view('templates/script');
		
        
	}
	public function alpha_character($str){
		if (!preg_match("/^([a-zA-Z ])+$/i",$str)) {
			$this->form_validation->set_message('alpha_character','The %s can only contains alphabet/s');
			return false;
		}else{
			return true;
		}
	}
	public function alpha_num($str){
		if (!preg_match("/^([0-9])+$/i",$str)) {
			$this->form_validation->set_message('alpha_num','The %s can only contains number/s');
			return false;
		}else{
			return true;
		}
	}

	public function create_branch(){
		$gen_notif['count'] =$this->PR_Model->count_notif();
		$data['title'] = "Create Branch | iDrive Tutorial";
		$this->_add_branch();
		$this->load->view('templates/header',$data);
        $this->load->view('templates/navbar',$gen_notif);
		$data['branch'] = $this->BranchModel->get_all_branch();
		$this->load->view('Branch_Module/create_branch',$data);
        $this->load->view('templates/footer');
		$this->load->view('templates/script');

	}

	public function _add_branch() {

		if($this->input->post('btn_branch'))
		{
			
			$this->form_validation->set_rules('txtbranch','Branch Name','trim|required|callback_alpha_character');
			$this->form_validation->set_rules('txtcontact','Contact Number','required|callback_alpha_num|min_length[11]|max_length[11]');
			$this->form_validation->set_rules('txtstreet','Street','trim|required');
			$this->form_validation->set_rules('txtbarangay','Barangay','trim|required');
			$this->form_validation->set_rules('txtcity','City','trim|required|callback_alpha_character');
			$this->form_validation->set_rules('txtprovince','Province','trim|required|callback_alpha_character');
			
			if($this->form_validation->run() != FALSE){

				$response = $this->BranchModel->add_branch();//true
				if ($response) 
				{
					$this->session->set_flashdata('create_user_success','Successfully Created!');//display message
				}
				else
				{
					$this->session->set_flashdata('create_user_error','Create Failed!');//display message
					
				}
				 redirect('BranchCtrl/create_branch');


			}
		}
	
	}


	public function update_branch($id){
		$gen_notif['count'] =$this->PR_Model->count_notif();
		$this->edit_user_submit($id);
		$this->load->view('templates/header');
        $this->load->view('templates/navbar',$gen_notif);
		$data['branch'] = $this->BranchModel->get_branch($id);
		$this->load->view('Branch_Module/update_branch',$data);
        $this->load->view('templates/footer');
		$this->load->view('templates/script');

	}

	
	public function edit_user_submit($id)
	{
		if($this->input->post('updateBranch'))
		{
			
			$this->form_validation->set_rules('txtBranch','Branch Name','trim|required|callback_alpha_character');
			$this->form_validation->set_rules('txtContact','Contact Number','required|callback_alpha_num|min_length[11]|max_length[11]');
			$this->form_validation->set_rules('txtStreet','Street','trim|required');
			$this->form_validation->set_rules('txtBarangay','Barangay','trim|required');
			$this->form_validation->set_rules('txtCity','City','trim|required|callback_alpha_character');
			$this->form_validation->set_rules('txtProvince','Province','trim|required|callback_alpha_character');
			
			if($this->form_validation->run() != FALSE){

				$response = $this->BranchModel->update_branch();//true
				if ($response) 
				{
					$this->session->set_flashdata('create_user_success','Successfully Updated!');//display message
				}
				else
				{
					$this->session->set_flashdata('create_user_error','Update Failed!');//display message
					
				}
				 redirect('BranchCtrl/update_branch/'.$id);


			}
		}
	

    }
	public function view_branch($id){
		$gen_notif['count'] =$this->PR_Model->count_notif();
		$this->load->view('templates/header');
        $this->load->view('templates/navbar',$gen_notif);
		$data['view_branch'] = $this->BranchModel->get_branch($id);
		$this->load->view('Branch_Module/view_branch',$data);
        $this->load->view('templates/footer');
	
}

public function search(){
	$query ='';

	if ($this->input->post('branch')) {
		$query = $this->input->post('branch');
	}

	$data = $this->BranchModel->branch_search($query);

	if ($data->num_rows() > 0)
	 {
		?>
<div class="row mt-4">
    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
        <div class="card flex-fill" id="card">
            <table class="table table-hover my-0" id="table">
                <thead>
                    <tr>
                        <th class="txt" id="tbl_th">Branch Name</th>
                        <th class="d-none d-md-table-cell txt" id="tbl_th">Contact</th>
                        <th class="d-none d-xl-table-cell txt" id="tbl_th">Address</th>
                        <th class="txt" id="tbl_th">Status</th>
                        <th class="d-none d-md-table-cell text-center txt" id="tbl_th">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

							foreach ($data->result() as $row) {
								$branch_id = $row->branch_id;
								$branch_name = $row->branch_name;
								$contact = $row->contact;
								$status=$row->status;
							?>
                    <tr>

                        <td class="text-center"><?= $branch_name ?></td>
                        <td class="text-center"><?= $contact?></td>
                        <td class="text-center"><span><?= ucfirst($row->street)?></span>
                            <span><?= ucfirst($row->barangay); ?></span><span>
                                <?= ucfirst($row->city); ?><br></span><span>
                                <?= ucfirst($row->province); ?><br></span>
                        </td>

                        <?php if($branch_id == $_SESSION['branch_id']) {?>
                        <td class=" text-center"><span class="badge bg-success status">Current</span>
                        </td>
                        <?php
					}elseif($status == 'active'){
							?>
                        <td class=" text-center"><span class="badge badge-success"><a
                                    href="<?=site_url('BranchCtrl/status/'.$branch_id);?>"
                                    onclick="return confirm('Are you sure you want to Deactivate?')"
                                    style="text-decoration:none; font-size:13px; color:black"><?php echo ucfirst($status); ?></a></span>
                        </td>
                        <?php
					}else{

							?>
                        <td class=" text-center"><span class="badge badge-danger"><a
                                    href="<?=site_url('BranchCtrl/status_active/'.$branch_id);?>"
                                    onclick="return confirm('Are you sure you want to Activate?')"
                                    style="text-decoration:none; font-size:13px; color:black"><?php echo ucfirst($status); ?></a></span>
                        </td>
                        <?php

								}
									?>
                        <td class="d-none d-md-table-cell action text-center">
                            <a href="<?= site_url('BranchCtrl/view_branch/'.$branch_id);?>"><i
                                    class="fa-solid fa-eye view_btn text-center"></i></a>

                            <a href="<?= site_url('BranchCtrl/update_branch/'.$branch_id);?>"><i
                                    class="fa-regular fa-pen-to-square text-center"></i></a>

                        </td>
                    </tr>
                    <?php }?>
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

	$response = $this->BranchModel->getStatus($id);
	if ($response) 
		{
			$this->session->set_flashdata('create_user_success','Successfully Deactivated!');//display message
						
		}
		else
		{
		$this->session->set_flashdata('create_user_error',' Deactivate Failed!');//display message
						
		}

	redirect('BranchCtrl/');
}
public function status_active($id){

	$response = $this->BranchModel->getStatus_active($id);
	if ($response) 
		{
			$this->session->set_flashdata('create_user_success','Successfully Activated!');//display message
						
		}
		else
		{
		$this->session->set_flashdata('create_user_error',' Deactivate Failed!');//display message
						
		}

	redirect('BranchCtrl/');
}


}