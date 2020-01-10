<?php
include("db.php");
include("header.php");


?>

<div class="panel panel-default">
	<div class="panel panel-heading">
		<h2>
			<a class="btn btn-success" href="add.php">Add Student </a>
			<a class="btn btn-info pull-right" href="index.php"> Back </a>
		</h2>
		


		
		<div class="panel panel-body">
			<form action="index.php" method="Post">
				<table class="table table-striped">
					<tr>
					<th>#serial Number</th><th>Student Name</th><th>Roll Number</th>					
					<?php 
					
					$intake=$_POST['intake'];
					//echo $intake; 
					$result=mysqli_query($con,"select * from attendance_records where intake='$intake'");
					$match=0;
					while($row=mysqli_fetch_array($result))
					{ 
						if ($row['date'] == $match)
							$a=0;
						else
							$a=1?>
					 <th> 
					 <?php  
					 	if($a) echo $row['date'];
					 	$match=$row['date']; ?> 
					 </th>
					 <?php
					} ?>

				</tr>

					<?php 
					$result=mysqli_query($con,"select * from attendance_records where intake='$intake'");
					$serialnumber=0;
					$counter=0;
					while($row=mysqli_fetch_array($result))
					{
						$serialnumber++;
					?>

					
					<tr>

					<td> <?php echo $serialnumber; ?> </td>
					<td> <?php echo $row['student_name']; ?>
					

					 
					<td> <?php echo $row['roll_number']; ?>
					 </td>
					
					<?php $res=mysqli_query($con,"select * from attendance_records  where intake='$intake'");
					$match=0;
					while($row=mysqli_fetch_array($res))
					{ 
						if ($row['date'] == $match)
							$a=0;
						else
							$a=1?>
					 <th> <?php  if($a) echo $row['attendance_status'];
					 $match=$row['date'];} ?> </th>
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