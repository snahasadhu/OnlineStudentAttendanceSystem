<style>
.table {
  padding: 0px;
}
.td {
	padding: 0px;
}
.th{
	padding: 0px;
}
</style>


<?php
include("db.php");
include("header.php");


?>

<div class="panel panel-default">
	<div class="panel panel-heading">
		<h2>			
			<form action="admin_report_page.php" method="POST">
				<input type="hidden" value="<?php echo $_POST['intake'] ?>" name="intake"> 
				<input type="submit" value="Back" class="btn btn-info pull-right" id="back">	
                <a class="btn btn-info pull-right" href="logout.php"> Logout </a>			
			</form>
			</br>
		</h2>
		
		

		<H4><div class="well text-center">Intake:<?php echo $_POST['intake']; ?> </div></H4>
		
		<div class="panel panel-body">
			<form action="index.php" method="Post">
			<table class="table table-striped">
					<tr>
					<th>SN</th><th>Student Name</th><th>Roll Number</th>					
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
					 <th > 
					 <?php  
					 	if($a) echo $row['date'];
					 	$match=$row['date']; ?> 
					 </th>
					 <?php
					} ?>

					<th>
					Percentage 
					</th>

				</tr>
			</table>

				<table class="table table-striped">			

					<?php 
					$result=mysqli_query($con,"select * from attendance_records where intake='$intake' group by roll_number");
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
					<?php 
					$roll=$row['roll_number']; 
					$res=mysqli_query($con,"select * from attendance_records  where roll_number='$roll'");
					$match=0;
					$total_class = 0;
					$atten_class = 0;
					while($row=mysqli_fetch_array($res))
					{ 	

					 ?>
					 <th>
						<?php  	

							echo $row['attendance_status'];		
							$total_class++;
							if($row['attendance_status']=='Present')
								$atten_class++;
					}
						?> 
					 </th>

					 <th>
					 <?php echo ($atten_class / $total_class) * 100; echo '%';  ?> 
					 </th>

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