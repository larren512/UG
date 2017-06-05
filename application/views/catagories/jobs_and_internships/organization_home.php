
<style>
.center {
    margin: auto;
    width: 50%;
    border: 3px solid #0088FF;
    padding: 10px;
}
</style>

<?php
if(isset($msg))
{
?>	
<div class="statusmsg">	
<?php	
	if($msg == '1')
	{
		echo 'The email you have entered is invalid, please try again';
	}
	if($msg == '2')
	{
		echo 'please do not leave any field blank';
	}	
?>
</div>
<?php
}
?>


<div class="center">
<h2>Already have an Account?</h2>
<h3>Login</h3>
 <form action="../jobs_and_internships/org_login" method="post">
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
 <form action="../jobs_and_internships/org_create_acc" method="post">
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