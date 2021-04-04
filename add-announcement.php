<?php
$page_permission = 2; //Co-head or above
include('includes/start.php');
include('includes/head.php');
include('includes/header.php');

//check if user submited the form
$msg="";
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $description = $_POST['description'];
  if ($_POST['committee'] === '') {
    $_POST['committee'] = NULL; 
  }
  $committee = $_POST['committee'];
  if($committee == NULL && $Permissions::getAccessLevel() < 4){
    $msg = "Access denied";
  }else if($Permissions::getAccessLevel() < 4 && $committee != NULL && $committee != DB::query('SELECT committee_id FROM members WHERE id=:id ',
  array(':id'=>$user_id))[0]['committee_id']){
    $msg = "Access denied";
  }else{
    DB::query('INSERT INTO announcements VALUES (\'\', :name,:description,:committee,0)', 
    array(':name'=>$name,':description'=>$description,':committee'=>$committee));
    $get_announcement_id = DB::query('SELECT id FROM announcements WHERE name=:name AND description=:description ORDER BY id DESC LIMIT 1 ',array(':name'=>$name,':description'=>$description))[0]['id'];
    if($committee != NULL){
      Notifications::createNotificationForCommitteeWithRefrence($committee,"announcement.committee",$name,$get_announcement_id);
    }else{
      Notifications::createPublicNotificationWithRefrence("announcement.public", $name, $get_announcement_id);
    }
    $msg="Announcement added successfully!";
  }
}
 ?>
 <div id="main-body">
 
        <div class="cards">
          <div class="row">
            <div class="item">
            <h1>Add Announcement</h1>
            <div class="success"><?php echo $msg;?></div>
                      <form method="post">
                        <p>Name :</p> 
                        <input type="text" class="binput" name="name" required>  <br>
                        <p>Description :</p> 
                        <textarea class="binput" name="description" required></textarea> <br>
                        <p>Committee :</p> 
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
                        //Head & Co-Head can only choose their committee
                         }else if($Permissions::getAccessLevel() >= 2){
                          ?>
                          <?php $commitee_details =  DB::query('SELECT c.name,c.id FROM committees c,members m WHERE m.committee_id=c.id AND m.id=:id ',
                          array(':id'=>$user_id))[0];?>
                          <input readonly class="binput" type="text" name="committee_name" value="<?php echo $commitee_details['name']?>">
                          <input type="hidden" name="committee" value="<?php echo $commitee_details['id']?>">
                          <br>
                          <?php                          
                        } ?>
                        <button type="submit" name="submit" class="xbutton">Add</button>
                      </form>
            </div>
          </div>
        </div>

 </div>
 <?php include('includes/footer.php') ?>
  