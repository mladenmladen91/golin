 <?php 
     if(isset($_GET['user_id'])){
        $get_user_id = $_GET['user_id']; 
     }

     $query = "SELECT * FROM users WHERE user_id = $get_user_id";
     $select = mysqli_query($connection, $query);
                    
    while($row = mysqli_fetch_assoc($select)){
        $username = $row['username'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_password = $row['user_password'];
        $user_image_name = $row['user_image'];
        $user_email = $row['user_email'];     
                                       
    }

   
  if(isset($_POST['edit_user'])){
      
       $username = $_POST['username'];
       $user_firstname = $_POST['user_firstname'];
       $user_lastname = $_POST['user_lastname'];
       $user_password = $_POST['user_password'];
      
       $username = mysqli_real_escape_string($connection, $username);
       $user_firstname = mysqli_real_escape_string($connection, $user_firstname);
       $user_lastname = mysqli_real_escape_string($connection, $user_lastname);
       
       $user_image = $_FILES['user_image']['name'];
       $user_image_temp = $_FILES['user_image']['tmp_name'];
       
       $user_email = $_POST['user_email'];
       $user_email = mysqli_real_escape_string($connection, $user_email);
       
       move_uploaded_file($user_image_temp, "../img/$user_image");
       
      // testiranje da li je nova slika unešena, ukoliko nije sačuvaj staru
       if(empty($user_image)){
           $query= "SELECT user_image FROM users WHERE user_id=$get_user_id";
           $select = mysqli_query($connection, $query);
           
           $row = mysqli_fetch_assoc($select);
           $user_image = $row['user_image'];
           
       }
       
       // testiranje da li je password promijenjen
       $password_query = "SELECT user_password FROM users WHERE user_id =$get_user_id";
       $password_result = mysqli_query($connection, $password_query);
       $row = mysqli_fetch_array($password_result);
       $db_password = $row['user_password'];
      
      
    if($user_password !== $db_password){
        $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost'=> 12));
        $query = "UPDATE users SET username='$username', user_password='$user_password', user_firstname='$user_firstname', user_lastname= '$user_lastname', user_email='$user_email',user_image='$user_image' WHERE user_id = $get_user_id"; 
    }else{
       $query = "UPDATE users SET username='$username', user_firstname='$user_firstname', user_lastname= '$user_lastname', user_email='$user_email',user_image='$user_image' WHERE user_id = $get_user_id";
    }
       
       
     // updateovanje podataka 
     $select = mysqli_query($connection, $query);
       
       if(!$select){
           die(mysqli_error($connection));
       }
       echo "Korisnik uspješno izmijenjen<br>";
       echo "<a href='users.php'>Vidi sve</a><br>";
      
   }

 ?>
   <form action="" method="post" enctype="multipart/form-data">
   <h1 class="text-center">EDIT USER</h1>
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input value="<?php echo $user_firstname; ?>" type="text" name="user_firstname" class="form-control">
    </div>
    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input value="<?php echo $user_lastname; ?>" type="text" name="user_lastname" class="form-control">
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input value="<?php echo $username; ?>" type="text" name="username" class="form-control">
    </div>
    <div class="form-group">
        <label for="username">Password</label>
        <input value="<?php echo $user_password; ?>" type="password" name="user_password" class="form-control">
    </div>
    <div class="form-group">
        <label for="user_image">Image</label>
        <img src="../img/<?php echo $user_image_name; ?>" width="100" height="100">
        <input type="file" name="user_image">
    </div>
    <div class="form-group">
        <label for="user_email">E-mail</label>
        <input value="<?php echo $user_email; ?>" type="text" name="user_email" class="form-control">
    </div>
    
    <div class="form-group">
        <input type="submit"  name="edit_user" value="Edit User" class="btn btn-primary">
    </div>
    
</form>