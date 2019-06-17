<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{ 
	public function __construct()
	{
		parent::__construct();
			$this->load->library('form_validation');

			
	}

	public function index()
	{
		$data['title'] = 'Login';
		$this->load->view('registrasi/header');
		$this->load->view('login');
		$this->load->view('registrasi/footer');
	}

	public function registration()
	{
		$this->form_validation->set_rules('name', 'Name','required|trim');
		$this->form_validation->set_rules('email', 'Email','required|trim|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password1', 'Password','required|trim|min_length[4]|matches[password2]',[
			'matches' => 'Password Tidak Sama!',
			'min_length' => 'Password Terlalu Pendek!']);
		$this->form_validation->set_rules('password2', 'Password','required|trim|matches[password1]');

		if($this->form_validation->run() == false) {

		$data['title'] = 'Registration';

		$this->load->view('templates/auth_header', $data);
		$this->load->view('registration');
		$this->load->view('templates/auth_footer');

	} else {
		$data = [
			'name' => htmlspecialchars($this->input->post('name', real)),
			'email' => htmlspecialchars($this->input->post('email', real)),
			'image' => 'default.jpg',
			'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
			'roll_id' => '2',
			'cek_aktif' => '1',
			'tgl_dibuat' => time()
		];

		$this->db->insert('user',$data);
		required('welcome/');
		
		}
	}
}