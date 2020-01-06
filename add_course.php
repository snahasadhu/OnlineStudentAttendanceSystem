<?php

include("header.php");
include("db.php");
$flag=0;

if(isset($_POST['submit']))
{
	
$result=mysqli_query($con,"insert into courses(course_code,course_title,teacher_code)values('$_POST[course_code]','$_POST[course_title]','$_POST[teacher_code]')");
	
if($result)	
  {
	 $flag=1;	
  }
	
}	


?>
<div class="panel panel-default">
    <?php if($flag){ ?>
    <div class="alert alert-success">
	<strong>!success</strong> course added successfully ;
    </div>
	<?php } ?>
	
    <div class="panel-heading">
	
	<h2>	
	<a class="btn btn-info pull-right" href="admin.php"> Back </a>
    <br/>
	</h2>
	
	</div>
	
     <div class="panel-body">

     <form action="add_course.php" method ="post">
	 
     <div class="form-group">
	 <label for ="name"> course_code </label>
	 <input type="text" name="course_code" id="course_code" class="form-control" required>
	
	</div>
	
	<div class="form-group">
	 <label for ="name"> course_title </label>
	 <input type="text" name="course_title" id="course_title" class="form-control" required>
	
	</div>
	<div class="form-group">
	 <label for ="name"> teacher_code</label>
	 <input type="text" name="teacher_code" id="teacher_code" class="form-control" required>
	
	</div>
	<div class="form-group">
	 <input type="submit" name="submit" class="btn btn-primary" required>
	
	</div>
	
	
	</form>
	</div>







