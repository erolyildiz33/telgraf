<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


	public function __construct()
 	{
 		parent::__construct();

 		if ($this->session->userdata('isLogIn')) 
        redirect('home');
	}

	public function index()
	{
		$this->load->view('login');
	}
	public function login()
	{
		$data=['email'=>$this->input->post('username'),'password'=>md5($this->input->post('password'))];
		if($this->db->get_where('users',$data)->result()) {
			$this->session->set_userdata('isLogIn',true);
			$this->session->set_userdata('user',$this->db->get_where('users',$data)->row());
			redirect('home');
		}else {
			$this->session->set_flashdata('error','Incorrect Email or Password!');
			redirect(base_url());
		}
	}

}
