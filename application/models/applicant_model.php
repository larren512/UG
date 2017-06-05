<?php
class applicant_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function validate($email,$password)
    {	
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$query = $this->db->get('intern');
		
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
	
	function add_applicant($post_data)
	{
		$this->db->insert('intern',$post_data);
	}
	
	function submit_application($post_data)
	{
		$this->db->insert('internship_apply',$post_data);
	}
}
?>