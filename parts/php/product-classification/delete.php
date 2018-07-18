<?php

  $classificationID = $_POST['classification-id'];


  mysqli_query($conn, "UPDATE product_classification_table SET product_classification_status = 'Inactive'
  WHERE product_classification_id = '$classificationID'");

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
