<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Guest_model extends CI_Model
{

    public $table = 'pendaftaran';
    public $id = 'id_member';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
         $this->db->select('pendaftaran.*, member.nama_lengkap, letak.keterangan');
         $this->db->join('member','member.id_member = pendaftaran.idmember');
         $this->db->join('letak','letak.kode_letak = pendaftaran.letak');
        return $this->db->get($this->table)->result();
    }

        // get data by id member
    function get_by_id($id)
    {
        $this->db->where('idpendaftaran', $id);
        return $this->db->get('pendaftaran')->row();
    }


    // letak tersedia
    function get_tersedia()
    {
        $this->db->where('stat', 'Tersedia');
        return $this->db->get('letak')->result();
    }

    // get data by id member
    function cek_pendaftaran($id)
    {
        $this->db->where('idmember', $id);
        return $this->db->get('pendaftaran')->row();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert('pendaftaran', $data);
    }

     // get total rows
    function total_rows($q = NULL) {
        $this->db->like('idpendaftaran', $q);
        $this->db->or_like('idmember', $q);
        $this->db->or_like('letak', $q);
        $this->db->or_like('lamasewa', $q);
        $this->db->or_like('namawarung', $q);
        $this->db->or_like('no_hp', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function cekpas($id, $password)
    {
        $this->db->where("id_member='".$id."' and password='".md5($password)."'");
        return $this->db->get('user')->row();   //--- tabel dlm database 
    }

    function cekstatususer($id)
    {
        $this->db->where('id_member',$id);
        return $this->db->get('user')->row();   //--- tabel dlm database 
    }

    // update pass
    function update_pass($id, $data)
    {
        $this->db->where('id_member', $id);
        $this->db->update('user', $data);
    }

    // delete data pendaftaran
    function delete($id)
    {
        $this->db->where('idpendaftaran', $id);
        $this->db->delete($this->table);
    }

}
