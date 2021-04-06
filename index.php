      <?php
      include('includes/start.php');
      include('includes/head.php');
      include('includes/header.php'); ?>
      <div id="main-body">
        <div class="page-title">
          Welcome, <?php echo $user['first_name']; ?>
        </div>
        <!-- <p>It seems like it's your first time here! Watch the tutorial for the all-new Campaigners portal <a href="#">here</a></p> -->
        <div class="cards">
          <div class="row">
            <div class="item">
              <h1>Test</h1>
            </div>
          </div>
          <!-- Table START -->
          <?php
            include('components/leaderboard.php');
          ?>
          <div class="row">
            <div class="item">
              <h1>"Committee" members</h1>
              <div class="table-container">
                <table class="table">
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>ID</th>
                    <th>Committee</th>
                    <th>Evaluate</th>
                    <th>Warn</th>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>Mohamed Ashraf</td>
                    <td>01156052920</td>
                    <td>Mohamed.ashraf881999@gmail.com</td>
                    <td>2018/12470</td>
                    <td>Personell</td>
                    <td>
                      <div class="xbutton blue"> <i class="fas fa-star"></i> </div>
                    </td>
                    <td>
                      <div class="xbutton red"> <i class="fas fa-exclamation-triangle"></i> </div>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Mohamed Ashraf</td>
                    <td>01156052920</td>
                    <td>Mohamed.ashraf881999@gmail.com</td>
                    <td>2018/12470</td>
                    <td>Personell</td>
                    <td>
                      <div class="xbutton blue"> <i class="fas fa-star"></i> </div>
                    </td>
                    <td>
                      <div class="xbutton red"> <i class="fas fa-exclamation-triangle"></i> </div>
                    </td>
                  </tr>
                </table>
              </div>
              <div class="xbutton secondary">View All</div>
            </div>
          </div>
          <!-- Table END -->

          <div class="row">
            <div class="item">
              <h1>Form</h1>
              <div class="form">
                <form action="index.php" method="POST">
                  <div class="flex">
                    <div class="group-input fl-1">
                      <p>Text Input :</p>
                      <input type="text" class="binput" name="name" placeholder="Enter Your Name">
                    </div>
                    <div class="group-input fl-1">
                      <p>Invalid Text Input :</p>
                      <input type="text" class="binput invalid" name="name" placeholder="Enter Your Name">
                    </div>
                  </div>
                  <div class="group-input">
                    <p>Select :</p>
                    <select name="select" id="select" class="binput">
                      <option value="" selected disabled>Please Select From The Following</option>
                      <option value="">Option 1</option>
                    </select>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="item">
              <h1>Pop Up</h1>
              <div class="xbutton">Pop Up</div>
            </div>
          </div>
        </div>
      </div>
      <?php include('includes/footer.php') ?>