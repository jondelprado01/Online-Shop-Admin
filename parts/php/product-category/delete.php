<?php

  $categoryID = $_POST['category-id'];


  mysqli_query($conn, "UPDATE product_category_table SET product_category_status = 'Inactive'
  WHERE product_category_id = '$categoryID'");

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
