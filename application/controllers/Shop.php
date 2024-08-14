<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

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

		$this->load->model('Keranjang_model');
		$this->load->model('Invoice_model');
		$this->load->model('Menu_model');
	}

	public function index()
	{

		$data['makanan_data'] = $this->Menu_model->shop_get_all('makanan');
		// $data['makanan_fav'] = $this->Menu_model->getmakananfav();
		$data['minuman_data'] = $this->Menu_model->shop_get_all('minuman');
		// $data['minuman_fav'] = $this->Menu_model->getminumanfav();
		$data['isi'] = 'shop/home_page';
		$this->load->view('shop/index',$data);
	}

	function lihatmenu() 
	{
		$id = $this->input->post('id',TRUE);
		$data = $this->Menu_model->get_by_id($id);
		echo json_encode($data);
	}

	function jml_keranjang() 
	{
		$id = $this->session->userdata('iduser');
		$data = $this->Menu_model->jml_krjng($id);
		echo json_encode($data);
	}

	function cekout(){
		$id = $this->input->post('idmember',TRUE);
		$data['kode_invoice'] = 'INV'.$id.date('dmYHi');
		$data['total'] = $this->input->post('total_bayar',TRUE);
		$data['catatan'] = $this->input->post('catatan',TRUE);
		$data['id_user'] = $id;
		$krjdata['keterangan'] = 'cekout';
		$krjdata['kode_invoice'] = $data['kode_invoice'];
		// $data['item'] = $item;
		$this->Invoice_model->insert_invoice($data);
		$invoice_data = $this->Keranjang_model->cek_keranjang($id);	
		for($i=0;$i<sizeof($invoice_data);$i++){
			$this->Keranjang_model->update_keranjang($invoice_data[$i]->id_keranjang, $krjdata);
			// $item .= $invoice_data[$i]->id_keranjang.", ";
		}
		$content['item_data'] = $this->Keranjang_model->get_item_invoice($data['kode_invoice']);	
		$content['invoice_data'] = $this->Invoice_model->get_invoice_byid($data['kode_invoice']);
		$content['isi'] = 'shop/invoice';
		$this->load->view('shop/index',$content);
	}

	function lihatkeranjang(){
		$id = $this->session->userdata('iduser');
		if (!empty($id)) {
			$data['keranjang_data'] = $this->Keranjang_model->cek_keranjang($id);
		} 
		$data['isi'] = 'shop/keranjang';
		$this->load->view('shop/index',$data);
	}

	function pesanan(){
		$id = $this->session->userdata('iduser');
		if (!empty($id)) {
			$data['pesanan_data'] = $this->Invoice_model->get_by_user($id);
			// $data['item_data'] = $this->Keranjang_model->cek_keranjang($id);
		} 
		$data['isi'] = 'shop/pesanan';
		$this->load->view('shop/index',$data);
	}

	function detailpesanan($id){
		$content['item_data'] = $this->Keranjang_model->get_item_invoice($id);	
		$content['invoice_data'] = $this->Invoice_model->get_invoice_byid($id);
		$content['isi'] = 'shop/invoice';
		$this->load->view('shop/index',$content);
	}

	function addkeranjang(){
		$data = array(
			'id_member' => $this->input->post('id_member',TRUE),
			'idmenu' => $this->input->post('id_barang',TRUE),
			'qtty' => $this->input->post('qtty',TRUE),
		);
		$this->Keranjang_model->insert($data);
	}

	function hapusitem($id) 
	{
		$this->Keranjang_model->delete($id);
		redirect('shop/lihatkeranjang');
	}
	
}