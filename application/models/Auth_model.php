<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }

    function create_general($table, $data)
    {
        return $this->db->insert($table, $data);
	}

	function get_user($username)
	{
		$this->db->where('users_username', $username);
    $query = $this->db->get('fd_users');
		return $query->result();
	}

	function get_media_limit_3()
	{
		$query = $this->db->query('SELECT * FROM fd_media, fd_media_kategori WHERE fd_media.media_med_kat_id = fd_media_kategori.med_kat_id ORDER BY fd_media.media_created_time desc LIMIT 5');
		return $query->result();
	}

	function get_password($password, $table)
	{
		$this->db->like('password', $password);
    	$query = $this->db->get($table);

		return $query->row();
	}

	function get_nama($table)
	{
		$query = $this->db->get($table);

		return $query->row();
	}

	function get_username($new)
	{
		return $query = $this->db->query("SELECT users_username FROM fd_users WHERE users_username = '$new'")->result();
	}

	function get_username_reseller($users_username)
    {
        $this->db->like('users_username',$users_username);
        $query = $this->db->get('fd_users');
        return $query->result();
    }

    function get_username_mitra($users_username)
    {
        $this->db->like('users_username',$users_username);
        $query = $this->db->get('fd_users');
        return $query->result();
    }

    function get_username_distributor($users_username)
    {
        $this->db->like('users_username',$users_username);
        $query = $this->db->get('fd_users');
        return $query->result();
    }

    function get_username_ld($users_username)
    {
        $this->db->like('users_username',$users_username);
        $query = $this->db->get('fd_users');
        return $query->result();
    }

    function get_username_customer($users_username)
    {
        $this->db->like('users_username',$users_username);
        $query = $this->db->get('fd_users');
        return $query->result();
    }

}
?>
