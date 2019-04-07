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
      $db_role = $row['roleId'];
      $db_email = $row['email'];
      $db_mobile = $row['mobile'];
      $db_password = $row['password'];



//

    }
    if (!isset($db_email)) {

      echo "<script>swal('Incorrect Credentials!', 'Enter again', 'error');</script>";
      //echo '<script>window.location="index.php?source=account" </script>';

    }else {
      //$db_Passwordmd5 = md5($db_Password);
      if ($username === $db_username && $password === $db_password) {
         $_SESSION['username'] = $db_username;
         if ($db_role ===1) {
           $_SESSION['role'] = "Admin";
         }elseif ($db_role ===2) {
           $_SESSION['role'] = "Moderator";
         }else {
           $_SESSION['role'] = "Vendor";
         }

         $_SESSION['email'] = $db_email;
         $_SESSION['mobile'] = $db_mobile;

         echo '<script>window.location="home.php" </script>';
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









function admin_import() {

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
   $query = "SELECT * FROM users ";
   $select_users =mysqli_query($connection,$query);
   while($row = mysqli_fetch_assoc($select_users)){
     $db_username = $row['username'];
     $db_role = $row['roleId'];
     $db_email = $row['email'];
     $db_mobile = $row['mobile'];
     $db_password = $row['password'];
     // $db_subscription = $row['Subscription_status'];
     echo "<tr>";


                  echo "<td>{$db_username}</td>";
                  echo "<td>{$db_role}</td>";
                  echo "<td>{$db_email}</td>";

                  echo "<td>{$db_mobile}</td>";
                  echo "<td>{$db_password}</td>";
                  // echo "<td>{$db_subscription}</td>";
                  // echo "<td><a href='users.php?source=edit_user&user_id={$db_Email}'>Edit</a></td>";
                  // echo "<td><a href='users.php?delete={$db_Email}'>Delete</a></td>";




      echo "</tr>";


    }
  }







if (isset($_GET['delete'])) {
 $userId = $_GET['delete'];
 $query = "DELETE FROM users WHERE Email = '$userId'";
 $deleteUser = mysqli_query($connection, $query);
 echo '<script>window.location="users.php" </script>';
}

?>
