<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs_and_internships extends CI_Controller {
		
	public function __construct()
    {
                parent::__construct();
				$this->load->library('session');
    }
	
	public function organization_home()
	{
		if(isset($_GET['message']))
		{
			$data['msg'] = $_GET['message'];
		}
		else
		{
			$data['msg'] = NULL;
		}
		$this->load->view('template/header');
		$this->load->view('template/navigation');
		$this->load->view('catagories/jobs_and_internships/organization_home',$data);
		$this->load->view('template/footer');
	}
	
	public function applicant_home()
	{
		if(isset($_SESSION['logged_in']['user']))
		{
			header("Location:http://localhost/UG/jobs_and_internships/applicant_signed_in");
		}
		else
		{
			$this->load->view('template/header');
			$this->load->view('template/navigation');
			$this->load->view('catagories/jobs_and_internships/applicant_home');
			$this->load->view('template/footer');
		}
	}

	public function org_login()
	{
		if(isset($_SESSION['logged_in']))
		{
			header("Location:http://localhost/UG/jobs_and_internships/org_signed_in");
		}
		else
		{	
			if (isset($_POST)) 
			{
				$this->load->model('org_model');
				$email = $_POST['email'];
				$password= $_POST['password'];
				
				$user_data = $this->org_model->validate($email,$password) ;
				if (isset($user_data))
				{
					$details = array(
						'user'  =>	$user_data['name'],
						'email' =>	$user_data['email']
					);
					$this->session->set_userdata('logged_in',$details);
					header("Location:http://localhost/UG/jobs_and_internships/org_signed_in");
				}
				else
				{
					header("Location:http://localhost/UG/jobs_and_internships/invalid_account");
				}
			}
		}	
	}
	
	public function org_create_acc()
	{
		if(isset($_POST['name']) && !empty($_POST['name']) AND isset($_POST['email']) && !empty($_POST['email']) AND isset($_POST['password']) && !empty($_POST['password']) AND isset($_POST['contact']) && !empty($_POST['contact']))
		{
			if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false)
			{
				// Return Error - Invalid Email
				//$invalid_email = 'The email you have entered is invalid, please try again.';
				$err = '1'; //invalid email id
				header("Location:http://localhost/UG/jobs_and_internships/organization_home?message=$err");
				//$this->organization_home($msg);
			}
			else
			{
				// Return Success - Valid Email
				$hash = md5( rand(0,1000) ); // Generate random 32 character hash and assign it to a local variable.
				
				$this->load->model('org_model');

				$user_data = array (
				'name'	=> $_POST['name'],
				'email'	=> $_POST['email'],
				'password'	=> $_POST['password'],
				'contact'	=> $_POST['contact'],
				'hash'	=>	$hash
				);	
				
				$this->load->library('email');
				
				$config['wordwrap']= TRUE;
				$this->email->initialize($config);	
				
				$to      = $_POST['email']; // Send email to our user
				$subject = 'Verification of organization account in Unexplored Goa'; // Give the email a subject 
				$message = '
				
				Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
				 
				------------------------
				Email: '.$user_data['email'].'
				Password: '.$user_data['password'].'
				------------------------
				 
				Please click this link to activate your account:
				localhost/UG/jobs_and_internships/verify?email='.$user_data['email'].'&hash='.$user_data['hash'].'
				 
				'; // Our message above including the link
									 
				$headers = 'From:noreply@unexploredgoa.com' . "\r\n"; // Set from headers
				//mail($to, $subject, $message, $headers); // Send our email
				
				
			
				$this->email->from('larrencol@gmail.com', $headers);
				$this->email->to($to);
				$this->email->subject($subject);
				$this->email->message($message);
				if($this->email->send())
				{
					echo 'Your email was sent.';
				}

				else
				{
					show_error($this->email->print_debugger());
				}
				
				$this->org_model->add_org($user_data);
				
				$valid_email = 'Your account has been made,please verify it by clicking the activation link that has been send to your email.';
				header("Location:http://localhost/UG/jobs_and_internships/success_page?message=$valid_email");
				//$this->success_page($msg);
			}
			
			/*
			$details = array(
			'user'  => $user_data['name'],
			'email'	=> $user_data['email']
			);
			
			$this->session->set_userdata('logged_in',$details);
			$this->org_signed_in();
			*/
		}
		else
		{
			//$incomplete='please do not leave any field blank';
			$err = '2'; //incomplete form
			header("Location:http://localhost/UG/jobs_and_internships/organization_home?message=$err");
		}	
	}
	
	public function verify()
	{
		if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
		{
			// Verify data
			$email = $_GET['email']; // Set email variable
			$hash = $_GET['hash']; // Set hash variable
			$this->load->model('org_model');
			$flag = $this->org_model->verify($email,$hash);
			if($flag == 1)
			{
				$data['msg'] = 'Your account has been activated, you can now login';
			}
			else if($flag == '0')
			{
				$data['msg'] = 'The url is either invalid or you already have activated your account';
			}
		}
		else
		{
			$data['msg'] = 'Invalid approach, please use the link that has been send to your email';
		}
		
		$this->load->view('template/header');
		$this->load->view('template/navigation');
		$this->load->view('catagories/jobs_and_internships/status',$data);	
		$this->load->view('template/footer');
	}
	
	public function success_page()
	{
		$data['msg'] = $_GET['message'];
		$this->load->view('template/header');
		$this->load->view('template/navigation');
		$this->load->view('catagories/jobs_and_internships/status',$data);
		$this->load->view('template/footer');
	}
	
	public function applicant_login()
	{
		if(isset($_SESSION['logged_in']['name']))
		{
			header("Location:http://localhost/UG/jobs_and_internships/applicant_signed_in");
		}
		else
		{	
			if (isset($_POST)) 
			{
				$this->load->model('applicant_model');
				$email = $_POST['email'];
				$password= $_POST['password'];
				
				$data = $this->applicant_model->validate($email,$password) ;
				if (isset($data))
				{
					$details = array(
						'user'  =>	$data['name'],
						'email' =>	$data['email']
					);
					$this->session->set_userdata('logged_in',$details);
					header("Location:http://localhost/UG/jobs_and_internships/applicant_signed_in");
				}
				else
				{
					$this->invalid_account();
				}
			}
		}
	}
	
	public function applicant_create_acc()
	{
		if (isset($_POST)) 
		{
			$this->load->model('applicant_model');
			$user_data = array (
				'name'	=> $_POST['name'],
				'email'	=> $_POST['email'],
				'password'	=> $_POST['password'],
				'contact'	=> $_POST['contact']
			);	
			
			$this->applicant_model->add_applicant($user_data);
		
			$details = array(
			'user'  => $user_data['name'],
			'email'	=> $user_data['email']
			);
			
			$this->session->set_userdata('logged_in',$details);
			$this->applicant_signed_in();
		} 
	}
	
	public function org_signed_in()
	{
		$this->load->view('template/header');
		$this->load->view('template/navigation');
		$this->load->view('catagories/jobs_and_internships/organization_logged_in');
		$this->load->view('template/footer');
	}
	
	public function applicant_signed_in()
	{
		$this->load->view('template/header');
		$this->load->view('template/navigation');
		$this->load->view('catagories/jobs_and_internships/applicant_logged_in');
		$this->load->view('template/footer');
	}
	
	public function view_posts()
	{
		$this->load->view('template/header');
		$this->load->view('template/navigation');
		$this->load->view('catagories/jobs_and_internships/view_posts');
		$this->load->view('template/footer');
	}
	
	public function view_applications($post_id)
	{
		$data['post_id']=$post_id;
		$this->load->view('template/header');
		$this->load->view('template/navigation');
		$this->load->view('catagories/jobs_and_internships/view_applications',$data);
		$this->load->view('template/footer');
	}
	
	public function post_job()
	{
		$this->load->view('template/header');
		$this->load->view('template/navigation');
		$this->load->view('catagories/jobs_and_internships/post_job');
		$this->load->view('template/footer');
	}
	
	public function post_internship()
	{
		$this->load->view('template/header');
		$this->load->view('template/navigation');
		$this->load->view('catagories/jobs_and_internships/post_internship');
		$this->load->view('template/footer');
	}
	
	public function internship_posted()
	{
		$sess_data=$this->session->userdata;
		if(isset($_POST))
		{
			$this->load->model('org_model');
			$post_data = array (
				'Organization' => $sess_data['logged_in']['user'],
				'Field' => $_POST['field'],
				'Location' => $_POST['location'],
				'Duration' => $_POST['duration'],
				'Start_date' =>	$_POST['start_date'],
				'Stipend' => $_POST['stipend'],
				'Last_day_to_apply' => $_POST['last_date'],
				'Details' => $_POST['details']
			);
			
			$this->org_model->post_internship($post_data);
			
			$data['flag']='organization';	
			$this->load->view('template/header');
			$this->load->view('template/navigation');
			$this->load->view('catagories/jobs_and_internships/post_success',$data);
			$this->load->view('template/footer');	
		}	
	}
	
	public function submit_application_details($post_id)
	{
		$data['post_id']=$post_id;
		$this->load->view('template/header');
		$this->load->view('template/navigation');
		$this->load->view('catagories/jobs_and_internships/apply_internship',$data);
		$this->load->view('template/footer');
	}
	
	public function internship_apply()
	{
		if(isset($_POST))
		{
			$this->load->model('applicant_model');
			$post_data = array(
				'Name' => $_POST['name'],
				'College' => $_POST['college'],
				'CGPA/Percentage' => $_POST['cgpa'],
				'Higher_Secondary' => $_POST['higher_secondary'],
				'HS_performance' => $_POST['hs_cgpa'],
				'Secondary' => $_POST['secondary'],
				'S_performance' => $_POST['s_cgpa'],
				'Previous_internships' => $_POST['previous_internships'],
				'Projects' => $_POST['projects'],
				'Relevant_skills' => $_POST['relevant_skills'],
				'Email' => $_POST['email'],
				'Contact_no' => $_POST['contact'],
				'internship_id' => $_POST['post_id']
			);
			$this->applicant_model->submit_application($post_data);
			
			$data['flag']='applicant';
			$this->load->view('template/header');
			$this->load->view('template/navigation');
			$this->load->view('catagories/jobs_and_internships/post_success',$data);
			$this->load->view('template/footer');
		}	
	}
	
	public function logout($user)
	{
		$this->load->library('session');
		unset(
				$_SESSION['name'],
				$_SESSION['email']
		);
		$this->session->sess_destroy();
		if($user == 'applicant')
		{
			header("Location:http://localhost/UG/jobs_and_internships/applicant_home");
		}
		else if($user == 'organization')
		{
			header("Location:http://localhost/UG/jobs_and_internships/organization_home");
			
		}
	}		
	
	
	
	
	
	
}	