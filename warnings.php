<?php
include('includes/start.php');


if (!isset($_GET['id'])) {
  header('Location: ./');
  exit;
}
$member_id = $_GET['id'];

//Fetching member's data + there committee's name
$member_details = DB::query(
  'SELECT *, m.id as member_id, m.image as img, COUNT(w.id) as warnings_count, m.name as name, c.name as cname 
                     FROM committees c,members m LEFT JOIN warnings w on w.member_id=m.id
                     WHERE m.id=:id AND m.committee_id = c.id',
  array(':id' => $member_id)
);
if (!$member_details[0]['name'] || $member_id == $user_id) {
  header('Location:./');
  exit;
}
$member = $member_details[0];
$same_committee = ($member['committee_id'] == $user['cid']);
if ($Permissions::getAccessLevel() > 1) {
  if ($Permissions::getAccessLevel() > 2 || $same_committee) //Check if higher than head, or head with same committee access
    $access = true;
}
if (!$access) {
  header('Location:./');
  exit;
}
//Adding warn
if (isset($_POST['addwarn'])) {

  $member_id = $member['member_id'];
  $reason = $_POST['reason'];
  $warndate = date('Y-m-d');

  DB::query(
    'INSERT INTO warnings VALUES (\'\', :member_id, :reason, :warndate,0)',
    array(':member_id' => $member_id, ':reason' => $reason, ':warndate' => $warndate)
  );
  $get_warning_id = DB::query('SELECT id FROM warnings WHERE member_id=:member_id AND reason=:reason ORDER BY id DESC LIMIT 1 ', array(':member_id' => $member_id, ':reason' => $reason))[0]['id'];

  Notifications::createNotificationForUserWithRefrence($member_id, "warning.default", $reason, $get_warning_id, $user_id);

  echo '<script> alert("Warning sent successfully!") </script>';

  include('includes/head.php');
  include('includes/header.php');
}
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
          <tr style="color:<?php echo ($member['warnings_count'] > 0 ? "red" : "green"); ?>">
            <td><b>Past Warnings</b></td>
            <td><?php echo $member['warnings_count'] ?> </td>
          </tr>
        </table>
        <form method="post" action="warnings.php?id=<?php echo $member['member_id'] ?>">
          <p><b>Warning reason :</b></p>
          <textarea name="reason" id="reason" required class="binput"></textarea><br>
          <button type="submit" name="addwarn" class="xbutton">Add warn</button>
        </form>
      </div>
    </div>

    <div class="row">
      <div class="item">
        <h1>Past Warnings</h1>
        <?php
        if ($member['warnings_count'] == 0) {
          echo "There's no past warnings for this member ✔️";
        }
        $warnings = DB::query('SELECT * FROM warnings WHERE member_id = :member_id', array(':member_id' => $member_id));
        foreach ($warnings as $warning) {
        ?>
          <table class="table">
            <tr>
              <td><b>Date</b></td>
              <td><?php echo $warning['warndate'] ?> </td>
            </tr>
            <tr>
              <td><b>Reason</b></td>
              <td><?php echo $warning['reason'] ?> </td>
            </tr>
          </table>
          <br>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
</div>

<?php include('includes/footer.php') ?>