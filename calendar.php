<?php
include('includes/start.php');

if (Permissions::getAccessLevel() == 0) {
  header('Location:/?forbidden');
  exit;
}

include('includes/head.php');
include('includes/header.php');
?>
<?php
$days = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
$Month = date('F');
$Month_num = date('m');
$Year = date('Y');
if (isset($_GET['M']) && isset($_GET['Y'])) {
  $Year = $_GET['Y'];
  $Month = date('F', strtotime("2021-" . $_GET['M'] . "-01"));
  $Month_num = date('m', strtotime("2021-" . $_GET['M'] . "-01"));
} else if (isset($_GET['M'])) {
  $Month = date('F', strtotime("2021-" . $_GET['M'] . "-01"));
  $Month_num = date('m', strtotime("2021-" . $_GET['M'] . "-01"));
}

$Next_month = $Month_num + 1;
$Prev_month = $Month_num - 1;
$Next_year = $Year;
$Prev_year = $Year;
if ($Month_num == 12) {
  $Next_month = 01;
  $Next_year++;
} else if ($Month_num == 01) {
  $Prev_month = 12;
  $Prev_year--;
}
?>
<style>

</style>
<div id="main-body">
  <div class="cards">
    <div class="row">
      <div class="item">
        <h1>Calender</h1>
        <div class="calendar-container">
          <div class="calendar-head">
            <a href="?M=<?php echo $Prev_month; ?>&Y=<?php echo $Prev_year; ?>"><i class="fas fa-caret-left"></i></a>
            <div class="calendar-date">
              <h1><?php echo $Month; ?></h1>
              <p><?php echo $Year; ?></p>
            </div>
            <a href="?M=<?php echo $Next_month; ?>&Y=<?php echo $Next_year; ?>"><i class="fas fa-caret-right"></i></a>
          </div>
          <div class="calendar-body">
            <table>
              <tbody>
                <tr>
                  <th>Sa</th>
                  <th>Su</th>
                  <th>Mo</th>
                  <th>Tu</th>
                  <th>We</th>
                  <th>Th</th>
                  <th>Fr</th>
                </tr>

                <?php
                $d = 0;
                for ($i = 1; $i <= 6; $i++) {
                  $firstday = date('l', strtotime('01 ' . $Month . ' ' . $Year)); //Get name of the first day of a month
                ?>
                  <tr>
                    <?php
                    //Get the first day of the month
                    //Repeat until month's first day match the first day on the calendar
                    $j = 1;
                    if ($i == 1) {
                      foreach ($days as $day) {
                        if ($firstday == $day) {
                          break;
                        }
                        $j++;
                      }
                      //Display empty fields until the first day on the calendar to be the first day of the month
                      //* Example:
                      //* Sa Su Mo Tu We Th Fr
                      //* -  -  -  1  2  3  4
                      //* Here, the first day of the month is Tuesday
                      for ($k = $j; $k > 1; $k--) {
                    ?>
                        <td></td>
                      <?php
                      }
                    }
                    for ($j; $j <= 7; $j++) { //Loop for days of the week
                      $d++;
                      $dd = date('d', strtotime($d . ' ' . $Month . ' ' . $Year));
                      $fulldate = date('Y-m-d', strtotime($dd . ' ' . $Month . ' ' . $Year));
                      //Check if the day exists. For example, February 30 doesn't exist so we make sure the day exists
                      $checkdate = checkdate(date('m', strtotime($Month)), $d, $Year);
                      if (!$checkdate) {
                        continue;
                      }
                      ?>
                      <td>
                        <?php
                        $event = "";
                        if (date('Y-m-d') == $fulldate) { //Check if the day matches today's date
                          $event .= " today";
                        }
                        $check_event = DB::query('SELECT * FROM events WHERE start_date<=:start_date AND end_date>=:start_date', array(':start_date' => $fulldate));
                        if ($check_event) {
                          $event .= " event";
                        }

                        ?>
                        <?php
                        if ($check_event) {
                        ?>
                          <a href="view-event.php?date=<?php echo $fulldate; ?>">
                          <?php
                        }
                          ?>
                           <div class="event-bubble <?php echo $event; ?>"><?php echo $dd ?></div>
                          <?php
                          if ($check_event) {
                          ?>
                            </a>
                            <?php
                          }
                            ?>
                      </td>
                    <?php
                    }
                    ?>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('includes/footer.php') ?>