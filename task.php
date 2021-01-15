<?php
include('includes/head.php');
include('includes/header.php');
include('classes/DB.php');

//check if user submited the form
if(isset($_POST['addtask'])){

  $name = $_POST['name'];
  $description = $_POST['description'];
  $startdate = $_POST['startdate'];
  $deadline = $_POST['deadline'];
  $committee_id = $_POST['committee'];

  DB::query('INSERT INTO tasks VALUES (\'\', :name, :description, :startdate, :deadline, :committee)', 
  array(':name'=>$name, ':description'=>$description, ':startdate'=>$startdate, ':deadline'=>$deadline, ':committee'=>$committee_id));


  echo '<script> alert("Task added successfully!") </script>'; 
}
 ?>
 <div id="main-body">
 
        <div class="cards">
          <div class="row">
            <div class="item">
            <h1>Add Tasks</h1>
                      <form method="post" action="task.php">
                        <p>Name :</p> 
                              <input type="text" class="binput" name="name" required>  <br>
                        <p>Task description :</p> 
                              <input type="text"  class="binput" name="description" required>  <br>
                        <p>Start date</p> 
                              <input type="date" class="binput" min="2021-01-01" max="2021-12-31" name="startdate" required>  
                      <p>Deadline</p>
                              <input type="date" class="binput" min="2021-01-01" max="2021-12-31" name="deadline" required>  <br>
                        <p>Committee</p>
                        <select class="binput" name="committee" >
                        <?php
                          $items = DB::query('SELECT * FROM committees');
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
                        <button type="submit" name="addtask" class="xbutton">Add task</button>


                      </form>


            </div>
          </div>
        </div>

 </div>
 <?php include('includes/footer.php') ?>
  