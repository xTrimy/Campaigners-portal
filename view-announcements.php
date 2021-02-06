<?php
include('includes/start.php');
include('includes/head.php');
include('includes/header.php');
?>
 <div id="main-body">
        <div class="cards">
          <div class="row">
            <div class="item">
            <h1>Announcements</h1>
        <table class="table">
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Committee</th>
          </tr>
         <?php 
           $items = DB::query('SELECT a.name as name,c.name as cname,a.* FROM announcements a LEFT JOIN committees c on committee_id=c.id');
           $counter = 1;
           foreach($items as $item){
             if($item["cname"] == NULL){
               $item["cname"] = "<span style='color:blue;'>General</span>";
             }
             echo "<tr>
             <td>".$counter."</td>
             <td>".$item["name"] ."</td>
             <td>".$item["cname"] ."</td>
             </tr>";
             $counter++;
            }
          ?>
        </table>
        <a href="add-announcement.php"><div class="xbutton">Add new announcement</div></a>
            </div>
          </div>
        </div>
 </div>
 <?php include('includes/footer.php') ?>
  
