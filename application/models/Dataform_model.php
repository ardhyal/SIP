<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataform_model extends CI_Model {

	/*
	 * ***************************************************************
	 * Script :
	 * Version :
	 * Date :
	 * Author : ardhyal
	 * Email : ardialhadi@gmail.com
	 * Description :
	 * ***************************************************************
	 */

	/**
	 * Description of Dashboard
	 *
	 * @author ardhyal
	 */

public $golongan;
public $jabatan;

public function __construct()
	{
		parent::__construct();
		$this->load->database();
  	}

// fungsi tampilkan semua berita
public function get_news()
{
	$query = $this->db->query('
							select news.id_news, news.post_date, news.publish_date, news.title, news.content, user.name
							from news join user on news.post_by = user.id_user
							');
	return $query->result();
}

// fungsi simpan data ke database
public function insert($data_form, $tipe )
        {
    if ($tipe == "golongan")
    {
        $this->db->insert('tbl_golongan', $data_form);
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
        
    }else if($tipe == "jabatan")
    {
        $this->db->insert('tbl_jabatan', $data_form);
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
    }
  	}
        
// fungsi simpan data ke database
public function update($data_form)
        {
    if ($data_form[0] == "golongan")
    {
        $this->db->where('id_golongan', $data_form[2]);
        $this->db->update('tbl_golongan', $data_form[1]);
        if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
        }else if($data_form[0] == "jabatan")
    {
        $this->db->where('id_jabatan', $data_form[2]);
        $this->db->update('tbl_jabatan', $data_form[1]);
        if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
    }
  	}
        
        
public function get_golongan(){
    $this->db->select('id_golongan, nm_golongan, desc_golongan');
    $this->db->from('tbl_golongan');
    return $this->db->get()->result();
}

public function get_jabatan(){
    $this->db->select('id_jabatan, nm_jabatan');
    $this->db->from('tbl_jabatan');
    return $this->db->get()->result();
}
}

