<?php ob_start(); ?>
<?php session_start(); ?>

<!-- Including database connection -->
<?php include "includes/db.php"; ?>
<?php include "includes/functions.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width= device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    
	<title>Golin pg</title>
</head>
<body>
 <div class="popup" id="popup">
 	<form action="" method="post" class="meeting_form">
 		<div  class="meeting_form_title">
 			<img src="img/golinlogo.svg" height="60" width="120">
 			<span>Zakažite sastanak sa nekim od poslodavaca</span>
 		</div>
 		<div class="close_container"><a class="form_close" href="#home"><img src="img/close.svg" height="20" width="20"></a></div>
 		<div class="input_group" >
 			<input type="text" class="input_fill" placeholder="Ime i prezime" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''  ?>" name="name">
 		</div>
 		<div class="input_group">
 			<input type="text" class="input_fill" placeholder="Firma" value="<?php echo isset($_POST['company']) ? $_POST['company'] : ''  ?>" name="company">
 		</div>
 		<div class="input_group">
 			<input type="text" class="input_fill" placeholder="E-mail" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''  ?>">
 		</div>
 		<div class="input_group">
 			<input type="text" class="input_fill" placeholder="Broj telefona" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : ''  ?>" name="phone">
 		</div>
 		<div class="input_group_2">
 		    <input type="text" id="date_picker" autocomplete="off" class="date" placeholder="mm/dd/yy" name="date" value="<?php echo isset($_POST['date']) ? $_POST['date'] : ''  ?>">
 		    <input type="time" class="time" placeholder="00:00" name="time" value="<?php echo isset($_POST['time']) ? $_POST['time'] : ''  ?>">
 		</div>
 		<div class="input_group">
 			<input type="submit" id="submit_btn" class="schedule-btn" value="ZAKAŽI" name="schedule">
 		</div>
        <!-- processing and validating data -->
 		<?php insertData(); ?>
 	</form>
 </div>	
 <header id="home">
 	<div class="header_social">
 	    <div class="social_network">
 	    <?php if(!isset($_SESSION['username'])){  ?>
 	        <a class="login_link" href="login.php">LOGIN</a>
 	    <?php }else{ ?>
            <a class="login_link" href="admin/">ADMIN</a>
            <a class="login_link" href="logout.php">ODJAVI ME</a>
 	    <?php } ?>   
 		 <a href="#"><img src="img/fb.svg" height="12" width="12"></a>
 		 <a href="#"><img src="img/twiter.svg" height="12" width="12"></a>
 		 <a href="#"><img src="img/linkedin.svg" height="12" width="12"></a>
 		 <a href="#"><img src="img/instagram.svg" height="12" width="12"></a>
 	    </div>
 	</div>
 	<!-- navigation including -->
 	<?php include "includes/navigation.php";  ?>
 	<div class="header_schedule">
 		<div class="schedule">
 		   <?php  
               $query = "SELECT * FROM header WHERE header_id=1";
               $result = mysqli_query($connection, $query);
               $row = mysqli_fetch_assoc($result);
               $header_id = $row['header_id'];
               $header_title = $row['header_title'];
               $header_content = $row['header_content'];
               
            ?>
 			<div class="schedule_content">
 				<h1><b><?php echo strtoupper($header_title); ?></b></h1>
 				<p style="padding-bottom: 0;margin-bottom:0;"><?php echo $header_content; 
                     if(isset($_SESSION['username'])){
                         echo "<a class='edit_schedule_link' href='admin/header_content.php?option=edit&h_id=$header_id'>EDIT</a>";
                     }    
                ?></p>
                <p><a href="#popup" class="schedule-btn"><strong>ZAKAŽI SASTANAK</strong></a></p>
 			</div>
 		</div>
 	</div>
 </header>
  <nav class="responsive_nav" id="nav2">
 	<a href="#pr">PR AND COMMUNICATIONS</a>
 	<a href="#event">EVENT MANAGEMENT</a>
 	<a href="#clients">CLIENTS</a>
 	<a href="#about">ABOUT US</a>
 	<a href="#offices">OFFICES</a>
 	<a href="#contact">CONTACT</a>
 </nav>
