<?php
include('../includes/start.php');
include('../includes/head.php');
include('../includes/header.php');
?>
<div id="main-body">
  <div class="cards">
    <div class="row">
      <div class="item">
        <h1>Notifications</h1>
        <table class="table notifications">
          <?php
          $items = Notifications::getUserNotifications($user_id, false);
          $counter = 1;
          foreach ($items as $item) {
            $title = "";
            if ($item['type'] == "friend.request") {
              $title = "You've a friend request from " . $item['sender'] . "!";
            }else if ($item['type'] == "friend.accept"){
              $title = $item["sender"] . " accepted your friend request!";
            } else if ($item['type'] == "tasks.assign") {
              $title = "You have new task: \"". $item["parameters"] . "\"";
            } else if ($item['parameters'] != "") $title =  $item['parameters'];
            $refrence = $item['reference_id'];
            $type = explode('.', $item['type']);
            $url = false;
            if ($refrence) {
              if ($type[0] == "friend") {
                $url = "profile.php?id=" . $refrence;
              } else if ($type[0] == "task") {
                $url = "view-task.php?id=" . $refrence;
              } else if ($type[0] == "announcement") {
                $url = "view-announcement.php?id=" . $refrence;
              } else if ($type[0] == "event") {
                $url = "view-event.php?date=" . $refrence;
              }
              if(strpos($url,"?") != FALSE){
                $url .= "&notification=".$item['id'];
              }
            }
          ?>
            <tr class="<?php if ($item['unread']) echo "unread"; ?>">
              <td><a <?php if ($url) echo "href='" . $url . "'"; ?>><?php if ($item['sender_image']) { ?> <img height="50px" src="uploads/<?php echo $item['sender_image']; ?>"> <?php } ?></a></td>
              <td><a <?php if ($url) echo "href='" . $url . "'"; ?>><?php if ($item['sender']) echo $item['sender']; ?></a></td>
              <td><a <?php if ($url) echo "href='" . $url . "'"; ?>><?php echo $title; ?></a></td>
              <td><?php if ($item['unread']) echo "<a href='?notification=" . $item['id'] . "'>Mark as read</a>"; ?></td>
              <td><?php echo $type[0] ?></td>
            </tr>
          <?php
          }
          ?>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include('../includes/footer.php') ?>