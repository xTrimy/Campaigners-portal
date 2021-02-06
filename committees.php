<?php
include('includes/start.php');
include('includes/head.php');
include('includes/header.php');
?>
 <div id="main-body">
        <div class="cards">
          <div class="row">
            <div class="item">
            <h1>Committees</h1>
        <table class="table">
          <tr>
            <th>#</th>
            <th>Name</th>
          </tr>
         <?php 
           $items = DB::query('SELECT * FROM committees ');
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
        <a href="add-committee.php"><div class="xbutton">Add new committee</div></a>
            </div>
          </div>
        </div>
 </div>
 <?php include('includes/footer.php') ?>
  
