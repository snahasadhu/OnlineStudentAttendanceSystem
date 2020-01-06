 
<?php
include ("header.php");
$con=mysqli_connect("localhost","root","","attendance_system");
?>
<!DOCTYPE html>
<html>
<body>  

  <div class="panel-body">

<form action="login.php" method="post">
	
  <div class="form-group">
    <label for="name">User Name</label>
    <input type="text" name="name" id="name" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" class="form-control" required>
  </div>
    <div class="checkbox">
    <!-- <label class="pull-right"><input type="checkbox"> Remember me</label>	-->
	
	<label><input type="checkbox" name="teacher" id="teacher"> Login as Teacher</label>	
	<br/>
	<label><input type="checkbox" name="admin" id="admin"> Login as Admin  </label>	
  </div>  

<div class="form-group">
  <input class="loginbtn" type="submit" name="login" value="Login">
  
</form>
</body>
</html>

<?php 

  // Create connection
   $conn = mysqli_connect("localhost", "root","" ,"attendance_system");
   // Check connection
   if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
   }
  
  if (isset($_POST['login'])) {
    # code...
    $User_name = $_SESSION['name'] = $_POST['name'];
    $User_Password = $_POST['password'];	
    
    $User = 'none';

    if(isset($_POST['teacher']))	{
      $User = 'teacher';
    }

    if(isset($_POST['admin']))	{
      $User = 'admin';
    }
	  
	
    if($User == 'teacher'){
      $que = "select * from teacher where username = '$User_name' AND password = '$User_Password'";		
    }else if($User == 'admin'){
      $que = "select * from admin where username = '$User_name' AND password = '$User_Password'";		
    }else{
      echo 'You must select either teacher or admin.'; 
    }

    $run = mysqli_query($conn, $que);

    while($row=mysqli_fetch_array($run)){
      if($row['username']==$User_name && $row['password']==$User_Password){      	
		
      if($User == 'teacher'){
        $_SESSION['user'] = $row['teacher_name'];        
        header("location: teacher_home.php");
        
      }else if($User == 'admin'){
        $_SESSION['user'] = $row['username'];
        header("location: admin.php");
      }

      }
      else
      {
        header("location: login.php");
      }

    
  }
} 

 ?>