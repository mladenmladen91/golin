
<table class="table table-bordered table-hover printit" style="margin-top: 35px !important;">
                          
                        <thead>     
                             <th>Id</th>
                             <th>Title1</th>
                             <th>Title2</th>
                             <th>Paragraph1</th>
                             <th>Paragraph2</th>
                             <th>Paragraph3</th>
                        </thead>
                        <tbody>
                             <?php
                                     $query = "select * from about_content";
                                     $select = mysqli_query($connection, $query);
                    
                                     while($row = mysqli_fetch_assoc($select)){
                                       $about_content_id = $row['about_content_id'];
                                       $about_title1 = $row['about_title1'];
                                       $about_title2 = $row['about_title2'];
                                       $about_p1 = $row['about_p1'];
                                       $about_p2 = $row['about_p2'];
                                       $about_p3 = $row['about_p3'];     
                                          
                                         
                                      echo "<tr>";
                                       echo "<td>$about_content_id</td>";
                                       echo "<td>$about_title1</td>";
                                       echo "<td>$about_title2</td>";
                                       echo "<td>$about_p1</td>";
                                       echo "<td>$about_p2</td>";
                                       echo "<td>$about_p3</td>";     
                                       echo "<td ><a class='btn btn-primary' href='about_content.php?option=edit&ac_id=$about_content_id'>EDIT</a></td>";
                                      
                                    echo "</tr>";
                                     }
                                ?> 
                       </tbody>
</table>
               