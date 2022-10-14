<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function __construct()
 	{
 		parent::__construct();

 		if (!$this->session->userdata('isLogIn')) 
        redirect(base_url());
	}

	public function index()
	{
		$data['page_title']='';
		$data['user']=$this->db->get_where('users',['id'=>$this->session->userdata('user')->id])->row();
		$data['content'] = $this->load->view('dashboard', $data, true);
		$this->load->view('template',$data);
	}
	public function settings()
	{
		$data['page_title']='Settings';
		$data['user']=$this->db->get_where('users',['id'=>$this->session->userdata('user')->id])->row();

		$data['content'] = $this->load->view('settings', $data, true);
		$this->load->view('template',$data);
	}
	public function logout(){
		$this->session->unset_userdata('isLogIn');
		redirect(base_url());
	}
	public function updateprofile()
	{
		$data=[
			'appid'=>$this->input->post('appid'),
			'apihash'=>$this->input->post('apihash')
		];
		$this->db->update('users',$data,array('id'=>$this->session->userdata('user')->id));
		redirect('home/settings');
	}
	public function runpy($params=null){
		system('python '.base_url().'/python/test.py', $return_value);
		echo $return_value; 
	}
	
	
}
