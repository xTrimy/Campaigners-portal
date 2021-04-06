<?php
include('includes/start.php');
include('includes/head.php');
include('includes/header.php');
?>
<div id="main-body">
  <div class="page-title">
    Points
  </div>
  <div class="cards">

    <div class="row">
      <?php
      include('components/leaderboard.php');
      ?>
      <div class="item">
        <h1>Points History</h1>
        <div class="points-history">
          <div class="history-container">
            <?php
            $points = DB::query('SELECT * FROM points WHERE user_id = :user_id', array(':user_id' => $user_id));
            foreach ($points as $point) {
              $increase_or_decrease = ($point['point'] > 0 ? "increase" : "decrease");
            ?>
              <div class="point <?php echo $increase_or_decrease; ?>">
                <div class="action"></div>
                <div class="number"><?php echo $point['point']; ?></div>
                <div class="date"><?php echo date('Y-m-d', strtotime($point['_date'])); ?></div>
                <?php if (strlen($point['reason']) > 0) { ?>
                  <div class="reason">For "<?php echo $point['reason']; ?>"</div>
                <?php } ?>
              </div>
            <?php
            }
            if (count($points) == 0) {
            ?>
              <h2>No points history available right now.</h2>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php') ?>