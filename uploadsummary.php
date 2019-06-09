<?php
include ('header.php');
include 'sidebar.php';
 ?>
<div class="wrapper-pro">

           <div class="container box">
                <h3 align="center">PHPExcel - Export Excel file into Mysql Database using Ajax</h3>
                <br /><br />
                <br /><br />
                <form method="post" id="export_excel">
                     <label>Select Excel Sheet to upload</label>
                     <input type="file" name="excel_file" id="excel_file" />

                </form>
                <br />
                <br />
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
                url:"exportsummary.php",
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
