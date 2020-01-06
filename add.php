<?php

include("header.php");
include("db.php");
$flag=0;

if(isset($_POST['submit']))
{
	
$result=mysqli_query($con,"insert into attendance(student_name,roll_number,intake)values('$_POST[name]','$_POST[roll]','$_POST[intake]')");
	
if($result)	
  {
	 $flag=1;	
  }
	
}	


?>
<div class="panel panel-default">
    <?php if($flag){ ?>
    <div class="alert alert-success">
	<strong>!success</strong> student added successfully;
    </div>
	<?php } ?>
	
    <div class="panel-heading">
	
	<h2>	
	<a class="btn btn-info pull-right" href="admin.php"> Back </a>
    <br/>
	</h2>
	
	</div>
	
     <div class="panel-body">

     <form action="add.php" method ="post">
	 
     <div class="form-group">
	 <label for ="name"> Student Name </label>
	 <input type="text" name="name" id="name" class="form-control" required>
	
	</div>
	
	<div class="form-group">
	 <label for ="name"> Roll Number </label>
	 <input type="text" name="roll" id="roll" class="form-control" required>
	
	</div>
	
	<div class="form-group">
	 <label for ="name"> Intake-Section </label>
	 <input type="text" name="intake" id="intake" class="form-control" required>
	
	</div>
	
	<div class="form-group">
	 <input type="submit" name="submit" class="btn btn-primary" required>
	
	</div>
	
	
	</form>
	</div>







