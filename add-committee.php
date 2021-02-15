<?php
$page_permission = 9; //Vice or above
include('includes/start.php');
include('includes/head.php');
include('includes/header.php');

//check if user submited the form
$msg="";
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  DB::query('INSERT INTO committees VALUES (\'\', :name,0)', 
  array(':name'=>$name));
  $msg="Committee added successfully!";
}
 ?>
 <div id="main-body">
 
        <div class="cards">
          <div class="row">
            <div class="item">
            <h1>Add Committee</h1>
            <div class="success"><?php echo $msg;?></div>
                      <form method="post">
                        <p>Name :</p> 
                        <input type="text" class="binput" name="name" required>  <br>
                        <button type="submit" name="submit" class="xbutton">Add</button>
                      </form>
            </div>
          </div>
        </div>

 </div>
 <?php include('includes/footer.php') ?>
  