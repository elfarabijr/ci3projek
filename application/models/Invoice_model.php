<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Invoice_model extends CI_Model
{

    public $table = 'invoice';
    public $id = 'kode_invoice';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }


     function get_by_user($id)
    {
        // $this->db->select('invoice.*, member.nama_lengkap, member.email');
        // $this->db->join('member','member.id_member = invoice.id_user');
        $this->db->where('id_user', $id);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get by kode invoice
    function get_invoice_byid($id)
    {
        $this->db->select('invoice.*, member.nama_lengkap, member.email');
        $this->db->join('member','member.id_member = invoice.id_user');
        $this->db->where('kode_invoice', $id);
        return $this->db->get($this->table)->row();
    }

    // insert data
    function insert_invoice($data)
    {
        $this->db->insert('invoice', $data);
    }

     function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function get_invoice_terakhir($id)
    {
        $this->db->select('invoice.*, member.nama_lengkap, member.email');
        $this->db->join('member','member.id_member = invoice.id_user');
        $this->db->where('id_user', $id);
        $this->db->order_by($this->id, $this->order);
        $this->db->limit(1);
        return $this->db->get($this->table)->row();
    }


}
