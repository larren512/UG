<?php
$this->load->library('session');
$sess_data = $this->session->userdata; 
?>

<h1>Welcome <?php echo $sess_data['logged_in']['user'] ?></h1>
<a href="../jobs_and_internships/view_posts" class="btn btn-info" role="button">View previous posts</a>
<a href="../jobs_and_internships/post_job" class="btn btn-info" role="button">Post Job vacancy</a>
<a href="../jobs_and_internships/post_internship" class="btn btn-info" role="button">Post Internship offer</a>
<a type="button" class="btn btn-info" href="../jobs_and_internships/logout/organization">Logout</a>
