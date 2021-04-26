<?php

include('../includes/start.php');


//Pagination
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}
$results_per_page = $default_results_per_page;
$page_first_result = ($page - 1) * $results_per_page;

//Default is user's committe ID, if all is set or specific commit is set override default
if (!isset($_GET['all']) && !isset($_GET['c'])) {
  if(!Permissions::getAccessLevel() == 0)
  $_GET['c'] = $user['committee'];
}
$number_of_result = DB::query('SELECT COUNT(1) as cnt FROM members m LEFT JOIN committees c ON m.committee_id=c.id')[0]['cnt'];
if (isset($_GET['c'])) {
  $committee = $_GET['c'];
  $number_of_result = DB::query('SELECT COUNT(1) as cnt FROM members m,committees c WHERE m.committee_id=c.id AND c.name=:name', array(':name' => $committee))[0]['cnt'];
}
$number_of_page = ceil($number_of_result / $results_per_page);

$results = DB::query('SELECT *,m.id as memberid ,m.name as name, c.name as cname FROM members m LEFT JOIN committees c ON m.committee_id=c.id ORDER BY m.committee_id ASC,m.id ASC LIMIT ' . $page_first_result . ',' . $results_per_page);

//Get members of a committee
if (isset($_GET['c'])) {
  $committee = $_GET['c'];
  $committee = htmlspecialchars($committee);
  $results = DB::query('SELECT *,m.id as memberid ,m.name as name, c.name as cname FROM members m LEFT JOIN committees c ON m.committee_id=c.id WHERE c.name=:name LIMIT ' . $page_first_result . ',' . $results_per_page, array(':name' => $committee));
  if (count($results) == 0) {
    header('Location:./view-members.php');
  }
}
include('../includes/head.php');
include('../includes/header.php');
?>

<div id="main-body">
  <div class="page-title">
    Members
  </div>
  <div class="cards">
    <div class="row">
      <div class="item">
        <?php
        if (isset($committee)) {
          //ucfirst -> capitalize first letter
          $committee = ucfirst($committee);
        } else {
          $committee = "All";
        }
        ?>
        <h1><?php echo $committee; ?> Members</h1>
        <div class="table-container">
          <table class="table">
            <tr>
              <th>#</th>
              <th></th>
              <th>Name</th>
              <th>Phone</th>
              <th>Email</th>
              <th>ID</th>
              <th>Committee</th>
              <?php if ($Permissions::getAccessLevel() > 1) { //Check high role (co-head or above) 
              ?>
                <th>Evaluate</th>
                <th>Warn</th>
              <?php } ?>
            </tr>
            <?php
            $i = 1 + ($page - 1) * $results_per_page;
            foreach ($results as $item) {
              $same_committee = false;
              $access = false;
              if ($user['committee_id'] == $item['committee_id']) {
                $same_committee = true;
              }
              if ($Permissions::getAccessLevel() > 1) {
                if ($Permissions::getAccessLevel() > 2 || $same_committee) //Check if higher than head, or head with same committee access
                  $access = true;
              }
            ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td>
                  <div class="table-image">
                    <img height="50px" src="uploads/<?php echo $item['image']; ?>">
                  </div>
                </td>
                <td><a style="text-decoration:none;color:inherit" href="profile.php?id=<?php echo $item['memberid']; ?>"><?php echo $item['name'];
                if (Streaks::getStreakCountMoreThanTwo($item['memberid'])) { ?> <span title="Daily Streak" class="streak_count"><?php echo Streaks::streakAlmostDies($item['memberid']); echo Streaks::getStreakCount($item['memberid']); ?></span> <?php } ?> </a></td>
                <td><?php echo $item['phone']; ?></td>
                <td><?php echo $item['email']; ?></td>
                <td><?php echo $item['university_id']; ?></td>
                <td><?php echo $item['cname']; // -- Print member's committee name -- 
                    ?></td>
                <?php if ($Permissions::getAccessLevel() > 1) { //Check high role (co-head or above) 
                ?>
                  <td>
                    <?php if ($item['memberid'] != $user_id && $access) { ?>
                      <a href="evaluate.php?id=<?php echo $item['memberid']; ?>">
                        <div class="xbutton blue"> <i class="fas fa-star"></i> </div>
                      </a>
                  </td>
                <?php } ?>
                <td>
                  <?php if ($item['memberid'] != $user_id && $access) { ?>
                    <div class="xbutton red warningButton" data-id="<?php echo $item['memberid'] ?>">
                      <i class="fas fa-exclamation-triangle"></i>
                    </div>
                  <?php } ?>
                </td>
              <?php } ?>
              </tr>
            <?php
              $i++;
            }
            ?>
          </table>
        </div>
        <div class="pagination-container">
          <?php
          for ($i = 1; $i <= $number_of_page; $i++) {
          ?>
            <a href="?page=<?php echo $i;
                            if (isset($_GET['c'])) echo "&c=" . $_GET['c'];
                            if (isset($_GET['all'])) echo "&all"; ?>">
              <div class="xbutton <?php if ($i != $page) echo "secondary"; ?>"><?php echo $i; ?></div>
            </a>
          <?php
          }
          ?>
        </div>
        <br>
        <?php if (!Permissions::getAccessLevel() && isset($_GET['all'])) { ?>
          <a href="?">
            <div class="xbutton">View <?php echo ucfirst($user['committee']); ?> Members</div>
          </a>
        <?php
        } else {
        ?>
          <a href="?all">
            <div class="xbutton">View All Members</div>
          </a>
        <?php
        }
        ?>

      </div>
    </div>
  </div>
</div>
<?php include('../includes/footer.php') ?>