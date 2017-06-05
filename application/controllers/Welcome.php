<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	function __construct() 
	{
		parent::__construct();

		// Load url helper
		$this->load->helper('url');
	}
	 
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('splash');
		$this->load->view('template/footer');
	}
	
	public function explore()
	{
		$this->load->view('template/header');
		$this->load->view('home');
		$this->load->view('template/footer');
	}
	
	public function tourism()
	{
		$this->load->view('template/header');
		$this->load->view('template/navigation');
		$this->load->view('catagories/tourism/home');
		$this->load->view('template/footer');
	}

	public function art_and_culture()
	{
		$this->load->view('template/header');
		$this->load->view('template/navigation');
		$this->load->view('catagories/art_and_culture/home');
		$this->load->view('template/footer');
	}
	
	public function jobs_and_internships()
	{
		$this->load->view('template/header');
		$this->load->view('template/navigation');
		$this->load->view('catagories/jobs_and_internships/home');
		$this->load->view('template/footer');
	}
	
	public function goan_delicacies()
	{
		$this->load->view('template/header');
		$this->load->view('template/navigation');
		$this->load->view('catagories/goan_delicacies/home');
		$this->load->view('template/footer');
	}
	
	public function contact()
	{
		$this->load->view('template/header');
		$this->load->view('template/navigation');
		$this->load->view('contact_us');
		$this->load->view('template/footer');
	}
}
