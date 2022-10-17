<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ScheduleCtrl extends CI_Controller {


	public function __construct(){

        parent:: __construct();
        $this->load->model('Manager_model');
		$is_logged_in = $this->Manager_model->is_user_logged_in();
		
	if (!$is_logged_in) {
		redirect('Accounts/login');
	}
        $this->load->model('ScheduleModel');
		$this->load->model('PR_Model');
    }

	public function index()
	{
		$gen_notif['count'] =$this->PR_Model->count_notif();
		$data['title'] = "Payment Schedule | iDrive Tutorial";
		$this->load->view('templates/header',$data);
        $this->load->view('templates/navbar',$gen_notif);
		$data['billing_Type'] = $this->ScheduleModel->billing_type();
		$this->load->view('Payment_Schedule/payment_schedule',$data);
        $this->load->view('templates/footer');
		$this->load->view('Payment_Schedule/payment_script');
	}
	public function alpha_num($str){
		if (!preg_match("/^([0-9.,])+$/i",$str)) {
			$this->form_validation->set_message('alpha_num','The %s can only contains number/s');
			return false;
		}else{
			return true;
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
	public function add_payment(){
		$gen_notif['count'] =$this->PR_Model->count_notif();
		$data['title'] = "Create Payment | iDrive Tutorial";
		$this->submit_payment();
		$this->load->view('templates/header',$data);
        $this->load->view('templates/navbar',$gen_notif);
		$data['billing_Type'] = $this->ScheduleModel->billing_type();
		$this->load->view('Payment_Schedule/create_payment_schedule',$data);
        $this->load->view('templates/footer');
		$this->load->view('templates/script');
		
	}
	public function submit_payment(){

		if ($this->input->post('save_payment')) {

			$this->form_validation->set_rules('type','type','trim|required');
			$this->form_validation->set_rules('amount','amount','required|callback_alpha_num');
			$this->form_validation->set_rules('duedate','due date','trim|required');
 
			if($this->form_validation->run() != FALSE){

			$response = $this->ScheduleModel->add_payment();
			
			if ($response) {

				$this->session->set_flashdata('create_user_success', 'Successfully Created!');
				//redirect('UserCtrl/create_user');
			}else{
				$this->session->set_flashdata('create_user_error', 'Create Failed!');

			}
		
			redirect('ScheduleCtrl/add_payment');
			}

		}

	}

	
	public function update_payment_schedule($id)
	{
		$gen_notif['count'] =$this->PR_Model->count_notif();
		$data['title'] = "Update Schedule | iDrive Tutorial";
		$data['billing_Type'] = $this->ScheduleModel->billing_type();
		$this->update_payment_submit($id);
        $this->load->view('templates/header',$data);
        $this->load->view('templates/navbar',$gen_notif);
		$data['editpayment'] = $this->ScheduleModel->get_payment_schedule($id);
		$this->load->view('Payment_Schedule/update_payment_schedule',$data);
        $this->load->view('templates/footer');
		$this->load->view('templates/script');
	}

	public function update_payment_submit($id){
		
		if ($this->input->post('updatepayment')) {

			$this->form_validation->set_rules('type','type','trim|required');
			$this->form_validation->set_rules('amount','amount','required|callback_alpha_num');
			$this->form_validation->set_rules('duedate','duedate','trim|required');

			if($this->form_validation->run() != FALSE){

			$response = $this->ScheduleModel->update_schedule();
			
			if ($response) {

				$this->session->set_flashdata('create_user_success', 'Successfully Updated!');
				
			}else{
				$this->session->set_flashdata('create_user_error', 'Create Failed!');
			}
			redirect('ScheduleCtrl/update_payment_schedule/'.$id);
			}
	}

	}

//Branch Manager Schedule
	public function branch_payment()
{       $notif['count'] =$this->PR_Model->count_notif();
		$data['title'] = "Payment Schedule | iDrive Tutorial";
		$this->load->view('templates/header',$data);
		$this->load->view('branch_temp/navbar',$notif);
		$data['billing_Type'] = $this->ScheduleModel->billing_type();
		$this->load->view('Payment_Schedule/payment_schedule',$data);
		$this->load->view('templates/footer');
		$this->load->view('Payment_Schedule/payment_script');
	}

	public function branch_create_payment(){
		$notif['count'] =$this->PR_Model->count_notif();
		$data['title'] = "Create Payment | iDrive Tutorial";
		$this->Branch_submit_payment();
		$this->load->view('templates/header',$data);
		$this->load->view('branch_temp/navbar',$notif);
		$data['billing_Type'] = $this->ScheduleModel->billing_type();
		$this->load->view('Payment_Schedule/branch_create_payment',$data);
		$this->load->view('templates/footer');
		$this->load->view('templates/script');
		
	}
	public function Branch_submit_payment(){

		if ($this->input->post('save_payment')) {

			$this->form_validation->set_rules('type','type','trim|required');
			$this->form_validation->set_rules('amount','amount','required|callback_alpha_num');
			$this->form_validation->set_rules('duedate','duedate','trim|required');

			if($this->form_validation->run() != FALSE){

			$response = $this->ScheduleModel->add_payment();
			
			if ($response) {

				$this->session->set_flashdata('create_user_success', 'Successfully Created!');
				//redirect('UserCtrl/create_user');
			}else{
				$this->session->set_flashdata('create_user_error', 'Create Failed!');

			}
		
			redirect('ScheduleCtrl/branch_create_payment');
			}

		}

	}


	public function branch_update_payment($id)
	{
		$notif['count'] =$this->PR_Model->count_notif();
		$data['title'] = "Update Schedule | iDrive Tutorial";
		$data['billing_Type'] = $this->ScheduleModel->billing_type();
		$this->branch_update_payment_submit($id);
        $this->load->view('templates/header',$data);
        $this->load->view('branch_temp/navbar',$notif);
		$data['editpayment'] = $this->ScheduleModel->get_payment_schedule($id);
		$this->load->view('Payment_Schedule/branch_update_payment',$data);
        $this->load->view('templates/footer');
		$this->load->view('templates/script');
	}

	public function branch_update_payment_submit($id){
		
		if ($this->input->post('updatepayment')) {

			$this->form_validation->set_rules('type','type','trim|required');
			$this->form_validation->set_rules('amount','amount','required|callback_alpha_num');
			$this->form_validation->set_rules('duedate','duedate','trim|required');

			if($this->form_validation->run() != FALSE){

			$response = $this->ScheduleModel->update_schedule();
			
			if ($response) {

				$this->session->set_flashdata('create_user_success', 'Successfully Updated!');
				
			}else{
				$this->session->set_flashdata('create_user_error', 'Create Failed!');

			}
		
			redirect('ScheduleCtrl/branch_update_payment/'.$id);
			}

	}
	
	}


	public function delete_schedule($id){

		
	$response = $this->ScheduleModel->delete_sched($id);
	if ($response) 
		{
			$this->session->set_flashdata('create_user_success','Successfully Deleted!');//display message
						
		}
		else
		{
		$this->session->set_flashdata('create_user_error',' Delete Failed!');//display message
						
		}
if($_SESSION['Position'] == "gen_manager"){
	redirect('ScheduleCtrl/');

}elseif($_SESSION['Position']=="manager"){

	redirect('ScheduleCtrl/branch_payment');
}
	
	}

	
	public function search_payment(){
		$query ='';

        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
		$data = $this->ScheduleModel->search_payment($query);
		?>
<div class="row mt-4">
    <div class="col-12 col-lg-12 col-xxl-12 d-flex">

        <div class="card flex-fill" id="card">
            <table class="table table-hover my-0" id="table">
                <thead>
                    <tr>
                        <th class="d-none d-xl-table-cell txt" id="tbl_th">Billing Type</th>
                        <th class="txt" id="tbl_th">Total Amount</th>
                        <th class="d-none d-md-table-cell txt" id="tbl_th">Due Date</th>
                        <th class="d-none d-md-table-cell txt" id="tbl_th">Status</th>
                        <th class="d-none d-md-table-cell text-center txt" id="tbl_th">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php if ($data->num_rows() >0) {

						foreach ($data->result() as $row) {
							

							?>
                    <tr>
                        <td class="text-center"><?= $row->Type ?></td>
                        <td class="text-center"><span><i
                                    class="fa-solid fa-peso-sign"></i></span><?= $row->total_amount?>
                        </td>
                        <td class="text-center"><?= $row->due_date?></td>

                        <td class=" text-center"><span
                                class="badge bg-success status"><?php echo ucfirst($row->status); ?></span>
                        </td>


                        <td class="d-none d-md-table-cell action text-center">

                            <?php  if($_SESSION['Position'] == 'gen_manager'){?>

                            <a
                                href="<?= site_url('ScheduleCtrl/update_payment_schedule/'.$row->payment_schedule_id);?>"><i
                                    class="fa-regular fa-pen-to-square text-center"></i></a>

                            <a href="<?= site_url('ScheduleCtrl/delete_schedule/'.$row->payment_schedule_id);?>"
                                onclick="return confirm('Are you sure you want to Cancel?')"><i
                                    class="fa-solid fa-trash"></i></a>
                            <?php }elseif($_SESSION['Position'] == 'manager'){
							?>
                            <a href="<?= site_url('ScheduleCtrl/branch_update_payment/'.$row->payment_schedule_id);?>"><i
                                    class="fa-regular fa-pen-to-square text-center"></i></a>

                            <a href="<?= site_url('ScheduleCtrl/delete_schedule/'.$row->payment_schedule_id);?>"
                                onclick="return confirm('Are you sure you want to Cancel?')"><i
                                    class="fa-solid fa-trash"></i></a>

                            <?php
							?>
                            <?php } ?>
                        </td>
                    </tr>


                    <?php
						}
			
				}else{
					?>
                    <td colspan="5">
                        <h5 class="text-center text-danger">No Data Found</h5>
                    </td>
                    <?php
                        }?>


            </table>
        </div>
    </div>
</div>
<?php
	}

	public function view_billing(){

		$gen_notif['count'] =$this->PR_Model->count_notif();
		$data['title'] = "Manage Billing | iDrive Tutorial";
		$this->load->view('templates/header',$data);
        $this->load->view('templates/navbar',$gen_notif);
		$this->load->view('Payment_Schedule/view_billing');
        $this->load->view('templates/footer');
		$this->load->view('templates/script');
		$this->load->view('Payment_Schedule/payment_script');

	}
	public function add_billing(){
		$this->submit_bill();
		$gen_notif['count'] =$this->PR_Model->count_notif();
		$data['title'] = "Create Billing | iDrive Tutorial";
		$this->load->view('templates/header',$data);
        $this->load->view('templates/navbar',$gen_notif);
		$this->load->view('Payment_Schedule/add_billing');
        $this->load->view('templates/footer');
		$this->load->view('templates/script');
		$this->load->view('Payment_Schedule/payment_script');
	}
	public function branch_add_billing(){
		$this->submit_bill();
		$gen_notif['count'] =$this->PR_Model->count_notif();
		$data['title'] = "Create Billing | iDrive Tutorial";
		$this->load->view('templates/header',$data);
        $this->load->view('branch_temp/navbar',$gen_notif);
		$this->load->view('Payment_Schedule/add_billing');
        $this->load->view('templates/footer');
		$this->load->view('templates/script');
		$this->load->view('Payment_Schedule/payment_script');
	}
	public function submit_bill(){

		if ($this->input->post('btn_bill')) {

			$this->form_validation->set_rules('type','type','trim|required|callback_alpha_character');
			if($this->form_validation->run() != FALSE){

			$response = $this->ScheduleModel->add_bill();
			
			if ($response) {

				$this->session->set_flashdata('create_user_success', 'Successfully Updated!');
				
			}else{
				$this->session->set_flashdata('create_user_error', 'Create Failed!');
			}
		if ($_SESSION['Position'] == 'gen_manager') {

			redirect('ScheduleCtrl/add_billing');
		}elseif ($_SESSION['Position'] == 'manager'){
			redirect('ScheduleCtrl/branch_add_billing');
			}
	}
}
	}

	public function update_bill($id){

		$this->submit_update_bill($id);
		$gen_notif['count'] =$this->PR_Model->count_notif();
		$data['title'] = "Create Billing | iDrive Tutorial";
		$data['getbill'] = $this->ScheduleModel->getbill($id);
		$this->load->view('templates/header',$data);
        $this->load->view('templates/navbar',$gen_notif);
		$this->load->view('Payment_Schedule/update_bill',$data);
        $this->load->view('templates/footer');
		$this->load->view('templates/script');
		$this->load->view('Payment_Schedule/payment_script');
	}

	public function branch_update_bill($id){

		$this->submit_update_bill($id);
		$gen_notif['count'] =$this->PR_Model->count_notif();
		$data['title'] = "Create Billing | iDrive Tutorial";
		$data['getbill'] = $this->ScheduleModel->getbill($id);
		$this->load->view('templates/header',$data);
        $this->load->view('branch_temp/navbar',$gen_notif);
		$this->load->view('Payment_Schedule/update_bill',$data);
        $this->load->view('templates/footer');
		$this->load->view('templates/script');
		$this->load->view('Payment_Schedule/payment_script');
	}

public function submit_update_bill($id){

	if ($this->input->post('btn_bill_update')) {

		$this->form_validation->set_rules('type','type','trim|required|callback_alpha_character');
			if($this->form_validation->run() != FALSE){

			$response = $this->ScheduleModel->update_bills($id);
			
			if ($response) {

				$this->session->set_flashdata('create_user_success', 'Successfully Updated!');
				
			}else{
				$this->session->set_flashdata('create_user_error', 'Create Failed!');

			}
		if ($_SESSION['Position'] == 'gen_manager') {
			
		
			redirect('ScheduleCtrl/update_bill/'.$id);
			}elseif ($_SESSION['Position'] == 'manager'){
				redirect('ScheduleCtrl/branch_update_bill/'.$id);

			}
		}
}
	
}

	public function search_billing(){
		$query ='';

        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
		$search = $this->ScheduleModel->search_bills($query);
		
		?>
<div class="row mt-4">
    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
        <div class="card flex-fill" id="card">
            <table class="table table-hover my-0" id="table">
                <thead>
                    <tr>
                        <th class="txt text-center" id="tbl_th">Billing Type</th>
                        <th class=" text-center txt" id="tbl_th">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php if ($search->num_rows() >0) {
								foreach ($search->result() as $row) {
									?>
                    <tr>
                        <td class="text-center"><?= $row->Type ?></td>

                        <td class="d-none d-md-table-cell action text-center">

                            <?php  if($_SESSION['Position'] == 'gen_manager'){?>

                            <a href="<?= site_url('ScheduleCtrl/update_bill/'.$row->billing_type_id);?>"><i
                                    class="fa-regular fa-pen-to-square text-center"></i></a>

                            <a href="<?= site_url('ScheduleCtrl/delete_bill/'.$row->billing_type_id);?>"
                                onclick="return confirm('Are you sure you want to Cancel?')"><i
                                    class="fa-solid fa-trash"></i></a>
                            <?php }elseif($_SESSION['Position'] == 'manager'){
									?>
                            <a href="<?= site_url('ScheduleCtrl/branch_update_bill/'.$row->billing_type_id);?>"><i
                                    class="fa-regular fa-pen-to-square text-center"></i></a>

                            <a href="<?= site_url('ScheduleCtrl/delete_bill/'.$row->billing_type_id);?>"
                                onclick="return confirm('Are you sure you want to Cancel?')"><i
                                    class="fa-solid fa-trash"></i></a>

                            <?php
									?>
                            <?php } ?>
                        </td>
                    </tr>


                    <?php
								}
					
						}else{
							?>
                    <td colspan="5">
                        <h5 class="text-center text-danger">No Data Found</h5>
                    </td>
                    <?php
								}?>


            </table>
        </div>
    </div>
</div>
<?php
	}

	public function delete_bill($id){

		$response = $this->ScheduleModel->delete_bill($id);
		if ($response) 
			{
				$this->session->set_flashdata('create_user_success','Successfully Deleted!');//display message
							
			}
			else
			{
			$this->session->set_flashdata('create_user_error',' Delete Failed!');//display message
							
			}
	if($_SESSION['Position'] == "gen_manager"){
		redirect('ScheduleCtrl/view_billing');
	
	}elseif($_SESSION['Position']=="manager"){
	
		redirect('ScheduleCtrl//branch_view_billing');
	}
		
		}

		//branch 

		public function branch_view_billing(){

			$notif['count'] =$this->PR_Model->count_notif();
			$data['title'] = "Manage Billing | iDrive Tutorial";
			$this->load->view('templates/header',$data);
			$this->load->view('branch_temp/navbar',$notif);
			$this->load->view('Payment_Schedule/view_billing');
			$this->load->view('templates/footer');
			$this->load->view('templates/script');
			$this->load->view('Payment_Schedule/payment_script');
	
		}
	
}