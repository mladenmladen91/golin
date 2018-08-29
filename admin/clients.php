    
    <?php include "includes/header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header text-center">PR sekcija</h1>
                        <?php 
                           if(isset($_GET['option'])){
                               $option = $_GET['option'];
                           }else{
                               $option = '';
                           }
                      
                          switch($option){
                              case 'edit':
                              include 'includes/edit-pr.php';
                              break;
                            
                              default:
                              include 'includes/view-clients.php';
                              break;      
                          }
    
    
     
                        ?>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
 <?php include "includes/footer.php"; ?>