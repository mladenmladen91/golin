<!-- header including -->
<?php include "includes/header.php"; ?>

<section  class="pr_space">
	<div class="pr_content">
		<div id="pr" class="pr_communications">
		    <?php  
               $query = "SELECT * FROM pr WHERE pr_id=1";
               $result = mysqli_query($connection, $query);
               $row = mysqli_fetch_assoc($result);
               $com_id = $row['pr_id'];
               $com_title = $row['pr_title'];
               $com_content = $row['pr_content'];
               $com_image = $row['pr_image'];
            ?>
			<div class="pr_communications_content">
				<h1 style="font-style:italic"><b><?php echo strtoupper($com_title); ?></b></h1>
				<p><?php echo $com_content; ?></p>
                
                <?php if(isset($_SESSION['username'])): ?>
                   <p style="padding:1rem;"><a class="edit_link" href="admin/pr.php?option=edit&pr_id=<?php echo $com_id; ?>">EDIT</a></p>
                <?php endif; ?>
            </div>
			<img src="img/<?php echo $com_image; ?>" height="270" width="360" alt="image">
		</div>
		<div id="event" class="pr_management">
		    <?php  
               $query2 = "SELECT * FROM pr WHERE pr_id=2";
               $result2 = mysqli_query($connection, $query2);
               $row2 = mysqli_fetch_assoc($result2);
               $man_id = $row2['pr_id'];
               $man_title = $row2['pr_title'];
               $man_content = $row2['pr_content'];
               $man_image = $row2['pr_image'];
            ?>
			<div class="pr_management_content">
				<h1 style="font-style:italic"><?php echo strtoupper($man_title); ?></h1>
				<p><?php echo $man_content; ?></p>
                
                <?php if(isset($_SESSION['username'])): ?>
                   <p style="padding:1rem;"><a class="edit_link" href="admin/pr.php?option=edit&pr_id=<?php echo $man_id; ?>">EDIT</a></p>
                <?php endif; ?>
            </div>
			<img src="img/<?php echo $man_image; ?>" height="270" width="360" alt="image">
        </div>
	</div>
</section>

<section id="clients" class="clients_section">
   <div class="clients_container">	
	 <div class="clients_title"><h1>CLIENTS</h1></div>
	 <div class="clients_img">
	     <?php 
             if(isset($_POST['edit_client'])){
                $client_id = $_POST['client_id'];
                $client_moto = filter_var($_POST['client_moto'], FILTER_SANITIZE_STRING);         
                $client_image = $_FILES['client_image']['name'];
                         
                $client_image_tmp = $_FILES['client_image']['tmp_name'];
                 
                // function for updating images in clients section 
                updateClientsImage($client_id, $client_image, $client_moto, $client_image_tmp);
                         
            }
         
            $query3 = "SELECT * FROM clients";
            $result3 = mysqli_query($connection, $query3);
            while($row = mysqli_fetch_assoc($result3)){
               $client_image = $row['client_image'];
               $client_id = $row['client_id'];
               $client_moto = $row['client_moto'];    
         ?>
             
	 	   <div class="img_container"><img height="160" width="200" src="img/<?php echo $client_image; ?>" alt="client-img">
            <span class="client_moto"><?php echo strtoupper($client_moto); ?></span>   
	 	  <?php if(isset($_SESSION['username'])){ ?>
	 	    <div class="clients_edit_form">
	 	        <form action="" method="post" enctype="multipart/form-data">
                   <div class="form-group">
	 	              <input type="text" name="client_moto" value="<?php echo $client_moto ?>"> 
                       <input type="file" class="edit_schedule_link" name="client_image">
                      <input type="hidden" name="client_id" value="<?php echo $client_id; ?>">
	 	            </div>
	 	            <div class="form-group">
	 	              <input style="border:none" name="edit_client" value="Edit image" class="edit_schedule_link" type="submit" >
	 	            </div>     
	 	        </form>
	 	    </div>
            <?php } ?>	 	               
	 	  </div>
	 	<?php } ?>
          	 	
	</div>
	 <div class="clients_slide_active">
	   <div class="clients_bubble_container">	
	 	<div class="clients_bubble clients_bubble_active "></div>
	 	<div class="clients_bubble"></div>
	 	<div class="clients_bubble"></div>
	   </div>	
	 </div>
     <div class="arrow_container">
	   <img src="img/strelica.svg" height="15" width="15" class="clients-arrow">
	 </div>  
   </div>	
</section>

<section id="about" class="about_section">
	 <?php 
       $query = "SELECT * FROM about_content";
       $result = mysqli_query($connection, $query);
       $row = mysqli_fetch_assoc($result);
       $about_content_id = $row['about_content_id'];
       $about_title1 = $row['about_title1'];
       $about_title2 = $row['about_title2'];
       $about_p1 = $row['about_p1'];
       $about_p2 = $row['about_p2'];
       $about_p3 = $row['about_p3'];
   
     
     ?>
	<div class="about_content">
		<img src="img/go-all-in.gif" height="70" width="220">
        <h1><b><?php echo strtoupper($about_title1); ?></b></h1>
		<h3><?php echo $about_title2; ?></h3>
		<p><?php echo $about_p1; ?></p>
		<p><?php echo $about_p2; ?></p>
		<p><?php echo $about_p3; ?></p>
        <?php		 
		   if(isset($_SESSION['username'])){
               echo "<p><a class='edit_about_link' href='admin/about_content.php?option=edit&ac_id=$about_content_id'>EDIT</a></p>";
           }
        ?>    
	</div>
	<div class="about_desc">
	    <?php
        // deleting selected column
            if(isset($_POST['about_content_submit'])){
                            $delete_id = $_POST['about_column_id'];
                           
                               $query = "DELETE FROM about_columns WHERE about_column_id=$delete_id";
                            $result = mysqli_query($connection, $query);
                            if(!result){
                                mysqli_error($connection);
                            }  
                            header('location: index.php#about');
            }
        
        
        // printing columns from database
          $query7 = "SELECT * FROM about_columns";
          $result7 = mysqli_query($connection, $query7);
          $count = mysqli_num_rows($result7);
          while($row = mysqli_fetch_assoc($result7)){
              $about_column_id = $row['about_column_id'];
              $about_column_title = $row['about_column_title'];
              $about_column_content = $row['about_column_content'];
              $about_column_image = $row['about_column_image'];
        ?>
		<div class="about_desc_container">
			<img src="img/<?php echo $about_column_image; ?>" width="70" height="70">
			<h1 style="font-weight:bold"><b><?php echo strtoupper($about_column_title); ?></b></h1>
			<p><?php echo $about_column_content; ?> </p>
			<?php		 
		   if(isset($_SESSION['username'])){
               echo "<p><a class='edit_about_link' href='admin/about_column.php?option=edit&aco_id=$about_column_id'>EDIT</a></p>";
           ?> 
            <p>
                <form action="index.php" method="post">
                    <div class="form-group">
                        <input type="hidden" name="about_column_id" value="<?php echo $about_column_id; ?>">
                        <button type="submit" style="border:none;cursor:pointer;" class="edit_about_link" name="about_content_submit" onClick="return confirm('Are you sure?')">DELETE</button>
                    </div>
                </form>
            </p>  
         <?php } ?>
		</div>
		<?php } 
            if(isset($_SESSION['username'])){
         ?>
            <div class="about_desc_container">
               <a class="office_new_column" href="admin/about_column.php?option=add_new"><b>+</b></a>
            </div>
        <?php } ?>    
	</div>
</section>
<section class="offices_section" id="offices">
   <div class="offices_container">	
       <div class="offices_title_container"><h1>OFFICES</h1></div>
    <div class="offices_location">
    	<a class="location_link location_active" href="#">EMEA</a>
    	<a class="location_link" href="#">AMERICAS</a>
    	<a class="location_link" href="#">ASIA</a>
    </div>
   </div>
   <div class="offices_img">
      
       <?php
         //deleting selected office
         if(isset($_POST['office_submit'])){
                            $delete_id = $_POST['office_id'];
                           
                               $query = "DELETE FROM offices WHERE office_id=$delete_id";
                            $result = mysqli_query($connection, $query);
                            if(!result){
                                mysqli_error($connection);
                            }  
                            header('location: index.php#offices');
            }
          
       // printing offices from datbase
         $query8 = "SELECT * FROM offices";
         $result8 = mysqli_query($connection, $query8);
         while($row = mysqli_fetch_assoc($result8)){
              $office_id = $row['office_id'];
              $office_title = $row['office_title'];
              $office_image = $row['office_image'];
              $office_location = $row['office_location'];
       ?>     
   	   <div class="office_img_container <?php echo $office_location; ?>">
   	   	  <img  height="120" width="120" src="img/<?php echo $office_image; ?>" alt="office">
   	   	  <span class="img_name"><b><?php echo strtoupper($office_title); ?></b></span>
   	   	  <?php
            if(isset($_SESSION['username'])){
          ?>
   	   	  <p style="padding: .5rem;text-align:center;"><a class="edit_schedule_link" href="admin/offices.php?option=edit&office_id=<?php echo $office_id; ?>">EDIT</a></p>
   	   	  <p>
   	   	       <form class="office_form"  action="index.php" method="post">
                    <div class="form-group text-center">
                        <input type="hidden" name="office_id" value="<?php echo $office_id; ?>">
                        <button type="submit" style="border:none;cursor:pointer;" class="edit_schedule_link" name="office_submit" onClick="return confirm('Are you sure?')">DELETE</button>
                    </div>
                </form>
   	   	  </p>
   	   	  <p></p>
   	   	  <?php } ?>
   	   </div>
   	   <?php } ?>
   	    <?php
          if(isset($_SESSION['username'])){
        ?> 
            <div class="offices_add">
               <a class="office_new_column" href="admin/offices.php?option=add_new"><b>+</b></a>
            </div>
        <?php  } ?>     
   </div> 
   
</section>

<section id="contact" class="contact_section">
  <div class="contact_parent">
     <div class="contact_container">	
	  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2944.254120156726!2d19.247660314860433!3d42.44360893781476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x134deb305185d703%3A0x3864f3a9972de2d4!2sAmplitudo+DOO!5e0!3m2!1ssr!2s!4v1534012574296" width="330" height="245" frameborder="0" style="border:0" allowfullscreen></iframe>
	  
	  <!-- getting contact info -->
	  <?php   
         $query8 = "SELECT * FROM contact WHERE contact_id=1";
         $result8 = mysqli_query($connection, $query8);
         $row = mysqli_fetch_assoc($result8);
         $contact_address = $row['contact_address'];
         $contact_phone = $row['contact_phone'];
         $contact_email = $row['contact_email'];
      ?>
	   <div class="contact_content">
		<h1 class="contact_content_contact">CONTACT</h1>
		<span><?php echo $contact_address; ?></span><br>
		<span><?php echo $contact_phone; ?></span><br>
		<span><?php echo $contact_email; ?></span><br>
		<?php if(isset($_SESSION['username'])){ ?> 
            <p>
               <a class="edit_about_link" href="admin/contact.php?option=edit&contact_id=1">EDIT</a>
            </p>
        <?php  } ?>
	  </div>
     </div>
  </div>
</section>
<!-- footer including -->
<?php include "includes/footer.php"; ?>
