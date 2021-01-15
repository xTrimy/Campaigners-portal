<?php
include('includes/head.php');
include('includes/header.php');
include('classes/DB.php');




 ?>

 <div id="main-body">
 
        <div class="cards">
          <div class="row">
            <div class="item">
            <h1>Scheduled Tasks</h1>

       <?php 

           echo"<table><th>Task</th><th>Description</th><th>Start Date</th><th>Deadline</th>";     
           DB::gettasks($params = array());
 ?>

            </div>
          </div>
        </div>

 </div>
 <?php include('includes/footer.php') ?>
  