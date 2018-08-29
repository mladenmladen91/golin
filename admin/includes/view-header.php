
<table class="table table-bordered table-hover printit" style="margin-top: 35px !important;">
                          
                        <thead>     
                             <th>Id</th>
                             <th>Title</th>
                             <th>Content</th>
                       </thead>
                        <tbody>
                             <?php
                                     $query = "select * from header";
                                     $select = mysqli_query($connection, $query);
                    
                                     while($row = mysqli_fetch_assoc($select)){
                                       $header_id = $row['header_id'];
                                       $header_title = $row['header_title'];
                                       $header_content = $row['header_content'];
                                       
                                      echo "<tr>";
                                       echo "<td>$header_id</td>";
                                       echo "<td>$header_title</td>";
                                       echo "<td>$header_content</td>";
                                      echo "<td ><a class='btn btn-primary' href='header_content.php?option=edit&h_id=$header_id'>EDIT</a></td>";
                                      
                                    echo "</tr>";
                                     }
                                ?> 
                       </tbody>
</table>
                        
                     