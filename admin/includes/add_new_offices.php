<?php
// inserting column in about sections
   if(isset($_POST['add_office'])){
       $title = $_POST['title'];
       $location = $_POST['location'];
       
       $title = mysqli_real_escape_string($connection, $title);
       $location = mysqli_real_escape_string($connection, $location);
       
       $image = $_FILES['image']['name'];
       $image_temp = $_FILES['image']['tmp_name'];
       
       
       if(empty($title)){
           echo "<p>Morate popuniti polja ime grada</p>";
       }else{
        
     
          $query= "INSERT INTO offices(office_title, office_image, office_location) VALUES('$title', '$image', '$location')";
       
         move_uploaded_file($image_temp,"../img/$image");
       
          $insert_office = mysqli_query($connection, $query);
       
          if(!$insert_office){
             die(mysqli_error($connection));
          }
       
         header('location: ../index.php#office');
    
       }
       
       }
?>
   

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Grad</label>
        <input type="text" name="title" class="form-control">
    </div>
   <div class="form-group">
        <label for="image">Fotografija</label>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label for="location">Lokacija</label>
        <select name="location" class="form-control">
            <option value="offices_default emea">Emea</option>
            <option value="americas">America</option>
            <option value="asia">Asia</option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" name="add_office" value="Add Office" class="btn btn-primary">
    </div>
    
</form>