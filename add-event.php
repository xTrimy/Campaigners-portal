<?php
include('includes/start.php');
include('includes/head.php');
include('includes/header.php');

//check if user submited the form
$msg="";
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $description = $_POST['description'];
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];
  if ($_POST['committee'] === '') {
    $_POST['committee'] = NULL; 
  }
  $committee = $_POST['committee'];
  DB::query('INSERT INTO events VALUES (\'\', :name,:description,:start_date,:end_date,:committee,0)', 
  array(':name'=>$name,':description'=>$description,':start_date'=>$start_date,':end_date'=>$end_date,':committee'=>$committee));
  $msg="Event added successfully!";
}
 ?>
 <div id="main-body">
 
        <div class="cards">
          <div class="row">
            <div class="item">
            <h1>Add Event</h1>
            <div class="success"><?php echo $msg;?></div>
                      <form method="post">
                        <p>Name :</p> 
                        <input type="text" class="binput" name="name" required>  <br>
                        <p>Description :</p> 
                        <textarea class="binput" name="description" required></textarea> <br>
                        <p>Start Date :</p> 
                        <input type="date" class="binput" name="start_date" required>  <br>
                        <p>End Date :</p> 
                        <input type="date" class="binput" name="end_date" required>  <br>
                        <p>Committee :</p> 
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
                        <button type="submit" name="submit" class="xbutton">Add</button>
                      </form>
            </div>
          </div>
        </div>

 </div>
 <?php include('includes/footer.php') ?>
  