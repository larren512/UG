<?php
	if( $flag=='organization' )
	{
?>
		<h2>Internship offer is successfully posted!</h2>
		<a type="button" class="btn btn-info btn-lg" href="../jobs_and_internships/org_signed_in">Organization Home</a>
<?php
	}
	else if($flag == 'applicant' )
	{	
?>
		<h2>Internship application is successfully sent!</h2>
		<a type="button" class="btn btn-info btn-lg" href="../jobs_and_internships/applicant_signed_in">Applicant Home</a>
<?php
	}
?>