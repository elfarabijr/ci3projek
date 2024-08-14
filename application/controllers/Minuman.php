<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Minuman extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Menu_model');
    $this->load->library('form_validation');
    $sesi = $this->session->userdata('nama');
    if(empty($sesi)){
      redirect('login');
    }

    $ctrl['ctrl'] = 'minuman';
    $this->session->set_userdata($ctrl);
  }

  public function index()
  {
    $idwr = $this->Menu_model->get_id_warung($this->session->userdata('iduser'));
    $minuman = $this->Menu_model->get_all('minuman',$idwr->idwarung);

    $data = array(
      'isi' => 'minuman/minuman_list',
      'minuman_data' => $minuman,
    );
    $this->load->view('template/index', $data);
    
  }

  public function read($id) 
  {
    $row = $this->Menu_model->get_by_id($id);
    if ($row) {
      $data = array(
        'idmenu' => $row->idmenu,
        'id_warung' => $row->id_warung,
        'nama' => $row->nama,
        'harga' => $row->harga,
        'kategori' => $row->kategori,
        'stock' => $row->stock,
      );
      $this->load->view('minuman/minuman_read', $data);
    } else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('minuman'));
    }
  }

  public function create() 
  {
    $data = array(
      'button' => 'Create',
      'action' => site_url('minuman/create_action'),
      'idmenu' => set_value('idmenu'),
      'isi' => 'minuman/minuman_form',
      'id_warung' => set_value('id_warung'),
      'nama' => set_value('nama'),
      'harga' => set_value('harga'),
      'kategori' => set_value('kategori'),
      'gambar' => set_value('gambar'),
      'stock' => set_value('stock'),
    );
    $this->load->view('template/index', $data);
  }
  
  public function create_action() 
  {
   $config['upload_path'] = './upload/menu/';    
   $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';   
   $config['overwrite'] = true; 
   $config['max_size']  = '4096';    
   $config['remove_space'] = TRUE;
   $config['file_name'] = $this->session->userdata('iduser').'mnm'.date('His');      

   $idwr = $this->Menu_model->get_id_warung($this->session->userdata('iduser'));
   $this->load->library('upload', $config); 

   if ($this->upload->do_upload('gambar')) {
    $upload_data = $this->upload->data();

    $data = array(
      'id_warung' => $idwr->idwarung,
      'nama' => $this->input->post('nama',TRUE),
      'harga' => $this->input->post('harga',TRUE),
      'kategori' => 'minuman',
      'gambar' => $upload_data['file_name'],
      'stock' => $this->input->post('stock',TRUE),
    );} else{
      $data = array(
        'id_warung' => $idwr->idwarung,
        'nama' => $this->input->post('nama',TRUE),
        'kategori' => 'minuman',
        'harga' => $this->input->post('harga',TRUE),
        'stock' => $this->input->post('stock',TRUE),
      );
    } 

    $this->Menu_model->insert($data);
    $this->session->set_flashdata('message', 'Create Record Success');
    redirect(site_url('minuman'));
  }

  public function update($id) 
  {
    $row = $this->Menu_model->get_by_id($id);
    $idwr = $this->Menu_model->get_id_warung($this->session->userdata('iduser'));
    if ($row) {
      $data = array(
        'button' => 'Update',
        'isi' => 'minuman/minuman_edit',
        'action' => site_url('minuman/update_action'),
        'idmenu' => set_value('idmenu', $row->idmenu),
        'id_warung' => set_value('id_warung', $row->id_warung),
        'kategori' => set_value('kategori','minuman'),
        'nama' => set_value('nama', $row->nama),
        'gbr' => set_value('gbr', $row->gambar),
        'harga' => set_value('harga', $row->harga),
        'stock' => set_value('stock', $row->stock),
      );
      $this->load->view('template/index', $data);
    } else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('minuman'));
    }
  }

  public function update_action() 
  {
    $idwr = $this->Menu_model->get_id_warung($this->session->userdata('iduser'));
    $data = array(
      'id_warung' => $idwr->idwarung,
      'nama' => $this->input->post('nama',TRUE),
      'harga' => $this->input->post('harga',TRUE),
      'stock' => $this->input->post('stock',TRUE),
    );
    $config['upload_path'] = './upload/menu';    
    $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';   
    $config['overwrite'] = true; 
    $config['max_size']  = '4096';    
    $config['remove_space'] = TRUE;
    $config['file_name'] = $this->session->userdata('iduser').'mnm'.date('His');      
    $this->load->library('upload', $config); // Load konfigurasi uploadnya

    if ($this->upload->do_upload('gambar')) {
      $upload_data = $this->upload->data();
      unlink('./upload/menu/'.$this->input->post('gbr'));
      $data['gambar'] = $upload_data['file_name'];
    }

    $this->Menu_model->update($this->input->post('idmenu', TRUE), $data);
    redirect(site_url('minuman'));
  }
  

  public function lihatmnm() 
  {
    $id = $this->input->post('id',TRUE);
    $data = $this->Menu_model->get_by_id($id);
    echo json_encode($data);
  }

  public function delete($id) 
  {
    $row = $this->Menu_model->get_by_id($id);

    if ($row) {
      unlink('./upload/menu/'.$row->gambar);
      $this->Menu_model->delete($id);
      redirect(site_url('minuman'));
    } else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('minuman'));
    }
  }

  public function _rules() 
  {
   $this->form_validation->set_rules('id_warung', 'id warung', 'trim|required');
   $this->form_validation->set_rules('nama', 'nama', 'trim|required');
   $this->form_validation->set_rules('harga', 'harga', 'trim|required');
   $this->form_validation->set_rules('stock', 'stock', 'trim|required');
   $this->form_validation->set_rules('gambar', 'gambar', 'trim|required');

   $this->form_validation->set_rules('idmenu', 'idmenu', 'trim');
   $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
 }

}

/* End of file Minuman.php */
/* Location: ./application/controllers/Minuman.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-02-10 08:29:30 */
/* http://harviacode.com */