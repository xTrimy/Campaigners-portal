<?php
include('classes/start.php');
include('includes/head.php');
include('includes/header.php');
?>
 <div id="main-body">
 
        <div class="cards">
          <div class="row">
            <div class="item">
            <h1>Scheduled Tasks</h1>
        <table><th>Task</th><th>Description</th><th>Start Date</th><th>Deadline</th>   
         <?php 
           $tasks = DB::query('SELECT name, description, start_date, deadline FROM tasks ');
           foreach($tasks as $task){
             echo "<tr><td>".$task["name"] ."</td><td>".$task["description"]."</td><td>".$task["start_date"]."</td><td>".$task["deadline"]."<br>";
            }
          ?>
            </div>
          </div>
        </div>
 </div>
 <?php include('includes/footer.php') ?>
  