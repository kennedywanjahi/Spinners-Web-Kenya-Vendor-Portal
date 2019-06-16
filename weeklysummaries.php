<?php include 'header.php'; ?>
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
                                                $query = "SELECT * FROM payout_periods WHERE Id = '{$id}'";
                                                $select_period= mysqli_query($connection,$query);
                                                while($row = mysqli_fetch_assoc($select_period)) {
                                                $period_id = $row['Id'];
                                                $period_year = $row['year'];
                                                $period = $row['Period'];
                                               ?>

                                                <h2>Payout Summary [<?php echo $period; ?> <?php echo $period_year; ?> ]</h2>
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
                                                             <th data-field="id">Vendor Code</th>
                                                             <th data-field="name">Vendor Name</th>
                                                             <th data-field="phone">Total</th>

                                                         </tr>
                                                     </thead>
                                                     <tbody>


                                                           <?php
                                                           view_payoutsummary();
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
     <!-- Chat Box Start-->
     <div class="chat-list-wrap">
         <div class="chat-list-adminpro">
             <div class="chat-button">
                 <span data-toggle="collapse" data-target="#chat" class="chat-icon-link"><i class="fa fa-comments"></i></span>
             </div>
             <div id="chat" class="collapse chat-box-wrap shadow-reset animated zoomInLeft">
                 <div class="chat-main-list">
                     <div class="chat-heading">
                         <h2>Messanger</h2>
                     </div>
                     <div class="chat-content chat-scrollbar">
                         <div class="author-chat">
                             <h3>Monica <span class="chat-date">10:15 am</span></h3>
                             <p>Hi, what you are doing and where are you gay?</p>
                         </div>
                         <div class="client-chat">
                             <h3>Mamun <span class="chat-date">10:10 am</span></h3>
                             <p>Now working in graphic design with coding and you?</p>
                         </div>
                         <div class="author-chat">
                             <h3>Monica <span class="chat-date">10:05 am</span></h3>
                             <p>Practice in programming</p>
                         </div>
                         <div class="client-chat">
                             <h3>Mamun <span class="chat-date">10:02 am</span></h3>
                             <p>That's good man! carry on...</p>
                         </div>
                     </div>
                     <div class="chat-send">
                         <input type="text" placeholder="Type..." />
                         <span><button type="submit">Send</button></span>
                     </div>
                 </div>
             </div>
         </div>
     </div>
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