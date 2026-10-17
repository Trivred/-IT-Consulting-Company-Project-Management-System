<?php include "includes/admin_header.php";?>
    <div id="wrapper">
        <!-- Navigation -->
 
        <?php include "includes/admin_navigation.php" ?>
        
        <div id="page-wrapper">

            <div class="container-fluid" style="height:100vh;">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                       
                        <h1 class="page-header">
                            IT Consulting Company Project
                        </h1>
              
     
                    </div>
                </div>
       
                <div class="row">

<div class="col-md-4">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <div class="row">
        <div class="col-xs-3">
          <i class="fa fa-folder fa-4x"></i>
        </div>
        <div class="col-xs-9 text-right">
        <?php 
// a query to check for the number of projects , then illustrate the count of them 
// mysqli_num_row() function is used to count rows in the database
    $query = "SELECT * FROM projects";
    $select_all_project = mysqli_query($connection,$query);
    $project_count = mysqli_num_rows($select_all_project);

  echo  "<div class='huge'>{$project_count}</div>"

    ?>
          <div>Projects</div>
        </div>
      </div>
    </div>
    <a href="project.php">
      <div class="panel-footer">
        <span class="pull-left">View Details</span>
        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
        <div class="clearfix"></div>
      </div>
    </a>
  </div>
</div>

<div class="col-md-4">
  <div class="panel panel-green">
    <div class="panel-heading">
      <div class="row">
        <div class="col-xs-3">
          <i class="fa fa-tasks fa-4x"></i>
        </div>
        <div class="col-xs-9 text-right">
        <?php 
// a query to check for the number of tasks , then illustrate the count of them 
// mysqli_num_row() function is used to count rows in the database
    $query = "SELECT * FROM tasks";
    $select_all_task = mysqli_query($connection,$query);
    $task_count = mysqli_num_rows($select_all_task);

  echo  "<div class='huge'>{$task_count}</div>"

    ?>
          <div>Tasks</div>
        </div>
      </div>
    </div>
    <a href="task.php">
      <div class="panel-footer">
        <span class="pull-left">View Details</span>
        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
        <div class="clearfix"></div>
      </div>
    </a>
  </div>
</div>

<div class="col-md-4">
  <div class="panel panel-info">
    <div class="panel-heading">
      <div class="row">
        <div class="col-xs-3">
          <i class="fa fa-tasks fa-4x"></i>
        </div>
        <div class="col-xs-9 text-right">
        <?php 
// a query to check for the number of tasks , then illustrate the count of them 
// mysqli_num_row() function is used to count rows in the database
    $query = "SELECT * FROM resources";
    $select_all_resource = mysqli_query($connection,$query);
    $resource_count = mysqli_num_rows($select_all_resource);

  echo  "<div class='huge'>{$resource_count}</div>"

    ?>
          <div>Resources</div>
        </div>
      </div>
    </div>
    <a href="resource.php">
      <div class="panel-footer">
        <span class="pull-left">View Details</span>
        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
        <div class="clearfix"></div>
      </div>
    </a>
  </div>
</div>

<div class="col-md-4">
  <div class="panel panel-yellow">
    <div class="panel-heading">
      <div class="row">
        <div class="col-xs-3">
          <i class="fa fa-users fa-4x"></i>
        </div>
        <div class="col-xs-9 text-right">
        <?php 
// a query to check for the number of persons , then illustrate the count of them 
// mysqli_num_row() function is used to count rows in the database
    $query = "SELECT * FROM people";
    $select_people = mysqli_query($connection,$query);
    $people_count = mysqli_num_rows($select_people);

  echo  "<div class='huge'>{$people_count}</div>"

    ?>
          <div>People</div>
        </div>
      </div>
    </div>
    <a href="people.php">
      <div class="panel-footer">
        <span class="pull-left">View Details</span>
        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
        <div class="clearfix"></div>
      </div>
    </a>
  </div>
</div>

</div>
              
      </div>
            <!-- /.container-fluid -->

    </div>
        
        <!-- /#page-wrapper -->
        
    <?php include "includes/admin_footer.php" ?>