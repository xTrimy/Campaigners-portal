<?php
include('includes/start.php');
include('includes/head.php');
include('includes/header.php');

if(!isset($_GET['id'])){
  header('Location: ./');
}
$member_id = $_GET['id'];

//Fetching member's data + there committee's name
$member = DB::query('SELECT *, m.id as member_id, m.image as img, m.name as name, c.name as cname 
                     FROM members m,committees c
                     WHERE m.id=:id AND m.committee_id = c.id',
                     array(':id'=>$member_id))[0];

//Adding warn
if(isset($_POST['addwarn'])){

$name = $member['member_id'];
$reason = $_POST['reason'];
$warndate = date('Y-m-d');

                  DB::query('INSERT INTO warnings VALUES (\'\', :member_id, :reason, :warndate)', 
                  array(':member_id'=>$name, ':reason'=>$reason, ':warndate'=>$warndate));
                    echo '<script> alert("Task added successfully!") </script>'; }

?>
 <div id="main-body">
   <div class="cards">
     <div class="row">
       <div class="item">
            <h1>Add warning</h1>
            <table class="data-table">
              <tr>
                <td><b>Name</b></td>
                <td><?php echo $member['name'] ?> </td>
              </tr>
              <tr>
                <td><b>ID</b></td>
                <td><?php echo $member['university_id'] ?> </td>
              </tr>
              <tr>
                <td><b>Email</b></td>
                <td><?php echo $member['email'] ?> </td>
              </tr>
              <tr>
                <td><b>Phone</b></td>
                <td><?php echo $member['phone'] ?></td>
              </tr>
              <tr>
                <td><b>Committee</b></td>
                <td><?php echo $member['cname'] ?> </td>
              </tr>
            </table>
          <form method="post" action="warnings.php?id=<?php echo $member['member_id'] ?>">
            <p><b>Warning reason :</b></p> 
            <textarea name="reason" id="reason" required class="binput"></textarea><br>
            <button type="submit" name="addwarn" class="xbutton">Add warn</button>
          </form>
         </div>
       </div>
    </div>
 </div>

 <?php include('includes/footer.php') ?>
  
