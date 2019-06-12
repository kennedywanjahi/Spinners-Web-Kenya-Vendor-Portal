<?php
function escape($string) {

global $connection;

return mysqli_real_escape_string($connection, trim($string));


}





function confirmQuery($result) {

    global $connection;

    if(!$result ) {

          die("QUERY FAILED ." . mysqli_error($connection));


      }


}










function loginUser()
{ global $connection;
  $password = escape($_POST["password"]);
  $username = escape($_POST["username"]);
  $passwordmd5 = md5($password);

  /*************Query To Check if username Exists***/
  $query = "SELECT * FROM users WHERE username = '{$username}' ";
  $select_user =mysqli_query($connection,$query);
  confirmQuery($select_user);
  /*************Query***/
  while ($row = mysqli_fetch_array($select_user)) {
      $db_username= $row['username'];
      $db_role = $row['role'];
      $db_email = $row['email'];
      $db_mobile = $row['mobile'];
      $db_password = $row['password'];
      $db_vatable = $row['vatable?'];



//

    }
    if (!isset($db_email)) {

      echo "<script>swal('Incorrect Credentials!', 'Please Try again', 'error');</script>";
      //echo '<script>window.location="index.php?source=account" </script>';

    }else {
      if ($username === $db_username && $db_password === $passwordmd5) {
         $_SESSION['username'] = $db_username;
         $_SESSION['role'] = $db_role;

         $_SESSION['email'] = $db_email;
         $_SESSION['mobile'] = $db_mobile;
         if ($db_vatable === "0") {
           $_SESSION['vatable'] = "No";
         }else {
           $_SESSION['vatable'] = "Yes";
         }
if ($_SESSION['role'] === 'Vendor') {
  echo '<script>window.location="vendor_home.php" </script>';
}else {
  echo '<script>window.location="admin_home.php" </script>';
}

       }else {
       echo "<script>swal('Incorrect Credentials!', 'Please Try again', 'error');</script>";
       }
    }

//        if($_SESSION['account_status'] == 1){
//
//
//        }else {
//       echo "account unapproved";
//   }
// else {
//   echo "<script>alert('Incorrect credentials, try again');</script>";
// }

}










function addUser()
{
  global $connection;
  $username= escape($_POST['username']);
  $role = escape($_POST['role']);
  $vatable = escape($_POST['vatable']);
  $email = escape($_POST['email']);
  $mobile = escape($_POST['mobile']);
  $password = escape($_POST['password']);
  $password2 = escape($_POST['password2']);
  $passwordo = md5($password);
  $passwordc = md5($password2);
       if ($passwordo === $passwordc) {

          $query = "INSERT INTO users(`username`, `role`, `email`, `mobile`, `password`, `vatable?`)";
          $query .="VALUES ('{$username}', '{$role}', '{$email}', '{$mobile}', '{$passwordo}', '{$vatable}')";
           $add_user_query= mysqli_query($connection, $query);

           if(!$add_user_query){
             die("QUERY FAILED" .mysqli_error($connection));
           }
           echo "<script>swal('User Added Successfully' 'User Added Successfully' 'success');</script>" ;
         }else {
           echo "passwords do not match";
         }
         // echo '<script>window.location="users.php" </script>';
}


function addperiod()
{
  global $connection;
  $year= escape($_POST['year']);
  $period = escape($_POST['period']);

          $query = "INSERT INTO payout_periods(`year`, `period`)";
          $query .="VALUES ('{$year}', '{$period}')";
           $add_period_query= mysqli_query($connection, $query);

           if(!$add_period_query){
             die("QUERY FAILED" .mysqli_error($connection));
           }
           echo "<script>swal('Period Added Successfully' 'Period Added Successfully' 'success');</script>" ;
           echo '<script>window.location="payoutperiods.php" </script>';
         }














function UploadPayout() {

  if (isset($_REQUEST['upload'])) {
    $ok = true;
    $file = $_FILES['csv_file']['tmp_name'];
    $handle = fopen($file, "r");
    if ($file == NULL) {
      error(_('Please select a file to import'));
      redirect(page_link_to('admin_export'));
    }
    else {
      while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
        {
          $nick_name = $filesop[0];
          $first_name = $filesop[1];
          $last_name = $filesop[2];
          $email = $filesop[3];
          $age = $filesop[4];
          $current_city = $filesop[5];
          $password = $filesop[6];
          $mobile = $filesop[7];
// example error handling. We can add more as required for the database.

        if ( strlen($email) && preg_match("/^[a-z0-9._+-]{1,64}@(?:[a-z0-9-]{1,63}\.){1,125}[a-z]{2,63}$/", $mail) > 0) {
          if (! check_email($email)) {
            $ok = false;
            $msg .= error(_("E-mail address is not correct."), true);
          }
        }
// error handling for password
        if (strlen($password) >= MIN_PASSWORD_LENGTH) {
            $ok = true;
          } else {
            $ok = false;
            $msg .= error(sprintf(_("Your password is too short (please use at least %s characters)."), MIN_PASSWORD_LENGTH), true);
        }
 // If the tests pass we can insert it into the database.
        if ($ok) {
          $sql = sql_query("
            INSERT INTO `User` SET
            `Nick Name`='" . sql_escape($nick_name) . "',
            `First Name`='" . sql_escape($first_name) . "',
            `Last Name`='" . sql_escape($last_name) . "',
            `email`='" . sql_escape($email) . "',
            `Age`='" . sql_escape($age) . "',
            `current_city`='" . sql_escape($current_city) . "',
            `Password`='" . sql_escape($password) . "',
             `mobile`='" . sql_escape($mobile) . "',");
        }
      }

      if ($sql) {
        success(_("You database has imported successfully!"));
        redirect(page_link_to('admin_export'));
      } else {
        error(_('Sorry! There is some problem in the import file.'));
        redirect(page_link_to('admin_export'));
        }
    }
  }
//form_submit($name, $label) Renders the submit button of a form
//form_file($name, $label) Renders a form file box

 return page_with_title("Import Data", array(
   msg(),
  div('row', array(
          div('col-md-12', array(
              form(array(
                form_file('csv_file', _("Import user data from a csv file")),
                form_submit('upload', _("Import"))
              ))
          ))
      ))
  ));
}
























function view_users()
{
    global $connection;
   $query = "SELECT * FROM users ORDER BY role ASC, username ASC";
   $select_users =mysqli_query($connection,$query);
   while($row = mysqli_fetch_assoc($select_users)){
     $id = $row['id'];
     $db_username = $row['username'];
     $db_role = $row['role'];
     $db_email = $row['email'];
     $db_mobile = $row['mobile'];
     $db_password = $row['password'];
     $db_vatable = $row['vatable?'];
     // $db_subscription = $row['Subscription_status'];
     echo "<tr>";


                  echo "<td>{$db_username}</td>";
                  echo "<td>{$db_role}</td>";
                  echo "<td>{$db_email}</td>";

                  echo "<td>{$db_mobile}</td>";
                  if ($db_role === 'Vendor') {
                    if ($db_vatable === '1') {
                      echo "<td><i class='fa fa-check'></i></td>";
                    }else {
                      echo "<td><i class='fa fa-ban'></i></td>";
                    }
                  }else {
                    echo "<td><i class='fas fa-user-shield'></i></td>";
                  }


                  echo "<td><a href='users.php?source=edit_user&user_id={$id}'><i class='fa fa-edit'></i></a></td>";
                  echo "<td><a href='users.php?delete={$id}' onclick='confirm();'><i class='fa fa-trash'></i></a></td>";
                  // echo "<td>{$db_subscription}</td>";
                  // echo "<td><a href='users.php?source=edit_user&user_id={$db_Email}'>Edit</a></td>";
                  // echo "<td><a href='users.php?delete={$db_Email}'>Delete</a></td>";




      echo "</tr>";



    }
  }






  function view_periods()
  {
      global $connection;
     $query = "SELECT * FROM payout_periods ORDER BY Id DESC";
     $select_periods =mysqli_query($connection,$query);
     while($row = mysqli_fetch_assoc($select_periods)){
       $id = $row['Id'];
       $db_year = $row['year'];
       $db_period = $row['Period'];
       // $db_subscription = $row['Subscription_status'];
       echo "<tr>";


                    echo "<td>{$db_year}</td>";
                    echo "<td>{$db_period}</td>";
                    // echo "<td>{$db_subscription}</td>";
                    // echo "<td><a href='users.php?source=edit_user&user_id={$db_Email}'>Edit</a></td>";
                    // echo "<td><a href='users.php?delete={$db_Email}'>Delete</a></td>";




        echo "</tr>";



      }
    }







if (isset($_GET['delete'])) {
 $userId = $_GET['delete'];
 $query = "DELETE FROM users WHERE id = '$userId'";
 $deleteUser = mysqli_query($connection, $query);
 echo '<script>window.location="users.php" </script>';
}









function view_payoutsummary()
{
    global $connection;
    if (isset($_GET["id"])) {
      $id=$_GET["id"];
      $query = "SELECT * FROM payout_totals WHERE PeriodId = '{$id}'";
      $select_payout =mysqli_query($connection,$query);
      while($row = mysqli_fetch_assoc($select_payout)){
        $id = $row['Id'];
        $db_period_id = $row['PeriodId'];
        $db_vendorcode = $row['VendorCode'];
        $db_vendorname = $row['VendorName'];
        $db_amount = $row['Total'];
        $db_amount = number_format("$db_amount",2);
        // $db_subscription = $row['Subscription_status'];
        echo "<tr>";
                     echo "<td>{$db_vendorcode}</td>";
                     echo "<td>{$db_vendorname}</td>";
                     echo "<td>{$db_amount}</td>";
         echo "</tr>";
    }
  }else {
   $query = "SELECT * FROM payout_totals";
   $select_payout =mysqli_query($connection,$query);
   while($row = mysqli_fetch_assoc($select_payout)){
     $id = $row['Id'];
     $db_period_id = $row['PeriodId'];
     $db_vendorcode = $row['VendorCode'];
     $db_vendorname = $row['VendorName'];
     $db_amount = $row['Total'];
     $db_amount = number_format("$db_amount",2);
     // $db_subscription = $row['Subscription_status'];
     echo "<tr>";
                  echo "<td>{$db_vendorcode}</td>";
                  echo "<td>{$db_vendorname}</td>";
                  echo "<td>{$db_amount}</td>";
      echo "</tr>";



    }
  }
}















function view_vendorpayoutdetails()
{
    global $connection;
    if (isset($_GET["id"])) {
      $id=$_GET["id"];
      $vcode = $_SESSION["username"];
      $query = "SELECT * FROM payout_details WHERE PeriodId = '{$id}' AND Vendor = '{$vcode}'";
      $select_payout =mysqli_query($connection,$query);
      while($row = mysqli_fetch_assoc($select_payout)){
        $id = $row['Id'];
        $db_period_id = $row['PeriodId'];
        $db_vendorcode = $row['Vendor'];
        $db_itemno = $row['ItemNo'];
        $db_itemname = $row['ItemName'];
        $db_alu = $row['Alu'];
        $db_attribute = $row['Attribute'];
        $db_size = $row['Size'];
        $db_qtysold = $row['QtySold'];
        $db_cost = $row['ExtCost'];
        // $db_subscription = $row['Subscription_status'];
        echo "<tr>";
                     echo "<td>{$db_itemno}</td>";
                     echo "<td>{$db_itemname}</td>";
                     echo "<td>{$db_alu}</td>";
                     echo "<td>{$db_attribute}</td>";
                     echo "<td>{$db_size}</td>";
                     echo "<td>{$db_qtysold}</td>";
                     echo "<td>{$db_cost}</td>";
         echo "</tr>";
    }
  }else {
   $query = "SELECT * FROM payout_totals";
   $select_payout =mysqli_query($connection,$query);
   while($row = mysqli_fetch_assoc($select_payout)){
     $id = $row['Id'];
     $db_period_id = $row['PeriodId'];
     $db_vendorcode = $row['VendorCode'];
     $db_vendorname = $row['VendorName'];
     $db_amount = $row['Total'];
     $db_amount = number_format("$db_amount",2);
     // $db_subscription = $row['Subscription_status'];
     echo "<tr>";
                  echo "<td>{$db_vendorcode}</td>";
                  echo "<td>{$db_vendorname}</td>";
                  echo "<td>{$db_amount}</td>";
      echo "</tr>";



    }
  }
}
?>
