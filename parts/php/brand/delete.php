<?php

  $id = $_POST['brand-id'];


  mysqli_query($conn, "UPDATE brand_table SET brand_status = 'Inactive' WHERE brand_id = '$id'");

 ?>

 <script>
   alertify.alert()
     .setting({
       'title':'Record Deleted',
       'label':'Exit',
       'message': 'Record Deleted Successfully' ,
       'onok': function(){ alertify.success('Deleted');}
   }).show();
 </script>
