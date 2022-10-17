<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgotpassctrl extends CI_Controller {



	public function index()
	{
		
        $this->load->model('forgotmodel');
        $data['getuser'] = $this->forgotmodel->getuser();
        $this->load->view('Forgotpass/forgotpass-view',$data);
	}
    public function forgotpassword()
	{
		$this->load->view('Forgotpass/forgotlogin');
	}
}