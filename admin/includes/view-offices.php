
<table class="table table-bordered table-hover printit" style="margin-top: 35px !important;">
                          
                        <thead>     
                             <th>Id</th>
                             <th>Title</th>
                             <th>Location</th>
                             <th>Image</th>
                        </thead>
                        <tbody>
                             <?php
                                     $query = "select * from offices";
                                     $select = mysqli_query($connection, $query);
                    
                                     while($row = mysqli_fetch_assoc($select)){
                                       $office_id = $row['office_id'];
                                       $office_title = $row['office_title'];
                                       $office_image = $row['office_image'];
                                       $office_location = $row['office_location'];     
                                            
                                          
                                         
                                      echo "<tr>";
                                       echo "<td>$office_id</td>";
                                       echo "<td>$office_title</td>";
                                       echo "<td>$office_location</td>";
                                       echo "<td><img height='40' width='40' src='../img/$office_image' alt='office_image'></td>";
                                       echo "<td ><a class='btn btn-primary' href='offices.php?option=edit&office_id=$office_id'>EDIT</a></td>";
                                       echo "<td ><a class='btn btn-danger' href='offices.php?delete=$office_id'>DELETE</a></td>";     
                                      
                                    echo "</tr>";
                                     }
                                ?> 
                       </tbody>
</table>
              
              
              <?php 
                    if(isset($_GET['delete'])){
                            $delete_id = $_GET['delete'];
                           
                               $query = "DELETE FROM offices WHERE office_id=$delete_id";
                            $result = mysqli_query($connection, $query);
                            if(!result){
                                mysqli_error($connection);
                            }  
                            header('location: offices.php');
            }
              ?>
               