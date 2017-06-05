<div class="container">
  <h1>Application for Internship</h1>
  <form action="../internship_apply" method="post">
    
	<div class="form-group">
      <label for="name">Full Name:</label>
      <input type="text" size="50" class="form-control"  placeholder="Name" name="name">
    </div>
	
	<div class="form-inline">
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" class="form-control"  placeholder="email" name="email">
		</div>
		
		<div class="form-group">
			<label for="contact">Contact No:</label>
			<input type="number" size="10" class="form-control"  placeholder="valid contact number" name="contact">
		</div>
	</div>
	
	<div class="form-inline">
		<div class="form-group">
			<label for="college">Name of College:</label>
			<input type="text" size="50" class="form-control"  placeholder="college" name="college">
		</div>
		<div class="form-group">
			<label for="cgpa">CGPA/Percentage</label>
			<input type="text" class="form-control" placeholder="ex: 7.5/10 or 4.2/5 or 80%" name="cgpa">
		</div>
	</div>
	
	<div class="form-inline">
		<div class="form-group">
			<label for="higher_secondary">Name of Higher Secondary:</label>
			<input type="text" size="50" class="form-control" placeholder="higher secondary" name="higher_secondary">
		</div>
		<div class="form-group">
			<label for="hs_cgpa">CGPA/Percentage</label>
			<input type="text" class="form-control"  placeholder="ex: 7.5/10 or 4.2/5 or 80%" name="hs_cgpa">
		</div>
	</div>	
	
	<div class="form-inline">
		<div class="form-group">
			<label for="secondary">Secondary</label>
			<input type="text" size="50" class="form-control"  placeholder="secondary" name="secondary">
		</div>
		<div class="form-group">
			<label for="s_CGPA">CGPA/Percentage</label>
			<input type="text" class="form-control"  placeholder="s_cgpa" name="s_cgpa">
		</div>
	</div>
	
	<div class="form-group">
		<label for="previous_internships">Previous Internships or trainings</label>
		<input type="text" size="250" class="form-control" placeholder="specify in brief(max 250 characters)" name="previous_internships">
	</div>
	
	<div class="form-group">
		<label for="projects">Projects</label>
		<input type="text" size="250" class="form-control" placeholder="specify in brief(max 250 characters)" name="projects">
	</div>
	
	<div class="form-group">
		<label for="relevant_skills">Relevant skills</label>
		<input type="text" size="250" class="form-control" placeholder="specify in brief(max 250 characters)" name="relevant_skills">
	</div>
	
	<div class="form-group">
		<input type="hidden" name="post_id" value="<?php echo $post_id ?>">
	</div>	
	
    <button type="submit" class="btn btn-default">Post Internship</button>
  </form>  
</div>
