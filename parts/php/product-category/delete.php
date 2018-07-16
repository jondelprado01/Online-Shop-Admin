<?php

  $id = $_POST['category-id'];


  mysqli_query($conn, "UPDATE product_category_table SET product_category_status = 'Inactive'
  WHERE product_category_id = '$id'");

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
