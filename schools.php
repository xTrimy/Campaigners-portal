<?php
include('includes/start.php');
include('includes/head.php');
include('includes/header.php');
?>
 <div id="main-body">
        <div class="cards">
          <div class="row">
            <div class="item">
            <h1>Schools</h1>
        <table class="table">
          <tr>
            <th>#</th>
            <th>Name</th>
          </tr>
         <?php 
           $items = DB::query('SELECT * FROM schools ');
           $counter =1;
           foreach($items as $item){
             echo "<tr>
             <td>".$counter."</td>
             <td>".$item["name"] ."</td>
             </tr>";
             $counter++;
            }
          ?>
        </table>
        <a href="add-school.php"><div class="xbutton">Add new school</div></a>
            </div>
          </div>
        </div>
 </div>
 <?php include('includes/footer.php') ?>
  
