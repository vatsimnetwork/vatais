<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

    public function updateUserLogin($id, $time, $email, $fname, $lname, $rating)
    {
        $data = array(
        	'email' => $email,
	        'lastLogin' => $time,
	        'fname' => $fname,
	        'lname' => $lname,
	        'division' => $rating
		);
		
		$this->db->where('id', $id)
		    ->update('users', $data);
    }
    
    public function get($id)
    {
        $query = $this->db->where('id', $id)
            ->get('users');
		
		$result = $query->result_array();
		
		return $result['0'];
    }
    
    public function isAdmin($id)
    {
        $this->db->where('id', $id);
        $this->db->where('isadmin', '1');
        $query = $this->db->get('staff');
		
		if ($query->num_rows() > 0)
        {
	        return TRUE;
	    }
	    else
	    {
	        return FALSE;
	    }
    }
    
    public function isUnique($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('staff');
		
		if ($query->num_rows() > 0)
        {
	        return FALSE;
	    }
	    else
	    {
	        return TRUE;
	    }
    }
    
    public function delete($id)
    {
       $this->db->where('id', $id);
	   $this->db->delete('user');
    }
}
?>