<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CarCtrl extends CI_Controller {

    public function __construct(){
        parent:: __construct();
        $this->load->model('Manager_model');
		$is_logged_in = $this->Manager_model->is_user_logged_in();
		
	if (!$is_logged_in) {
		redirect('Accounts/login');
	}
        $this->load->model('PR_Model');
        $this->load->model('Car_Model');
		
    }

	public function index()
	{
		$gen_notif['count'] =$this->PR_Model->count_notif();
		$data['title'] = "Car | iDrive Tutorial";
        $this->load->view('templates/header',$data);
        $this->load->view('templates/navbar',$gen_notif);
		$this->load->view('Car_Module/Manage_Car');
        $this->load->view('templates/footer');
		$this->load->view('Car_Module/car_script');
		
	}

    public function add_car(){
        $this->submit_car();
        $gen_notif['count'] =$this->PR_Model->count_notif();
		$data['title'] = "Car | iDrive Tutorial";
        $this->load->view('templates/header',$data);
        $this->load->view('templates/navbar',$gen_notif);
		$this->load->view('Car_Module/add_car');
        $this->load->view('templates/footer');
		$this->load->view('Car_Module/car_script');

    }

    
    public function branch_add_car(){
        $this->submit_car();
        $gen_notif['count'] =$this->PR_Model->count_notif();
		$data['title'] = "Car | iDrive Tutorial";
        $this->load->view('templates/header',$data);
        $this->load->view('branch_temp/navbar',$gen_notif);
		$this->load->view('Car_Module/add_car');
        $this->load->view('templates/footer');
		$this->load->view('Car_Module/car_script');

    }
    public function submit_car(){
        if ($this->input->post('addcar')) {

            $this->form_validation->set_rules('plate_no','Plate No.','trim|required|is_unique[tbl_car.plate_no]');
            $this->form_validation->set_rules('brand', 'Brand', 'trim|required|callback_alpha_character');
            $this->form_validation->set_rules('color', 'Color', 'trim|required|callback_alpha_character');
            $this->form_validation->set_rules('VIN','VIN','trim|required|is_unique[tbl_car.VIN]');
            if($this->form_validation->run() != FALSE){

                $response = $this->Car_Model->add_car();
                
                if ($response) {
    
                    $this->session->set_flashdata('create_user_success', 'Successfully Created!');
                    //redirect('UserCtrl/create_user');
                }else{
                    $this->session->set_flashdata('create_user_error', 'Create Failed!');
    
                }
                if ($_SESSION['Position'] == "gen_manager"){

                    redirect('CarCtrl/add_car');

                }elseif($_SESSION['Position'] == "manager"){}
                redirect('CarCtrl/branch_add_car');
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

    public function update_car($id){
        $this->submit_update_car($id);
        $gen_notif['count'] =$this->PR_Model->count_notif();
		$data['title'] = "Car | iDrive Tutorial";
        $data['getcar'] =$this->Car_Model->getcar($id);
        $this->load->view('templates/header',$data);
        $this->load->view('templates/navbar',$gen_notif);
		$this->load->view('Car_Module/update_car',$data);
        $this->load->view('templates/footer');
		$this->load->view('Car_Module/car_script');
    }

    public function branch_update_car($id){
        $this->submit_update_car($id);
        $gen_notif['count'] =$this->PR_Model->count_notif();
		$data['title'] = "Car | iDrive Tutorial";
        $data['getcar'] =$this->Car_Model->getcar($id);
        $this->load->view('templates/header',$data);
        $this->load->view('branch_temp/navbar',$gen_notif);
		$this->load->view('Car_Module/update_car',$data);
        $this->load->view('templates/footer');
		$this->load->view('Car_Module/car_script');
    }
    public function submit_update_car($id){
        if ($this->input->post('Updatecar')) {

            $this->form_validation->set_rules('plate_no','Plate No.','trim|required|is_unique[tbl_car.plate_no]');
            $this->form_validation->set_rules('brand', 'Brand', 'trim|required|callback_alpha_character');
            $this->form_validation->set_rules('color', 'Color', 'trim|required|callback_alpha_character');
            $this->form_validation->set_rules('VIN','VIN','trim|required');
            if($this->form_validation->run() != FALSE){

                $response = $this->Car_Model->update_car();
                
                if ($response) {
    
                    $this->session->set_flashdata('create_user_success', 'Successfully Updated!');
                    //redirect('UserCtrl/create_user');
                }else{
                    $this->session->set_flashdata('create_user_error', 'Update Failed!');
    
                }
             if ($_SESSION['Position'] == "gen_manager"){

                    redirect('CarCtrl/update_car/'.$id);
                    
                }elseif($_SESSION['Position'] == "manager"){}
                redirect('CarCtrl/branch_update_car/'.$id);
                }
						
        }
    }
    public function search_car(){
        $query ='';

        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
    
        $data = $this->Car_Model->search_car($query);
?>
<div class="row">
    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
        <div class="card flex-fill " id="card">
            <table class="table table-hover my-0" id="table">
                <thead>
                    <tr>
                        <th class="text-center text-white" id="tbl_th">Plate No.</th>
                        <th class="text-center text-white" id="tbl_th">Brand</th>
                        <th class="text-center text-white" id="tbl_th">Color</th>
                        <th class="text-center text-white" id="tbl_th">VIN</th>
                        <th class="text-center text-white" id="tbl_th">Action</th>
                    </tr>

                    <?php if ($data->num_rows()>0) {
                           foreach ($data->result() as $row) {
                           ?>
                    <tr>
                        <td class="text-center"><?=$row->plate_no?></td>
                        <td class="text-center"><?=$row->brand?></td>
                        <td class="text-center"><?=$row->color?></td>
                        <td class="text-center"><?=$row->VIN?></td>


                        <td class="text-center">
                            <?php if ($_SESSION['Position'] == "gen_manager"){?>
                            <a href="<?= site_url('carCtrl/update_car/'.$row->car_id);?>"><i
                                    class="fa-regular fa-pen-to-square text-center fa-lg"></i></a>
                            <span>|</span>
                            <a href="<?= site_url('CarCtrl/delete_car/'.$row->car_id);?>"
                                onclick="return confirm('Are you sure you want to delete?')"><i
                                    class="fa-solid fa-trash fa-lg"></i></a>
                            <?php }elseif($_SESSION['Position'] == "manager")?>

                            <a href="<?= site_url('carCtrl/branch_update_car/'.$row->car_id);?>"><i
                                    class="fa-regular fa-pen-to-square text-center fa-lg"></i></a>
                            <span>|</span>
                            <a href="<?= site_url('CarCtrl/branch_delete_car/'.$row->car_id);?>"
                                onclick="return confirm('Are you sure you want to delete?')"><i
                                    class="fa-solid fa-trash fa-lg"></i></a>

                            <?php
                           }

                        } else{

                            ?>
                        </td>

                    </tr>

                    <td colspan="5">
                        <h5 class="text-center text-danger">No Data Found</h5>
                    </td>
                    <?php
                        }?>
                </thead>
                <tbody>

                </tbody>
                <?php
    }


    public function delete_car($id){

		
        $response = $this->Car_Model->delete_car($id);
        if ($response) 
            {
                $this->session->set_flashdata('create_user_success','Successfully Deleted!');
            }
            else
            {
            $this->session->set_flashdata('create_user_error',' Delete Failed!');//display message        
            }
        redirect('CarCtrl/');
   
    }


    public function branch_delete_car($id){

		
        $response = $this->Car_Model->delete_car($id);
        if ($response) 
            {
                $this->session->set_flashdata('create_user_success','Successfully Deleted!');
            }
            else
            {
            $this->session->set_flashdata('create_user_error',' Delete Failed!');//display message        
            }
        redirect('CarCtrl/branch_car');
   
    }





    public function branch_car(){

        $gen_notif['count'] =$this->PR_Model->count_notif();
		$data['title'] = "Car | iDrive Tutorial";
        $this->load->view('templates/header',$data);
        $this->load->view('branch_temp/navbar',$gen_notif);
		$this->load->view('Car_Module/Manage_Car');
        $this->load->view('templates/footer');
		$this->load->view('Car_Module/car_script');
    }
}