<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Warung extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Guest_model');
        $this->load->model('Warung_model');
        $this->load->library('form_validation');

        $sesi = $this->session->userdata('nama');
        if(empty($sesi)){
            redirect('login');
        }

        $ctrl['ctrl'] = 'warung';
        $this->session->set_userdata($ctrl);
    }

    public function index()
    {
        $sesi = $this->session->userdata('status');
        if($sesi == 3){


            $q = urldecode($this->input->get('q', TRUE));
            $cari = urldecode($this->input->get('cari', TRUE));
            $start = intval($this->input->get('start'));

            if ($q <> '') {
                $config['base_url'] = base_url() . 'letak/index.html?q=' . urlencode($q);
                $config['first_url'] = base_url() . 'letak/index.html?q=' . urlencode($q);
            } else {
                $config['base_url'] = base_url() . 'letak/index.html';
                $config['first_url'] = base_url() . 'letak/index.html';
            }

            $config['per_page'] = 10;
            $config['page_query_string'] = TRUE;
            $config['total_rows'] = $this->Warung_model->total_rows($cari);
            $warung = $this->Warung_model->get_limit_data($config['per_page'], $start, $cari);

            $this->load->library('pagination');
            $this->pagination->initialize($config);

            $data = array(
                'warung_data' => $warung,
                'isi' => 'warung/warung_list',
                'q' => $q,
                'pagination' => $this->pagination->create_links(),
                'cari' => $cari,
                'total_rows' => $config['total_rows'],
                'start' => $start,
            );
            $this->load->view('template/index', $data);
        } else {
            $this->profil();
        }
    }

    function pendaftar() 
    {

        $r = $this->Guest_model->get_all();
        
        $q = urldecode($this->input->get('q', TRUE));
        $cari = urldecode($this->input->get('cari', TRUE));
        // $start = intval($this->input->get('start'));
        $config['total_rows'] = $this->Guest_model->total_rows($cari);
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'letak/pendaftar.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'letak/pendaftar.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'letak/pendaftar.html';
            $config['first_url'] = base_url() . 'letak/pendaftar.html';
        }
        $data = array(
            'warung_data' => $r,
            'isi' => 'warung/pendaftaran_list',
            'q' => $q,
            'cari' => $cari,
            'total_rows' => $config['total_rows'],
        );
        $this->load->view('template/index', $data);

    }

    public function profil() 
    {
        $row = $this->Warung_model->get_profil($this->session->userdata('iduser'));
        if ($row) {
            $data = array(
              'warung_data' => $row,
              'jml_produk' => $this->Warung_model->get_jml_produk($row->idwarung),
              'jml_terjual' => $this->Warung_model->get_jml_terjual($row->idwarung),
              'isi' => 'warung/profil_warung',
          );
        } else {
            $this->load->model('Letak_model');
            $data['tempat'] = $this->Letak_model->get_tersedia();
            $data['isi'] = 'template/dash_guest';
        }
        $this->load->view('template/index', $data);
    }

    public function ubah($id) 
    {
        $row = $this->Warung_model->get_by_id($id);
        $data = array(
            'warung_data' => $row,
            'isi' => 'warung/warung_form',
        );
        $this->load->view('template/index', $data);   
    }


    public function read($id) 
    {
        $row = $this->Warung_model->get_by_id($id);
        if ($row) {
            $data = array(
              'idwarung' => $row->idwarung,
              'pemilik' => $row->pemilik,
              'nama_warung' => $row->nama_warung,
              'letak' => $row->letak,
          );
            $this->load->view('warung/warung_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('warung'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('warung/create_action'),
            'idwarung' => set_value('idwarung'),
            'pemilik' => set_value('pemilik'),
            'nama_warung' => set_value('nama_warung'),
            'letak' => set_value('letak'),
        );
        $this->load->view('warung/warung_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
              'pemilik' => $this->input->post('pemilik',TRUE),
              'nama_warung' => $this->input->post('nama_warung',TRUE),
              'letak' => $this->input->post('letak',TRUE),
          );

            $this->Warung_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('warung'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Warung_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('warung/update_action'),
                'idwarung' => set_value('idwarung', $row->idwarung),
                'pemilik' => set_value('pemilik', $row->pemilik),
                'nama_warung' => set_value('nama_warung', $row->nama_warung),
                'letak' => set_value('letak', $row->letak),
            );
            $this->load->view('warung/warung_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('warung'));
        }
    }

    public function ubah_action() 
    {
        $data = array(
          'nama_warung' => $this->input->post('nama_warung',TRUE),
          'no_hp' => $this->input->post('no_hp',TRUE),
      );

        $this->Warung_model->update($this->input->post('idwarung', TRUE), $data);
        redirect('warung/profil');
        
    }

    // hapus pendaftar
    public function deletependaftar($id) 
    {
        $this->Guest_model->delete($id);
        $this->pendaftar();
    }

    // hapus warung
    public function delete($id) 
    {
        $row = $this->Warung_model->get_by_id($id);
        if ($row) {
            $data = array(
              'pemilik' => $row->pemilik,
              'no_hp' => $row->no_hp,
              'nama_warung' => $row->nama_warung,
              'lama_sewa' => $row->lama_sewa,
              'letak' => $row->letak,
          );
            $stusr['ket'] = 1;
            $sts['stat'] = 'Tersedia';
            
            $this->Warung_model->statusletak($data['letak'], $sts);
            $this->Warung_model->statususer($data['pemilik'], $stusr);
            $this->Warung_model->delete($id);
            $this->index();      
        }
    }

    function verif($id) {

      $row = $this->Guest_model->get_by_id($id);
      if ($row) {
        $data = array(
          'pemilik' => $row->idmember,
          'no_hp' => $row->no_hp,
          'nama_warung' => $row->namawarung,
          'lama_sewa' => $row->lamasewa,
          'letak' => $row->letak,
      );
        $usr = $this->Guest_model->cekstatususer($row->idmember);
        if ($usr->ket == 3) {
            $stusr['ket'] = 3;
        }else{
            $stusr['ket'] = 2;
        }
        $sts['stat'] = 'Ditempati';
        $this->Warung_model->insert($data);
        $this->Warung_model->statusletak($data['letak'], $sts);
        $this->Warung_model->statususer($data['pemilik'], $stusr);
        $this->Guest_model->delete($id);
        $this->pendaftar();
    }
}

public function _rules() 
{
 $this->form_validation->set_rules('pemilik', 'pemilik', 'trim|required');
 $this->form_validation->set_rules('nama_warung', 'nama warung', 'trim|required');
 $this->form_validation->set_rules('letak', 'letak', 'trim|required');

 $this->form_validation->set_rules('idwarung', 'idwarung', 'trim');
 $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
}

}

/* End of file Warung.php */
/* Location: ./application/controllers/Warung.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-02-10 09:01:19 */
/* http://harviacode.com */