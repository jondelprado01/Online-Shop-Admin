<?php

  $retrieveClassification = mysqli_query($conn, "SELECT * FROM product_classification_table
                            WHERE product_classification_status = 'Active'");

  while ($row = mysqli_fetch_array($retrieveClassification)) {

    $classification_id = $row['product_classification_id'];
    $classification = $row['product_classification'];
?>

<div class="modal fade" id="edit-classification<?php echo $classification_id ?>" role="dialog" style="width: 100%" aria-hidden="true">
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
            <input type="button" class="btn btn-primary change" name="change" value="Change">
          </div>

          <div class="form-group">
            <label>Product Classification</label>
            <select class="form-control group" name="category-group" disabled required>

              <?php

                $classification_group_join = mysqli_query($conn, "SELECT pg.product_group_id FROM product_group_table pg
                                             INNER JOIN product_classification_table pcl ON pg.product_group_id = pcl.product_group_id
                                             WHERE pcl.product_classification_id = '$classification_id'");
                while ($row = mysqli_fetch_array($classification_group_join)) {
                  $group_id = $row['product_group_id'];
                }

                $retrieveGroup = mysqli_query($conn, "SELECT * FROM product_group_table
                                 WHERE product_group_status = 'Active' ORDER BY product_group ASC");

                while ($row2 = mysqli_fetch_array($retrieveGroup)) {
                  $product_group_id = $row2['product_group_id'];
                  $product_group = $row2['product_group'];

                  if ($product_group_id == $group_id) {
                    $selected = "selected";
                  }
                  else {
                    $selected = "";
                  }

               ?>

                  <option <?php echo $selected ?> value="<?php echo $product_group_id ?>"><?php echo $product_group ?></option>

               <?php

                }

               ?>

            </select>
          </div>

          <div class="form-group">
            <label>Product Category</label>
            <select class="form-control category" name="category-name" disabled required>

              <?php

                $classification_category_join = mysqli_query($conn, "SELECT pc.product_category_id FROM product_category_table pc
                                             INNER JOIN product_classification_table pcl ON pc.product_category_id = pcl.product_category_id
                                             WHERE pcl.product_classification_id = '$classification_id'");

                while ($row = mysqli_fetch_array($classification_category_join)) {
                  $category_id = $row['product_category_id'];
                }

                $retrieveCategory = mysqli_query($conn, "SELECT * FROM product_category_table
                                 WHERE product_category_status = 'Active' ORDER BY product_category ASC");

                while ($row2 = mysqli_fetch_array($retrieveCategory)) {
                  $product_category_id = $row2['product_category_id'];
                  $product_category = $row2['product_category'];

                  if ($product_category_id == $category_id) {
                    $selected = "selected";
                  }
                  else {
                    $selected = "";
                  }

               ?>

                  <option <?php echo $selected ?> value="<?php echo $product_category_id ?>"><?php echo $product_category ?></option>

               <?php

                }

               ?>

            </select>
          </div>

          <div class="form-group">
            <label> Classification Name</label>
            <input type="text" class="form-control" value="<?php echo $classification ?>" name="classification-name" placeholder="Enter Classification" maxlength="40" required>
          </div>

      </div>

      <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal" name="btn-cancel">Close</button>
          <input type="submit" class="btn btn-success" name="btn-edit" value="Edit">
          <input type="hidden" name="classification-id" value="<?php echo $classification_id ?>">
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

 $(document).ready(function(){

   $(function() {

      $('form').bind('submit', function() {
          $(this).find(':disabled').removeAttr('disabled');
      });

    });

    $(".change").click(function(){
        $("select.group").addClass("category-group-edit");
        $("select.category").addClass("category-name-edit");
        $('.group').prop("disabled", false);
        $('.category').prop("disabled", false);
        Group_edit();
        Category_edit();
    });


   function Group_edit(){
     $('.category-group-edit').empty();
     $('.category-group-edit').append("<option value=''>Loading....</option>");
     $.ajax({

         type: "POST",
         cache:'false',
         url: "../parts/php/product-classification/retrieve-group-edit.php",
         contentType: "application/json; charset=utf-8",
         dataType: "json",

         success: function(data_group_edit){
           $('.category-group-edit').empty();
           $('.category-group-edit').append("<option value = ''>-Select Category Group-</option>");
           $.each(data_group_edit,function(i,item){
             $('.category-group-edit').append('<option value = "'+ data_group_edit[i].group_id_edit +'">'+ data_group_edit[i].group_name_edit +'</option>');
           });
         },
       complete: function(){
       }
     });
   }

   function Category_edit(cat_edit){
     $('.category-name-edit').empty();
     $('.category-name-edit').append("<option value='None'>Loading....</option>");
     $.ajax({

         type: "POST",
         cache:'false',
         url: "../parts/php/product-classification/retrieve-category-edit.php?cat_edit="+cat_edit,
         contentType: "application/json; charset=utf-8",
         dataType: "json",

         success: function(data_category_edit){
           $('.category-name-edit').empty();
           $('.category-name-edit').append("<option value = ''>-Select Category-</option>");
           $.each(data_category_edit,function(i,item){
             $('.category-name-edit').append('<option value = "'+ data_category_edit[i].category_id_edit +'">'+ data_category_edit[i].category_name_edit +'</option>');
           });
         },
       complete: function(){
       }
     });
   }

   $(".group").change(function(){
     var category_group_id_edit = $(".group").val();
     Category_edit(category_group_id_edit);
   });

});

 </script>
