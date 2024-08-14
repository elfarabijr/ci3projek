<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
        // $this->login = $this->load->database('login', TRUE);
        // $this->sipesat = $this->load->database('sipesat', TRUE);
    }

	public function cekLogin($username, $password)
	{
		$this->db->select('member.*, user.ket, warung.idwarung');
		$this->db->where("member.email='".$username."' and password='".md5($password)."'");
		$this->db->join('member', 'member.id_member = user.id_member');			
		$this->db->join('warung', 'member.id_member = warung.pemilik','left');			
		return $this->db->get('user')->row();	//--- tabel dlm database 

	}

	function simpan($data)
	{
		$this->db->insert('user', $data);
	}



}
?>