<?php
 //export.php
 if(!empty($_FILES["excel_file"]))
 {
    $connect = mysqli_connect("127.0.0.1", "kenyawea_backoffice", "DB@SWKPortal!", "kenyawea_spinners_portal");
      $file_array = explode(".", $_FILES["excel_file"]["name"]);
      if($file_array[1] == "xlsx")
      {
           include("PHPExcel/IOFactory.php");
           $output = '';
           $output .= "
           <label class='text-success'>Data Inserted</label>
                <table class='table table-bordered'>
                     <tr>
                          <th>VendorCode</th>
                          <th>Role</th>
                          <th>Email</th>
                          <th>Mobile</th>
                          <th>Password</th>
                          <th>Vatable</th>

                     </tr>
                     ";
           $object = PHPExcel_IOFactory::load($_FILES["excel_file"]["tmp_name"]);
           foreach($object->getWorksheetIterator() as $worksheet)
           {
                $highestRow = $worksheet->getHighestRow();
                for($row=2; $row<=$highestRow; $row++)
                {

                     $vendorCode = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
                     $role = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
                     $email = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
                     $mobile = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
                     $password = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
                     $password = md5($password);
                     $vatable = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
                     $query = "
                     INSERT INTO users
                     (`username`, `role`, `email`, `mobile`, `password`, `vatable`)
                     VALUES ('".$vendorCode."', '".$role."', '".$email."', '".$mobile."', '".$password."', '".$vatable."')";
                     mysqli_query($connect, $query);
                     $output .= '
                     <tr>
                          <td>'.$vendorCode.'</td>
                          <td>'.$role.'</td>
                          <td>'.$email.'</td>
                          <td>'.$mobile.'</td>
                          <td>'.$password.'</td>
                          <td>'.$vatable.'</td>

                     </tr>
                     ';
                }
           }
           $output .= '</table>';
           echo $output;
      }
      else
      {
           echo '<label class="text-danger">Invalid File</label>';
      }
 }
 ?>
