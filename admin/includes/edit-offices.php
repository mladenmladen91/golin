 <?php 
     if(isset($_GET['office_id'])){
        $get_office_id = $_GET['office_id']; 
     }

     $query = "SELECT * FROM offices WHERE office_id = $get_office_id";
     $select = mysqli_query($connection, $query);
                    
    while($row = mysqli_fetch_assoc($select)){
        $office_title = $row['office_title'];
        $office_location = $row['office_location'];
        $office_image = $row['office_image'];
   }

   
  if(isset($_POST['edit_office'])){
      
       $new_office_title = $_POST['office_title'];
       $new_office_location = $_POST['office_location'];
       
       $new_office_title = mysqli_real_escape_string($connection, $new_office_title);
       $new_office_location = mysqli_real_escape_string($connection, $new_office_location);
       
       $new_office_image = $_FILES['office_image']['name'];
       $new_office_image_tmp = $_FILES['office_image']['tmp_name'];
      
       move_uploaded_file($about_column_image_tmp,'..img/$about_column_image');
      
       if(empty($new_office_image)){
           $query = "SELECT * FROM offices WHERE office_id=$get_office_id";
           $result = mysqli_query($connection, $query);
           $row = mysqli_fetch_assoc($result);
           $new_office_image = $row['office_image'];
       }
    
       $query = "UPDATE offices SET office_title='$new_office_title', office_image='$new_office_image', office_location='$new_office_location' WHERE office_id = $get_office_id";
    
       
       
     // updateovanje podataka 
     $select = mysqli_query($connection, $query);
       
       if(!$select){
           die(mysqli_error($connection));
       }
       header('location: ../index.php#offices');
      
   }

 ?>
   <form action="" method="post" enctype="multipart/form-data">
   <h1 class="text-center">IZMIJENI SADRŽAJ</h1>
    <div class="form-group">
        <label for="office_title">Naslov</label>
        <input value="<?php echo $office_title; ?>" type="text" name="office_title" class="form-control">
    </div>
    <div class="form-group">
        <label for="office_image">Fotografija</label>
        <img src="../img/<?php echo $office_image ?>" alt="column_image">
        <input type="file" name="office_image" class="form-control">
    </div>
    <div class="form-group">
        <label for="office_location">Lokacija</label>
        <select name="office_location">
        <?php    
            if($office_location == 'asia'){
                echo "<option value='asia'>Asia</option>";
                echo "<option value='offices_default emea'>Emea</option>";
                echo "<option value='americas'>America</option>";
            }else if($office_location == 'americas'){
                echo "<option value='americas'>America</option>";
                echo "<option value='offices_default emea'>Emea</option>";
                echo "<option value='asia'>Asia</option>";
            }else{
                echo "<option value='offices_default emea'>Emea</option>";
                echo "<option value='americas'>America</option>";
                echo "<option value='asia'>Asia</option>"; 
            }
        ?>            
        </select>
    </div>
   
    
    <div class="form-group">
        <input type="submit"  name="edit_office" value="Edit Office" class="btn btn-primary">
    </div>
    
</form>