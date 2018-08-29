 <?php 
     if(isset($_GET['contact_id'])){
        $get_contact_id = $_GET['contact_id']; 
     }

// getting the data from the id that was sent
     $query = "SELECT * FROM contact WHERE contact_id = $get_contact_id";
     $select = mysqli_query($connection, $query);
                    
    while($row = mysqli_fetch_assoc($select)){
        $contact_address = $row['contact_address'];
        $contact_phone = $row['contact_phone'];
        $contact_email = $row['contact_email'];
   }

   
  if(isset($_POST['edit_contact'])){
      
       $new_contact_address = $_POST['contact_address'];
       $new_contact_phone = $_POST['contact_phone'];
       $new_contact_email = $_POST['contact_email'];
       
       $new_contact_address = mysqli_real_escape_string($connection, $new_contact_address);
       $new_contact_phone = mysqli_real_escape_string($connection, $new_contact_phone);
       $new_contact_email = mysqli_real_escape_string($connection, $new_contact_email);
       
       
      
       
    
       $query = "UPDATE contact SET contact_address='$new_contact_address', contact_phone='$new_contact_phone' WHERE contact_id = $get_contact_id";
    
       
       
     // updateovanje podataka 
     $select = mysqli_query($connection, $query);
       
       if(!$select){
           die(mysqli_error($connection));
       }
       header('location: ../index.php#contact');
      
   }

 ?>
   <form action="" method="post">
   <h1 class="text-center">IZMIJENI KONTAKT</h1>
    <div class="form-group">
        <label for="contact_address">Adresa</label>
        <input value="<?php echo $contact_address; ?>" type="text" name="contact_address" class="form-control">
    </div>
    <div class="form-group">
        <label for="contact_phone">Telefon</label>
        <input value="<?php echo $contact_phone; ?>" type="text" name="contact_phone" class="form-control">
    </div>
    <div class="form-group">
        <label for="contact_email">E-mail</label>
        <input value="<?php echo $contact_email; ?>" type="text" name="contact_email" class="form-control">
    </div>
       
    
    <div class="form-group">
        <input type="submit"  name="edit_contact" value="Edit Contact" class="btn btn-primary">
    </div>
    
</form>