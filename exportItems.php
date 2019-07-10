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
                          <th>Item No</th>
                          <th>Item Name</th>
                          <th>Alternate Look Up</th>
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
                     $attribute = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
                     $size = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
                     $onHand = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
                     $Cost = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
                     $query = "
                     INSERT INTO items
                     ( VendorCode, ItemNo, ItemName, Alu, Attribute, Size, OnHand, Cost)
                     VALUES ('".$vendorCode."', '".$itemNo."', '".$itemName."', '".$alu."', '".$attribute."', '".$size."', '".$onHand."', '".$Cost."')";
                     mysqli_query($connect, $query);
                     $output .= '
                     <tr>
                          <td>'.$vendorCode.'</td>
                          <td>'.$itemNo.'</td>
                          <td>'.$itemName.'</td>
                          <td>'.$alu.'</td>
                          <td>'.$attribute.'</td>
                          <td>'.$size.'</td>
                          <td>'.$onHand.'</td>
                          <td>'.$Cost.'</td>
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
