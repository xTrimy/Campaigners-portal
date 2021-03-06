<?php
$page_permission = 2;
include('includes/start.php');
include('includes/head.php');
include('includes/header.php');
$msg="";
$current_user_committee = DB::query('SELECT committee_id FROM members WHERE id=:id ',
array(':id'=>$user_id))[0]['committee_id'];

//check if user submited the form
if(isset($_POST['submit'])){
  $member_id = $_POST['member_id'];
  $task_id = $_POST['task_id'];
  DB::query('INSERT INTO members_tasks VALUES(\'\',:task_id,:member_id,0)',array(':member_id'=>$member_id,':task_id'=>$task_id));
  $task_details = DB::query('SELECT * FROM tasks  WHERE id=:task_id ',array(':task_id'=>$task_id));
  Notifications::createNotificationForUserWithRefrence($member_id, "tasks.assign", $task_details[0]['name'], $task_id,$user_id);
  $msg= 'Task assigned successfully'; 
}
 ?>
 <div id="main-body">
 
        <div class="cards">
          <div class="row">
            <div class="item">
            <h1>Assign task</h1>
            <div class="success"><?php echo $msg;?></div>
                      <form method="post" >
                        <p>Task</p>
                        <select class="binput" name="task_id" >
                        <?php
                          $items = DB::query('SELECT t.*,GROUP_CONCAT(DISTINCT m.name) as assigned_to FROM tasks t LEFT JOIN members_tasks mt ON mt.task_id = t.id LEFT JOIN  members m on m.id=mt.member_id WHERE t.committee_id=:c_id GROUP BY t.id',array(':c_id'=>$current_user_committee));
                        ?>
                          <option value="" disabled selected>Please select an option</option>
                          <?php
                          foreach($items as $item){
                            $assigned = "";
                            if($item['assigned_to']){
                              $assigned = "(Assigned to: ".$item['assigned_to'].")";
                            }
                            ?>
                            <option value="<?php echo $item['id']; ?>"> <?php echo $item['name']. " ". $assigned; ?>  </option>
                            <?php
                          }
                        ?>
                        </select><br>
                        <p>Member</p>
                        <select class="binput" name="member_id" >
                        <?php
                          $items = DB::query('SELECT * FROM members WHERE committee_id=:c_id',array(':c_id'=>$current_user_committee));
                        ?>
                          <option value="" disabled selected>Please select an option</option>
                          <?php
                          foreach($items as $item){
                            ?>
                            <option value="<?php echo $item['id']; ?>"> <?php echo $item['name']; ?> </option>
                            <?php
                          }
                        ?>
                        </select><br>
                        <button type="submit" name="submit" class="xbutton">Assign</button>


                      </form>


            </div>
          </div>
        </div>

 </div>
 <?php include('includes/footer.php') ?>
  
