<?php include "includes/db.php"; ?>
<?php session_start(); ?>

<?php 
  
  if(isset($_POST['submit'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
      
      $username = mysqli_real_escape_string($connection, $username);
      $password = mysqli_real_escape_string($connection, $password);
      
      if(empty($username) || empty($password)){
          $message = "<p style='color:red;'>*Morate popuniti sva polja</p>";
      }else{
          $password_query = "SELECT * FROM users where username = '$username'";
          $result = mysqli_query($connection, $password_query);
          if(!$result){
              die(mysqli_error($connection));
          }
          $row = mysqli_fetch_array($result);
          $db_user_id = $row['user_id'];
          $db_password = $row['user_password'];
          $db_username = $row['username'];
          $db_user_image = $row['user_image'];
          $db_user_firstname = $row['user_firstname'];
          $db_user_lastname = $row['user_lastname'];
          
          
          
          
          if(!password_verify($password, $db_password) || $username !== $db_username){
              $message = "<p style='color:red;'>*Unijeli ste neispravan username ili password</p>";
          }else{
              $_SESSION['id'] = $db_user_id;
              $_SESSION['username'] = $db_username;
              $_SESSION['firstname'] = $db_user_firstname;
              $_SESSION['lastname'] = $db_user_lastname;
              $_SESSION['image'] = $db_user_image;
              header('location: admin/');
          }
      }
      
  }else{
      $message = "";
  }



?>



<html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width = device-width, initial-scale=1">
      <title>Login</title>
      <link rel="stylesheet" href="style/login.css">  
    </head>
    <body>
    <section>
	 
 	<form action="" method="post" class="meeting_form" >
 		
 		<span>LOGIN</span>
 		<div><?php echo $message; ?></div>
 		<div class="input_group" >
 			<input type="text" class="input_fill" placeholder="Username" name="username">
 		</div>
 		<div class="input_group">
 			<input type="password" class="input_fill" placeholder="Password" name="password">
 		</div>
 		
 		<div class="input_group">
 			<input type="submit" id="submit_btn"  value="Uloguj se" name="submit">
 		</div>
        
 	</form>
 </section>
    </body>
</html>






