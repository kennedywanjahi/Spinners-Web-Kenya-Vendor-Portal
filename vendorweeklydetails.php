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
            <div class="inbox-mailbox-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="tab-content">
                                        <div id="inbox" class="tab-pane fade in animated zoomInDown custom-inbox-message shadow-reset active">
                                            <div class="mail-title inbox-bt-mg">
                                              <?php
                                              if (isset($_GET["id"])) {
                                                $id=$_GET["id"];
                                                $query = "SELECT * FROM weekly_periods WHERE Id = '{$id}'";
                                                $select_period= mysqli_query($connection,$query);
                                                while($row = mysqli_fetch_assoc($select_period)) {
                                                $period_id = $row['Id'];

                                                $period = $row['Period'];
                                               ?>

                                                <h2><?php echo $_SESSION["username"]; ?> Weekly Sales [ <?php echo $period; ?> ]</h2>
                                              <?php } }
                                              ?>
                                                <?php
                                                $role = $_SESSION['role'];
                                                if ($role === 'Vendor' ) {

                                                }else {
                                                  ?>
                                                <div class="view-mail-action view-mail-ov-d-n">
                                                    <a class="compose-draft-bt" href="uploadsummary.php"><i class="fa fa-print"></i> Upload</a>
                                                </div>
                                                <?php
                                              }
                                               ?>
                                             </div>
                                             <div class="datatable-dashv1-list custom-datatable-overright">
                                                 <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="false" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar1">
                                                     <thead>
                                                         <tr>
                                                             <th data-field="id">Item No.</th>
                                                             <th data-field="name">Item Name</th>
                                                             <th data-field="alu">Alternate look up</th>
                                                             <th data-field="vpc">Vendor Product Code</th>
                                                             <th data-field="attribute">Attribute</th>
                                                             <th data-field="size">Size</th>
                                                               <th data-field="qty">Qty Sold</th>
                                                                 <th data-field="cost">Ext cost</th>

                                                         </tr>
                                                     </thead>
                                                     <tbody>


                                                           <?php
                                                           view_vendorweeklydetails();
                                                           if (isset($_GET["total"])) {
                                                             $total=$_GET["total"];
                                                             echo "<tr>";
                                                                          echo "<td></td>";
                                                                          echo "<td></td>";
                                                                          echo "<td></td>";
                                                                          echo "<td></td>";
                                                                          echo "<td></td>";
                                                                          echo "<td><strong>Total</strong></td>";
                                                                          echo "<td><strong>{$total}</strong></td>";
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

     <script type="text/javascript">
       function confirm() {
         swal({
   title: "Are you sure?",
   text: "Once deleted, you will not be able to recover this imaginary file!",
   icon: "warning",
   buttons: true,
   dangerMode: true,
 });
       }
     </script>
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
