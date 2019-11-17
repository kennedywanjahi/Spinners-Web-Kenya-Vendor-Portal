<?php
include ('header.php');
 ?>
 <?php
 $role = $_SESSION['role'];
 if ($role === 'Vendor' ) {
 echo '<script>window.location="vendor_home.php" </script>';
 }
 include 'sidebar.php';
   ?>
 <?php
 if ($role === 'Admin' ) {
if (isset($_GET['user_id'])){
$id = escape($_GET['user_id']);
}
      global $connection;
     $query = "SELECT * FROM users  WHERE id = {$id} ";
     $select_users =mysqli_query($connection,$query);
     while($row = mysqli_fetch_assoc($select_users)){
       $db_id = $row['id'];
       $db_username = $row['username'];
       $db_role = $row['role'];
       $db_email = $row['email'];
       $db_mobile = $row['mobile'];
       $db_password = $row['password'];
       $db_vatable = $row['vatable'];
     }
if (isset($_POST['editUser'])) {
  $username= escape($_POST['username']);
  $role = escape($_POST['role']);
  $vatable = escape($_POST['vatable']);
  $email = escape($_POST['email']);
  $mobile = escape($_POST['mobile']);
  $vatable = escape($_POST['vatable']);
  $password = escape($_POST['password']);
  $password2 = escape($_POST['password2']);
  $passwordo = md5($password);
  $passwordc = md5($password2);
  if ($passwordo === $passwordc) {

     $query = "UPDATE users SET username = '{$username}', role = '{$role}', email= '{$email}', mobile = '{$mobile}', password = '{$passwordo}', vatable = {$vatable} WHERE id = {$db_id}";

      $edit_user_query= mysqli_query($connection, $query);

      if(!$edit_user_query){
        die("QUERY FAILED" .mysqli_error($connection));
      }

      echo '<script>window.location="users.php?successe=success" </script>';
    }else {
      echo "<script>swal.fire('Passwords Do not match', 'Please Try again', 'error');</script>";
    }
}
}

  ?>
            <!-- login Start-->
            <div class="login-form-area mg-t-30 mg-b-40">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <form id="adminpro-form" class="adminpro-form" method="post">
                            <div class="col-lg-6">
                                <div class="login-bg">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="login-title">
                                                <h1>Edit User</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="login-input-head">
                                                <p>Username</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="login-input-area">
                                                <input type="text" name="username" value="<?php echo $db_username ?>" />
                                                <i class="fa fa-user login-user" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="login-input-head">
                                                <p>User Role</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="login-input-area">
                                              <select class="form-control" size="" name="role" id="role" onChange="onSelectChange()">
                                                      <?php

              $query = "SELECT * FROM userroles";
              $select_role = mysqli_query($connection,$query);
              while($row = mysqli_fetch_assoc($select_role )) {
              $role_id = $row['id'];
              $role_title = $row['name'];
                  echo "<option value='$role_title'>{$role_title}</option>";
              }
              ?>
                                                  </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4" id="vat" style="display:none;">
                                            <div class="login-input-head">
                                                <p>vatable</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="login-input-area">
                                              <select class="form-control" name="vatable" id="vatable" style="display:none;"> Vatable
                                                      <option value="1">Yes</option>
                                                      <option value="0">No</option>
                                                  </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="login-input-head">
                                                <p>Email</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="login-input-area">
                                                <input type="email" name="email" value="<?php echo $db_email ?>"/>
                                                <i class="fa fa-envelope login-user" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="login-input-head">
                                                <p>Mobile</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="login-input-area">
                                                <input type="text" name="mobile" value="<?php echo $db_mobile; ?>"/>
                                                <i class="fa fa-phone login-user" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="login-input-head">
                                                <p>New Password</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="login-input-area">
                                                <input type="password" name="password" />
                                                <i class="fa fa-lock login-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="login-input-head">
                                                <p>Confirm New Password</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="login-input-area">
                                                <input type="password" name="password2" />
                                                <i class="fa fa-lock login-user"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">

                                        </div>
                                        <div class="col-lg-8">
                                            <div class="login-button-pro">
                                                <input type="submit" value="Edit User" name="editUser" class="login-button login-button-lg"></input>
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
                                          if ( (value == 'Admin')) {
                                            document.getElementById('vat').style.display = 'none';
                                            document.getElementById('vatable').style.display = 'none';
                                          }else if ((value == 'Moderator')) {
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
