<?php include "includes/admin_header.php"?> 

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       <!-- add category form  -->
                        
           <!-- Include pages based on condition technique      -->
           
           <form action="" method="POST" style="margin-bottom:2rem;">
                <label for="">Filter by project</label>
                <select class="form-control" name="project_id" id="" style="padding:0.25rem;margin-bottom:0.25rem;">
                    <option value="">All Tasks</option>
                    <?php projectFiltering(); ?>
                </select>
                <button type="submit" class="btn btn-primary btn-sm">Filter</button>
            </form>

<!-- <div class="btn btn-primary btn-lg" style="margin:0.75rem;">Add Task</div> -->
                        <div class="panel panel-default"> 
                            <div class="panel-heading">
                                <h3 class="panel-title">Tasks</h3>
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
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include "includes/admin_footer.php"?> 