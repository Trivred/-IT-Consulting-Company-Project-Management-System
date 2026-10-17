<?php include "includes/admin_header.php"?> 

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"?>

        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                        <div class="panel panel-default"> 
                            <div class="panel-heading">
                                <h3 class="panel-title">Resources</h3>
                            </div> 
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Resource id</th>
                                        <th>Resource title</th>
                                        <th>QTY</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                             
                                <?php                                         
                                    findResources(); 
                                ?>


                                </tbody>
                            </table>    
                            


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include "includes/admin_footer.php"?> 