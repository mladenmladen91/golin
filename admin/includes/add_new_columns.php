<?php
// inserting column in about sections
   if(isset($_POST['add_column'])){
       $title = $_POST['title'];
       $content = $_POST['content'];
       
       $title = mysqli_real_escape_string($connection, $title);
       $content = mysqli_real_escape_string($connection, $content);
       
       $image = $_FILES['image']['name'];
       $image_temp = $_FILES['image']['tmp_name'];
       
       
       if(empty($title) || empty($content)){
           echo "<p>Morate popuniti polja naslov i sadržaj</p>";
       }else{
        
     
          $query= "INSERT INTO about_columns(about_column_title, about_column_content, about_column_image) VALUES('$title', '$content', '$image')";
       
         move_uploaded_file($image_temp,"../img/$image");
       
          $insert_column = mysqli_query($connection, $query);
       
          if(!$insert_column){
             die(mysqli_error($connection));
          }
       
         header('location: ../index.php#about');
    
       }
       
       }
?>
   

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Naslov</label>
        <input type="text" name="title" class="form-control">
    </div>
   <div class="form-group">
        <label for="image">Fotografija</label>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label for="content">Sadržaj</label>
        <textarea name="content" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" name="add_column" value="Add Column" class="btn btn-primary">
    </div>
    
</form>