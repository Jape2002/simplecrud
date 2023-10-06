<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User_model extends Model {
	public function getUsers()
    {
        return $this->db->table('crud')->get_all();
    }
    public function searchUsers($id)
    {
        return $this->db->table('crud')->where('id', $id)->get();
    }
}
?>
