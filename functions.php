<?php
// (project.php) خاص بصفحة

function findAllProjects(){
    global $connection;
    $query = "SELECT * FROM projects pro join people peo on pro.project_manager_id = peo.id";
    $select_projects = mysqli_query($connection,$query);  

    $count = 0;

    while($row = mysqli_fetch_assoc($select_projects)) {
    $project_id = $row['project_id'];
    $project_name = $row['project_name'];
    $plan_start_date = $row['plan_start_date'];
    $actual_start_date = $row['actual_start_date'];
    $plan_budget = $row['plan_budget'];
    $actual_budget = $row['actual_budget'];
    $project_manager = $row['name'];

    $count++;

    echo "<tr>";
        
    echo "<td>{$count}</td>";
    echo "<td>{$project_id}</td>";
    echo "<td>{$project_name}</td>";
    echo "<td>{$plan_start_date}</td>";
    echo "<td>{$plan_start_date}</td>";
    echo "<td>{$plan_budget}</td>";
    echo "<td>{$actual_budget}</td>";
    echo "<td>{$project_manager}</td>";
    echo "<td>
        <form action='view_project.php' method='POST' style='display:inline;'>
            <input type='hidden' name='project_id' value='{$project_id}'>
            <button class='btn btn-primary btn-sm'>Show</button>
        </form>
        <a href='#' class='btn btn-warning btn-sm'>Edit</a>
        <a href='#' class='btn btn-danger btn-sm'>Delete</a></td>";
    echo "</tr>";

    }
}
// (view_project.php) خاص بصفحة

// دالة عرض تفاصيل المشروع 

function showProject(){

    global $connection;

    if(isset($_POST['project_id'])){
        $project_id = $_POST['project_id'];
        $sql = "SELECT pro.project_id, pro.project_name, 
        pro.plan_start_date, pro.actual_start_date, peo.name AS manager_name,
        SUM(ts.task_plan_budget) AS sum_plan_budget, 
        SUM(ts.task_actual_budget) AS sum_actual_budget
        FROM projects pro join tasks ts on pro.project_id = ts.project_id
        join people peo on pro.project_manager_id = peo.id 
        where pro.project_id = $project_id";

        $result = mysqli_query($connection, $sql);

        $project = mysqli_fetch_assoc($result);
    
        echo '    
        <div class="row">
            <div class="col-md-6">
                <h4><i class="fa fa-folder-open"></i> Project Name</h4>
                <p>'.$project['project_name'].'</p>
            </div>
            <div class="col-md-6">
                <h4><i class="fa fa-user"></i> Project Manager</h4>
                <p>'.$project['manager_name'].'</p>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-6">
                <h4><i class="fa fa-calendar"></i> Planned Start Date</h4>
                <p>'.$project['plan_start_date'].'</p>
            </div>
            <div class="col-md-6">
                <h4><i class="fa fa-calendar-check-o"></i> Actual Start Date</h4>
                <p>'.$project['actual_start_date'].'</p>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-6">
                <h4><i class="fa fa-money"></i> Planned Budget</h4>
                <p>$'.$project['sum_plan_budget'].'</p>
            </div>
            <div class="col-md-6">
                <h4><i class="fa fa-line-chart"></i> Actual Budget</h4>
                <p>$'.$project['sum_actual_budget'].'</p>
            </div>
        </div>';
    }
    else {
        die("Project not found.");
    }
}

// (task.php) خاص بصفحة

// دالة عرض جميع المهام 
function findAllTasks(){
    global $connection;

    $projectId = isset($_GET['project_id']) ? $_GET['project_id'] : 'Unknown';
    $where = "";
    
    if(isset($_POST['project_id']))
    {
        if(!empty($_POST['project_id']))
        {
            $projectId = $_POST['project_id'];
            $where = "where project_id = $projectId";
        }
    }

    $query = "SELECT * FROM tasks $where";
    $select_tasks = mysqli_query($connection,$query);  

    $count = 0;
    while($row = mysqli_fetch_assoc($select_tasks)) {
    $task_id = $row['task_id'];
    $task_name = $row['task_name'];
    $task_plan_start_date = $row['task_plan_start_date'];
    $task_actual_start_date = $row['task_actual_start_date'];
    $task_plan_budget = $row['task_plan_budget'];
    $task_actual_budget = $row['task_actual_budget'];

    $count++;

    //  we use {} and add the  variable inside it to distinguish html codes from php codes 
    echo "<tr>";
        echo "<td>{$count}</td>";
        echo "<td>{$task_id}</td>";
        echo "<td>{$task_name}</td>";
        echo "<td>{$task_plan_start_date}</td>";
        echo "<td>{$task_actual_start_date}</td>";
        echo "<td>{$task_plan_budget}</td>";
        echo "<td>{$task_actual_budget}</td>";
        echo "<td>
            <form action='view_task.php' method='POST' style='display:inline;'>
                <input type='hidden' name='task_id' value='{$task_id}'>
                <button class='btn btn-primary btn-sm'>Show</button>
            </form>
            <a href='#' class='btn btn-warning btn-sm'>Edit</a>
            <a href='#' class='btn btn-danger btn-sm'>Delete</a></td>";

    echo "</tr>";
    }
}
// دالة عرض فلترة المهام بناءً على المشروع

function projectFiltering()
{
    global $connection;

    $query = "SELECT project_id, project_name FROM projects";
    $projectFiltering = mysqli_query($connection,$query);  

    $selected = '';

    while($row = mysqli_fetch_assoc($projectFiltering)) {
    $project_id = $row['project_id'];
    $project_name = $row['project_name'];
    
    if(isset($_POST['project_id']))
    {
        if($project_id == $_POST['project_id']){
            $selected = 'selected';
        }    
    }

    //  we use {} and add the  variable inside it to distinguish html codes from php codes 
    echo "<option value='{$project_id}' {$selected}>{$project_name}</option>";

    $selected = '';
    }
}

// (view_task.php) خاص بصفحة

function showTask(){

    global $connection;

    if(isset($_POST['task_id'])){
        $task_id = $_POST['task_id'];
        $sql = "SELECT ts.task_name, pro.project_name, 
        ts.task_plan_start_date, ts.task_actual_start_date,
        ts.task_plan_budget, ts.task_actual_budget
        FROM tasks ts join projects pro on ts.project_id = pro.project_id
        where ts.task_id = $task_id";

        $result = mysqli_query($connection, $sql);

        $task= mysqli_fetch_assoc($result);
    
        echo '    
        <div class="row">
            <div class="col-md-6">
                <h4><i class="fa fa-tasks"></i> Task Name</h4>
                <p>'.$task['task_name'].'</p>
            </div>
            <div class="col-md-6">
                <h4><i class="fa fa-folder-open"></i> Project Name</h4>
                <p>'.$task['project_name'].'</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <h4><i class="fa fa-calendar"></i> Planned Start Date</h4>
                <p>'.$task['task_plan_start_date'].'</p>
            </div>
            <div class="col-md-6">
                <h4><i class="fa fa-calendar-check-o"></i> Actual Start Date</h4>
                <p>'.$task['task_actual_start_date'].'</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <h4><i class="fa fa-money"></i> Planned Budget</h4>
                <p>$'.$task['task_plan_budget'].'</p>
            </div>
            <div class="col-md-6">
                <h4><i class="fa fa-line-chart"></i> Actual Budget</h4>
                <p>$'.$task['task_actual_budget'].'</p>
            </div>
        </div>';
    }
    else {
        die("Task not found.");
    }
}

// (people.php) خاص بصفحة

// دالة عرض جميع الاشخاص الذين يديرون المشاريع

function findPeople(){
    global $connection;
    $query = "SELECT * FROM people";
    $select_people = mysqli_query($connection,$query);  

    $count = 0;

    while($row = mysqli_fetch_assoc($select_people)) {
    $id = $row['id'];
    $name = $row['name'];
    $email = $row['email'];
    $address = $row['address'];
    $phone = $row['phone'];

    $count++;

    echo "<tr>";
        
    echo "<td>{$count}</td>";
    echo "<td>{$id}</td>";
    echo "<td>{$name}</td>";
    echo "<td>{$email}</td>";
    echo "<td>{$address}</td>";
    echo "<td>{$phone}</td>";
    echo "<td>
        <a href='#' class='btn btn-primary btn-sm'>Show</a>
        <a href='#' class='btn btn-warning btn-sm'>Edit</a>
        <a href='#' class='btn btn-danger btn-sm'>Delete</a></td>";
    echo "</tr>";

    }

}

// دالة لجلب بيانات الموارد الخاصه بمهمه مُعينه

function findResources(){
    global $connection;
    
    $where = '';
    if(isset($_POST['task_id'])){
        $task_id = $_POST['task_id'];
        $where = "where task_id = $task_id";
    }

    $query = "SELECT * FROM resources $where";
    $select_resources = mysqli_query($connection,$query);  

    $count = 0;

    while($row = mysqli_fetch_assoc($select_resources)) {
    $resource_id = $row['resource_id'];
    $resource_title = $row['resource_title'];
    $qty = $row['qty'];

    $count++;

    echo "<tr>";
        
    echo "<td>{$count}</td>";
    echo "<td>{$resource_id}</td>";
    echo "<td>{$resource_title}</td>";
    echo "<td>{$qty}</td>";
    echo "<td>
        <a href='#' class='btn btn-warning btn-sm'>Edit</a>
        <a href='#' class='btn btn-danger btn-sm'>Delete</a></td>";
    echo "</tr>";

    }

}?>


