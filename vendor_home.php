
<?php include 'header.php'; ?>
<?php
$role = $_SESSION['role'];
if ($role != 'Vendor' ) {
echo '<script>window.location="admin_home.php" </script>';
}
  ?>

    <!-- Header top area start-->
    <div class="wrapper-pro">
        <?php include 'sidebar.php'; ?>

            <!-- income order visit user Start -->
            <div class="income-order-visit-user-area">
                <div class="container-fluid">
                    <div class="row">
                        <?php

                        {
                            global $connection;
                           $query = "SELECT * FROM payout_periods ORDER BY Id DESC";
                           $select_periods =mysqli_query($connection,$query);
                           while($row = mysqli_fetch_assoc($select_periods)){
                             $period_id = $row['Id'];
                             $db_year = $row['year'];
                             $db_period = $row['Period'];
                             // $db_subscription = $row['Subscription_status'];






                         ?>
                         <div class="col-lg-3">
                                                     <div class="income-dashone-total shadow-reset nt-mg-b-30">
                                                         <div class="income-title">
                                                             <div class="main-income-head">
                                                                 <h2><?php echo $db_year; ?></h2>
                                                                 <div class="main-income-phara order-cl">
                                                                     <p><?php echo $db_period; ?></p>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <?php
                                                         $vcode = $_SESSION['username'];
                                                         $query = "SELECT * FROM payout_totals WHERE VendorCode = '{$vcode}' AND PeriodId = '{$period_id}'";
                                                         $select_payout =mysqli_query($connection,$query);
                                                         while($row = mysqli_fetch_assoc($select_payout)){
                                                           $id = $row['Id'];
                                                           $db_period_id = $row['PeriodId'];
                                                           $db_vendorcode = $row['VendorCode'];
                                                           $db_vendorname = $row['VendorName'];
                                                           $db_amount = $row['Total'];
                                                           // $db_amount = number_format("$db_amount",2);
                                                           $vat = ($db_amount) * (0.16);
                                                           $vat = number_format("$vat", 2);
                                                           $total = ($db_amount) * (1.16);
                                                           $total = round($total);
                                                           ?>


                                                           <?php if ($_SESSION['vatable'] === "Yes") {

                                                            ?>


                                                         <div class="income-dashone-pro">
                                                           <div class="income-range order-cl">
                                                               <p>Sales</p>
                                                               <span class="income-percentange"><?php echo number_format("$db_amount",2); ?> KSH</span>
                                                           </div>
                                                           <br>
                                                             <div class="income-range order-cl">
                                                                 <p>VAT</p>
                                                                 <span class="income-percentange"> <?php echo $vat; ?> KSH</span>
                                                             </div>
                                                             <br>
                                                             <div class="income-range order-cl">
                                                                 <p>Total</p>
                                                                 <span class="income-percentange"><?php echo number_format("$total",2); ?> KSH</span>
                                                             </div>
                                                             <br>
                                                             <div class="income-range order-cl">
                                                                 <span class="income-percentange"><a href="<?php
                                                                  echo "
                                                                 vendorpayoutdetails.php?id={$period_id}
                                                                 ";
                                                                 ?>
                                                                 ">View Details <i class="fas fa-arrow-circle-right"></i></i></span>
                                                             </div>
                                                             <div class="clear"></div>
                                                         </div>
                                                       <?php }else {?>
                                                         <div class="income-dashone-pro">
                                                           <div class="income-range order-cl">
                                                               <p>Total</p>
                                                               <span class="income-percentange"><?php echo number_format("$db_amount",2); ?> KSH</span>
                                                           </div>
                                                             <br>
                                                             <br>
                                                             <div class="income-range order-cl">
                                                                 <span class="income-percentange"><a href="<?php
                                                                  echo "
                                                                 vendorpayoutdetails.php?id={$period_id}
                                                                 ";
                                                                 ?>
                                                                 ">View Details    <i class="fas fa-arrow-circle-right"></i></i></span>
                                                             </div>
                                                             <?php
                                                             $vcode = $_SESSION['username'];
                                                             $query = "SELECT * FROM payment_methods WHERE VendorCode = '{$vcode}' AND PeriodId = '{$period_id}'";
                                                             $select_payment =mysqli_query($connection,$query);
                                                             confirmQuery($select_payment);
                                                             while($row = mysqli_fetch_assoc($select_payment)){
                                                               $id = $row['Id'];
                                                               $db_period_id = $row['PeriodId'];
                                                               $db_vendorcode = $row['VendorCode'];
                                                               $db_vendorname = $row['VendorName'];
                                                               $db_method = $row['Method'];
                                                               ?>

                                                               <div class="income-range order-cl">
                                                                      <span class="income-percentange">
                                                                     Paid by : <?php echo $db_method; ?>
                                                                      <i class="fas fa-arrow-circle-right"></i></i></span>
                                                               </div>


                                                             <div class="clear"></div>
                                                             <?php }?>
                                                         </div>

                                                       <?php } ?>
                                                       <?php } ?>
                                                     </div>
                                                 </div>
<?php }} ?>
                    </div>
                </div>
            </div>



                </div>
            </div>
        </div>
    </div>
    <!-- Chat Box End-->
    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/wow/wow.min.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- jvectormap JS
		============================================ -->
    <script src="js/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="js/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/jvectormap/jvectormap-active.js"></script>
    <!-- peity JS
		============================================ -->
    <script src="js/peity/jquery.peity.min.js"></script>
    <script src="js/peity/peity-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- flot JS
		============================================ -->
    <script src="js/flot/jquery.flot.js"></script>
    <script src="js/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/flot/jquery.flot.spline.js"></script>
    <script src="js/flot/jquery.flot.resize.js"></script>
    <script src="js/flot/jquery.flot.pie.js"></script>
    <script src="js/flot/jquery.flot.symbol.js"></script>
    <script src="js/flot/jquery.flot.time.js"></script>
    <script src="js/flot/dashtwo-flot-active.js"></script>
    <!-- data table JS
		============================================ -->
    <script src="js/data-table/bootstrap-table.js"></script>
    <script src="js/data-table/tableExport.js"></script>
    <script src="js/data-table/data-table-active.js"></script>
    <script src="js/data-table/bootstrap-table-editable.js"></script>
    <script src="js/data-table/bootstrap-editable.js"></script>
    <script src="js/data-table/bootstrap-table-resizable.js"></script>
    <script src="js/data-table/colResizable-1.5.source.js"></script>
    <script src="js/data-table/bootstrap-table-export.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
</body>

</html>
