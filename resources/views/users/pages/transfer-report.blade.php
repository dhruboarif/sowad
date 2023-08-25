@extends('frontend.master')
@section('frontend.content')


<div class="content-body">
<div class="container-fluid">
<!-- Add Project -->

        <!-- row -->


        <div class="row">

  <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Register Wallet Transfer History</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display">
                                <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Date</th>
                                      <th>User Name</th>
                                      <th>Send To</th>
                                      <th>Received From</th>

                                      <th>Amount</th>
                                      <th>Type</th>
                                  </tr>
                                </thead>
                                <tbody>

                                  @foreach($transferData as $key=>$transfer)

                                      <tr>
                                          <td>{{$loop->index+1}}</td>
                                          <td>{{$transfer->created_at}}</td>
                                          <td>{{$transfer->user->user_name}}</td>
                                          <td>
                                            @if($transfer->receiver_id> 0)
                                            {{($transfer->receiver->user_name)}}
                                            @else NO DATA
                                            @endif
                                          </td>
                                          <td>
                                              @if($transfer->received_from> 0 )
                                            {{($transfer->sender->user_name)}}
                                              @else NO DATA
                                              @endif
                                          </td>

                                          <td>{{$transfer->amount ?? ''}}</td>

                                          <td>{{$transfer->type ?? ''}}</td>
                                      </tr>
                                  @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

</div>
    </div>
    </div>


@endsection
@push('scripts')

    <script type="text/javascript">
        $(document).ready(function () {
            selectToMe('');
        });

    </script>
@endpush
