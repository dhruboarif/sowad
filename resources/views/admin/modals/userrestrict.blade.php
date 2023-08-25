<div class="modal-size-default d-inline-block">
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade text-left" id="userrestriction{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel18">User Restriction</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="card-body">


                      <form action="{{route('user-restrict')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$row->id}}">

                        <h3>Are You Sure You Want to Restrict the User?</h3>


                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                  <button type="Submit" class="btn btn-primary">Restrict</button>
                </div>
                  </form>
            </div>
        </div>
    </div>
</div>
