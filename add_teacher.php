<?php

include("header.php");
include("db.php");
$flag=0;

if(isset($_POST['submit']))
{
	
$result=mysqli_query($con,"insert into teacher(teacher_name,username,password)values('$_POST[teacher_name]','$_POST[username]','$_POST[password]')");
	
if($result)	
  {
	 $flag=1;	
  }
	
}	


?>
<div class="panel panel-default">
    <?php if($flag){ ?>
    <div class="alert alert-success">
	<strong>!success</strong> teacher added successfully ;
    </div>
	<?php } ?>
	
    <div class="panel-heading">
	
	<h2>	
	<a class="btn btn-info pull-right" href="admin.php"> Back </a>
    <br/>
	</h2>
	
	</div>
	
     <div class="panel-body">

     <form action="add_teacher.php" method ="post">
	 
     <div class="form-group">
	 <label for ="name"> Teacher Name </label>
	 <input type="text" name="teacher_name" id="teacher_name" class="form-control" required>
	
	</div>
	
	<div class="form-group">
	 <label for ="name"> User Name </label>
	 <input type="text" name="username" id="username" class="form-control" required>
	
	</div>
	<div class="form-group">
	 <label for ="name"> Password </label>
	 <input type="text" name="password" id="password" class="form-control" required>
	
	</div>
	<div class="form-group">
	 <input type="submit" name="submit" class="btn btn-primary" required>
	
	</div>
	
	
	</form>
	</div>







