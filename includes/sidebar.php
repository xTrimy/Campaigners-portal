<div id="sidebar">
  <div class="menu-button-container">
    <div class="menu-button"></div>
  </div>
  <div class="title">
    <img src="layout/png/logo-white.png" alt="Campaigners Logo White">
    <h1>Campaigners</h1>
  </div>
  <div class="nav">
    <div class="item">
      <a href="./"><i class="fas fa-tachometer-alt"></i>
        Dashboard</a>
    </div>
    <div class="item">
      <div class="arrow"></div>
      <i class="fas fa-star-of-life"></i>
      Updates
      <div class="dropdown">
        <div class="item">
          <a href="add-announcement.php"><i class="fas fa-bullhorn"></i>
            New Announcement</a>
        </div>
        <div class="item">
          <a href="view-announcements.php"><i class="fas fa-scroll"></i>
            All Announcements</a>
        </div>
      </div>
    </div>
    <?php
    if ($Permissions::getAccessLevel() >= 9) {
    ?>
      <!-- General Settings START -->
      <div class="item">
        <div class="arrow"></div>
        <i class="fas fa-cogs"></i>
        General Settings
        <div class="dropdown">
          <div class="item">
            <div class="arrow"></div>
            <i class="fas fa-users"></i>
            Committees
            <div class="dropdown">
              <div class="item">
                <a href="view-committees.php"><i class="fas fa-scroll"></i>
                  View committees</a>
              </div>
              <div class="item">
                <a href="add-committee.php"><i class="fas fa-plus"></i>
                  Add committee</a>
              </div>
            </div>
          </div>

          <div class="item">
            <div class="arrow"></div>
            <i class="fas fa-school"></i>
            Schools
            <div class="dropdown">
              <div class="item">
                <a href="view-schools.php"><i class="fas fa-scroll"></i>
                  View schools</a>
              </div>
              <div class="item">
                <a href="add-school.php"><i class="fas fa-plus"></i>
                  Add school</a>
              </div>
            </div>
          </div>

        </div>
      </div>
      <!-- General Settings END -->
    <?php } ?>
    <div class="item">
      <div class="arrow"></div>
      <a href="profile.php?id=<?php echo $user_id; ?>"><i class="fas fa-user"></i>
        Profile</a>
      <div class="dropdown">
        <div class="item">
          <a href="profile-settings.php"><i class="fas fa-user-cog"></i>
            Profile Settings</a>
        </div>
      </div>
    </div>
    <div class="item">
      <a href="view-members.php"> <i class="fas fa-users"></i>
        Members </a>
    </div>
    <div class="item">
      <a href="points.php"> <i class="far fa-star"></i>
        My Points </a>
    </div>
    <div class="item">
      <a href="view-tasks.php"><i class="fas fa-tasks"></i>
        My Tasks</a>
    </div>
    <div class="item">
      <a href="calendar.php"><i class="far fa-calendar-alt"></i>
        Calendar</a>
    </div>
    <?php if (Permissions::getAccessLevel() >= 4) { ?>
      <div class="item">
        <i class="far fa-envelope"></i>
        Mail
      </div>
    <?php } ?>
    <?php
    if (TShirts::getTShirtsFormAvailability()) {
      $form_id = TShirts::getTShirtsFormAvailability();
      $check_filled = TShirts::checkUserFilledTheForm($form_id, $user_id);
      $important = "";
      if (!$check_filled) {
        $important = "important";
      }
    ?>
      <div class="item <?php echo $important;?>">
        <a href="tshirts.php?id=<?php echo $form_id; ?>"><i class="fas fa-tshirt"></i>
          TShirts Form</a>
      </div>
    <?php
    }
    ?>
    <div class="item">
      <a href="logout.php"><i class="fas fa-door-open"></i>
        Logout </a>
    </div>
  </div>

  <div class="viewing-as">
    You're viewing the portal as: <span><?php echo $Permissions::getHighestPermission($user_id); ?></span>
    <p><?php echo $version_number; ?></p>
  </div>
</div>