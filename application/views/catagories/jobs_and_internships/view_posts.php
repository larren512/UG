<?php
$this->load->library('session');
$sess_data = $this->session->userdata; 
?>


<style>
			table {
				border-collapse: collapse;
				width: 60%;
			}

			th, td {
				text-align: left;
				padding: 8px;
			}

			tr{background-color: #f2f2f2}

			th {
				background-color: #6699ff;
				color: white;
			}
</style>

	    <?php
			$query = $this->db->get('internship_post');			
			if(isset($query))
			{
				foreach ($query->result() as $row )
				{
					if($row->Organization == $sess_data['logged_in']['user'])
					{
		?>				
						<table>		
							<thead>
								<th>Field</th>
							</thead>
							<tr>
								<td><?php echo $row->Field ?></td>
							</tr>
							<thead>
								<th>Location</th>
								<th>Duration</th>
							</thead>
							<tr>
								<td><?php echo $row->Location ?></td>
								<td><?php echo $row->Duration ?></td>
							</tr>
							<thead>
								<th>Start Date</th>
								<th>Stipend</th>
								<th>Last date to Apply</th>
							</thead>
							<tr>
								<td><?php echo $row->Start_date ?></td>
								<td><?php echo $row->Stipend ?></td>
								<td><?php echo $row->Last_day_to_apply ?></td>
							</tr>
						</table>	

						<a type="button" class="btn btn-info btn-lg" href="<?php echo '../jobs_and_internships/view_applications/'.$row->id?>">View Received Applications</a>		
						<br/>
						<br/>
						<br/>
						<br/>
<?php
					}
				}
			}
			else
			{
				echo '<h1>You have not posted any internships as yet!</h1>';
			}	
?>				