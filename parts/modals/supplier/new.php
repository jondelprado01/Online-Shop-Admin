<div class="modal fade" id="new-supplier"  role="dialog" style="width: 100%" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">
          New Supplier
        </h5>
      </div>

      <form role="form" method="post" autocomplete="off" >
        <div class="modal-body">

          <ul class="nav nav-pills mb-3 list-inline" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="pill" href="#details" role="tab">Details</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="pill" href="#contact" role="tab">Contact</a>
            </li>
          </ul>

          <div class="tab-content">

            <div class="tab-pane fade show active" id="details">

              <div class="form-group">
                <label> Supplier Name</label>
                <input type="text" class="form-control" name="supplier-name" placeholder="Enter Supplier Name" maxlength="100" required>
              </div>

              <div class="row">

                <div class="col-md-6">
                  <div class="form-group ">
                    <label> House/Block/Lot No.</label>
                    <input type="text" class="form-control" name="supplier-lot" placeholder="Enter Lot No." maxlength="40" required>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group ">
                    <label> Street</label>
                    <input type="text" class="form-control" name="supplier-street" placeholder="Enter Street" maxlength="40" required>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group ">
                    <label> Zipcode</label>
                    <input type="text" class="form-control" name="supplier-zipcode" placeholder="Enter Zipcode" maxlength="40" required>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group ">
                    <label> City</label>
                    <input type="text" class="form-control" name="supplier-city" placeholder="Enter City" maxlength="40" required>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group ">
                    <label> Country</label>
                    <input type="text" class="form-control" name="supplier-country" placeholder="Enter Country" maxlength="40" required>
                  </div>
                </div>

              </div>

              <button type="button" class="btn btn-danger" data-dismiss="modal" name="btn-cancel">Close</button>

            </div>

            <div class="tab-pane fade" id="contact">

              <div class="row">

                <div class="col-md-6">
                  <div class="form-group ">
                    <label> Telephone No.</label>
                    <input type="text" class="form-control" name="supplier-telephone" placeholder="Enter Telephone No." maxlength="40" required>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group ">
                    <label> Mobile No.</label>
                    <input type="text" class="form-control" name="supplier-mobile" placeholder="Enter Mobile No." maxlength="40" required>
                  </div>
                </div>

              </div>

              <div class="form-group ">
                <label> Email</label>
                <input type="email" class="form-control" name="supplier-email" placeholder="Enter Email Address" maxlength="100" required>
              </div>

              <input type="submit" class="btn btn-success pull-right" name="btn-save" value="Save">

            </div>

          </div>

        </div>
      </form>

      <div class="modal-footer">

      </div>



    </div>
  </div>
</div>


<?php

  if (isset($_POST['btn-save'])) {
    require '../parts/php/supplier/new.php';
  }

 ?>

















<!-- end -->
