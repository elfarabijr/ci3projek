<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member_model extends CI_Model
{
	public $table = 'member';
	public $id = 'id_member';
	public $order = 'DESC';

	function getEmail($em)
	{
		$this->db->select('id_member');
		$this->db->where('email', $em);
		return $this->db->get('member')->row();
	}

	function simpan($data)
	{
		$this->db->insert('member', $data);
	}

	function total_rows($q = NULL) {
		$this->db->like('id_member', $q);
		$this->db->or_like('nama_lengkap', $q);
		$this->db->or_like('email', $q);
		$this->db->or_like('gender', $q);
		$this->db->or_like('alamat', $q);
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

    // get data with limit and search
	function get_limit_data($q = NULL) {
		$this->db->order_by($this->id, $this->order);
		// $this->db->like('id_member', $q);
		$this->db->or_like('nama_lengkap', $q);
		$this->db->or_like('email', $q);
		$this->db->or_like('gender', $q);
		$this->db->or_like('alamat', $q);
		// $this->db->where('id_member > ', 1);
        return $this->db->get($this->table)->result();

	}

	// delete data di tabel member
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    // delete data di tabel user
    function delete_keranjang($id)
    {
        $this->db->where('$this->id', $id);
        $this->db->delete('keranjang');
    }

    // delete data di tabel user
    function delete_user($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete('user');
    }

    // delete data di tabel warung
    function delete_warung($id)
    {
        $this->db->where('pemilik', $id);
        $this->db->delete('warung');
    }
}
