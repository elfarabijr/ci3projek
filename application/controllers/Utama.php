<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utama extends CI_Controller {

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
		// $idusr = $this->session->userdata('iduser');
		if ($this->session->userdata('status') == '' ) {
			redirect('login');
		}

		$this->load->model('Guest_model');
		$this->load->model('Letak_model');
		$this->load->model('Warung_model');

		$this->session->set_flashdata('ctrl', 'utama');
		// $ctrl['ctrl'] = 'utama';
		// $this->session->set_userdata($ctrl);
	}

	public function index()
	{

		if ($this->session->userdata('status') == 1) {

			$cek = $this->Guest_model->cek_pendaftaran($this->session->userdata('iduser'));
			if ($cek) {
				$data['data_daftar'] = $cek;
				$data['isi'] = 'template/dash_guest';
			} else {
				$data['tempat'] = $this->Letak_model->get_tersedia();
				$data['isi'] = 'template/dash_guest';
			}

		} else {
			$cek = $this->Guest_model->cek_pendaftaran($this->session->userdata('iduser'));
			$row = $this->Warung_model->get_profil($this->session->userdata('iduser'));
			if ($row) {
				$data = array(
					// 'warung_data' => $row,
					'orderan_data' => $this->Warung_model->get_order_by_idwarung($row->idwarung),
					'jml_produk' => $this->Warung_model->get_jml_produk($row->idwarung),
					'jml_orderan' => $this->Warung_model->get_jml_order($row->idwarung),
					'jml_terjual' => $this->Warung_model->get_jml_terjual($row->idwarung),
					'isi' => 'template/isi',
				);
			} elseif ($cek) {
				$data['data_daftar'] = $cek;
				$data['isi'] = 'template/dash_guest';
			}
			else {
				$data['tempat'] = $this->Letak_model->get_tersedia();
				$data['isi'] = 'template/dash_guest';
			}
		}
		$this->load->view('template/index', $data);
	}

	function daftar() 
	{

		$data = array(
			'idmember' => $this->session->userdata('iduser'),
			'namawarung' => $this->input->post('nama_warung',TRUE),
			'no_hp' => $this->input->post('no_hp',TRUE),
			'lamasewa' => $this->input->post('lamasewa',TRUE),
			'letak' => $this->input->post('letak',TRUE),
		);

		$this->Guest_model->insert($data);
		// echo "berhasilll";
		// $this->session->set_flashdata('message', 'Create Record Success');
		redirect('utama');
	}


	function form_password() 
	{
		$this->session->set_flashdata('ctrl', 'ubahpass');

		$data['isi'] = 'form_pass';
		$this->load->view('template/index', $data);
	}

	function passcek()
	{
		$id = $this->input->post('id');
		$password = $this->input->post('pas');
		
		$data = $this->Guest_model->cekpas($id, $password);
		echo json_encode($data);
	}

	function ubah_password() 
	{
		$id = $this->input->post('id');
		$data['password'] = md5($this->input->post('pass'));
		$this->Guest_model->update_pass($id,$data);
	}
}
