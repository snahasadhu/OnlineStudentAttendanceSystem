<?php
include("db.php");
include("header.php");


?>

<div class="panel panel-default">
	<div class="panel panel-heading">
		<h2>			
			
		<form action="view_all.php" method="POST">
				<input type="hidden" value="<?php echo $_POST['intake'] ?>" name="intake"> 
				<input type="submit" value="Back" class="btn btn-info pull-right">
			</form>
		<br/>
		</h2>		

		<H4><div class="well text-center">Intake:<?php echo $_POST['intake']; ?> </div></H4>
		
		<div class="panel panel-body">
			<form action="index.php" method="Post">
				<table class="table table-striped">
					<tr>
					<th>Serial Number</th><th>Student Name</th><th>Roll Number</th><th> Attendance Status </th>
				</tr>

					<?php 					
					$result=mysqli_query($con,"select * from attendance_records where date='$_POST[date]' and intake='$_POST[intake]' ");
					$serialnumber=0;
					$counter=0;
					while($row=mysqli_fetch_array($result))
					{
						$serialnumber++;
					?>

					
					<tr>

					<td> <?php echo $serialnumber; ?> </td>
					<td> <?php echo $row['student_name']; ?>
					

					 </td>
					<td> <?php echo $row['roll_number']; ?>
					 </td>
					<td> <?php echo $row['attendance_status']; ?>
					</td>
				</tr>

					<?php
					$counter++;

				     }
				     
				     ?>

				
				</table>
				
			</form>
		</div>
	</div>