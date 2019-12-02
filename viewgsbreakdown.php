<?php include 'header.php'; ?>
<?php
$role = $_SESSION['role'];
if ($role === 'Vendor' ) {
echo '<script>window.location="vendor_home.php" </script>';
}
if (isset($_GET['user_id'])){
$user_id = escape($_GET['user_id']);
}
if (isset($_GET['vat'])){
$vatable = escape($_GET['user_id']);
}


  ?>
    <!-- Header top area start-->
    <div class="wrapper-pro">
        <?php include 'sidebar.php'; ?>
            <div class="inbox-mailbox-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="tab-content">
                                        <div id="inbox" class="tab-pane custom-inbox-message active">
                                            <div class="mail-title inbox-bt-mg">
                                                <h2><?php echo $user_id; ?> Summary</h2>
                                                <?php
                                                $role = $_SESSION['role'];
                                                if ($role === 'Vendor' ) {

                                                }else {
                                                  ?>

                                                  <?php
                                                }
                                                 ?>

                                            </div>
                                            <div class="datatable-dashv1-list custom-datatable-overright">
                                              <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar1">
                                                    <thead>
                                                        <tr>
                                                          <th data-field="id" colspan="2" style="text-align:center">Amount Owed to Vendor</th>
                                                            <th data-field="name">Amount owed to Swk</th>
                                                            <th data-field="phone">Outstanding Amount</th>


                                                        </tr>
                                                        <tr>
                                                          <th>Period</th>
                                                          <th>Total Sales <?php
                                                          if ($vatable = 1) {
                                                            ?>
                                                            [Including Vat]
                                                            <?php
                                                          }
                                                           ?></th>
                                                          <th>Gs Charge</th>
                                                          <th>Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                      <?php

                                          global $connection;
                                         $query = "SELECT * FROM payout_periods ORDER BY Id ASC";
                                         $select_periods =mysqli_query($connection,$query);
                                         while($row = mysqli_fetch_assoc($select_periods)){
                                           $period_id = $row['Id'];
                                           $db_year = $row['year'];
                                           $db_period = $row['Period'];
                                           // $db_subscription = $row['Subscription_status'];

                                           echo "<tr>";
                                             echo"<td> {$db_period} , [  {$db_year} ]</td>";
                                             $vcode = $user_id;
                                             $query = "SELECT * FROM payout_totals WHERE VendorCode = '{$vcode}' AND PeriodId = '{$period_id}'";
                                             $select_payout =mysqli_query($connection,$query);

                                             //
                                             if(mysqli_num_rows($select_payout) > 0){

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
                                               if (vatable = 1) {
                                                  echo"<td> {$total}</td>";
                                               }
                                             }

                                           echo "</tr>";

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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Start-->
    <div class="footer-copyright-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-copy-right">
                        <p>Copyright &#169; </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->

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
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <!-- map JS
		============================================ -->
    <script src="js/data-table/bootstrap-table.js"></script>
    <script src="js/data-table/tableExport.js"></script>
    <script src="js/data-table/data-table-active.js"></script>
    <script src="js/data-table/bootstrap-table-editable.js"></script>
    <script src="js/data-table/bootstrap-editable.js"></script>
    <script src="js/data-table/bootstrap-table-resizable.js"></script>
    <script src="js/data-table/colResizable-1.5.source.js"></script>
    <script src="js/data-table/bootstrap-table-export.js"></script>
    <!--  dropzone JS
		============================================ -->
    <script src="js/dropzone.js"></script>
    <!-- multiple email JS
		============================================ -->
    <script src="js/multiple-email/multiple-email-active.js"></script>
    <!-- summernote JS
		============================================ -->
    <script src="js/summernote.min.js"></script>
    <script src="js/summernote-active.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
</body>

</html>
