<div class="modal-size-default d-inline-block">
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade text-left" id="RankAddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel18">Add Rank</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="card-body">

                      <form id="jquery-val-form" action="{{route('store-rank')}}" method="post">
                        @csrf
                          <div class="form-group">
                              <label class="form-label" for="basic-default-name">Rank Name</label>
                              <input type="text" class="form-control" id="basic-default-name" name="rank_name" placeholder="Enter Rank Name" required/>

                          </div>
                          <div class="form-group">
                              <label class="form-label" for="basic-default-email">No. of Matching</label>
                              <input type="number" id="basic-default-email" name="matching" class="form-control" placeholder="Enter Matching" required />
                          </div>
                          <div class="form-group">
                              <label class="form-label" for="basic-default-password">Bonus</label>
                              <input type="text" id="basic-default-password" name="bonus" class="form-control" placeholder="Enter amount/name" required/>
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
