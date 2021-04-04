<?php
include_once('../classes/DB.php');
include('../includes/start.php');
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
  'SELECT COUNT(1) as cnt FROM tasks t LEFT JOIN members m on member_id=m.id WHERE t.is_finished!=:finished AND member_id=:user_id',
  array(':user_id' => $user_id, ':finished' => $finished)
)[0]['cnt'];
$number_of_page = ceil($number_of_result / $results_per_page); //Number of results per page

//$tasks = DB::query('SELECT t.*,m.name as mname FROM tasks t LEFT JOIN members m on member_id=m.id');
$tasks = DB::query(
  'SELECT t.*,m.name as mname FROM tasks t LEFT JOIN members m on member_id=m.id WHERE t.is_finished!=:finished AND member_id=:user_id ORDER BY t.start_date DESC LIMIT ' . $page_first_result . ',' . $results_per_page,
  array(':user_id' => $user_id, ':finished' => $finished)
);
$mytasks = true;
?>
<div id="main-body">
  <div class="cards">
    <div class="row">
      <div class="item">
        <h1>Scheduled Tasks</h1>
        <p>Filter: <a href="?f=0">Finished Tasks</a> - <a href="?f=1">Unfinished Tasks</a> - <a href="?">All</a></p>
        <table class="table">
          <tr>
            <th>#</th>
            <th>Task</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>Deadline</th>
            <th>Assigned to</th>
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
            if (!isset($task['mname']) || $task['mname'] == NULL) {
              $task['mname'] = "N/A";
            }
            $finished = (bool)$task['is_finished'];
            echo "<tr>
             <td>" . $counter . "</td>
             <td>" . $task["name"] . "</td>
             <td>" . $task["description"] . "</td>
             <td>" . $task["start_date"] . "</td>
             <td>" . $task["deadline"] . "</td>
             <td>" . $task["mname"] . "</td>
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
                            if (isset($_GET['f'])) echo "&f=" . $_GET['f']; ?>">
              <div class="xbutton <?php if ($i != $page) echo "secondary"; ?>"><?php echo $i; ?></div>
            </a>
          <?php
          }
          ?>
        </div>
        <br>
        <a href="add-task.php">
          <div class="xbutton">Add new task</div>
        </a>
        <a href="assign-task.php">
          <div class="xbutton">Assign tasks</div>
        </a>
      </div>
    </div>
  </div>
</div>
<?php include('../includes/footer.php') ?>