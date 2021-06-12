<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }

    function get_general($table)
    {
    	$query = $this->db->get($table);
		return $query->result();
    }

    function get_by_id_general($table, $id, $val)
    {
    	$query = $this->db->where($id, $val)->get($table);
		return $query->result();
    }

	function create_general($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	function update_general($table, $id, $val, $data)
	{
		$this->db->where($id, $val);
		return $this->db->update($table, $data);
	}

	function delete_general($table, $id, $val)
	{
		$this->db->where($id, $val);
		return $this->db->delete($table);
	}

	function get_fakultas()
	{
		$query = $this->db->query('SELECT * FROM fakultas');
		return $query->result();
	}

	function get_rekrutmenfasilkomti()
	{
		$query = $this->db->query("SELECT * FROM rekrutmen WHERE id_fakultas = 14");
		return $query->result();
	}

	function get_rekrutmenfk()
	{
		$query = $this->db->query("SELECT * FROM rekrutmen WHERE id_fakultas = 1");
		return $query->result();
	}

	function get_rekrutmenfmipa()
	{
		$query = $this->db->query("SELECT * FROM rekrutmen WHERE id_fakultas = 2");
		return $query->result();
	}

	function get_rekrutmenfib()
	{
		$query = $this->db->query("SELECT * FROM rekrutmen WHERE id_fakultas = 3");
		return $query->result();
	}

	function get_rekrutmenfisip()
	{
		$query = $this->db->query("SELECT * FROM rekrutmen WHERE id_fakultas = 4");
		return $query->result();
	}

	function get_rekrutmenfp()
	{
		$query = $this->db->query("SELECT * FROM rekrutmen WHERE id_fakultas = 5");
		return $query->result();
	}

	function get_rekrutmenfkm()
	{
		$query = $this->db->query("SELECT * FROM rekrutmen WHERE id_fakultas = 6");
		return $query->result();
	}

	function get_rekrutmenfh()
	{
		$query = $this->db->query("SELECT * FROM rekrutmen WHERE id_fakultas = 7");
		return $query->result();
	}

	function get_rekrutmenff()
	{
		$query = $this->db->query("SELECT * FROM rekrutmen WHERE id_fakultas = 8");
		return $query->result();
	}

	function get_rekrutmenft()
	{
		$query = $this->db->query("SELECT * FROM rekrutmen WHERE id_fakultas = 9");
		return $query->result();
	}

	function get_rekrutmenfpsi()
	{
		$query = $this->db->query("SELECT * FROM rekrutmen WHERE id_fakultas = 10");
		return $query->result();
	}

	function get_rekrutmenfeb()
	{
		$query = $this->db->query("SELECT * FROM rekrutmen WHERE id_fakultas = 11");
		return $query->result();
	}

	function get_rekrutmenfkg()
	{
		$query = $this->db->query("SELECT * FROM rekrutmen WHERE id_fakultas = 12");
		return $query->result();
	}

	function get_rekrutmenfkp()
	{
		$query = $this->db->query("SELECT * FROM rekrutmen WHERE id_fakultas = 13");
		return $query->result();
	}

	function get_rekrutmenfhut()
	{
		$query = $this->db->query("SELECT * FROM rekrutmen WHERE id_fakultas = 15");
		return $query->result();
	}

}
?>
