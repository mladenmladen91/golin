 <?php 
     if(isset($_GET['h_id'])){
        $get_header_id = $_GET['h_id']; 
     }

     $query = "SELECT * FROM header WHERE header_id = $get_header_id";
     $select = mysqli_query($connection, $query);
                    
    while($row = mysqli_fetch_assoc($select)){
        $header_title = $row['header_title'];
        $header_content = $row['header_content'];
       
             
   }

   
  if(isset($_POST['edit_header'])){
      
       $new_header_title = $_POST['header_title'];
       $new_header_content = $_POST['header_content'];
      
       $new_header_title = mysqli_real_escape_string($connection, $new_header_title);
       $new_header_content = mysqli_real_escape_string($connection, $new_header_content);
      
       $query = "UPDATE header SET header_title='$new_header_title', header_content='$new_header_content' WHERE header_id = $get_header_id";
       
       // updateovanje podataka 
       $select = mysqli_query($connection, $query);
       
       if(!$select){
           die(mysqli_error($connection));
       }
       header('location: ../index.php#home');
      
   }

 ?>
   <form action="" method="post">
   <h1 class="text-center">IZMIJENI SADRŽAJ ZAGLAVLJA</h1>
    <div class="form-group">
        <label for="header_title">Naslov</label>
        <input value="<?php echo $header_title; ?>" type="text" name="header_title" class="form-control">
    </div>
    <div class="form-group">
        <label for="header_content">Sadržaj</label>
        <textarea name="header_content" class="form-control"><?php echo $header_content; ?></textarea>
    </div>
    
    <div class="form-group">
        <input type="submit"  name="edit_header" value="Edit Header Content" class="btn btn-primary">
    </div>
    
</form>