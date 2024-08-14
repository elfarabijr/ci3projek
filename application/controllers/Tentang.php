<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {

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
		
		// $this->load->model('Login_model');

		// $this->session->set_flashdata('ctrl', 'utama');
		// $ctrl['ctrl'] = 'utama';
		// $this->session->set_userdata($ctrl);
	}

	public function index()
	{
		$data['isi'] = 'template/tentang';
		$this->load->view('shop/index', $data);
	}

}
