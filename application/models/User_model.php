<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

    public function updateUserLogin($id, $email, $fname, $lname)
    {
        $data = array(
        	'email' => $email,
	        'fname' => $fname,
	        'lname' => $lname
		);
		
		$this->db->where('id', $id)
		    ->update('users', $data);
    }

    public function userExists($id)
    {
        $query = $this->db->where('id', $id)
            ->get('users');

        if($query->num_rows() > 0) {
            return true;
        }
        else {
            return false;
        }
    }
    
    public function get($id)
    {
        $query = $this->db->where('id', $id)
            ->get('users');
		
		$result = $query->result_array();
		
		return $result['0'];
    }

    public function delete($id)
    {
       $this->db->where('id', $id);
	   $this->db->delete('user');
    }
}
?>