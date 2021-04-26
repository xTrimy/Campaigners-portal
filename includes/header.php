   <?php $notifications_count =  Notifications::getNewNotificationsCount($user_id); ?>

   <div id="header">
      <div class="menu-button"></div>

      <div class="profile-image">
         <img src="uploads/<?php echo $user['image']; ?>">
      </div>
      <div class="nav">
         <a href="view-notifications.php">
            <div class="item">
               <i class="fas fa-bell">
                  <?php if ($notifications_count) { ?>
                     <div class="new-notifications"></div>
                  <?php } ?>
               </i>
            </div>
         </a>
         <div class="item">
            <i class="fas fa-envelope">
            </i>
         </div>
         <div class="item">
            <i class="fas fa-cog"></i>
         </div>
      </div>

      <?php if ($user['streak_count']) { ?>
         <div class="streak_count" title="Daily Streak">
            <?php echo $user['streak_count']; ?>
         </div>
      <?php } ?>
   </div>

   <?php
   if (file_exists('includes/sidebar.php'))
      include('includes/sidebar.php');
   else
      include('../includes/sidebar.php');

   $start_message =  SM::getNewMessages($user_id);
   if ($start_message) {
      if (file_exists('components/start_message.php'))
         include('components/start_message.php');
      else
         include('../components/start_message.php');
   }
   ?>