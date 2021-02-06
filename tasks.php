<?php
include('includes/start.php');
include('includes/head.php');
include('includes/header.php');
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
          </tr> 
         <?php 
           $tasks = DB::query('SELECT * FROM tasks ');
           $counter=1;
           foreach($tasks as $task){
             echo "<tr>
             <td>".$counter."</td>
             <td>".$task["name"] ."</td>
             <td>".$task["description"]."</td>
             <td>".$task["start_date"]."</td>
             <td>".$task["deadline"]."</td>
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
  
