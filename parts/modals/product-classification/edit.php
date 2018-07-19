<?php

  $retrieveClassification = mysqli_query($conn, "SELECT * FROM product_classification_table
                            WHERE product_classification_status = 'Active'");

  while ($row = mysqli_fetch_array($retrieveClassification)) {

    $classificationID = $row['product_classification_id'];
    $classification = $row['product_classification'];
    // $categoryID = $row['product_category_id'];


?>

<div class="modal fade" id="edit-classification<?php echo $classificationID ?>" role="dialog" style="width: 100%" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          Edit Product Classification
        </h5>
      </div>

      <div class="modal-body">

        <form role="form" method="post" autocomplete="off" >

          <div class="form-group">
            <label>Product Classification</label>
            <select class="form-control category-group" name="category-group" required>

            </select>
          </div>

          <div class="form-group">
            <label>Product Category</label>
            <select class="form-control category-name" name="category-name">

            </select>
          </div>

          <div class="form-group">
            <label> Classification Name</label>
            <input type="text" class="form-control" value="<?php echo $classification ?>" name="classification-name" placeholder="Enter Classification" maxlength="40" required>
          </div>

      </div>

      <div class="modal-footer">
          <!-- <p style="color: red; font-style: italic">Note: All fields with <span class="glyphicon glyphicon-asterisk" style="color:red;  font-size: 10px"></span> are Required</p> -->
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal" name="btn-cancel">Close</button>
          <input type="submit" class="btn btn-success" name="btn-edit" value="Edit">
          <input type="hidden" name="classification-id" value="<?php echo $classificationID ?>">
        </form>

      </div>
    </div>
  </div>
</div>


<?php

  }

  if (isset($_POST['btn-edit'])) {
    require '../parts/php/product-classification/edit.php';
  }

 ?>

 <script>

   function Group(){
     $('.category-group').empty();
     $('.category-group').append("<option value=''>Loading....</option>");
     $.ajax({

         type: "POST",
         cache:'false',
         url: "../parts/php/product-classification/retrieve-group.php",
         contentType: "application/json; charset=utf-8",
         dataType: "json",

         success: function(data_group){
           $('.category-group').empty();
           $('.category-group').append("<option value = ''>--Select Category Group--</option>");
           $.each(data_group,function(i,item){
             $('.category-group').append('<option value = "'+ data_group[i].group_id +'">'+ data_group[i].group_name +'</option>');
           });
         },
       complete: function(){
       }
     });
   }

   function Category(cat){
     $('.category-name').empty();
     $('.category-name').append("<option value='None'>Loading....</option>");
     $.ajax({

         type: "POST",
         cache:'false',
         url: "../parts/php/product-classification/retrieve-category.php?cat="+cat,
         contentType: "application/json; charset=utf-8",
         dataType: "json",

         success: function(data_category){
           $('.category-name').empty();
           $('.category-name').append("<option value = ''>--Select Category--</option>");
           $.each(data_category,function(i,item){
             $('.category-name').append('<option value = "'+ data_category[i].category_id +'">'+ data_category[i].category_name +'</option>');
           });
         },
       complete: function(){
       }
     });
   }

   $(document).ready(function(){
   Group();
   $(".category-group").change(function(){
     var category_group_id = $(".category-group").val();
     Category(category_group_id);
   });
 });


 </script>
