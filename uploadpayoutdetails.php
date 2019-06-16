<?php
include ('header.php');
<?php
$role = $_SESSION['role'];
if ($role === 'Vendor' ) {
echo '<script>window.location="vendor_home.php" </script>';
}
  ?>
include 'sidebar.php';
 ?>
 <div class="login-form-area mg-t-30 mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <form id="export_excel" class="adminpro-form" novalidate="novalidate">
                            <div class="col-lg-6">
                                <div class="login-bg">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="login-title">
                                                <h1>Payout Details Upload Form</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="login-input-head">
                                                <p>Payout Period</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="budget-input-area">
                                                <select name="period">
                                                  <option value="none" selected="" disabled="">Select Period</option>
                                                  <?php
-
                                                    $query = "SELECT * FROM payout_periods";
                                                    $select_period= mysqli_query($connection,$query);
                                                    while($row = mysqli_fetch_assoc($select_period)) {
                                                    $period_id = $row['Id'];
                                                    $period_year = $row['year'];
                                                    $period = $row['Period'];
                                                        echo "<option value='$period_id'>{$period}  {$period_year}</option>";
                                                    }
                                                  ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="login-input-head">
                                                <p>Excel Sheet</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                          <label>Select</label>
                                          <input type="file" name="excel_file" id="excel_file" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                        <div class="col-lg-3"></div>
                    </div>
                </div>
            </div>
<div class="wrapper-pro">

           <div class="container box">

                <!-- <br /><br />
                <br /><br />
                <form method="post" id="export_excel">
                     <label>Select Excel Sheet to upload</label>
                     <input type="file" name="excel_file" id="excel_file" />

                </form>
                <br />
                <br /> -->
                <div id="result">
                </div>
           </div>
      </body>
 </html>
 <script>
 $(document).ready(function(){
      $('#excel_file').change(function(){
           $('#export_excel').submit();
      });
      $('#export_excel').on('submit', function(event){
           event.preventDefault();
           $.ajax({
                url:"export.php",
                method:"POST",
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data){
                     $('#result').html(data);
                     $('#excel_file').val('');
                }
           });
      });
 });
 </script>
