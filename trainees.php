<?php
      include('includes/start.php');
      include('includes/head.php');
      include('includes/header.php'); ?>
<?php


$results = DB::query('SELECT * FROM trainees');

?>

      <div id="main-body">
        <div class="page-title">
          Trainees
        </div>
        <div class="cards">
          <div class="row">
            <div class="item">
              <h1>Trainees Members</h1>
              <div class="table-container">
                <table class="table">
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>University ID</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>School</th>
                    <th>Evaluate</th>
                    <th>Warn</th>
                  </tr>
                  
                  <tr>
                    <td>1</td>
                    <td>Abdelrahman Sayed</td>
                    <td>01158999135</td>
                    <td>bodda@gmail.com</td>
                    <td>2018/14541</td>
                    <td>Philosphy</td>
                    <td><div class="xbutton blue"> <i class="fas fa-star"></i> </div></td>
                    <td><div class="xbutton red"> <i class="fas fa-exclamation-triangle"></i> </div></td>
                  </tr>
                  
                </table>
              </div>
              <div class="xbutton">1</div>
              <div class="xbutton secondary">2</div>
              <div class="xbutton secondary">3</div>
              <div class="xbutton secondary">4</div>
            </div>
          </div>
      </div>
    </div>
<?php include('includes/footer.php') ?>