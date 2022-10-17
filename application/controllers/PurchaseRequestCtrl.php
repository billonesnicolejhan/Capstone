<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PurchaseRequestCtrl extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('Manager_model');
				$is_logged_in = $this->Manager_model->is_user_logged_in();
				
		if (!$is_logged_in) {
				redirect('Accounts/login');
		}
		$this->load->model('PR_Model');
		$this->load->model('BranchModel');
		date_default_timezone_set('Asia/Manila');
	}

	public function view($id){
		$notif['count'] =$this->PR_Model->count_notif();
		$data['title'] = "View Purchase Request | iDrive Tutorial";
		$data['get_code'] =$this->PR_Model->get_pr_code();
		$data['select'] = $this->PR_Model->select_one($id);
		$data['view'] = $this->PR_Model->view_all_PR($id);
		$this->load->view('templates/header',$data);
        $this->load->view('branch_temp/navbar',$notif);
		$this->load->view('Purchase_Request/View_Purchase_Request',$data);
        $this->load->view('templates/footer');
		$this->load->view('templates/script');
	}
	
	public function branch_manage_PR(){
		$notif['count'] =$this->PR_Model->count_notif();
		$data['title'] = "Manage Purchase Request | iDrive Tutorial";
		$data['manage_branch'] = $this->PR_Model->manage_branch();
		$this->load->view('templates/header',$data);
        $this->load->view('branch_temp/navbar',$notif);
		$this->load->view('Purchase_Request/branch_manage_PR',$data);
        $this->load->view('templates/footer');
		$this->load->view('templates/script');
		$this->load->view('Purchase_Request/purchase_script');
	}
	
		public function branch_create_PR(){
		$notif['count'] =$this->PR_Model->count_notif();
		$this->insert2();
		$data['title'] = "Create Purchase Request | iDrive Tutorial";
		$data['getsupplier'] =$this->PR_Model->getsupplier_list();
		$data['carlist'] =$this->PR_Model->getcarlist();
		$data['display_code'] =$this->PR_Model->auto_number_PR();
		$this->load->view('templates/header',$data);
        $this->load->view('branch_temp/navbar',$notif);
		$this->load->view('Purchase_Request/branch_create_PR',$data);
        $this->load->view('templates/footer');
		$this->load->view('templates/script');

		}


		public function insert2(){
			
			if ($this->input->post('btn_create_pr')) {
				
				
					$response = $this->PR_Model->insert();
				if ($response) {

					$this->session->set_flashdata('create_user_success', 'Successfully Created!');
				}else{
					$this->session->set_flashdata('create_user_error', 'Created Failed');
	
				}
			if($_SESSION['Position'] =='manager'){
				redirect('PurchaseRequestCtrl/branch_create_PR');

			}elseif($_SESSION['Position'] =='gen_manager'){

				redirect('PurchaserequestCtrl/gen_create_purchase_request');
			}
					
				}



				
		}


		
	public function update_branch_pr($id)
	{
		$notif['count'] =$this->PR_Model->count_notif();
		$this->update_submit_pr($id);
		$title['title'] = "Update Request | iDrive Tutorial";
		$data['getsupplier'] =$this->PR_Model->getsupplier_list();
		$data['get_code'] =$this->PR_Model->get_pr_code();
		$data['view'] = $this->PR_Model->view_all_PR($id);
		$data['select'] = $this->PR_Model->select_one($id);
        $this->load->view('templates/header',$title);
        $this->load->view('branch_temp/navbar',$notif);
		$this->load->view('Purchase_Request/branch_update_PR',$data);
        $this->load->view('templates/footer');
		$this->load->view('templates/script');
		
	}

	public function update_submit_pr($id){

		if ($this->input->post('update_pr')) {

			$response = $this->PR_Model->update_PR();

			if ($response) {

				$this->session->set_flashdata('create_user_success', 'Successfully Updated!');
			}else{
				$this->session->set_flashdata('create_user_error', 'Create Failed');
			}
			redirect('PurchaseRequestCtrl/update_branch_pr/'.$id);

		}
		
	}
	
	public function  gen_create_purchase_request(){
		$gen_notif['count'] =$this->PR_Model->count_notif();
		$title['title'] = "Create Purchase Request | iDrive Tutorial";
		$data['carlist'] =$this->PR_Model->getcarlist();
		$data['getsupplier'] =$this->PR_Model->getsupplier_list();	
		$data['display_code'] =$this->PR_Model->auto_number_PR();
        $this->load->view('templates/header',$title);
        $this->load->view('templates/navbar',$gen_notif);
		$this->load->view('Purchase_Request/branch_create_PR',$data);
        $this->load->view('templates/footer');
		$this->load->view('templates/script');
}
	
public function gen_manage_PR(){
	$gen_notif['count'] =$this->PR_Model->count_notif();
	$title['title'] = "Manage Purchase Request | iDrive Tutorial";
	$data['manage_branch'] = $this->PR_Model->manage_branch();
	$this->load->view('templates/header',$title);
	$this->load->view('templates/navbar',$gen_notif);
	$this->load->view('Purchase_Request/General_Manage',$data);
	$this->load->view('templates/footer');
	$this->load->view('Purchase_Request/purchase_script');

	


}
public function gen_view($id){
	$gen_notif['count'] =$this->PR_Model->count_notif();
	$title['title'] = "View Purchase Request | iDrive Tutorial";
	$data['get_code'] =$this->PR_Model->get_pr_code();
	$data['select'] = $this->PR_Model->select_one($id);
	$data['view'] = $this->PR_Model->view_all_PR($id);
	$this->load->view('templates/header',$title);
	$this->load->view('templates/navbar',$gen_notif);
	$this->load->view('Purchase_Request/View_Purchase_Request',$data);
	$this->load->view('templates/footer');
	$this->load->view('templates/script');
}


	public function gen_update($id){
		$gen_notif['count'] =$this->PR_Model->count_notif();
		$this->gen_submit_pr($id);
		$title['title'] = "Update Purchase Request | iDrive Tutorial";
		$data['getsupplier'] =$this->PR_Model->getsupplier_list();
		$data['get_code'] =$this->PR_Model->get_pr_code();
		$data['view'] = $this->PR_Model->view_all_PR($id);
		$data['select'] = $this->PR_Model->select_one($id);
		$this->load->view('templates/header',$title);
		$this->load->view('templates/navbar',$gen_notif);
		$this->load->view('Purchase_Request/gen_update_PR',$data);
		$this->load->view('templates/footer');
		$this->load->view('templates/script');

}

public function gen_submit_pr($id){

	if ($this->input->post('update_pr')) {

		$response = $this->PR_Model->update_PR();

		if ($response) {

			$this->session->set_flashdata('create_user_success', 'Successfully Updated!');
		}else{
			$this->session->set_flashdata('create_user_error', 'Update Failed');
		}
		redirect('PurchaseRequestCtrl/gen_update/'.$id);

	}
}

public function manage_request(){
	$gen_notif['count'] =$this->PR_Model->count_notif();
		$title['title'] = "Update Purchase Request | iDrive Tutorial";
		//$data['pending'] =$this->PR_Model->pending_request();
		$this->load->view('templates/header',$title);
		$this->load->view('templates/navbar',$gen_notif);
		$this->load->view('Purchase_Request/manage_request');
		$this->load->view('templates/footer');
		$this->load->view('templates/script');
		$this->load->view('Purchase_Request/purchase_script');

}

public function approve_request($id){
	$this->submit_approve($id);
	$gen_notif['count'] =$this->PR_Model->count_notif();
	$title['title'] = "Approve Purchase Request | iDrive Tutorial";
	$data['get_code'] =$this->PR_Model->get_pr_code();
	$data['select'] = $this->PR_Model->select_one($id);
	$data['view'] = $this->PR_Model->view_all_PR($id);
	$this->load->view('templates/header',$title);
	$this->load->view('templates/navbar',$gen_notif);
	$this->load->view('Purchase_Request/approve_request',$data);
	$this->load->view('templates/footer');
	$this->load->view('templates/script');

}


public function submit_approve($id){
	$status =$this->input->post('status');
	if($this->input->post('btn_save')){

		$response = $this->PR_Model->approve_request();

		if ($response) {

			$this->session->set_flashdata('create_user_success', 'Successfully Posted');
		}else{
			$this->session->set_flashdata('create_user_error', 'Purchase request disapproved!');
		}
		redirect('PurchaseRequestCtrl/manage_request/'.$id);

	}
		
	
}

public function count_notif(){

	$title['title'] = "Notification Purchase Request | iDrive Tutorial";
	$notif['count'] =$this->PR_Model->count_notif();
	$this->load->view('templates/header',$title);
	$this->load->view('branch_temp/navbar',$notif);
	$this->load->view('branch_temp/branch_notification',$data);
	$this->load->view('templates/footer');
	//$this->load->view('templates/script');
}

public function gen_search(){
	$query ='';
	if ($this->input->post('query')) {
		$query = $this->input->post('query');
	}
	$data = $this->PR_Model->gen_search($query);
?>
<div class="row">
    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
        <div class="card flex-fill " id="card">
            <table class="table table-hover my-0" id="table">
                <thead>
                    <tr>
                        <th class="text-center text-white" id="tbl_th">PR No.</th>
                        <th class="text-center text-white" id="tbl_th">Supplier</th>
                        <th class="text-center text-white" id="tbl_th">Date Issued</th>
                        <th class="text-center text-white" id="tbl_th">status</th>
                        <th class="text-center text-white" id="tbl_th">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($data->num_rows()>0){
                                foreach ($data->result() as $row) {
                                ?>
                    <tr>
                        <td class="text-center"><?=$row->purchase_request_no?></td>
                        <td class="text-center"><?=$row->supplier_name?></td>
                        <td class="text-center"><?=$row->date_issued?></td>
                        <?php if ($row->isPending == "approved") {
                                      ?>
                        <td class="text-center"><span class="badge bg-success"><?=ucfirst($row->isPending)?>
                        </td>
                        <?php
                                    }else{
                                ?>
                        <td class="text-center"><span class="badge bg-danger"><?=ucfirst($row->isPending)?>
                                <?php
                                        }
                                         ?>

                                <?php if ($row->isPending == "approved") {?>

                        <td class="text-center">

                            <a href="<?=site_url('PurchaseRequestCtrl/gen_view/'.$row->purchase_request_id) ?>"><i
                                    class="fa-solid fa-eye text-center fa-lg"></i></a>

                        </td>

                        <?php
                                            }else{
                                                ?>
                        <td class="text-center">
                            <a href="<?=site_url('PurchaseRequestCtrl/gen_view/'.$row->purchase_request_id) ?>"><i
                                    class="fa-solid fa-eye text-center fa-lg"></i></a>
                            <a href="<?= site_url('PurchaseRequestCtrl/gen_update/'.$row->purchase_request_id);?>"><i
                                    class="fa-regular fa-pen-to-square text-center text-center fa-lg"></i></a>
                            <a href="#"> <i class="fa-solid fa-trash fa-lg"></i></a>
                        </td>

                        <?php
                                            }?>
                    </tr>

                    <?php
                            }
                        }else {
                        ?>
                    <tr>
                        <td colspan="5">
                            <h5 class="text-center text-danger">No Request Found</h5>
                        </td>
                    </tr>
                    <?php
                            }
                     ?>
                </tbody>
                <?php
	}


	public function manage_request_search(){

		$query ='';
	if ($this->input->post('query')) {
		$query = $this->input->post('query');
	}
	$data = $this->PR_Model->pending_request($query);

	?>
                <!--End-->
                <hr>
                <!--START TABLE-->
                <div class="row">
                    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                        <div class="card flex-fill " id="card">
                            <table class="table table-hover my-0" id="table">
                                <thead>
                                    <tr>
                                        <th class="text-center text-white" id="tbl_th">PR No.</th>
                                        <th class="text-center text-white" id="tbl_th">Requested By</th>
                                        <th class="text-center text-white" id="tbl_th">Date Issued</th>
                                        <th class="text-center text-white" id="tbl_th">status</th>
                                        <th class="text-center text-white" id="tbl_th">Action</th>


                                    </tr>
                                </thead>
                                <tbody>

                                    <?php if($data->num_rows()>0) { ?>
                                    <?php if ($data) {

                            foreach ($data->result() as $row) {?>

                                    <tr>
                                        <td class="text-center"><?= $row->purchase_request_no?></td>
                                        <td class="text-center"><?= $row->branch_name?></td>
                                        <td class="text-center"><?= $row->date_issued?></td>
                                        <td class="text-center"><span
                                                class="badge bg-danger text"><?= ucfirst($row->isPending)?>
                                        </td>
                                        <td class="text-center">

                                            <a
                                                href="<?=site_url('PurchaseRequestCtrl/approve_request/'.$row->purchase_request_id); ?>"><i
                                                    class="fa-regular fa-pen-to-square text-center text-center fa-lg"></i></a>

                                        </td>
                                    </tr>

                                    <?php
                            }
                        }else{
                                ?>
                                    <tr>
                                        <td colspan="5">
                                            <h5>No Pending Request</h5>
                                        </td>
                                    </tr>
                                    <?php 
                            }
                                ?>



                                    <?php
                            }else{
                                ?>
                                    <tr>
                                        <td colspan="5">
                                            <h5>No Pending Request</h5>
                                        </td>
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


	public function branch_manage_search(){
		$query ='';
		if ($this->input->post('query')) {
			$query = $this->input->post('query');
		}
		$data = $this->PR_Model->gen_search($query);
	?>
                <div class="row">
                    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                        <div class="card flex-fill " id="card">
                            <table class="table table-hover my-0" id="table">
                                <thead>
                                    <tr>
                                        <th class="text-center text-white" id="tbl_th">PR No.</th>
                                        <th class="text-center text-white" id="tbl_th">Supplier</th>
                                        <th class="text-center text-white" id="tbl_th">Date Issued</th>
                                        <th class="text-center text-white" id="tbl_th">status</th>
                                        <th class="text-center text-white" id="tbl_th">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($data->num_rows()>0){
									foreach ($data->result() as $row) {
									?>
                                    <tr>
                                        <td class="text-center"><?=$row->purchase_request_no?></td>
                                        <td class="text-center"><?=$row->supplier_name?></td>
                                        <td class="text-center"><?=$row->date_issued?></td>
                                        <?php if ($row->isPending == "approved") {
										  ?>
                                        <td class="text-center"><span
                                                class="badge bg-success"><?=ucfirst($row->isPending)?>
                                        </td>
                                        <?php
										}else{
									?>
                                        <td class="text-center"><span
                                                class="badge bg-danger"><?=ucfirst($row->isPending)?>
                                                <?php
											}
											 ?>

                                                <?php if ($row->isPending == "approved") {?>

                                        <td class="text-center">

                                            <a
                                                href="<?=site_url('PurchaseRequestCtrl/view/'.$row->purchase_request_id) ?>"><i
                                                    class="fa-solid fa-eye text-center fa-lg"></i></a>

                                        </td>

                                        <?php
												}else{
													?>
                                        <td class="text-center">
                                            <a
                                                href="<?=site_url('PurchaseRequestCtrl/view/'.$row->purchase_request_id) ?>"><i
                                                    class="fa-solid fa-eye text-center fa-lg"></i></a>
                                            <a
                                                href="<?= site_url('PurchaseRequestCtrl/update_branch_pr/'.$row->purchase_request_id);?>"><i
                                                    class="fa-regular fa-pen-to-square text-center text-center fa-lg"></i></a>
                                            <a href="#"> <i class="fa-solid fa-trash fa-lg"></i></a>
                                        </td>

                                        <?php
												}?>
                                    </tr>

                                    <?php
								}
							}else {
							?>
                                    <tr>
                                        <td colspan="5">
                                            <h5 class="text-center text-danger">No Request Found</h5>
                                        </td>
                                    </tr>
                                    <?php
								}
						 ?>
                                </tbody>
                                <?php
		}
	
}
	
		