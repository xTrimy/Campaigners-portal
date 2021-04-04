<?php
$page_permission = 2;
include('includes/start.php');
include('includes/head.php');
include('includes/header.php');

//check if user submited the form
$msg="";
if(isset($_POST['addtask'])){
  $name = $_POST['name'];
  $description = $_POST['description'];
  $startdate = $_POST['startdate'];
  $deadline = $_POST['deadline'];
  $committee_id = $_POST['committee'];
  if($committee_id == NULL && $Permissions::getAccessLevel() < 4){
    $msg = "Access denied";
  }else if($Permissions::getAccessLevel() < 4 && $committee_id != NULL && $committee_id != DB::query('SELECT committee_id FROM members WHERE id=:id ',
  array(':id'=>$user_id))[0]['committee_id']){
    $msg = "Access denied";
  }else{
  DB::query('INSERT INTO tasks VALUES (\'\', :name, :description, :startdate, :deadline, :committee, :member_id,0,0)', 
  array(':name'=>$name, ':description'=>$description, ':startdate'=>$startdate, ':deadline'=>$deadline, ':committee'=>$committee_id, ':member_id' =>NULL));
  $msg="Task added successfully!";
  }
}
 ?>
 <div id="main-body">
        <div class="cards">
          <div class="row">
            <div class="item">
            <h1>Add Tasks</h1>
            <div class="success"><?php echo $msg;?></div>
                      <form method="post" action="add-task.php">
                        <p>Name :</p> 
                              <input type="text" class="binput" name="name" required>  <br>
                        <p>Task description :</p> 
                              <input type="text"  class="binput" name="description" required>  <br>
                        <p>Start date</p> 
                              <input type="date" class="binput" min="2021-01-01" max="2021-12-31" name="startdate" required>  
                      <p>Deadline</p>
                              <input type="date" class="binput" min="2021-01-01" max="2021-12-31" name="deadline" required>  <br>
                        <p>Committee</p>
                        <?php
                        // OC,President & Vice can choose committee
                          if($Permissions::getAccessLevel() >= 4){
                        ?>
                        <select class="binput" name="committee">
                          <option disabled selected value="">Select an option</option>
                          <option value="">All committees</option>
                          <?php
                            $committees = DB::query('SELECT * FROM committees');
                            foreach($committees as $committee){
                              ?>
                              <option value="<?php echo $committee['id'];?>"><?php echo $committee['name'];?></option>
                              <?php
                            }
                          ?>
                        </select><br>
                        <?php
                        //Head & Co-Head can choose only their committee
                         }else if($Permissions::getAccessLevel() >= 2){
                          ?>
                          <?php $commitee_details =  DB::query('SELECT c.name,c.id FROM committees c,members m WHERE m.committee_id=c.id AND m.id=:id ',
                          array(':id'=>$user_id))[0];?>
                          <input readonly class="binput" type="text" name="committee_name" value="<?php echo $commitee_details['name']?>">
                          <input type="hidden" name="committee" value="<?php echo $commitee_details['id']?>">
                          <br>
                          <?php                          
                        } ?>
                        <button type="submit" name="addtask" class="xbutton">Add task</button>
                      </form>
            </div>
          </div>
        </div>

 </div>
 <?php include('includes/footer.php') ?>
  
