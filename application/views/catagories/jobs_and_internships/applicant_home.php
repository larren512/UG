
<style>
.center {
    margin: auto;
    width: 50%;
    border: 3px solid #0088FF;
    padding: 10px;
}
</style>

<div class="center">
<h2>Already have an Account?</h2>
<h3>Login</h3>
 <form action="../jobs_and_internships/applicant_login" method="post">
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" name="email">
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" name="password">
  </div>
  <button type="submit" class="btn btn-info">Submit</button>
</form>
</div>

<div class="center">
<h2>New User?</h2>
<h3>Please create an Account</h3>
 <form action="../jobs_and_internships/applicant_create_acc" method="post">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" name="name">
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" name="email">
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" name="password">
  </div>
  <div class="form-group">
    <label for="contact">Contact:</label>
    <input type="text" class="form-control" name="contact">
  </div>
  <button type="submit" class="btn btn-info">Submit</button>
</form>
</div>