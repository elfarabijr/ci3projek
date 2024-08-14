<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Member extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Member_model');
        $this->load->library('form_validation');
        $ctrl['ctrl'] = 'member';
        $this->session->set_userdata($ctrl);
    }

    public function index()
    {

        $cari = urldecode($this->input->get('cari', TRUE));
        
        
        if ($cari <> '') {
            $config['base_url'] = base_url() . 'member/index.html?cari=' . urlencode($cari);
            $config['first_url'] = base_url() . 'member/index.html?cari=' . urlencode($cari);
        } else {
            $config['base_url'] = base_url() . 'member/index.html';
            $config['first_url'] = base_url() . 'member/index.html';
        }

        // $config['per_page'] = 10;
        $config['total_rows'] = $this->Member_model->total_rows($cari);
        $member = $this->Member_model->get_limit_data($cari);

        // $this->load->library('pagination');
        // $this->pagination->initialize($config);

        $data = array(
            'member_data' => $member,
            'isi' => 'member/member_list',
            // 'q' => $q,
            'cari' => $cari,
            'total_rows' => $config['total_rows'],
            // 'pagination' => $this->pagination->create_links(),
            // 'start' => $start,
        );
        $this->load->view('template/index', $data);
    }

    public function read($id) 
    {
        $row = $this->Member_model->get_by_id($id);
        if ($row) {
            $data = array(
              'kode_member' => $row->kode_member,
              'keterangan' => $row->keterangan,
          );
            $this->load->view('member/member_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('member'));
        }
    }

    public function create_action() 
    {
        $cari = urldecode($this->input->get('cari', TRUE));
        $em = $this->Member_model->getEmail($this->input->post('email'));
        if ($em) {
            $config['total_rows'] = $this->Member_model->total_rows($cari);
            $member = $this->Member_model->get_limit_data($cari);
            
            $data = array(
                'member_data' => $member,
                'msg' => TRUE,
                'isi' => 'member/member_list',
                'cari' => '',
                'total_rows' => $config['total_rows'],

            );
            $this->load->view('template/index', $data);
        }
        else{
            $data = array(
                'nama_lengkap' => $this->input->post('nama',TRUE),
                'email' => $this->input->post('email',TRUE),
                'alamat' => $this->input->post('alamat',TRUE),
                'gender' => $this->input->post('gender',TRUE),
            );

            $this->Member_model->simpan($data);

            $idm = $this->Member_model->getEmail($this->input->post('email'));
            $usr['id_member'] = $idm->id_member;
            $usr['password'] = md5($this->input->post('pass'));
            $this->load->model('Login_model');

            $this->Login_model->simpan($usr);
        // $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('member'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Member_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'isi' => 'member/member_form',
                'action' => site_url('member/update_action'),
                'kode_member' => set_value('kode_member', $row->kode_member),
                'keterangan' => set_value('keterangan', $row->keterangan),
            );
            $this->load->view('template/index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('member'));
        }
    }
    
    public function update_action() 
    {
        $data = array(
          'kode_member' => $this->input->post('kode_member',TRUE),
          'keterangan' => $this->input->post('keterangan',TRUE),
      );

        $this->Member_model->update($this->input->post('kode_member_lama', TRUE), $data);
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('member'));
    }
    
    public function delete($id) 
    {
        $this->load->model('Warung_model');
        $this->load->model('Menu_model');
        $row = $this->Warung_model->cek_warung($id);
        if ($row) {
            $sts['stat'] = 'Tersedia';
            $data = array(
              'idwarung' => $row->idwarung,
              'kode_member' => $row->pemilik,
              'letak' => $row->letak,

          );
            $this->Warung_model->delete_menu($data['idwarung']);
            $this->Warung_model->statusletak($data['letak'], $sts);
            $this->Member_model->delete_warung($id);
        }
        $this->Member_model->delete_keranjang($id);
        $this->Member_model->delete_user($id);
        $this->Member_model->delete($id);
        redirect(site_url('member')); 
    }

    public function _rules() 
    {
     $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

     $this->form_validation->set_rules('kode_member', 'kode_member', 'trim|required');
     $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
 }

}

/* End of file member.php */
/* Location: ./application/controllers/member.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-02-03 05:33:50 */
/* http://harviacode.com */