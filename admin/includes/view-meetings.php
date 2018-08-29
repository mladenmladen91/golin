 
   



<form action="" method="post"> 
    <div  class="col-xs-6">
            <span>Odaberi datum:</span>
            <input type="text" autocomplete="off" id="date_from" name="date_from" value="<?php echo isset($_POST['date_from'])? $_POST['date_from']:'' ?>">
            <span>do</span>
            <input type="text" autocomplete="off" id="date_to" name="date_to" value="<?php echo isset($_POST['date_to'])? $_POST['date_to']:'' ?>">
    </div>
    <div  class="col-xs-4">
            <span>Odaberi vrijeme:</span>
            <input type="time" name="time_from" value="<?php echo isset($_POST['time_from'])? $_POST['time_from']:'' ?>">
            <span>do</span>
            <input type="time" name="time_to" value="<?php echo isset($_POST['time_to'])? $_POST['time_to']:'' ?>">
    </div>     
    <div class="col-xs-2 input-group">
       <input type="submit" name="search" class="btn btn-primary" value="Pretraži">
    </div> 
</form>                          
 
<table class="table table-bordered table-hover printit" style="margin-top: 35px !important;">
                          
                        <thead>     
                             <th>Id</th>
                             <th>Name</th>
                             <th>Company</th>
                             <th>Email</th>
                             <th>Phone</th>
                             <th>Date</th>
                             <th>Time</th>
                             <th>Status</th>
                             <th class="not_shown"><button class="btn btn-primary" onclick="window.print()">Štampaj tabelu</button></th>   
                        </thead>
                        <tbody>
                              <?php
                                  $message = "";
                                  if(isset($_POST['search'])){
                                      
                                      if(empty($_POST['date_from']) || empty($_POST['date_to']) || empty($_POST['time_from']) || empty($_POST['time_to'])){
                                          $message = "<div class='col-xs-12 text-center' style='color:red'>Morate popuniti sva polja</div>";
                                          
                                          $query = "SELECT * FROM meetings";
                                      }else{
                                          $date_from = $_POST['date_from'];
                                          $date_to = $_POST['date_to'];
                                          $time_from = $_POST['time_from'];
                                          $time_to = $_POST['time_to'];
                                          if($date_from > $date_to || $date_from == $date_to && $time_from > $time_to ){
                                               $message = "<div class='col-xs-12 text-center' style='color:red'>Prvo polje ne smije biti veće od drugog</div>";
                                              
                                              $query = "SELECT * FROM meetings";
                                          }else{
                                              $query = "SELECT * FROM meetings WHERE meet_date BETWEEN '$date_from' AND '$date_to' AND meet_time BETWEEN '$time_from' AND '$time_to'";
                                          }
                                      }
                                      
                                      
                                  }else{
                                     $query = "select * from meetings";
                                  }
                                
                                            echo $message;
                                      
                                     $selecto = mysqli_query($connection, $query);
                    
                                     while($row = mysqli_fetch_assoc($selecto)){
                                       $meet_id = $row['meet_id'];
                                       $meet_name = $row['meet_name'];
                                       $meet_company = $row['meet_company'];
                                       $meet_email = $row['meet_mail'];
                                       $meet_phone = $row['meet_phone'];
                                       $meet_date = $row['meet_date'];
                                       $meet_time = $row['meet_time'];
                                       $meet_status = $row['meet_status'];     
                                         
                                      echo "<tr>";
                                       echo "<td>$meet_id</td>";
                                       echo "<td>$meet_name</td>";
                                       echo "<td>$meet_company</td>";
                                       echo "<td>$meet_email</td>";
                                       echo "<td>$meet_phone</td>";
                                       echo "<td>$meet_date</td>";
                                       echo "<td>$meet_time</td>";
                                       echo "<td>$meet_status</td>";
                                       echo "<td class='not_shown'><a class='btn btn-danger' href='meetings.php?option=odbij&meet_id=$meet_id'>ODBIJ</a></td>";
                                         
                                      if($meet_status == 'cekanje'){     
                                        echo "<td class='not_shown'><a class='btn btn-primary' href='meetings.php?option=prihvati&meet_id=$meet_id'>PRIHVATI</a></td>";
                                      }else{
                                        echo "<td class='not_shown'><a class='btn btn-primary' href='meetings.php?option=cekanje&meet_id=$meet_id'>ČEKANJE</a></td>";  
                                      }
                                    echo "</tr>";
                                     }
                                ?> 
                       </tbody>
</table>
                        
                        
                        <?php
                             if(isset($_GET['option'])){
                                 $meet_id = $_GET['meet_id'];
                                 $option = $_GET['option'];
                                 
                                 switch($option){
                                     case 'odbij':
                                     $query = "DELETE FROM meetings WHERE meet_id =$meet_id";
                                     break;
                                    
                                     case 'prihvati':
                                     $query = "UPDATE meetings SET meet_status = 'prihvacen' WHERE meet_id =$meet_id";
                                     break;
                                      
                                     case 'cekanje':
                                     $query = "UPDATE meetings SET meet_status = 'cekanje' WHERE meet_id =$meet_id";
                                     break;     
                                         
                                 }
                                 
                                 $option_result = mysqli_query($connection, $query);
                                 if(!$option_result){
                                     die(mysqli_error($connection));
                                 }
                                 header('location: meetings.php');
                                 
                             }
                        ?> 