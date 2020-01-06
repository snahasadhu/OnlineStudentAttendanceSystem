<?php
include("db.php");
include("header.php");
$flag=0;
$update=0;

if(isset($_POST['submit']))
{
	$date=date("y-m-d");	
	$intake=$_POST['intake'];
	$records=mysqli_query($con,"select * from attendance_records where date='$date' and intake='$intake' ");;
	$num=mysqli_num_rows($records);
	if($num)
	{

		foreach ($_POST['attendance_status'] as $id=>$attendance_status) {
		$student_name=$_POST['student_name'][$id];
		$roll_number=$_POST['roll_number'][$id];
		
		//	 and intake='$intake'
		
		$result=mysqli_query($con,"update attendance_records set student_name='$student_name', roll_number='$roll_number', attendance_status='$attendance_status', date='$date'
where date='$date' and student_name='$student_name';
			");


		if($result)
		{
			$update=1;
		}


	   }
	}
	else
	{
		foreach ($_POST['attendance_status'] as $id=>$attendance_status) {
		$student_name=$_POST['student_name'][$id];
		$roll_number=$_POST['roll_number'][$id];
		$intake=$_POST['intake'];
		
		$result=mysqli_query($con,"insert into attendance_records(student_name,roll_number,intake, attendance_status,date)values('$student_name','$roll_number','$intake','$attendance_status','$date')");
		if($result)
		{
			$flag=1;
		}
	   }
	}
	
	   
     
}
?>

<div class="panel panel-default">
	<div class="panel panel-heading">
          <h2>
		  
			<a class="btn btn-info pull-right" href="logout.php"> Logout </a>
            <a class="btn btn-info pull-right" href="teacher_home.php"> Back </a>
			
			<form action="view_all.php" method="POST">
				<input type="hidden" value="<?php echo $_POST['intake'] ?>" name="intake"> 
				<input type="submit" value="View All Records" class="btn btn-info">
			</form>
			
		</h2>
		<?php if($flag){ ?>

		<div class="alert alert-success">
		Attendance Data Insert Successfully.

		</div>
	   <?php } ?>

	   <?php if($update){ ?>

		<div class="alert alert-success">
		Student Attendance Data updated Successfully.

		</div>
	   <?php } ?>


		<H3><div class="well text-center">Date:<?php echo date("y-m-d"); ?> </div></H3>
		<H4><div class="well text-center">Intake:<?php echo $_POST['intake']; ?> </div></H4>
		<div class="panel panel-body">
			<form action="index.php" method="Post">
				<table class="table table-striped">
					
					<th>Serial Number</th><th>Student Name</th><th>Roll Number</th><th> Attendance Status </th>
				</tr>		
				

					<?php 					
					
					$intake=$_POST['intake'];															
					$result=mysqli_query($con,"select * from attendance where intake='$intake' ");
					
					
					$serialnumber=0;
					$counter=0;
					while($row=mysqli_fetch_array($result))
					{
						$serialnumber++;
					?>

					
					<tr>

					<td> <?php echo $serialnumber; ?> </td>
					<td> <?php echo $row['student_name']; ?>
					<input type="hidden" value="<?php echo $row['student_name']; ?>" name="student_name[]">

					 </td>
					<td> <?php echo $row['roll_number']; ?>
					<input type="hidden" value="<?php echo $row['roll_number']; ?>" name="roll_number[]">
					 </td>
					<td>
						<input type="radio" name="attendance_status[<?php echo $counter; ?>]" value="Present"
						<?php if(isset($_POST['attendance_status'][$counter]) && $_POST['attendance_status'][$counter]=="Present"){ 
							echo "checked=checked";
						}
						?>
						required >Present


						<input type="radio" name="attendance_status[<?php echo $counter; ?>]" value="Absent"
						<?php if(isset($_POST['attendance_status'][$counter]) && $_POST['attendance_status'][$counter]=="Absent"){ 
							echo "checked=checked";
						}
						?>
						required >Absent
					</td>
				</tr>

					<?php
					$counter++;

				     }
				     
				     ?>

				
				</table>
				<input type="hidden" value="<?php echo $_POST['intake'] ?>" name="intake"> 
				<input type="submit" name="submit" value="submit" class="btn btn-primary" >
			</form>
		</div>
	</div>