<?php
class Org_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function validate($email,$password)
    {	
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$this->db->where('active',1);
		$query = $this->db->get('organization');
		
		$result = $query->row();
		
		if(isset($result))
		{
			$return_data = array(
				'name' => $result->name,
				'email' => $result->email
			);
			
			return $return_data ;	
		}
		else
		{
			return NULL;
		}	
    }
	
	function verify($email,$hash)
	{
		$this->db->where('email', $email);
		$this->db->where('hash', $hash);
		$query = $this->db->get('organization');
		
		$result=$query->row();
		
		if(isset($result))
		{
			$this->db->where('email', $email);
			$this->db->where('hash', $hash);
			$this->db->where('active',0);
			$this->db->set('active', 1);
			$this->db->update('organization'); 
			return '1';
			//echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
		}
		else
		{
			return '0';
			//echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
		}
	}
	
	function add_org($user_data)
	{
		$this->db->insert('organization',$user_data);
	}
	
	function post_internship($post_data)
	{
		$this->db->insert('internship_post',$post_data);
	}	
}
?>