<?php

class M_manag extends CI_Model
{
	public function cek()
	{
		// $this->db->where('merek',$this->input->post('merek'));
		// $query = $this->db->get('tb_merek');
		$query = $this->db->get_where('tb_merek', ['merek' => $this->input->post('merek')]);
		$result = $query->num_rows();
		return $result;
	}

	public function cekMobil()
	{
		return $this->db->get_where('tb_mobil', ['nama' => $this->input->post('mobil')])->num_rows();
	}

	public function addMobil($data)
	{
		$query = $this->db->insert('tb_mobil', $data);
		return $query;
	}

	public function add_merek($data)
	{
		$query = $this->db->insert('tb_merek', $data);
		return $query;
	}

	public function getAllMerek()
	{
		$query = $this->db->get('tb_merek')->result_array();
		return $query;
	}

	public function getAllMobil()
	{
		$query = $this->db->query('Select * FROM tb_mobil JOIN tb_merek ON tb_merek.id_merek=tb_mobil.merek_id ORDER BY tb_mobil.id DESC')->result_array();

		return $query;
	}

	public function deleteMobil($id)
	{
		$query = $this->db->delete('tb_mobil', ['id' => $id]);
		return $query;
	}

	public function updateMobil($data)
	{
		$query = $this->db->replace('tb_mobil', $data);
		return $query;
	}

	public function getLink($link)
	{
		$query = $this->db->get_where('blog', ['path' => $link])->row_array();
		return $query;
	}

	public function getAllBlog()
	{
		$query = $this->db->get('blog')->result_array();
		return $query;
	}
}
