<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH. '/vendor/autoload.php';


class PurchaseOrderCtrl extends CI_Controller {

        public function __construct(){
                parent:: __construct();
                $this->load->model('Manager_model');
                        $is_logged_in = $this->Manager_model->is_user_logged_in();
                        
                if (!$is_logged_in) {
                        redirect('Accounts/login');
                }
               $this->load->model('PR_Model');
               $this->load->model('PO_Model');
            }
        

	public function index()
	{
            $notif['count'] =$this->PR_Model->count_notif();
            $title['title'] = "Create Purchase Order | iDrive Tutorial";
            $this->load->view('templates/header',$title);
            $this->load->view('branch_temp/navbar',$notif);
            $this->load->view('Purchase_Order/branch_create_PO');
            $this->load->view('templates/footer');
            $this->load->view('templates/script');
        }

	    public function create_PO($id)
        {
                $this->submit_PO($id);
                $title['title'] = "Create Purchase Order | iDrive Tutorial";
                $notif['count'] =$this->PR_Model->count_notif();
                $data['get_code'] =$this->PR_Model->get_pr_code();
                $data['select'] = $this->PR_Model->select_one($id);
                $data['view'] = $this->PR_Model->view_all_PR($id);
                $data['display_code'] =$this->PO_Model->auto_number_PO();
                $this->load->view('templates/header',$title);
                $this->load->view('templates/navbar',$notif);
                $this->load->view('Purchase_Order/create_PO',$data);
                $this->load->view('templates/footer');
                $this->load->view('templates/script');
        }



        public function submit_PO($id){
                
                if ($this->input->post('submit_po')) {
                        $this->form_validation->set_rules('payment_terms','Payment terms','trim|required');

                if($this->form_validation->run() != FALSE){
                       $response =$this->PO_Model->create_po();
                        if ($response) {
                                $this->session->set_flashdata('create_user_error', 'Purchase Order Successfully Created');
                        }else{
                                $this->session->set_flashdata('create_user_error', 'Fix the error please'); 
                        }

                }

                      
                
                redirect('PurchaseOrderCtrl/gen_manage/'.$id);
                }
        }

        public function branch_create_PO($id)
        {
                $this->branch_submit_PO($id);
                $title['title'] = "Create Purchase Order | iDrive Tutorial";
                $notif['count'] =$this->PR_Model->count_notif();
                $data['get_code'] =$this->PR_Model->get_pr_code();
                $data['select'] = $this->PR_Model->select_one($id);
                $data['view'] = $this->PR_Model->view_all_PR($id);
                $data['display_code'] =$this->PO_Model->auto_number_PO();
                $this->load->view('templates/header',$title);
                $this->load->view('branch_temp/navbar',$notif);
                $this->load->view('Purchase_Order/branch_create_PO',$data);
                $this->load->view('templates/footer');
                $this->load->view('templates/script');
        }

        public function branch_submit_PO($id){
                
                if ($this->input->post('submit_po')) {
                        $this->form_validation->set_rules('payment_terms','Payment terms','trim|required');

                if($this->form_validation->run() != FALSE){
                       $response =$this->PO_Model->create_po();
                        if ($response) {
                                $this->session->set_flashdata('create_user_error', 'Purchase Order Successfully Created');
                        }else{
                                $this->session->set_flashdata('create_user_error', 'Fix the error please'); 
                        }

                }

                      
                
                redirect('PurchaseOrderCtrl/branch_create_PO/'.$id);
                }
        }


        public function manage_PO()
        {
                $title['title'] = "Create Purchase Order | iDrive Tutorial";
                $config['base_url'] = base_url('PurchaseOrderCtrl/manage_PO');
                $this->pagination->initialize($config);
                $notif['count'] =$this->PR_Model->count_notif();
                $this->load->view('templates/header',$title);
                $this->load->view('templates/navbar',$notif);
                $this->load->view('Purchase_Order/manage_PO');
                $this->load->view('templates/footer');
                $this->load->view('Purchase_Request/purchase_script');
        }

        public function manage_search_po(){

	         $query ='';

                if ($this->input->post('query')) {
                        $query = $this->input->post('query');
                }
                $data = $this->PO_Model->manage_po($query);

                ?>
<div class="row">
    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
        <div class="card flex-fill " id="card">
            <table class="table table-hover my-0" id="table">
                <thead>

                    <tr>
                        <th class="text-center text-white" id="tbl_th">PO No.</th>
                        <th class="text-center text-white" id="tbl_th">Supplier</th>
                        <th class="text-center text-white" id="tbl_th">Date Issued</th>
                        <th class="text-center text-white" id="tbl_th">Action</th>


                    </tr>
                </thead>
                <tbody>



                    <?php if($data->num_rows()>0) { ?>
                    <?php if ($data) {

                            foreach ($data->result() as $row) {?>
                    <tr>

                        <td class="text-center"><?=$row->Purchase_order_No?></td>
                        <td class="text-center"><?=$row->supplier_name?></td>
                        <td class="text-center"><?=$row->date?></td>
                        <td class="text-center">
                            <a href="<?= site_url('PurchaseOrderCtrl/view_order/'.$row->PO_ID)?>"><i
                                    class="fa-solid fa-eye text-center fa-lg"></i></a>
                            <span>|</span>
                            <a href="<?= site_url('PurchaseOrderCtrl/print/'.$row->PO_ID);?>"
                                onclick="return confirm('Are you sure you want to print?')"><i
                                    class="fa-solid fa-print fa-lg"></i></a>
                        </td>

                    </tr>

                    <?php
                        }?>

                    <?php
                        }?>

                    <?php
                        }else{

                                ?>
                    <tr>
                        <td colspan="5" class="text-center">
                            <h5 class="text-danger">No Result Found</h5>
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

        public function view_ledger()
        {
                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('ledger/view_ledger');
                $this->load->view('templates/footer');
                $this->load->view('templates/script');
        }


        public function view_order($id)
        {
                
                $title['title'] = "View Purchase Order | iDrive Tutorial";
                $this->load->view('templates/header',$title);
                $notif['count'] =$this->PR_Model->count_notif();
                $data['view_po'] = $this->PO_Model->View_oder($id);
                $data['get_po'] = $this->PO_Model->get_po($id);
                $this->load->view('templates/navbar',$notif);
                 $this->load->view('Purchase_Order/View_PO',$data);
                $this->load->view('templates/footer');
                $this->load->view('templates/script');
             ;
        }


       public function print($id){
        $data['get_po'] = $this->PO_Model->get_po($id);
        $data['get_branch'] = $this->PO_Model->get_branch($id);
        $data['view_po'] = $this->PO_Model->View_oder($id);
      
        $html = $this->load->view('Purchase_Order/print_po',$data,true);
       
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML( $html);
        $mpdf->Output();

       }
}