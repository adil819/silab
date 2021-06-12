<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
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

    function delete_all($table)
    {
        return $this->db->empty_table($table);
    }
}
?>
