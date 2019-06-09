<?php
 //export.php
 if(!empty($_FILES["excel_file"]))
 {
      $connect = mysqli_connect("localhost", "root", "", "spinners");
      $file_array = explode(".", $_FILES["excel_file"]["name"]);
      if($file_array[1] == "xlsx")
      {
           include("PHPExcel/IOFactory.php");
           $output = '';
           $output .= "
           <label class='text-success'>Data Inserted</label>
                <table class='table table-bordered'>
                     <tr>
                          <th>Period</th>
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
                     $period = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
                     $vendorCode = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
                     $vendorName = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
                     $amount= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
                     $query = "
                     INSERT INTO payout_totals
                     (Period,  VendorCode, VendorName, Total)
                     VALUES ('".$period."', '".$vendorCode."', '".$vendorName."', '".$amount."')";
                     mysqli_query($connect, $query);
                     $output .= '
                     <tr>
                          <td>'.$period.'</td>
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
