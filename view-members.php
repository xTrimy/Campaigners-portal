<?php
include('includes/start.php');
include('includes/head.php');
include('includes/header.php');

//Pagination
if (!isset ($_GET['page']) ) {  
  $page = 1;  
} else {  
  $page = $_GET['page'];  
}  
$results_per_page = $default_results_per_page;
$page_first_result = ($page-1) * $results_per_page;  
$number_of_result = DB::query('SELECT COUNT(1) as cnt FROM members m,committees c WHERE m.committee_id=c.id')[0]['cnt'];
if(isset($_GET['c'])){
  $committee = $_GET['c'];
  $number_of_result = DB::query('SELECT COUNT(1) as cnt FROM members m,committees c WHERE m.committee_id=c.id AND c.name=:name',array(':name'=>$committee))[0]['cnt'];
}
$number_of_page = ceil ($number_of_result / $results_per_page);  

$results = DB::query('SELECT *,m.id as memberid ,m.name as name, c.name as cname FROM members m,committees c WHERE m.committee_id=c.id LIMIT '.$page_first_result.','.$results_per_page);

//Get members of a committee
if(isset($_GET['c'])){
  $committee = $_GET['c'];
  $results = DB::query('SELECT *,m.id as memberid ,m.name as name, c.name as cname FROM members m,committees c WHERE m.committee_id=c.id AND c.name=:name LIMIT '.$page_first_result.','.$results_per_page,array(':name'=>$committee));
}

?>

      <div id="main-body">
        <div class="page-title">
          Members
        </div>
        <div class="cards">
          <div class="row">
            <div class="item">
            <?php
                if(isset($committee)){
                  //ucfirst -> capitalize first letter
                  $committee = ucfirst($committee);
                }else{
                  $committee = "All";
                }
              ?>
              <h1><?php echo $committee; ?> Members</h1>
              <div class="table-container">
                <table class="table">
                  <tr>
                    <th>#</th>
                    <th></th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>ID</th>
                    <th>Committee</th>
                    <th>Evaluate</th>
                    <th>Warn</th>
                  </tr>
                  <?php  
                  $i = 1+($page-1)*$results_per_page;
                  foreach($results as $item){ ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><div class="table-image">
                    <img height="50px" src="uploads/<?php echo $item['image']; ?>">
                    </div>
                    </td>
                    <td><?php echo $item['name']; ?></td>
                    <td><?php echo $item['phone']; ?></td>
                    <td><?php echo $item['email']; ?></td>
                    <td><?php echo $item['university_id']; ?></td>
                    <td><?php echo $item['cname']; // -- Print member's committee name -- ?></td>
                    <td><div class="xbutton blue"> <i class="fas fa-star"></i> </div></td>
                    <td><div class="xbutton red warningButton" data-id="<?php echo $item['memberid'] ?>">
                     <i class="fas fa-exclamation-triangle"></i> </div></td>
                  </tr>
                  <?php
                  $i++;
                  }
                  ?>
                </table>
              </div>
              <div class="pagination-container">
              <?php
              for($i = 1; $i<= $number_of_page; $i++) { 
                ?>
                <a href="?page=<?php echo $i; if(isset($_GET['c'])) echo "&c=".$_GET['c']; ?>">
                  <div class="xbutton <?php if($i != $page) echo "secondary"; ?>"><?php echo $i;?></div>
                </a>
                <?php 
              }
              ?>
              </div>
            </div>
          </div>
      </div>
    </div>
<?php include('includes/footer.php') ?>
