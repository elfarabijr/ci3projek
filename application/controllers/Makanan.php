<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Makanan extends CI_Controller
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

        $ctrl['ctrl'] = 'makanan';
        $this->session->set_userdata($ctrl);
    }

    public function index()
    {
        $idwr = $this->Menu_model->get_id_warung($this->session->userdata('iduser'));
        $makanan = $this->Menu_model->get_all('makanan',$idwr->idwarung);

        $data = array(
            'isi' => 'makanan/makanan_list',
            'makanan_data' => $makanan,
        );
        $this->load->view('template/index', $data);
    }

    public function lihatmkn() 
    {
        $id = $this->input->post('id',TRUE);
        $data = $this->Menu_model->get_by_id($id);
        echo json_encode($data);
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('makanan/create_action'),
            'isi' => 'makanan/makanan_form',
            'idmenu' => set_value('idmenu'),
            'id_warung' => set_value('id_warung'),
            'nama' => set_value('nama'),
            'harga' => set_value('harga'),
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
        $config['file_name'] = $this->session->userdata('iduser').'mkn'.date('His');      
        
        // Load konfigurasi uploadnya
        $this->load->library('upload', $config); 
        $idwr = $this->Menu_model->get_id_warung($this->session->userdata('iduser'));

        if ($this->upload->do_upload('gambar')) {

            $upload_data = $this->upload->data();

            $data = array(
              'id_warung' => $idwr->idwarung,
              'nama' => $this->input->post('nama',TRUE),
              'harga' => $this->input->post('harga',TRUE),
              'stock' => $this->input->post('stock',TRUE),
              'gambar' => $upload_data['file_name'],
          );
        } else{
            $data = array(
              'id_warung' => $idwr->idwarung,
              'nama' => $this->input->post('nama',TRUE),
              'harga' => $this->input->post('harga',TRUE),
              'stock' => $this->input->post('stock',TRUE),
          );
        } 
        $this->Menu_model->insert($data);
        $this->session->set_flashdata('message', 'Create Record Success');
        redirect('makanan');

    }

    public function update($id) 
    {
        $row = $this->Menu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('makanan/update_action'),
                'isi' => 'makanan/makanan_edit',
                'idmenu' => set_value('idmenu', $row->idmenu),
                'id_warung' => set_value('id_warung', $row->id_warung),
                'nama' => set_value('nama', $row->nama),
                'harga' => set_value('harga', $row->harga),
                'stock' => set_value('stock', $row->stock),
                'gbr' => set_value('gbr', $row->gambar),
            );
            $this->load->view('template/index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('makanan'));
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
        $config['file_name'] = $this->session->userdata('iduser').'mkn'.date('His');     

        $this->load->library('upload', $config); // Load konfigurasi uploadnya

        if ($this->upload->do_upload('gambar')) {
            $upload_data = $this->upload->data();
            unlink('./upload/menu/'.$this->input->post('gbr'));
            $data['gambar'] = $upload_data['file_name'];
        }

        $this->Menu_model->update($this->input->post('idmenu', TRUE), $data);
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('makanan'));
    }

    public function delete($id) 
    {
        $row = $this->Menu_model->get_by_id($id);

        if ($row) {
            unlink('./upload/menu/'.$row->gambar);
            $this->Menu_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('makanan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('makanan'));
        }
    }

    public function _rules() 
    {
       $this->form_validation->set_rules('id_warung', 'id warung', 'trim|required');
       $this->form_validation->set_rules('nama', 'nama', 'trim|required');
       $this->form_validation->set_rules('harga', 'harga', 'trim|required');
       $this->form_validation->set_rules('stock', 'stock', 'trim|required');

       $this->form_validation->set_rules('idmenu', 'idmenu', 'trim');
       $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
   }

}

/* End of file Makanan.php */
/* Location: ./application/controllers/Makanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-02-10 08:28:14 */
/* http://harviacode.com */