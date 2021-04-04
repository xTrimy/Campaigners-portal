<div id="header">

    <div class="profile-image">
      <img src="uploads/<?php echo $user['image']; ?>">
    </div>

    <div class="nav">
      <div class="item">
         <i class="fas fa-bell"></i>
      </div>
      <div class="item">
         <i class="fas fa-envelope"></i>
      </div>
      <div class="item">
         <i class="fas fa-cog"></i>
      </div>
    </div>

</div>

<?php
if (file_exists('includes/sidebar.php'))
   include('includes/sidebar.php');
else
   include('../includes/sidebar.php');
?>
