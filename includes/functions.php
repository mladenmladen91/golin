<?php 

function insertData(){
	if(isset($_POST['schedule'])){
                    global $connection;
                    $meet_name = $_POST['name'];
                    $meet_company = $_POST['company'];
                    $meet_mail = $_POST['email'];
                    $meet_phone = $_POST['phone'];
                    $meet_date = $_POST['date'];
                    $meet_time = $_POST['time'];
        
                    $meet_name = mysqli_real_escape_string($connection, $meet_name);
                    $meet_company = mysqli_real_escape_string($connection, $meet_company);
                    $meet_phone = mysqli_real_escape_string($connection, $meet_phone);
                    $meet_date = mysqli_real_escape_string($connection, $meet_date);
                    $meet_mail = mysqli_real_escape_string($connection, $meet_mail);
                    
                     
                     
                    $query = "INSERT INTO meetings(meet_name, meet_company, meet_mail, meet_phone, meet_date, meet_time, meet_status) VALUES('$meet_name', '$meet_company', '$meet_mail', '$meet_phone','$meet_date', '$meet_time', 'cekanje')";

                    if(empty($meet_name) || empty($meet_company) || empty($meet_mail) || empty($meet_phone) || empty($meet_date) || empty($meet_time) ){
                           echo "<span id='confirm' style='color: red; font-size:.8rem;'>*Morate da ispunite sva polja</span>";
                    }else{
                        $meet_mail = filter_var($meet_mail, FILTER_SANITIZE_EMAIL);

                        if(!filter_var($meet_mail, FILTER_VALIDATE_EMAIL)){
                            echo "<span id='confirm' style='color: red; font-size:.8rem;'>*Unesite validnu e-mail adresu</span>";    
                        }else{
                             $insert_data = mysqli_query($connection, $query);

                             if(!$insert_data){
                                 die("Neuspješan upit ".mysqli_error($connection));    
                             }else{
                                echo "<span id='confirm' style='color: red; font-size:.8rem;'>Uspješno ste zakazali sastanak</span>";
                                
                            // sending mail after scheduling an appointment
                                $to = 'jelena.jankovic@amplitudo.me';
                                $subject = 'Sastanak sa: '.$meet_name;
                                $body = $meet_name.',firma: '.$meet_company.' je zakazao/la sastanak sa Vama '.$meet_date.' u '.$meet_time.'.';
                                $header = 'From: '.$meet_mail;
                                 
                                mail($to, $subject, $body, $header);  
                             } 
                        }
                    }
               }
}


function updateClientsImage($client_id, $client_image, $client_moto, $client_image_tmp){
      global $connection;
      move_uploaded_file($client_image_tmp,"img/$client_image");
                         
                         if(empty($client_image)){
                             $query5 = "SELECT * FROM clients WHERE client_id=$client_id";
                             $result5 = mysqli_query($connection, $query5);
                             $row = mysqli_fetch_assoc($result5);
                             $client_image = $row['client_image'];
                         }
                         
                         $query4 = "UPDATE clients SET client_image='$client_image', client_moto='$client_moto' WHERE client_id=$client_id";
                         $result4 = mysqli_query($connection, $query4);
                         if(!$result4){
                             mysqli_error($connection);
                         }
                         header('location: index.php#clients');
}



?>