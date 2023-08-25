<div class="modal-size-default d-inline-block">
    <!-- Button trigger modal -->
@php
$currency= App\Models\GeneralSettings::first();
$cr= $currency->currency;

@endphp
    <!-- Modal -->
    <div class="modal fade text-left" id="PackageAddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel18">Add Package</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="card-body">

                      <form id="jquery-val-form" action="{{route('package-store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                          <div class="form-group">
                              <label class="form-label" for="basic-default-name">Package Name</label>
                              <input type="text" class="form-control" id="basic-default-name" name="package_name" placeholder="Enter Package Name" required/>
                              @error('package_name')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label class="form-label" for="basic-default-email">Price</label>
                              <input type="number" id="basic-default-email" name="price" class="form-control" placeholder="Enter Price ({{$cr}})" required/>
                          </div>
                          <div class="form-group">
                              <label class="form-label" for="basic-default-password">Product Image</label>
                              <input type="file" id="basic-default-password" name="product_image" class="form-control" placeholder="Product Image" required />
                          </div>
                          <div class="form-group">
                              <label class="form-label" for="confirm-password">Product PV</label>
                              <input type="text" id="confirm-password" name="product_pv" class="form-control" placeholder="Product PV" required />
                          </div>
                          <div class="form-group">
                              <label class="form-label" for="dob">Product MRP</label>
                              <input type="number" class="form-control" name="product_mrp" id="dob" required/>
                          </div>

                          <!--<div class="form-group">-->
                          <!--    <label for="select-country">Except Day</label>-->
                          <!--    <select class="form-control select2" id="select-country" name="except_day" required>-->
                          <!--        <option selected>Sunday</option>-->
                          <!--        <option value="Saturday">Saturday</option>-->

                          <!--        <option value="Monday">Monday</option>-->
                          <!--        <option value="Tuesday">Tuesday</option>-->
                          <!--        <option value="Wednesday">Wednesday</option>-->
                          <!--          <option value="Thursday">Thursday</option>-->
                          <!--            <option value="Friday">Friday</option>-->
                          <!--    </select>-->
                          <!--</div>-->
                          <div class="form-group">
                              <label for="select-country">Status</label>
                              <select class="form-control select2" name="status" required>
                                  <option value="">Select Status</option>
                                  <option value="Active">Active</option>
                                  <option value="Inactive">Inactive</option>

                              </select>
                          </div>


                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="Submit" class="btn btn-primary">Save</button>
                </div>
                  </form>
            </div>
        </div>
    </div>
</div>
