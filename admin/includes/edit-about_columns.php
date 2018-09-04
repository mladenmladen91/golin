 <?php 
     if(isset($_GET['aco_id'])){
        $get_about_columns_id = $_GET['aco_id']; 
     }

     $query = "SELECT * FROM about_columns WHERE about_column_id = $get_about_columns_id";
     $select = mysqli_query($connection, $query);
                    
    while($row = mysqli_fetch_assoc($select)){
        $about_column_title = $row['about_column_title'];
        $about_column_content = $row['about_column_content'];
        $about_column_image = $row['about_column_image'];
   }

   
  if(isset($_POST['edit_about_column'])){
      
       $new_about_column_title = $_POST['about_column_title'];
       $new_about_column_content = $_POST['about_column_content'];
       
       $new_about_column_title = mysqli_real_escape_string($connection, $new_about_column_title);
       $new_about_column_content = mysqli_real_escape_string($connection, $new_about_column_content);
       
       $about_column_image = $_FILES['about_column_image']['name'];
       $about_column_image_tmp = $_FILES['about_column_image']['tmp_name'];
      
       move_uploaded_file($about_column_image_tmp,'..img/$about_column_image');
      
       if(empty($about_column_image)){
           $query = "SELECT * FROM about_columns WHERE about_column_id=$get_about_columns_id";
           $result = mysqli_query($connection, $query);
           $row = mysqli_fetch_assoc($result);
           $about_column_image = $row['about_column_image'];
       }
    
       $query = "UPDATE about_columns SET about_column_title='$new_about_column_title', about_column_content='$new_about_column_content', about_column_image='$about_column_image' WHERE about_column_id = $get_about_columns_id";
    
       
       
     // updateovanje podataka 
     $select = mysqli_query($connection, $query);
       
       if(!$select){
           die(mysqli_error($connection));
       }
       header('location: ../index.php#about');
      
   }

 ?>
   <form action="" method="post" enctype="multipart/form-data">
   <h1 class="text-center">IZMIJENI SADRŽAJ</h1>
    <div class="form-group">
        <label for="about_column_title">Naslov</label>
        <input value="<?php echo $about_column_title; ?>" type="text" name="about_column_title" class="form-control">
    </div>
    <div class="form-group">
        <label for="about_column_image">Fotografija</label>
        <img src="../img/<?php echo $about_column_image; ?>" alt="column_image">
        <input type="file" name="about_column_image" class="form-control">
    </div>
    <div class="form-group">
        <label for="about_column_content">Sadržaj</label>
        <textarea name="about_column_content" id="editor-column" class="form-control"><?php echo $about_column_content; ?></textarea>
        <script>
        ClassicEditor
            .create( document.querySelector( '#editor-column' ) )
            .catch( error => {
                console.error( error );
            } );
        </script>
    </div>
   
    
    <div class="form-group">
        <input type="submit"  name="edit_about_column" value="Edit Column" class="btn btn-primary">
    </div>
    
</form>