 <?php 
     if(isset($_GET['ac_id'])){
        $get_ac_id = $_GET['ac_id']; 
     }

     $query = "SELECT * FROM about_content WHERE about_content_id = $get_ac_id";
     $select = mysqli_query($connection, $query);
                    
    while($row = mysqli_fetch_assoc($select)){
        $about_title1 = $row['about_title1'];
        $about_title2 = $row['about_title2'];
        $about_p1 = $row['about_p1'];
        $about_p2 = $row['about_p2'];
        $about_p3 = $row['about_p3'];
             
   }

   
  if(isset($_POST['edit_about_content'])){
      
       $new_about_title1 = $_POST['about_title1'];
       $new_about_title2 = $_POST['about_title2'];
       $new_about_p1 = $_POST['about_p1'];
       $new_about_p2 = $_POST['about_p2'];
       $new_about_p3 = $_POST['about_p3'];
       
       $new_about_title1 = mysqli_real_escape_string($connection, $new_about_title1);
       $new_about_title2 = mysqli_real_escape_string($connection, $new_about_title2);
       $new_about_p1 = mysqli_real_escape_string($connection, $new_about_p1);
       $new_about_p2 = mysqli_real_escape_string($connection, $new_about_p2);
       $new_about_p3 = mysqli_real_escape_string($connection, $new_about_p3);
       
      
       
    
       $query = "UPDATE about_content SET about_title1='$new_about_title1', about_title2='$new_about_title2', about_p1='$new_about_p1', about_p2='$new_about_p2', about_p3='$new_about_p3' WHERE about_content_id = $get_ac_id";
    
       
       
     // updateovanje podataka 
     $select = mysqli_query($connection, $query);
       
       if(!$select){
           die(mysqli_error($connection));
       }
       header('location: ../index.php#about');
      
   }

 ?>
   <form action="" method="post">
   <h1 class="text-center">IZMIJENI SADRŽAJ</h1>
    <div class="form-group">
        <label for="about_title1">Naslov1</label>
        <input value="<?php echo $about_title1; ?>" type="text" name="about_title1" class="form-control">
    </div>
    <div class="form-group">
        <label for="about_title2">Naslov2</label>
        <input value="<?php echo $about_title2; ?>" type="text" name="about_title2" class="form-control">
    </div>
    <div class="form-group">
        <label for="about_p1">Sadržaj1</label>
        <textarea name="about_p1" class="form-control"><?php echo $about_p1; ?></textarea>
    </div>
    <div class="form-group">
        <label for="about_p2">Sadržaj2</label>
        <textarea name="about_p2" class="form-control"><?php echo $about_p2; ?></textarea>
    </div>
    <div class="form-group">
        <label for="about_p3">Sadržaj3</label>
        <textarea name="about_p3" class="form-control"><?php echo $about_p3; ?></textarea>
    </div>
    
    <div class="form-group">
        <input type="submit"  name="edit_about_content" value="Edit Headings" class="btn btn-primary">
    </div>
    
</form>