<?php
include('classes/DB.php');
include('includes/head.php');
include('includes/header.php');

if(!isset($_GET['id'])){
  header('Location: ./');
}
$member_id = $_GET['id'];

//Fetching member's data + there committee's name
$member = DB::query('SELECT *, m.name as name, c.name as cname 
                     FROM members m,committees c
                     WHERE m.id=:id AND m.committee_id = c.id',
                     array(':id'=>$member_id))[0];
 ?>
 <div id="main-body">
   <div class="cards">
     <div class="row">
       <div class="item">
         <div class="profile">
           <div class="profile-image-container">
             <div class="profile-image">
               <img src="layout/png/profile.png" alt="">
             </div>
           </div>
           <h2><?php echo $member['name'] ?> 
           <!-- <span class="nickname">(xTrimy)</span> -->
            </h2>
           <div class="tags">
            <div class="item committee"><?php echo $member['cname'] ?> </div>
            <div class="item position">Co-head</div>
            <div class="item it">IT Specialist</div>
            <div class="item special">Member of the Year 2019-2020</div>
           </div>
           <div class="xbutton secondary red"><i class="fas fa-user-minus"></i> Remove Friend </div>
           <div class="xbutton secondary blue"><i class="fas fa-envelope"></i> Message </div>
         </div>
       </div>

     </div>
     <div class="row">
       <div class="item">
         <h1>Profile Data</h1>
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
         <div class="xbutton secondary"><i class="fas fa-cog"></i> Edit Profile </div>
       </div>
     </div>
   </div>
 </div>
 <?php include('includes/footer.php') ?>
