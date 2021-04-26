      <?php
      include('includes/start.php');
      include('includes/head.php');
      include('includes/header.php'); ?>
      <div id="main-body">
        <div class="page-title">
          Welcome, <?php echo $user['first_name']; ?>
        </div>
        <!-- <p>It seems like it's your first time here! Watch the tutorial for the all-new Campaigners portal <a href="#">here</a></p> -->
        <div class="cards">
          <div class="row">
            <div class="item">
              <h1>Notice</h1>
              <h2>Welcome to the new Campaigners' Portal</h2>
              <p>
                The portal is still in the <b>Alpha</b> preview, and still under development.<br>
                You may find some bugs, issues, or some features that doen't fully work. If you faced any problem don't hesitate to contact <u>Personnel</u> Team.
                We're also open to any feedback and suggestions.
              <h2>Important:</h2>
              <b>Please make sure to add your <u>correct</u> Full Name, University Email Address, and Phone Number - <a href="profile-settings.php" style="color:green;text-decoration:underline;">Profile Settings</a></b>
            </p>
            </div>
          </div>
          <?php
          include('components/leaderboard.php');
          ?>
        </div>
      </div>
      <?php include('includes/footer.php') ?>