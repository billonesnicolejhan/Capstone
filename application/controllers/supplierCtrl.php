<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SupplierCtrl extends CI_Controller {

    public function __construct(){
        parent:: __construct();
        $this->load->model('Manager_model');
		$is_logged_in = $this->Manager_model->is_user_logged_in();
		
	if (!$is_logged_in) {
		redirect('Accounts/login');
	}
        $this->load->model('SupplierModel');
		$this->load->model('PR_Model');
    }

	public function index()
	{
		$gen_notif['count'] =$this->PR_Model->count_notif();
		$data['title'] = "Supplier | iDrive Tutorial";
        $this->load->view('templates/header',$data);
        $this->load->view('templates/navbar',$gen_notif);
        $data['supplier'] = $this->SupplierModel->getbranch_list();
		$this->load->view('Supplier/supplier',$data);
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


	public function create_supplier(){
		$gen_notif['count'] =$this->PR_Model->count_notif();
		$data['title'] = "Create Supplier | iDrive Tutorial";
		$this->_add_supplier();
		$this->load->view('templates/header',$data);
        $this->load->view('templates/navbar',$gen_notif);
		$this->load->view('Supplier/create_supplier');
        $this->load->view('templates/footer');
		$this->load->view('templates/script');
		
	}

	public function branch_create_supplier(){

		$notif['count'] =$this->PR_Model->count_notif();
		$data['title'] = "Create Supplier | iDrive Tutorial";
		$this->_branch_supplier();
		$this->load->view('templates/header',$data);
        $this->load->view('branch_temp/navbar',$notif);
		$this->load->view('Supplier/branch_create_supplier');
        $this->load->view('templates/footer');
		$this->load->view('templates/script');

	}
		
	public function _branch_supplier() {


		if ($this->input->post('Addsupplier')) {

			$this->form_validation->set_rules('supplier_name','Supplier Name','trim|required|callback_alpha_character');
			$this->form_validation->set_rules('contact','Contact Number','required|callback_alpha_num|min_length[11]|max_length[11]');
			$this->form_validation->set_rules('street',' Street','trim|required');
			$this->form_validation->set_rules('barangay','Barangay','trim|required');
			$this->form_validation->set_rules('city','city','trim|required|callback_alpha_character');
			$this->form_validation->set_rules('province','Province','trim|required|callback_alpha_character');
			

			if($this->form_validation->run() != FALSE){

			$response = $this->SupplierModel->add_supplier();
			
			if ($response) {

				$this->session->set_flashdata('create_user_success', 'Successfully Created');
			}else{
				$this->session->set_flashdata('create_user_error', 'Create Failed!');

				
			}
			redirect('SupplierCtrl/branch_create_supplier');
			
			}

		}

	}
	public function _add_supplier() {


		if ($this->input->post('Addsupplier')) {

			$this->form_validation->set_rules('supplier_name','Supplier Name','trim|required|callback_alpha_character');
			$this->form_validation->set_rules('contact','Contact Number','required|callback_alpha_num|min_length[11]|max_length[11]');
			$this->form_validation->set_rules('street',' Street','trim|required');
			$this->form_validation->set_rules('barangay','Barangay','trim|required');
			$this->form_validation->set_rules('city','city','trim|required|callback_alpha_character');
			$this->form_validation->set_rules('province','Province','trim|required|callback_alpha_character');
			

			if($this->form_validation->run() != FALSE){

			$response = $this->SupplierModel->add_supplier();
			
			if ($response) {

				$this->session->set_flashdata('create_user_success', 'Successfully Creadted!');
			}else{
				$this->session->set_flashdata('create_user_error', 'Creade Failed!');

				
			}
			redirect('SupplierCtrl/create_supplier');
			
			}

		}

	}

		public function update_supplier($id){
			$gen_notif['count'] =$this->PR_Model->count_notif();
			$data['title'] = "Update Supplier | iDrive Tutorial";
			$this->edit_supplier_submit($id);
			$this->load->view('templates/header',$data);
			$this->load->view('templates/navbar',$gen_notif);
			$data['supplier'] = $this->SupplierModel->get_supplier($id);
			$this->load->view('Supplier/update_supplier',$data);
			$this->load->view('templates/footer');
			$this->load->view('templates/script');
	
		}

		public function edit_supplier_submit($id)
		{
			if($this->input->post('updateSupplier'))
			{
				
			$this->form_validation->set_rules('supplier_name','Supplier Name','trim|required|callback_alpha_character');
			$this->form_validation->set_rules('contact','Contact Number','required|callback_alpha_num|min_length[11]|max_length[11]');
			$this->form_validation->set_rules('street',' Street','trim|required');
			$this->form_validation->set_rules('barangay','Barangay','trim|required');
			$this->form_validation->set_rules('city','city','trim|required|callback_alpha_character');
			$this->form_validation->set_rules('province','Province','trim|required|callback_alpha_character');
			

				if($this->form_validation->run() != FALSE){
	
					$response = $this->SupplierModel->update_supplier();//true
					if ($response) 
					{
						$this->session->set_flashdata('create_user_success','Successfully Updated!');//display message
					}
					else
					{
						$this->session->set_flashdata('create_user_error','Update Failed!');//display message
						
					}
					 redirect('SupplierCtrl/update_supplier/'.$id); 
	
	
				}
			}
    
    }

	public function branch_supplier(){
		$notif['count'] =$this->PR_Model->count_notif();
		$data['title'] = "Supplier | iDrive Tutorial";
		$this->load->view('templates/header',$data);
        $this->load->view('branch_temp/navbar',$notif);
        $data['supplier'] = $this->SupplierModel->getbranch_list();
		$this->load->view('Supplier/branch_supplier',$data);
        $this->load->view('templates/footer');
		$this->load->view('templates/script');
	}

	public function branch_update_supplier($id){
		$notif['count'] =$this->PR_Model->count_notif();
		$data['title'] = "Update Supplier | iDrive Tutorial";
		$this->supplier_submit($id);
		$this->load->view('templates/header',$data);
        $this->load->view('branch_temp/navbar',$notif);
		$data['supplier'] = $this->SupplierModel->get_supplier($id);
		$this->load->view('Supplier/branch_update_supplier',$data);
        $this->load->view('templates/footer');
		$this->load->view('templates/script');

	}
	public function supplier_submit($id)
	{
		if($this->input->post('updateSupplier'))
		{
			
			$this->form_validation->set_rules('supplier_name','Supplier Name','trim|required|callback_alpha_character');
			$this->form_validation->set_rules('contact','Contact Number','required|callback_alpha_num|min_length[11]|max_length[11]');
			$this->form_validation->set_rules('street',' Street','trim|required');
			$this->form_validation->set_rules('barangay','Barangay','trim|required');
			$this->form_validation->set_rules('city','city','trim|required|callback_alpha_character');
			$this->form_validation->set_rules('province','Province','trim|required|callback_alpha_character');
			

			if($this->form_validation->run() != FALSE){

				$response = $this->SupplierModel->update_supplier();//true
				if ($response) 
				{
					$this->session->set_flashdata('create_user_success','Successfully Updated!');//display message
				}
				else
				{
					$this->session->set_flashdata('create_user_error','Update Failed!');//display message
					
				}
				 redirect('SupplierCtrl/branch_update_supplier/'.$id); 


			}
		}

}

	public function view_supplier($id){
		$gen_notif['count'] =$this->PR_Model->count_notif();
		$data['title'] = "Supplier | iDrive Tutorial";
		$this->load->view('templates/header',$data);
        $this->load->view('templates/navbar',$gen_notif);
		$data['view_supplier'] = $this->SupplierModel->get_supplier($id);
		$this->load->view('Supplier/view_supplier',$data);
        $this->load->view('templates/footer');
	
}
public function branch_view_supplier($id){
	$data['title'] = "Supplier | iDrive Tutorial";
	$this->load->view('templates/header',$data);
	$this->load->view('branch_temp/navbar');
	$data['view_supplier'] = $this->SupplierModel->get_supplier($id);
	$this->load->view('Supplier/branch_view_supplier',$data);
	$this->load->view('templates/footer');

}

public function search(){
	$query ='';

	if ($this->input->post('supplier')) {
		$query = $this->input->post('supplier');
	}

	$data = $this->SupplierModel->supplier_search($query);

	if ($data->num_rows() > 0)
	 {
		?>
<div class="row mt-4">
    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
        <div class="card flex-fill" id="card">
            <table class="table table-hover my-0" id="table">
                <thead>
                    <tr>
                        <th class="txt" id="tbl_th">Supplier Name</th>
                        <th class="d-none d-md-table-cell txt" id="tbl_th">Contact</th>
                        <th class="d-none d-xl-table-cell txt" id="tbl_th">Address</th>
                        <th class="txt" id="tbl_th">Status</th>
                        <th class="d-none d-md-table-cell text-center txt" id="tbl_th">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
						foreach ($data->result() as $row) {
							$supplier_id = $row->supplier_id;
							$supplier_name = $row->supplier_name;
							$contact = $row->contact;
							$branch = $row->branch_id;
							$status=$row->status;?>

                    <?php if($branch == $_SESSION['branch_id']){?>
                    <tr>
                        <td class="text-center"><?= $supplier_name ?></td>
                        <td class="text-center"><?= $contact?></td>
                        <td class="text-center"><span><?= ucfirst($row->street)?></span>
                            <span><?= ucfirst($row->barangay); ?></span><span>
                                <?= ucfirst($row->city); ?><br></span><span>
                                <?= ucfirst($row->province); ?><br></span>
                        </td>
                        <?php
							   	if($status == 'active'){?>
                        <td class=" text-center"><span class="badge badge-success"><a
                                    href="<?=site_url('SupplierCtrl/status/'.$supplier_id);?>"
                                    onclick="return confirm('Are you sure you want to Deactivate?')"
                                    style="text-decoration:none; font-size:13px; color:black"><?php echo ucfirst($status); ?></a></span>
                        </td>

                        <?php
							}else{?>
                        <td class=" text-center"><span class="badge badge-danger"><a
                                    href="<?=site_url('SupplierCtrl/status_active/'.$supplier_id);?>"
                                    onclick="return confirm('Are you sure you want to Activate?')"
                                    style="text-decoration:none; font-size:13px; color:black"><?php echo ucfirst($status); ?></a></span>
                        </td>
                        <?php
						}
							?>
                        <td class="d-none d-md-table-cell action text-center">
                            <?php  

								 if($_SESSION['Position'] == 'gen_manager'){?>
                            <a href="<?= site_url('SupplierCtrl/view_supplier/'.$supplier_id);?>"><i
                                    class="fa-solid fa-eye view_btn text-center"></i></a>

                            <a href="<?= site_url('SupplierCtrl/update_supplier/'.$supplier_id);?>"><i
                                    class="fa-regular fa-pen-to-square text-center"></i></a>

                            <?php }elseif($_SESSION['Position'] == 'manager'){
														
														?>
                            <a href="<?= site_url('SupplierCtrl/branch_view_supplier/'.$supplier_id);?>"><i
                                    class="fa-solid fa-eye view_btn text-center"></i></a>

                            <a href="<?= site_url('SupplierCtrl/branch_update_supplier/'.$supplier_id);?>"><i
                                    class="fa-regular fa-pen-to-square text-center"></i></a>
                            <?php
								?>

                        </td>
                    </tr>
                    <?php }?>
                    <?php }?>
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

	$response = $this->SupplierModel->getStatus($id);
	if ($response) 
		{
			$this->session->set_flashdata('create_user_success','Successfully Deactivated!');//display message
						
		}
		else
		{
		$this->session->set_flashdata('create_user_error',' Deactivate Failed!');//display message
						
		}
		if($_SESSION['Position'] == "gen_manager"){
			redirect('supplierCtrl/');
}else{
	redirect('SupplierCtrl/branch_supplier/');
	
}
	
}
public function status_active($id){

	$response = $this->SupplierModel->getStatus_active($id);
	if ($response) 
		{
			$this->session->set_flashdata('create_user_success','Successfully Activated!');//display message
						
		}
		else
		{
		$this->session->set_flashdata('create_user_error',' Deactivate Failed!');//display message
						
		}

		if($_SESSION['Position'] == "gen_manager"){
			redirect('supplierCtrl/');
}else{
	redirect('SupplierCtrl/branch_supplier/');
	
}
}

}