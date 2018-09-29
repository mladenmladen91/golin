<table class="table table-bordered table-hover">
                            <thead>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                    
                                
                            </thead>
                            <tbody>
                              <?php
                                     $query = "select * from users";
                                     $select = mysqli_query($connection, $query);
                    
                                     while($row = mysqli_fetch_assoc($select)){
                                       $user_id = $row['user_id'];
                                       $username = $row['username'];
                                       $user_password = $row['user_password'];
                                       $user_firstname = $row['user_firstname'];
                                       $user_lastname = $row['user_lastname'];
                                       $user_email = $row['user_email'];
                                       $user_image = $row['user_image'];
                                    
                                    echo "<tr>";
                                       echo "<td>$user_id</td>";
                                       echo "<td>$username</td>";
                                       echo "<td>$user_firstname</td>";     
                                       echo "<td>$user_lastname</td>";
                                       echo "<td>$user_email</td>";     
                                       echo "<td><img src='../img/$user_image' height ='45' width= '45'></td>";
                                                
                                       echo "<td><a class='btn btn-danger' onClick=\"return confirm('Da li ste sigurni?')\" href='users.php?delete=$user_id'>Delete</a></td>"; 
                                       echo "<td><a class='btn btn-primary' href='users.php?source=edit_user&user_id=$user_id'>Edit</a></td>"; 
                                         
                                    echo "</tr>";
                                     }
                                ?> 
                            </tbody>
                        </table>
                          <?php
                             if(isset($_GET['delete'])){
                                 $delete = $_GET['delete'];
                                 $query = "DELETE FROM users where user_id = $delete";
                                 $delete_post = mysqli_query($connection, $query);
                                 if(!$delete_post){
                                     die("error ".mysqli_error($connection));
                                 }
                                 header('location: users.php');
                                 
                             }
                           
                          ?> 