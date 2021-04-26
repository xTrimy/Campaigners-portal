<?php
include('includes/start.php');
if (!isset($_GET['id'])) {
  header('Location: ./');
  exit;
}


$member_id = $_GET['id'];

//Fetching member's data + there committee's name
if (isset($_GET['trainee'])) {
  $member = DB::query(
    'SELECT *, m.image as img, m.name as name, c.name as cname , NULL as nickname 
                     FROM trainees m LEFT JOIN schools c ON m.school_id=c.id
                     WHERE m.id=:id',
    array(':id' => $member_id)
  );
}else{
  $member = DB::query(
    'SELECT *, m.image as img, m.name as name, c.name as cname
                      FROM members m LEFT JOIN committees c ON m.committee_id=c.id
                      WHERE m.id=:id',
    array(':id' => $member_id)
  );
}
if (!$member) {
  header('Location:./');
  exit;
}
$member = $member[0];

include('includes/head.php');
include('includes/header.php');
?>
<div id="main-body">
  <div class="cards">
    <div class="row">
      <div class="item">
        <div class="profile">
          <div class="profile-image-container">
            <div class="profile-image">
              <img src="uploads/<?php echo $member['img'] ?>" alt="">
            </div>
          </div>
          <h2><?php echo $member['name'] ?>
            <span class="nickname"><?php echo ($member['nickname'] ? "(" . $member['nickname'] . ")" : "") ?></span>
          </h2>
          <div class="tags">
            <?php
            if ($member['cname'] != NULL) {
            ?>
              <div class="item committee"><?php echo $member['cname'] ?> </div>
            <?php
            }
            ?>
            <div class="item position"><?php echo $Permissions::getUserLevel($member_id); ?></div>
            <?php if (Permissions::getAccessLevel() > 0 && Streaks::getStreakCountMoreThanTwo($member_id)) { ?>
              <div title="Daily Streak" class="item streak_count">
                <?php echo Streaks::streakAlmostDies($member_id);
                echo Streaks::getStreakCount($member_id); ?>
              </div>
            <?php } ?>
            <!-- <div class="item it">IT Specialist</div> -->
            <!-- <div class="item special">Member of the Year 2019-2020</div> -->
          </div>
          <?php
          if (Permissions::getAccessLevel() > 0) {
            $friend_button_type = ["add-friend", "remove-friend", "cancel-friend", "accept-friend"];
            $friends = 0;
            $check_friend_request_sent = DB::query('SELECT 1 FROM friends WHERE sender_id=:sender_id AND receiver_id=:receiver_id', array(':sender_id' => $user_id, ":receiver_id" => $member_id));
            $check_friend_request_received = DB::query('SELECT 1 FROM friends WHERE sender_id=:sender_id AND receiver_id=:receiver_id', array(':sender_id' => $member_id, ":receiver_id" => $user_id));
            //Check friends
            if ($check_friend_request_sent && $check_friend_request_received) {
              $friends = 1; //Friends
            } else if ($check_friend_request_sent) {
              $friends = 2; //Friend request sent
            } else if ($check_friend_request_received) {
              $friends = 3; //Friend request received
            }

          ?>
            <?php if ($user_id != $member_id) { ?>
              <div data-id="<?php echo $member_id; ?>" class="xbutton <?php echo $friend_button_type[$friends]; ?>">
                <div class="content"></div>
              </div>
              <div class="xbutton secondary blue"><i class="fas fa-envelope"></i> Message </div>
          <?php }
          } ?>
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
        <?php if ($member_id == $user_id) { ?>
          <a href="profile-settings.php">
            <div class="xbutton secondary"><i class="fas fa-cog"></i> Edit Profile </div>
          </a>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php') ?>