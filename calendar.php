<?php
include('includes/start.php');
include('includes/head.php');
include('includes/header.php');
 ?>
 <?php
  $days = ['Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday'];
  $Month = date('F');
  $Year = date('Y');
 ?>
 <style>
  .calendar-container{
    width:100%;
  }
  .calendar-container .calendar-head{
    width:100%;
    height:130px;
    display:flex;
    align-items: center;
    justify-content: space-around;
    font-size:25px;
    padding:20px;
    background-color: #25922a;
    color:white;
    text-align:center;
  }
  .calendar-container .calendar-body{
    width:100%;
    display: flex;

  }
  .calendar-container .calendar-body table th,.calendar-container .calendar-body table td{
    text-align:center;
  }
  .calendar-container .calendar-body table td{
    height:60px;
    background-color: #fff;
  }
  .calendar-container .calendar-body table td .event{
    background-color: #33b2d8;
    color:white;
    border-radius:50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding:10px;
    width: 40px;
    height:40px;
  }
  .calendar-container .calendar-body table td .event.today{
    background-color: #369a15;
  }

 </style>
 <div id="main-body">
   <div class="cards">
     <div class="row">
       <div class="item">
            <h1>Calender</h1>
            <div class="calendar-container">
              <div class="calendar-head">
                <i class="fas fa-caret-left"></i>
                <div class="calendar-date">
                  <h1><?php echo $Month;?></h1>
                  <p><?php echo $Year;?></p>
                </div>
                <i class="fas fa-caret-right"></i>
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
                      $d=0;
                      for($i=1;$i<=6;$i++){
                        $firstday = date('l',strtotime('01 '.$Month.' '.$Year));
                        ?>
                        <tr>
                          <?php
                          $j=1;
                          if($i==1){
                          foreach($days as $day){
                            if($firstday == $day){
                              break;
                            }
                            $j++;
                          }
                          for($k=$j;$k>1;$k--){
                            ?>
                              <td></td>
                            <?php
                          }
                        }
                        for($j;$j<=7;$j++){
                        $d++;
                        $dd = date('d',strtotime($d.' '.$Month.' '.$Year));
                        $checkdate = checkdate(date('m',strtotime($Month)),$d,$Year);
                          if(!$checkdate){
                            continue;
                          }
                          ?>
                            <td>
                              <?php
                                if(date('Y-m-d') == date('Y-m-d',strtotime($dd.' '.$Month.' '.$Year))){
                                  ?>
                                <div class="event today"><?php echo $dd?></div>
                                  <?php
                                }else if($j==2 && $i==3){
                                  ?>
                                  <div class="event"><?php echo $dd?></div>
                                  <?php
                                }
                                else{
                                  ?>
                                  <?php echo $dd?>
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
  