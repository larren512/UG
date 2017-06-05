
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
			$this->db->where('id',$post_id);
			$query = $this->db->get('internship_post');	
			$result=$query->row();	
			if(isset($result))
			{
?>				
						<table>		
							<thead>
								<th>Field</th>
							</thead>
							<tr>
								<td><?php echo $result->Field ?></td>
							</tr>
							<thead>
								<th>Location</th>
								<th>Duration</th>
							</thead>
							<tr>
								<td><?php echo $result->Location ?></td>
								<td><?php echo $result->Duration ?></td>
							</tr>
							<thead>
								<th>Start Date</th>
								<th>Stipend</th>
								<th>Last date to Apply</th>
							</thead>
							<tr>
								<td><?php echo $result->Start_date ?></td>
								<td><?php echo $result->Stipend ?></td>
								<td><?php echo $result->Last_day_to_apply ?></td>
							</tr>
						</table>			
						<br/>
						<br/>
						<br/>
						<br/>
<?php
			}
?>			


	
<?php
	$this->db->where('internship_id',$post_id);
	$query2 = $this->db->get('internship_apply');
	
	if(isset($query2))
	{
		foreach ($query2->result() as $row )
		{
?>			<div class="container">
				<table>
					<tr>
						<th>Full Name</th>
					</tr>
					<tr>	
						<td><?php echo $row->Name?></td>
					</tr>
					<tr>
						<th>Email</th>
						<th>Contact No.</th>
					</tr>
					<tr>
						<td><?php echo $row->Email?></td>
						<td><?php echo $row->Contact_no?></td>
					</tr>
					<tr>
						<th>College</th>
						<th>CGPA/Percentage</th>
					</tr>
					<tr>	
						<td><?php echo $row->College?></td>
						<td><?php $row->CGPA/Percentage?></td>
					</tr>
					<tr>
						<th>Higher Secondary</th>
						<th>CGPA/Percentage</th>
					</tr>
					<tr>	
						<td><?php echo $row->Higher_Secondary?></td>
						<td><?php $row->HS_performance?></td>
					</tr>
					<tr>
						<th>Secondary</th>
						<th>CGPA/Percentage</th>
					</tr>
					<tr>	
						<td><?php echo $row->Secondary?></td>
						<td><?php $row->S_performance?></td>
					</tr>
					<tr>
						<th>Previous Internships/Trainings</th>
						<td><?php echo $row->Previous_internships?></td>
					</tr>
					<tr>
						<th>Projects</th>
						<td><?php echo $row->Projects?></td>
					</tr>
					<tr>
						<th>Relevant Skills</th>
						<td><?php echo $row->Relevant_skills?></td>
					</tr>	
				</table>
			</div>	
			<br/>
			<br/>
			<br/>
			<br/>
<?php		
		}
	}
	else
	{
?>		
		<h1>No applications received yet</h1>;

		<?php
	}	
?>	
