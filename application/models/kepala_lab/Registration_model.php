<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration_model extends CI_Model
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

    function get_conditional_general($table, $id, $val)
    {
    	$this->db->where($id, $val);
    	$query = $this->db->get($table);
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

	function get_operator()
	{
		$query = $this->db->query("SELECT * FROM fd_operator,fd_users WHERE fd_operator.id = fd_users.users_user_id AND fd_users.users_role_id = '2'");
		return $query->result();
	}
	function get_operator_by_id($id)
	{
		$query = $this->db->query("SELECT * FROM fd_operator,fd_users WHERE fd_operator.id = fd_users.users_user_id AND fd_users.users_role_id = '2' AND fd_operator.id = '$id'");
		return $query->result();
	}
}
?>
