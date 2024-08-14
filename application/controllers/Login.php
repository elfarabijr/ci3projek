<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();

		$this->load->model('Login_model');
	}

	public function index()
	{
		$this->load->view('login_page');
	}

	public function regis()
	{
		$this->load->view('regis_page');
	}

	public function regisAkun()
	{
		$this->load->model('member_model','reg');
		$em = $this->reg->getEmail($this->input->post('email'));
		if ($em) {
			$pesan ="Email Telah Digunakan!!";
			$data = array(
				'eror' => $pesan,
				'ic' => 'fa-ban',
				'msg' => 'danger',
				'btn' => 'danger'
			);
			$this->load->view('regis_page',$data);
		}
		else {

			$data['nama_lengkap'] = $this->input->post('nama');
			$data['email'] = $this->input->post('email');

			$this->reg->simpan($data);

			$idm = $this->reg->getEmail($this->input->post('email'));
			$usr['id_member'] = $idm->id_member;
			$usr['password'] = md5($this->input->post('pass'));

			$this->Login_model->simpan($usr);

			redirect('login');	
		}
	}

	public function lupapass()
	{
		$this->load->view('lupa_page');
	}

	public function scren()
	{
		$this->load->view('scren');
	}

	public function cekscren()
	{
		$username = $this->session->userdata('username');
		$password = $this->input->post('pass');
		
		$data = $this->Login_model->cekLogin($username, $password);
		
		if($data){
			redirect('utama');

			// if($data->ket == 1){
			// 	$pesan ="Harap Menunggu Akun Anda diverifikasi";
			// 	$data = array(
			// 		'eror' => $pesan,
			// 		'ic' => 'fa-exclamation-triangle',
			// 		'msg' => 'warning',
			// 		'btn' => 'warning'
			// 	);
			// 	$this->load->view('login_page', $data);
			// }
			// else{
			// 	$newdata = array(
			// 		'username'  => $data->email,
			// 		'nama' => $data->nama_lengkap,
			// 		'status' => $data->ket,
			// 		'logged_in' => TRUE
			// 	);
			// 	$this->session->set_userdata($newdata);
			// 	redirect('utama');

			// }
		}
		else {
			$pesan ="Password anda tidak sesuai!!";
			$data = array(
				'eror' => $pesan,
				'ic' => 'fa-ban',
				'msg' => 'Error',
				'btn' => 'danger'
			);
			$this->load->view('scren', $data);
		}
	}

	public function cekUser()
	{
		$username = $this->input->post('email');
		$password = $this->input->post('pass');
		
		$data = $this->Login_model->cekLogin($username, $password);
		
		if($data){

			$newdata = array(
				'iduser'  => $data->id_member,
				'username'  => $data->email,
				'nama' => $data->nama_lengkap,
				'status' => $data->ket,
				'idwarung' => $data->idwarung,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($newdata);
			redirect('shop');

			// if($data->ket == 1){
			// 	$pesan ="Harap Menunggu Akun Anda diverifikasi";
			// 	$data = array(
			// 		'eror' => $pesan,
			// 		'ic' => 'fa-exclamation-triangle',
			// 		'msg' => 'warning',
			// 		'btn' => 'warning'
			// 	);
			// 	$this->load->view('login_page', $data);
			// }
			// else{
			// 	$newdata = array(
			// 		'username'  => $data->email,
			// 		'nama' => $data->nama_lengkap,
			// 		'status' => $data->ket,
			// 		'logged_in' => TRUE
			// 	);
			// 	$this->session->set_userdata($newdata);
			// 	redirect('utama');

			// }
		}
		else {
			$pesan ="username atau password anda salah!!";
			$data = array(
				'eror' => $pesan,
				'ic' => 'fa-ban',
				'msg' => 'Error',
				'btn' => 'danger'
			);
			$this->load->view('login_page', $data);
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('shop');		
	}
}
