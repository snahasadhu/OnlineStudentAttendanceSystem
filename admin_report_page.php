<?php
include("db.php");
include("header.php");
?>

<div class="panel panel-default">
	<div class="panel panel-heading">
		<h2>           
			<a class="btn btn-info pull-right" href="logout.php"> Logout </a>
            <a class="btn btn-info pull-right" href="admin.php"> Back </a>
            <br/>	
	   </h2>
		


		
		<div class="panel panel-body">
			
				<table class="table table-striped">
					<tr>
				<th>Serial	Number</th><th>Intake</th><th>Attendance</th>
				</tr>

					<?php $result=mysqli_query($con,"select distinct intake from attendance");
					$serialnumber=0;
					while($row=mysqli_fetch_array($result))
					{
						$serialnumber++;
					?>

					
					<tr>

					<td> <?php echo $serialnumber; ?> </td>
					<td> <?php echo $row['intake']; ?>

					 </td>
					 <td>
					 	<form action="admin_view_report.php" method="POST">
					 		<input type="hidden" value="<?php echo $row['intake'] ?>" name="intake"> 
					 		<input type="submit" value="View Report" class="btn btn-primary">
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