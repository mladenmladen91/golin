<?php include "includes/header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1 class="page-header">
                           Welcome 
                            <small><?php echo $_SESSION['firstname']; ?></small>
                        </h1>
                        <h1 class="page-header printit">SASTANCI</h1>
                    </div>
                    <?php include "includes/view-meetings.php"; ?>
                </div>
                <!-- /.row -->
                
        
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
 <?php include "includes/footer.php" ?>
