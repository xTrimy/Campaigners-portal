   <?php $notifications_count =  Notifications::getNewNotificationsCount($user_id); ?>

   <div id="header">
   <div class="menu-button"></div>
      <div class="profile-image">
         <img src="uploads/<?php echo $user['image']; ?>">
      </div>
      <div class="nav">
         <a href="view-notifications.php"><div class="item">
            <i class="fas fa-bell">
               <?php if($notifications_count){ ?>
               <div class="new-notifications"></div>
               <?php } ?>
            </i>
         </div></a>
         <div class="item">
            <i class="fas fa-envelope">
            </i>
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