<?php include "includes/admin_header.php"?> 

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"?>

        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">

                    <div class="col-xs-6" style="margin:2rem;"> 
                        <div class="btn btn-primary">Add Project</div>
                    </div> 
                    
                    <div class="col-lg-12">

                        <div class="panel panel-default"> 
                            <div class="panel-heading">
                                <h3 class="panel-title">Projects</h3>
                            </div>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th> 
                                        <th>Id</th> 
                                        <th>Project Name</th>
                                        <th>Plan start</th>
                                        <th>Actual start</th>
                                        <th>Plan budget</th>
                                        <th>Actual budget</th>
                                        <th>Project manager</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                             
                                <?php 
                                    findAllProjects(); 
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