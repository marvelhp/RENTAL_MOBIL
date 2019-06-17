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

	function tambah_customer(){
		$this->load->view('registrasi/header');
		$this->load->view('registrasi/tambahcustomer');
		$this->load->view('registrasi/footer');
	}

	function tambah_customer_act(){
		$nama = $this->input->post('nama_customer');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$repassword = $this->input->post('repassword');
		$gender = $this->input->post('gender');
		$notelp = $this->input->post('notelp');
		$alamat = $this->input->post('alamat');
		$email = $this->input->post('email');
		
		$this->form_validation->set_rules('nama_customer','Nama Customer','required');
		$this->form_validation->set_rules('email','Email','required');
		if($this->form_validation->run() != false){
			$data = array(
				'nama_customer' => $nama,
				'username'	=> $username,
				'password' => $password,
				'gender' => $gender,
				'no_telp' => $notelp,
				'alamat' => $alamat,
				'email' => $email
			);
		
			$this->m_rental->insert_data($data,'customer');
			redirect(base_url().'welcome/login');
		}else{
			$this->load->view('registrasi/header');
			$this->load->view('registrasi/tambahcustomer');
			$this->load->view('registrasi/footer');
		}
	}
 
		
	}
}