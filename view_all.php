<?php
include("db.php");
include("header.php");
?>

<div class="panel panel-default">
	<div class="panel panel-heading">
		<h2>
			
			<form action="index.php" method="POST">
				<input type="hidden" value="<?php echo $_POST['intake'] ?>" name="intake"> 
				<input type="submit" value="Back" class="btn btn-info pull-right">
			</form>

            <br/>	
	   </h2>
		


	   <H4><div class="well text-center">Intake:<?php echo $_POST['intake']; ?> </div></H4>

		<div class="panel panel-body">
			
				<table class="table table-striped">
					<tr>
				<th>Serial	Number</th><th>Dates</th><th>Show Attendance</th>
				</tr>

					<?php $result=mysqli_query($con,"select distinct date from attendance_records");
					$serialnumber=0;
					while($row=mysqli_fetch_array($result))
					{
						$serialnumber++;
					?>

					
					<tr>

					<td> <?php echo $serialnumber; ?> </td>
					<td> <?php echo $row['date']; ?>

					 </td>
					 <td>
					 	<form action="show_attendance.php" method="POST">
					 		<input type="hidden" value="<?php echo $row['date'] ?>" name="date"> 
							 <input type="hidden" value="<?php echo $_POST['intake'] ?>" name="intake">
					 		<input type="submit" value="Show Attendance" class="btn btn-primary">
						</form>
					 </td>
					
				</tr>

					<?php

				     }
				     
				     ?>

				
				</table>
				
			</form>
		</div>
	</div>