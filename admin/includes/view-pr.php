
<table class="table table-bordered table-hover printit" style="margin-top: 35px !important;">
                          
                        <thead>     
                             <th>Id</th>
                             <th>Title</th>
                             <th>Content</th>
                             <th>Image</th>
                        </thead>
                        <tbody>
                             <?php
                                     $query = "select * from pr";
                                     $select = mysqli_query($connection, $query);
                    
                                     while($row = mysqli_fetch_assoc($select)){
                                       $pr_id = $row['pr_id'];
                                       $pr_title = $row['pr_title'];
                                       $pr_content = $row['pr_content'];
                                       $pr_image = $row['pr_image'];
                                          
                                         
                                      echo "<tr>";
                                       echo "<td>$pr_id</td>";
                                       echo "<td>$pr_title</td>";
                                       echo "<td>$pr_content</td>";
                                       echo "<td><img alt='pr' height='40' width='40' src='../img/$pr_image'></td>";
                                       
                                       echo "<td ><a class='btn btn-primary' href='pr.php?option=edit&pr_id=$pr_id'>EDIT</a></td>";
                                      
                                    echo "</tr>";
                                     }
                                ?> 
                       </tbody>
</table>
               