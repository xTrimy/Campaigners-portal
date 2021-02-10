<?php
include('includes/start.php');
include('includes/head.php');
include('includes/header.php');

$mytasks=true;
?>
 <div id="main-body">
        <div class="cards">
          <div class="row">
            <div class="item">
            <h1>Scheduled Tasks</h1>
        <table class="table">
          <tr>
            <th>#</th>
            <th>Task</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>Deadline</th> 
            <th>Assigned to</th>
            <?php
              if($mytasks){
                ?>
            <th>Finished?</th>
                <?php
              }
            ?> 
          </tr> 
         <?php 
          //$tasks = DB::query('SELECT t.*,m.name as mname FROM tasks t LEFT JOIN members m on member_id=m.id');
          $tasks = DB::query('SELECT t.*,m.name as mname FROM tasks t LEFT JOIN members m on member_id=m.id WHERE member_id=:user_id',array(':user_id'=>$user_id));
          $counter=1;
           foreach($tasks as $task){
             if(!isset($task['mname']) || $task['mname'] == NULL){
               $task['mname'] = "N/A";
             }
             $finished = (bool)$task['is_finished'];
             echo "<tr>
             <td>".$counter."</td>
             <td>".$task["name"] ."</td>
             <td>".$task["description"]."</td>
             <td>".$task["start_date"]."</td>
             <td>".$task["deadline"]."</td>
             <td>".$task["mname"]."</td>
             <td>
              ".(($mytasks)?'
              <label class="checkbox-container">
                <input class="finished-checkbox" data-id="'.$task['id'].'" type="checkbox" '.(($finished)?"checked":"").'>
                <span class="checkmark"></span>
              </label>
              ':'')."
             </td>
             </tr>";
             $counter++;
            }
          ?>
        </table>
        <a href="add-task.php"><div class="xbutton">Add new task</div></a>
            </div>
          </div>
        </div>
 </div>
 <?php include('includes/footer.php') ?>
  
