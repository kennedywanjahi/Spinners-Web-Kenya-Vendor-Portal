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
                          <th>Item No</th>
                          <th>Item Name</th>
                          <th>Alternate Look Up</th>
                            <th>Vendor Product Code</th>
                          <th>Attribute</th>
                          <th>Size</th>
                          <th>Qty Sold</th>
                          <th>Ext Cost</th>
                     </tr>
                     ";
           $object = PHPExcel_IOFactory::load($_FILES["excel_file"]["tmp_name"]);
           foreach($object->getWorksheetIterator() as $worksheet)
           {
                $highestRow = $worksheet->getHighestRow();
                for($row=2; $row<=$highestRow; $row++)
                {

                     $vendorCode = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
                     $itemNo = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
                     $itemName = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
                     $alu = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
                     $vpc = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
                     $attribute = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
                     $size = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
                     $qtySold = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
                     $extCost = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(8, $row)->getValue());
                     $query = "
                     INSERT INTO weekly_details
                     (PeriodId, Vendor, ItemNo, ItemName, Alu, Vpc, Attribute, Size, QtySold, ExtCost)
                     VALUES ('".$period_id."', '".$vendorCode."', '".$itemNo."', '".$itemName."', '".$alu."', '".$vpc."', '".$attribute."', '".$size."', '".$qtySold."', '".$extCost."')";
                     mysqli_query($connect, $query);
                     $output .= '
                     <tr>
                          <td>'.$vendorCode.'</td>
                          <td>'.$itemNo.'</td>
                          <td>'.$itemName.'</td>
                          <td>'.$alu.'</td>
                          <td>'.$vpc.'</td>
                          <td>'.$attribute.'</td>
                          <td>'.$size.'</td>
                          <td>'.$qtySold.'</td>
                          <td>'.$extCost.'</td>
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
