<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$this->load->view('login');
	}

	function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');

		if($this->form_validation->run() != false){
			$where = array('username' => $username, 'password' => md5($password));

			$data = $this->m_rental->edit_data($where, 'admin');
			$d = $this->m_rental->edit_data($where, 'admin')->row();
			$cek = $data->num_rows();

			if($cek > 0){
				$session = array('id' => $d->id_admin, 'nama' => $d->nama_admin, 'status' => 'login');
				$this->session->set_userdata($session);
				redirect(base_url().'admin');
			}else {
				$dt = $this->m_rental->edit_data($where, 'customer');
				$hasil = $this->m_rental->edit_data($where, 'customer')->row();
				$proses = $dt->num_rows();

				if ($proses > 0) {
					$session = array('id_cst' => $hasil->id_customer, 'nama_cst' => $hasil->nama_customer, 'status' => 'login');
					$this->session->set_userdata($session);
					redirect(base_url().'member');

			}else{
				$this->session->set_flashdata('alert', 'Login gagal! Username atau password salah.');
				redirect(base_url());
			}
		}
	}else{
			$this->session->set_flashdata('alert', 'Anda Belum Mengisi Username atau Password');
			$this->load->view('login');
		}
	}

	public function signup(){
		$this->load->view('signup');
	}

	public function signup_act(){

      	$username = htmlspecialchars($this->input->post('username'));
      	$nama_customer = htmlspecialchars($this->input->post('nama_customer'));
      	$gender = htmlspecialchars($this->input->post('gender'));
      	$no_telp = htmlspecialchars($this->input->post('no_telp'));
      	$alamat = htmlspecialchars($this->input->post('alamat'));
      	$email = htmlspecialchars($this->input->post('email'));
      	$password = md5($this->input->post('password'));
      	$this->form_validation->set_rules('nama_customer','Nama Customer','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('no_telp','No.Telp','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');
		
		if ($this->form_validation->run() == FALSE){
			$data = array(
				'username' => $username,
				'nama_customer' => $nama_customer,
            	'gender' => $gender,
            	'no_telp' => $no_telp,
            	'alamat' => $alamat,
            	'email' => $email,
            	'password' => $password
			);
			
			$this->db->insert('customer', $data);
			redirect(base_url(). 'welcome/login');
		}else{
			$this->load->view('signup');
		
		}		
	}
}
