<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Keranjang_model extends CI_Model
{

    public $table = 'keranjang';
    public $id = 'id_keranjang';
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

    function get_tersedia()
    {
        $this->db->where('stat', 'Tersedia');
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function cek_keranjang($id)
    {
        $this->db->join('menu','menu.idmenu = keranjang.idmenu');
        $this->db->where('id_member', $id);
        $this->db->where('keterangan', 'keranjang');
        return $this->db->get('keranjang')->result();
    }

     // get item by kode_invoice
    function get_item_invoice($kd)
    {
        $this->db->join('menu','menu.idmenu = keranjang.idmenu');
        $this->db->where('kode_invoice', $kd);
        return $this->db->get('keranjang')->result();
    }

    // update status keterangan & kode invoice
    function update_keranjang($id, $data)
    {
        $this->db->where('id_keranjang', $id);
        $this->db->update($this->table, $data);
    }

    // insert data
    function insert($data)
    {
        $this->db->insert('keranjang', $data);
    }

     function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}
