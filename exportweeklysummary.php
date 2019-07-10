<?php
 //export.php
 if(!empty($_FILES["excel_file"]))
 $db['db_host']="127.0.0.1";
 $db['db_user']="kenyawea_backoffice";
 $db['db_pass']="DB@SWKPortal!";
 $db['db_name']="kenyawea_spinners_portal";
 foreach ($db as $key => $value) {
   define(strtoupper($key), $value);

 }

 {
      $connect = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
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

                          <th>Vendor Name</th>
                          <th>Amount</th>
                     </tr>
                     ";
           $object = PHPExcel_IOFactory::load($_FILES["excel_file"]["tmp_name"]);
           foreach($object->getWorksheetIterator() as $worksheet)
           {
                $highestRow = $worksheet->getHighestRow();
                for($row=2; $row<=$highestRow; $row++)
                {
                     $vendorCode = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
                     $vendorName = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
                     $amount= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
                     $query = "
                     INSERT INTO weekly_totals
                     (PeriodId,  VendorCode, VendorName, Total)
                     VALUES ('".$period_id."', '".$vendorCode."', '".$vendorName."', '".$amount."')";
                     mysqli_query($connect, $query);
                     $output .= '
                     <tr>
                          <td>'.$vendorCode.'</td>
                          <td>'.$vendorName.'</td>
                          <td>'.$amount.'</td>

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
