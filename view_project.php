<?php include "includes/admin_header.php"?> 

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"?>

        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <a href="project.php" class="btn btn-primary btn-lg" style="margin:2rem;">Back</a>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Project Overview</h3>
                            </div>
                            <div class="panel-body">

                            <?php
                                showProject();
                            ?>

                            </div>
                        </div>

                        <div class="panel panel-default"> 
                            <div class="panel-heading">
                                <h3 class="panel-title">Project Tasks</h3>
                            </div>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Plan start</th>
                                        <th>Actual start</th>
                                        <th>Plan budget ($)</th>
                                        <th>Actual budget ($)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                             
                                <?php 
                                    findAllTasks(); 
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