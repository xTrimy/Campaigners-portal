<?php
      include('includes/start.php');
      include('includes/head.php');
      include('includes/header.php'); ?>
      <div id="main-body">
      <h2>My Vouchers</h2>
        <div class="all-vouchers">
            <?php
            $all_vouchers = DB::query('SELECT * FROM vouchers');


            foreach($all_vouchers as $voucher){
            
            ?>
            <div class="voucher flex">
                <div class="voucher-img">
                    <img src="layout/jpg/<?php echo $voucher['image'] ?>" alt="test">
                </div>
                <div class="voucher-details">
                    <div class="mb-10">
                        <b><?php echo $voucher['name'] ?></b>
                    </div>
                    
                    <div class="flex" style="flex-wrap:wrap">
                        <div class="fl-1">
                            <i style="color: #666"><?php echo $voucher['code'] ?></i>
                        </div>
                        <div class="fl-1">
                            <p style="text-align: right;"><?php echo $voucher['valid_till'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
<?php }?>
        </div>
      </div>
      <?php include('includes/footer.php') ?>