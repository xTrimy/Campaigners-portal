<?php
include_once('../classes/DB.php');
include('../includes/start.php');

if (Permissions::getAccessLevel() == 0) {
  header('Location:/?forbidden');
  exit;
}

include('../includes/head.php');
include('../includes/header.php');
//Pagination

$finished = (isset($_GET['f']) ? $_GET['f'] : -1);

if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}
$results_per_page = $default_results_per_page;
$page_first_result = ($page - 1) * $results_per_page;
$number_of_result = DB::query(
  'SELECT COUNT(1) as cnt FROM tasks t LEFT JOIN members_tasks mt ON t.id=mt.task_id  JOIN members m ON m.id=:user_id AND mt.member_id = m.id LEFT JOIN members a ON t.assigned_by =a.id WHERE t.is_finished!=:finished GROUP BY t.id ',
  array(':user_id' => $user_id, ':finished' => $finished)
)[0]['cnt'];
$number_of_page = ceil($number_of_result / $results_per_page); //Number of results per page

//$tasks = DB::query('SELECT t.*,m.name as mname FROM tasks t LEFT JOIN members m on member_id=m.id');
$tasks = DB::query(
  'SELECT t.*,GROUP_CONCAT(DISTINCT m.name) as assigned_to,a.name as aname  FROM tasks t LEFT JOIN members_tasks mt ON t.id=mt.task_id  JOIN members m ON m.id=:user_id AND mt.member_id = m.id LEFT JOIN members a ON t.assigned_by =a.id WHERE t.is_finished!=:finished GROUP BY t.id  ORDER BY t.is_finished ASC, t.start_date DESC LIMIT ' . $page_first_result . ',' . $results_per_page,
  array(':user_id' => $user_id, ':finished' => $finished)
);

$tasks_type_name = "Scheduled";
if (isset($_GET['c'])) {
  if (Permissions::getAccessLevel() > 1) {
    if (strtolower($user['committee']) == strtolower($_GET['c']) || Permissions::getAccessLevel() >= 4) {
      $tasks_type_name = htmlspecialchars(ucfirst(strtolower($_GET['c'])));
      $tasks = DB::query(
        'SELECT t.*,GROUP_CONCAT(DISTINCT m.name) as assigned_to,a.name as aname FROM tasks t LEFT JOIN members_tasks mt ON t.id=mt.task_id LEFT JOIN members a ON a.id=t.assigned_by LEFT JOIN committees c ON  t.committee_id=c.id LEFT JOIN members m on mt.member_id=m.id AND c.id=m.committee_id  WHERE (c.name = :committee) AND t.is_finished!=:finished GROUP BY t.id  ORDER BY t.is_finished ASC, t.start_date DESC LIMIT ' . $page_first_result . ',' . $results_per_page,
        array(':committee' => $_GET['c'], ':finished' => $finished)
      );
      $number_of_result = DB::query(
        'SELECT COUNT(1) as cnt FROM tasks t LEFT JOIN members_tasks mt ON t.id=mt.task_id LEFT JOIN members a ON a.id=t.assigned_by LEFT JOIN committees c ON  t.committee_id=c.id LEFT JOIN members m on mt.member_id=m.id AND c.id=m.committee_id WHERE (c.name = :committee) AND t.is_finished!=:finished GROUP BY t.id ',
        array(':committee' => $_GET['c'], ':finished' => $finished)
      )[0]['cnt'];
      $number_of_page = ceil($number_of_result / $results_per_page); //Number of results per page
    }
  }
}
$mytasks = true;
?>
<div id="main-body">
  <div class="cards">

    <?php //Assigned Tasks 
    ?>
    <div class="row">
      <div class="item">
        <h1><?php echo $tasks_type_name; ?> Tasks</h1>
        <p>Filter:
          <a href="?f=0<?php if (isset($_GET['c'])) {
                          echo "&c=" . $_GET['c'];
                        } ?>">Finished Tasks</a> -
          <a href="?f=1<?php if (isset($_GET['c'])) {
                          echo "&c=" . $_GET['c'];
                        } ?>">Unfinished Tasks</a> -
          <a href="?<?php if (isset($_GET['c'])) {
                      echo "c=" . $_GET['c'];
                    } ?>">All</a>
        </p>
        <table class="table">
          <tr>
            <th>#</th>
            <th>Task</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>Deadline</th>
            <th>Assigned to</th>
            <th>Assigned By</th>
            <?php
            if ($mytasks) {
            ?>
              <th>Finished?</th>
            <?php
            }
            ?>
          </tr>
          <?php
          $counter = 1;
          foreach ($tasks as $task) {
            if (!isset($task['assigned_to']) || $task['assigned_to'] == NULL) {
              $task['assigned_to'] = "N/A";
            }
            $finished = (bool)$task['is_finished'];
            echo "<tr>
             <td>" . $counter . "</td>
             <td>" . $task["name"] . "</td>
             <td>" . FUN::truncate(str_replace(",", ", ", $task["description"]), 20). "</td>
             <td>" . $task["start_date"] . "</td>
             <td>" . $task["deadline"] . "</td>
             <td>" . FUN::truncate(str_replace(",",", ",$task["assigned_to"]),20) . "</td>
             <td>" . $task["aname"] . "</td>
             <td>
              " . (($mytasks) ? '
              <label class="checkbox-container">
                <input class="finished-checkbox" data-id="' . $task['id'] . '" type="checkbox" ' . (($finished) ? "checked" : "") . '>
                <span class="checkmark"></span>
              </label>
              ' : '') . "
             </td>
             </tr>";
            $counter++;
          }
          ?>
        </table>
        <div class="pagination-container">
          <?php
          for ($i = 1; $i <= $number_of_page; $i++) {
          ?>
            <a href="?page=<?php echo $i;
                            if (isset($_GET['f'])) echo "&f=" . $_GET['f'];
                            if (isset($_GET['c'])) echo "&c=" . $_GET['c']; ?>">
              <div class="xbutton <?php if ($i != $page) echo "secondary"; ?>"><?php echo $i; ?></div>
            </a>
          <?php
          }
          ?>
        </div>
        <br>
        <?php
        if ($Permissions::getAccessLevel() > 1) {
        ?>
          <a href="add-task.php">
            <div class="xbutton">Add new task</div>
          </a>
          <a href="assign-task.php">
            <div class="xbutton">Assign tasks</div>
          </a>
          <?php if ($user['committee']) { //if committee is assigned 
          ?>

            <?php if (isset($_GET['c'])) { ?>
              <a href="?all">
                <div class="xbutton">View My Tasks</div>
              </a>
            <?php } else {
            ?>
              <a href="?c=<?php echo $user['committee']; ?>">
                <div class="xbutton">View <?php echo $user['committee']; ?> Tasks</div>
              </a>
            <?php
            } ?>

          <?php } ?>
        <?php } ?>
      </div>
    </div>


  </div>
</div>
<?php include('../includes/footer.php') ?>