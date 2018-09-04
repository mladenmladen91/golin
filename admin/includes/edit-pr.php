 <?php 
     if(isset($_GET['pr_id'])){
        $get_pr_id = $_GET['pr_id']; 
     }

     $query = "SELECT * FROM pr WHERE pr_id = $get_pr_id";
     $select = mysqli_query($connection, $query);
                    
    while($row = mysqli_fetch_assoc($select)){
        $pr_title = $row['pr_title'];
        $pr_content = $row['pr_content'];
        $pr_image = $row['pr_image'];
             
   }

   
  if(isset($_POST['edit_article'])){
      
       $new_pr_title = $_POST['pr_title'];
       $new_pr_content = $_POST['pr_content'];
      
       $new_pr_title = mysqli_real_escape_string($connection, $new_pr_title);
       $new_pr_content = mysqli_real_escape_string($connection, $new_pr_content);
       
       $new_pr_image = $_FILES['new_pr_image']['name'];
       $new_pr_image_temp = $_FILES['new_pr_image']['tmp_name'];
       
       
       
       move_uploaded_file($new_pr_image_temp, "../img/$new_pr_image");
       
      // testiranje da li je nova slika unešena, ukoliko nije sačuvaj staru
       if(empty($new_pr_image)){
           $query= "SELECT pr_image FROM pr WHERE pr_id=$get_pr_id";
           $select = mysqli_query($connection, $query);
           
           $row = mysqli_fetch_assoc($select);
           $new_pr_image = $row['pr_image'];
           
       }
       
    
       $query = "UPDATE pr SET pr_title='$new_pr_title', pr_content='$new_pr_content', pr_image= '$new_pr_image' WHERE pr_id = $get_pr_id";
    
       
       
     // updateovanje podataka 
     $select = mysqli_query($connection, $query);
       
       if(!$select){
           die(mysqli_error($connection));
       }
       header('location: ../index.php#pr');
      
   }

 ?>
   <form action="" method="post" enctype="multipart/form-data">
   <h1 class="text-center">IZMIJENI SADRŽAJ</h1>
    <div class="form-group">
        <label for="pr_title">Naslov</label>
        <input value="<?php echo $pr_title; ?>" type="text" name="pr_title" class="form-control">
    </div>
    <div class="form-group">
        <label for="pr_content">Sadržaj</label>
        <textarea name="pr_content" id="pr_content" class="form-control"><?php echo $pr_content; ?></textarea>
        <script>
        ClassicEditor
            .create( document.querySelector( '#pr_content' ) )
            .catch( error => {
                console.error( error );
            } );
        </script>
    </div>
    <div class="form-group">
        <label for="pr_image">Fotografija</label>
        <img src="../img/<?php echo $pr_image; ?>" width="100" height="100">
        <input type="file" name="new_pr_image">
    </div>
    <div class="form-group">
        <input type="submit"  name="edit_article" value="Edit Article" class="btn btn-primary">
    </div>
    
</form>