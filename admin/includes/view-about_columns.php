
<table class="table table-bordered table-hover printit" style="margin-top: 35px !important;">
                          
                        <thead>     
                             <th>Id</th>
                             <th>Title</th>
                             <th>Content</th>
                             <th>Image</th>
                        </thead>
                        <tbody>
                             <?php
                                     $query = "select * from about_columns";
                                     $select = mysqli_query($connection, $query);
                    
                                     while($row = mysqli_fetch_assoc($select)){
                                       $about_column_id = $row['about_column_id'];
                                       $about_column_title = $row['about_column_title'];
                                       $about_column_content = $row['about_column_content'];
                                       $about_column_image = $row['about_column_image'];     
                                            
                                          
                                         
                                      echo "<tr>";
                                       echo "<td>$about_column_id</td>";
                                       echo "<td>$about_column_title</td>";
                                       echo "<td>$about_column_content</td>";
                                       echo "<td><img height='40' width='40' src='../img/$about_column_image' alt='column_image'></td>";
                                       echo "<td ><a class='btn btn-primary' href='about_column.php?option=edit&aco_id=$about_column_id'>EDIT</a></td>";
                                       echo "<td ><a class='btn btn-danger' href='about_column.php?delete=$about_column_id'>DELETE</a></td>";     
                                      
                                    echo "</tr>";
                                     }
                                ?> 
                       </tbody>
</table>
              
              
              <?php 
                    if(isset($_GET['delete'])){
                            $delete_id = $_GET['delete'];
                           
                               $query = "DELETE FROM about_columns WHERE about_column_id=$delete_id";
                            $result = mysqli_query($connection, $query);
                            if(!result){
                                mysqli_error($connection);
                            }  
                            header('location: about_column.php');
            }
              ?>
               