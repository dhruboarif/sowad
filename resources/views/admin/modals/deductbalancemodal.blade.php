<div class="modal-size-default d-inline-block">
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade text-left" id="balanceadjustDeductModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel18">Deduct Balance</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">

                        <form id="jquery-val-form" action="{{route('deduct-adjust-balance')}}" method="post">
                            @csrf
                            <div class="form-group">
                              <label for="select-country">Select Wallet</label>
                              <select class="form-control select2" name="wallet" required>
                                  <option value="">Select Wallet</option>
                                  <option value="deposit_wallet">Deposit Wallet</option>
                                  <option value="income_wallet">Income Wallet</option>

                              </select>
                          </div>
                            <div class="form-group">



                                   <label class="form-label" for="basic-default-email">Enter UserName</label>
                                   <input type="text" id="sponsor2" name="user_id" class="form-control"
                                          placeholder="Enter User Name" required/>

                                   <div id="suggestUser2"></div>


                            </div>


                            <div class="form-group">
                                <label class="form-label" for="basic-default-email">Enter Amount</label>
                                <input type="round"  id="basic-default-email" name="amount"
                                       class="form-control" placeholder="Enter Amount ($)" required/>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                <button type="Submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
