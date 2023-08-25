
@extends('admin.master')


@section('content')


<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-header-left col-md-9 col-12 mb-2">
             <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">General Settings</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a>
                            </li>
                            <li class="breadcrumb-item active">general settings
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
          <div class="content-body">
              <!-- Content start -->
              @if(Session::has('settings_updated'))
          <div class="alert alert-success" role="alert">
              <h4 class="alert-heading">Success</h4>
              <div class="alert-body">
                  {{Session::get('settings_updated')}}
              </div>
          </div>
          @endif

                  <div class="card">
                  <div class="card-body">

                      <form action="{{route('general-settings-update')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$row->id}}">
                        <div class="row">
                            <div class="col-md-3"><div class="form-group">
                              <label class="form-label" for="basic-default-name">Referral Percentage</label>
                              <input type="round" class="form-control"  value="{{$row->referral_percentage}}" name="referral_percentage"  />
                          </div></div>
                            
                            <div class="col-md-3"><div class="form-group">
                              <label class="form-label" for="basic-default-email">Pair Amount</label>
                              <input type="round"  name="pair_amount" value="{{$row->pair_amount}}" class="form-control"/>
                          </div></div>
                          <div class="col-md-3"><div class="form-group">
                              <label class="form-label" for="basic-default-password">Pair Percentage</label>
                              <input type="round" name="pair_percentage" value="{{$row->pair_percentage}}" class="form-control" />
                          </div></div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="form-label" for="basic-default-password">Royality Bonus</label>
                              <input type="round" id="basic-default-password" name="royality_bonus"  value="{{$row->royality_bonus}}" class="form-control" placeholder="Enter royality bonus amount" />
                          </div>
                          </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                
                                <div class="form-group">
                              <label class="form-label" for="basic-default-password">Minimum Withdrwal</label>
                              <input type="round" name="min_withdraw" value="{{$row->min_withdraw}}" class="form-control" />
                          </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                              <label class="form-label" for="basic-default-password">Withdrwal Charge</label>
                              <input type="round" id="basic-default-password" value="{{$row->withdraw_charge}}" name="withdraw_charge" class="form-control" placeholder="Enter Withdrwal Charge" />
                          </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                              <label class="form-label" for="basic-default-password">Minimum Transfer Amount</label>
                              <input type="round" name="min_transfer" value="{{$row->min_transfer}}" class="form-control" />
                          </div>
                            </div>
                            <div class="col-md-3">
                                 <div class="form-group">
                              <label class="form-label" for="basic-default-password">Activation Charge</label>
                              <input type="round" name="activation_charge" value="{{$row->activation_charge}}" class="form-control" />
                          </div>
                            </div>
                            
                            
                        </div>
                        <div class="row">
                            
                            <div class="col-md-3">
                                <div class="form-group">
                              <label class="form-label" for="basic-default-password">Transfer Charge</label>
                              <input type="round" id="basic-default-password" value="{{$row->transfer_charge}}" name="transfer_charge" class="form-control" placeholder="Enter Transfer Charge" />
                          </div>
                            </div>
                            <div class="col-md-3">
                                 <div class="form-group">
                              <label class="form-label" for="basic-default-password">Level 1 Bonus Amount</label>
                              <input type="round" id="basic-default-password" value="{{$row->level_1}}" name="level_1" class="form-control" placeholder="Enter Level 1 Bonus Amount" />
                          </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                              <label class="form-label" for="basic-default-password">Level 2 Bonus Amount</label>
                              <input type="round" id="basic-default-password" value="{{$row->level_2}}" name="level_2" class="form-control" placeholder="Enter Level 2 Bonus Amount" />
                          </div>
                            </div>
                            <div class="col-md-3">
                                  <div class="form-group">
                              <label class="form-label" for="basic-default-password">Level 3 Bonus Amount</label>
                              <input type="round" id="basic-default-password" value="{{$row->level_3}}" name="level_3" class="form-control" placeholder="Enter Level 3 Bonus Amount" />
                          </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-3">
                                <div class="form-group">
                              <label class="form-label" for="basic-default-password">Level 4 Bonus Amount</label>
                              <input type="round" id="basic-default-password" value="{{$row->level_4}}" name="level_4" class="form-control" placeholder="Enter Level 4 Bonus Amount" />
                          </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                              <label class="form-label" for="basic-default-password">Level 5 Bonus Amount</label>
                              <input type="round" id="basic-default-password" value="{{$row->level_5}}" name="level_5" class="form-control" placeholder="Enter Level 5 Bonus Amount" />
                          </div>
                            </div>
                            <div class="col-md-3">
                                 <div class="form-group">
                              <label class="form-label" for="basic-default-password">Level 6 Bonus Amount</label>
                              <input type="round" id="basic-default-password" value="{{$row->level_6}}" name="level_6" class="form-control" placeholder="Enter Level 6 Bonus Amount" />
                          </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                              <label class="form-label" for="basic-default-password">Level 7 Bonus Amount</label>
                              <input type="round" id="basic-default-password" value="{{$row->level_7}}" name="level_7" class="form-control" placeholder="Enter Level 7 Bonus Amount" />
                          </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-3">
                                <div class="form-group">
                              <label class="form-label" for="basic-default-password">Level 8 Bonus Amount</label>
                              <input type="round" id="basic-default-password" value="{{$row->level_8}}" name="level_8" class="form-control" placeholder="Enter Level 8 Bonus Amount" />
                          </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                              <label class="form-label" for="basic-default-password">Level 9 Bonus Amount</label>
                              <input type="round" id="basic-default-password" value="{{$row->level_9}}" name="level_9" class="form-control" placeholder="Enter Level 9 Bonus Amount" />
                          </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                              <label class="form-label" for="basic-default-password">Level 10 Bonus Amount</label>
                              <input type="round" id="basic-default-password" value="{{$row->level_10}}" name="level_10" class="form-control" placeholder="Enter Level 10 Bonus Amount" />
                          </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                          <label for="basicSelect">Level Bonus Settings</label>
                                          <select class="form-control" id="basicSelect" name="level_settings">
                                              <option label="Status"></option>
                                              @if($row->level_settings == 0)
                                              
                                                  <option selected value="0">Off</option>
                                                  <option value="1">On</option>
                                                  @else
                                                   <option selected value="1">On</option>
                                                  <option value="0">Off</option>
                                                  
                                                  @endif
                                              
                                          </select>
                                      </div>
                                </div>
                                 <div class="col-md-3">
                                
                            
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-3">
                                <div class="form-group">
                              <label class="form-label" for="basic-default-password">Currency</label>
                              <input type="round" id="basic-default-password" value="{{$row->currency}}" name="currency" class="form-control" placeholder="Enter Currency" />
                          </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                          <label for="basicSelect">Withdraw Enable/Disable</label>
                                          <select class="form-control" id="basicSelect" name="withdraw_setting">
                                              <option label="Status"></option>
                                              @if($row->withdraw_setting == 0)
                                              
                                                  <option selected value="0">Disable</option>
                                                  <option value="1">Enable</option>
                                                  @else
                                                   <option selected value="1">Enable</option>
                                                  <option value="0">Disable</option>
                                                  
                                                  @endif
                                              
                                          </select>
                                      </div>
                            </div>
                            <div class="col-md-3">
                                 <div class="form-group">
                                          <label for="basicSelect">Transfer Enable/Disable</label>
                                          <select class="form-control" id="basicSelect" name="transfer_setting">
                                              <option label="Status"></option>
                                              @if($row->transfer_setting == 0)
                                              
                                                  <option selected value="0">Disable</option>
                                                  <option value="1">Enable</option>
                                                  @else
                                                   <option selected value="1">Enable</option>
                                                  <option value="0">Disable</option>
                                                  
                                                  @endif
                                              
                                          </select>
                                      </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                              <label class="form-label" for="basic-default-password">Capping Pair Limit</label>
                              <input type="round" id="basic-default-password" value="{{$row->capping_pair_limit}}" name="capping_pair_limit" class="form-control" placeholder="Enter Capping Pair Limit" />
                          </div>
                            </div>
                        </div>
                          
                          
                          
                          
                          
                          
                          
                         
                          
                         
                          
                        
                          
                          
                         

                          
                          
                          
                          







                  </div>
                </div>
                <div class="d-flex justify-content-center">
                
                    <button type="Submit" class="btn btn-primary">Update</button>
                    </div>
                
                  </form>
            </div>
            </div>
       
                <!-- Content End -->



          </div>





    </div>
</div>





@endsection
