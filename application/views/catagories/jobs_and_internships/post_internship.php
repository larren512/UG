
<div class="container">
  <h1>Details about Internship</h1>
  <form action="../jobs_and_internships/internship_posted" method="post">
    <div class="form-group">
      <label for="field">Field:</label>
      <input type="text" class="form-control"  placeholder="ex:Web Development" name="field">
    </div>
    <div class="form-group">
      <label for="location">Location:</label>
      <input type="text" class="form-control" placeholder="ex:Panjim" name="location">
    </div>
    <div class="form-group">
		<label for="duration">Duration:</label>
		<input type="text" class="form-control"  placeholder="ex:2 months" name="duration">
	</div>
	<div class="form-group">
		<label for="last_date">Start date:</label>
		<input type="text" class="form-control"  placeholder="enter valid date " name="start_date">
	</div>
	<div class="form-group">
		<label for="stipend">Stipend:</label>
		<input type="text" class="form-control"  placeholder="ex: ₹5000/month" name="stipend">
	</div>
	<div class="form-group">
		<label for="last_date">Last date for applying:</label>
		<input type="text" class="form-control"  placeholder="enter valid date " name="last_date">
	</div>
	<div class="form-group">
		<label for="details">Write a description about the Internship:</label>
		<input type="text" size="1000" class="form-control"  placeholder="about the company,no of slots,skills required,conditions for applying " name="details">
	</div>
    <button type="submit" class="btn btn-default">Post Internship</button>
  </form>  
</div>
