<?php 
  $connection = mysqli_connect('localhost','root','','planner');

  if(!$connection){
  	die('error '.mysqli_error($connection));
  }

?>