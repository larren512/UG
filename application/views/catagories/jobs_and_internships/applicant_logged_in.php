<?php
$this->load->library('session');
$sess_data = $this->session->userdata; 

?>

<h1>Welcome <?php echo $sess_data['logged_in']['user'] ?></h1>
<a type="button" class="btn btn-info btn-lg" href="../jobs_and_internships/logout/applicant">Logout</a>
<h2>List of internship offers:</h2>   
   <div class="container">
       
		<!DOCTYPE html>
		<html>
		<head>
		<style>
			table {
				border-collapse: collapse;
				width: 100%;
			}

			th, td {
				text-align: left;
				padding: 8px;
			}

			tr:nth-child(even){background-color: #f2f2f2}

			th {
				background-color: #6699ff;
				color: white;
			}
		</style>
		</head>
		<body>

	    <?php
			$query = $this->db->get('internship_post');			
			if(isset($query))
			{
				foreach ($query->result() as $row )
				{
		?>				<table>		
							<tr>
								<th>Organization</th>
							</tr>	
							<tr>
								<td><?php echo $row->Organization ?></td>
							</tr>
							<tr>
								<th>Field</th>
							</tr>
							<tr>
								<td><?php echo $row->Field ?></td>
							</tr>
							<tr>
								<th>Location</th>
								<th>Duration</th>
							</tr>
							<tr>
								<td><?php echo $row->Location ?></td>
								<td><?php echo $row->Duration ?></td>
							</tr>
							<tr>
								<th>Start Date</th>
								<th>Stipend</th>
								<th>Last date to Apply</th>
							</tr>
							<tr>
								<td><?php echo $row->Start_date ?></td>
								<td><?php echo $row->Stipend ?></td>
								<td><?php echo $row->Last_day_to_apply ?></td>
							</tr>	
						</table>	
							
						<div class="container">
						  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#details">Check details</button>
						  <div class="modal fade" id="details" role="dialog">
							<div class="modal-dialog">
							  <div class="modal-content">
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <h4 class="modal-title"><?php echo $row->Organization ?></h4>
								  <h4 class="modal-title"><?php echo $row->Field ?></h4>
								</div>
								<div class="modal-body">
								  <p><?php echo $row->Details ?></p>
								</div>
								<div class="modal-footer">
								  <a type="button" href="<?php echo '../jobs_and_internships/submit_application_details/'.$row->id ?>" class="btn btn-default">Apply</a>
								</div>
							  </div>
							  
							</div>
						  </div>
						</div>

						
							
		<?php			
				}	
			}	
		?>

		</body>
		</html>
	</div>		