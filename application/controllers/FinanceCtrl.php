<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FinanceCtrl extends CI_Controller {

    public function __construct(){
		parent:: __construct();
		
		$this->load->model('Manager_model');
		$is_logged_in = $this->Manager_model->is_user_logged_in();
		
	if (!$is_logged_in) {
		redirect('user/login');
	}
}
	public function index()
	{
		$this->load->view('welcome_message');
	}
    public function finance_dashboard(){
        $this->load->view('templates/header');
        $this->load->view('finance_temp/navbar');
		$this->load->view('finance/finance_dashboard');
        $this->load->view('templates/Graph_script');
        $this->load->view('templates/footer');
    }

    public function finance_create_PI(){
        $this->load->view('templates/header');
        $this->load->view('finance_temp/navbar');
		$this->load->view('finance/finance_create_PI');
        
        $this->load->view('templates/footer');
		$this->load->view('finance_temp/finance_scripts');
    }


    public function finance_manage_PI(){
        $this->load->view('templates/header');
        $this->load->view('finance_temp/navbar');
		$this->load->view('finance/finance_manage_PI');
        $this->load->view('templates/footer');
		
    }


    public function finance_update_PI(){
        $this->load->view('templates/header');
        $this->load->view('finance_temp/navbar');
		$this->load->view('finance/finance_update_PI');
        $this->load->view('templates/footer');
		
    }
    public function finance_create_AP(){
        $this->load->view('templates/header');
        $this->load->view('finance_temp/navbar');
		$this->load->view('finance/finance_create_AP');
        $this->load->view('templates/footer');
		
    }
    public function finance_create_Reciept(){
        $this->load->view('templates/header');
        $this->load->view('finance_temp/navbar');
		$this->load->view('finance/finance_create_reciept');
        $this->load->view('templates/footer');
		
    }


    public function finance_manage_AP(){
        $this->load->view('templates/header');
        $this->load->view('finance_temp/navbar');
		$this->load->view('finance/finance_manage_AP');
        $this->load->view('templates/footer');
		
    }
    public function finance_update_AP(){
        $this->load->view('templates/header');
        $this->load->view('finance_temp/navbar');
		$this->load->view('finance/finance_update_AP');
        $this->load->view('templates/footer');
		
    }

    public function finance_create_PV(){
        $this->load->view('templates/header');
        $this->load->view('finance_temp/navbar');
		$this->load->view('finance/finance_create_PV');
        $this->load->view('templates/footer');
        $this->load->view('finance_temp/finance_scripts');
		
    }
    public function finance_manage_PV(){
        $this->load->view('templates/header');
        $this->load->view('finance_temp/navbar');
		$this->load->view('finance/finance_manage_PV');
        $this->load->view('templates/footer');
        $this->load->view('finance_temp/finance_scripts');
		
    }
    public function finance_update_PV(){
        $this->load->view('templates/header');
        $this->load->view('finance_temp/navbar');
		$this->load->view('finance/finance_update_PV');
        $this->load->view('templates/footer');
        $this->load->view('finance_temp/finance_scripts');
		
    }
    public function finance_view_ledger(){
        $this->load->view('templates/header');
        $this->load->view('finance_temp/navbar');
		$this->load->view('finance/finance_view_ledger');
        $this->load->view('templates/footer');
        $this->load->view('finance_temp/finance_scripts');
		
    }

    
    public function autosearch(){

		$output = '';
		$query ='';
		
			if ($this->input->post('query')) {
				$query = $this->input->post('query');
			}
			$data = $this->ScheduleModel->payment_search($query);
	
			if (!$data->num_rows() > 0)
			{
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
                    <tr>
                        <td colspan="5">
                            <h3 class="text-center">No Data Found</h3>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <?php
	}else{
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
                                        <?php
									foreach ($data->result() as $row) {
												$payment_schedule_id = $row->payment_schedule_id;
												$type = $row->type;
												$amount = $row->total_amount;
												$duedate = $row->due_date;
												$status=$row->status;?>

                                        <tr>
                                            <td class="text-center"><?= $type ?></td>
                                            <td class="text-center"><?= $amount?></td>
                                            <td class="text-center"><?= $duedate?></td>

                                            <td class=" text-center"><span
                                                    class="badge bg-success status"><?php echo ucfirst($status); ?></span>
                                            </td>


                                            <td class="d-none d-md-table-cell action text-center">


                                                <a
                                                    href="<?= site_url('ScheduleCtrl/update_payment_schedule/'.$payment_schedule_id);?>"><i
                                                        class="fa-regular fa-pen-to-square text-center"></i></a>


                                                <a href=""><i class="fa-solid fa-trash view_btn text-center"></i></a>

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
		
	}


	

}