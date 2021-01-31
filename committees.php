
      <?php
      include('includes/start.php');
      include('includes/head.php');
      include('includes/header.php'); ?>
      <div id="main-body">
        <div class="cards">
            <div class="item">
              </div>
              <!-- comment -->
          <div class="row">
            <div class="item">
              <h1>Our Committees</h1>
              <div class="table-container">

              <?php
                $items = DB::query('SELECT * FROM committees');
              ?>

                <table class="table">
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                  </tr>

                  <?php
                    $i = 0;
                    foreach($items as $item){
                      ?>
                      <tr>
                        <td><?php echo ++$i; ?></td>
                        <td><?php echo $item['name'] ?></td>
                      </tr>
                      <?php
                    }
                  ?>
                </table>
              </div>
            </div>
          </div>
  <?php include('includes/footer.php') ?>
