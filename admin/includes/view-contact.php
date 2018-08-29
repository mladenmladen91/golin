
<table class="table table-bordered table-hover printit" style="margin-top: 35px !important;">
                          
                        <thead>     
                             <th>Id</th>
                             <th>Address</th>
                             <th>Phone</th>
                             <th>E-mail</th>
                        </thead>
                        <tbody>
                             <?php
                                     $query = "select * from contact";
                                     $select = mysqli_query($connection, $query);
                    
                                     while($row = mysqli_fetch_assoc($select)){
                                       $contact_id = $row['contact_id'];
                                       $contact_address = $row['contact_address'];
                                       $contact_phone = $row['contact_phone'];
                                       $contact_email = $row['contact_email'];
                                            
                                     echo "<tr>";
                                       echo "<td>$contact_id</td>";
                                       echo "<td>$contact_address</td>";
                                       echo "<td>$contact_phone</td>";
                                       echo "<td>$contact_email</td>";
                                       echo "<td ><a class='btn btn-primary' href='contact.php?option=edit&contact_id=$contact_id'>EDIT</a></td>";
                                    echo "</tr>";
                                     }
                                ?> 
                       </tbody>
</table>
               