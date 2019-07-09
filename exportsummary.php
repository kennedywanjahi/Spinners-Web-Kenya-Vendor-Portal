<?php
 //export.php
 $period_id = $_POST["period"];

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
                     INSERT INTO payout_totals
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
