<?php
include ('header.php');
 ?>
 <?php
if (isset($_POST['Upload'])){
  Upload();
}
include 'sidebar.php';
  ?>
            <!-- login Start-->
            <div class="login-form-area mg-t-30 mg-b-40">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <form id="adminpro-form" class="adminpro-form" method="post">
                            <div class="col-lg-4">
                                <div class="login-bg">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="login-title">
                                                <h1>Upload Payout</h1>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="login-input-head">
                                                <p>Year</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="login-input-area">
                                              <select class="form-control" size="" name="role" id="role" onChange="onSelectChange()">
                                                      <?php

              $query = "SELECT * FROM payout_periods";
              $select_period= mysqli_query($connection,$query);
              while($row = mysqli_fetch_assoc($select_period)) {
              $period_id = $row['Id'];
              $period_year = $row['year'];
              $period = $row['Period'];
                  echo "<option value='$period_year'>{$period_year}</option>";
              }
              ?>
                                                  </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="login-input-head">
                                                <p>Period</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="login-input-area">
                                              <select class="form-control" size="" name="role" id="role" onChange="onSelectChange()">
                                                      <?php

              $query = "SELECT * FROM payout_periods";
              $select_period= mysqli_query($connection,$query);
              while($row = mysqli_fetch_assoc($select_period)) {
              $period_id = $row['Id'];
              $period_year = $row['year'];
              $period = $row['Period'];
                  echo "<option value='$period'>{$period}</option>";
              }
              ?>
                                                  </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">

                                        </div>
                                        <div class="col-lg-8">
                                            <div class="login-button-pro">
                                                <input type="submit" value="Upload" name="Upload" class="login-button login-button-lg"></input>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="col-lg-4"></div>
                    </div>
                </div>
            </div>
            <!-- login End-->
        </div>
    </div>
    <script>

                                        function onSelectChange() {
                                          var value = document.getElementById("role").value;
                                          if ( (value == 'admin')) {
                                            document.getElementById('vat').style.display = 'none';
                                            document.getElementById('vatable').style.display = 'none';
                                          }else if ((value == 'moderator')) {
                                            document.getElementById('vat').style.display = 'none';
                                            document.getElementById('vatable').style.display = 'none';
                                          }else {
                                            document.getElementById('vat').style.display = 'block';
                                            document.getElementById('vatable').style.display = 'block';
                                          }
                                        }
                                      </script>
    <!-- Footer Start-->
    <div class="footer-copyright-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-copy-right">
                        <p>Copyright &#169;</p>
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
    <!-- form validate JS
		============================================ -->
    <script src="js/jquery.form.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/form-active.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
</body>

</html>
