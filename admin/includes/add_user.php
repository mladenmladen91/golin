<?php 
   if(isset($_POST['add_user'])){
       $username = $_POST['username'];
       $user_password = $_POST['user_password'];
       $user_firstname = $_POST['user_firstname'];
       $user_lastname = $_POST['user_lastname'];
       
       $username = mysqli_real_escape_string($connection, $username);
       $user_password = mysqli_real_escape_string($connection, $user_password);
       $user_firstname = mysqli_real_escape_string($connection, $user_firstname);
       $user_lastname = mysqli_real_escape_string($connection, $user_lastname);
       
       $user_image = $_FILES['user_image']['name'];
       $user_temp = $_FILES['user_image']['tmp_name'];
       
       $user_email = $_POST['user_email'];
       $user_email = mysqli_real_escape_string($connection, $user_email);
       
       // provjeravanje da li je zauzet username
       $exists = "false";
       $username_query = "SELECT username from users";
       $username_result = mysqli_query($connection, $username_query);
       
       if(!$username_result){
           die(mysqli_error($connection));
       }
       while($row = mysqli_fetch_assoc($username_result)){
              $db_username = $row['username'];
           if($username === $db_username){
               $exists = "true";
               break;
           } 
           
       }
       
       
       // provjera validnosti
       if(empty($username) || empty($user_password)){
           echo "<p>Morate popuniti polja username i password</p>";
       }else{
        
       if($exists === "true"){
          echo "<p>Username je već iskorišćen</p>"; 
       }else{    
          $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost'=> 12));
       
          $query= "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_image, user_email) VALUES('$username', '$user_password', '$user_firstname', '$user_lastname','$user_image', '$user_email')";
       
          move_uploaded_file($user_temp, "../img/$user_image");
       
          $insert_user = mysqli_query($connection, $query);
       
          if(!$insert_user){
             die(mysqli_error($connection));
          }
       
          echo "<p>Korisnik uspješno kreiran</p>";
          echo "<p><a href='users.php'>Vidite korisnike</a></p>";
    
       }
       
       }
                                      
   }

?>
   

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control">
    </div>
    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" name="user_password" class="form-control">
    </div>
    <div class="form-group">
        <label for="user_firstname">Ime</label>
        <input type="text" name="user_firstname" class="form-control">
    </div>
    <div class="form-group">
        <label for="user_lastname">Prezime</label>
        <input type="text" name="user_lastname" class="form-control">
    </div>
    <div class="form-group">
        <label for="user_image">Fotografija</label>
        <input type="file" name="user_image">
    </div>
    <div class="form-group">
        <label for="user_email">E-mail</label>
        <input type="text" name="user_email" class="form-control">
    </div>
    <div class="form-group">
        <input type="submit"  name="add_user" value="Add User" class="btn btn-primary">
    </div>
    
</form>