<div class="modal-size-default d-inline-block">
    <!-- Button trigger modal -->
@php
$currency= App\Models\GeneralSettings::first();
$cr= $currency->currency;

@endphp
    <!-- Modal -->
    <div class="modal fade text-left" id="userviewModal{{isset($lev_three_right_l_r) ?$lev_three_right_l_r->id : ''}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel18">View User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="card-body">
                    <?php
                      $income_wallet=App\Models\CashWallet::where('user_id',$lev_three_right_l_r->id)->get()->sum('bonus_amount');
                        $deposit_wallet=App\Models\AddMoney::where('user_id',$lev_three_right_l_r->id)->where('status','approve')->get()->sum('amount');
                          $refferals = App\Models\User::where('sponsor',$lev_three_right_l_r->id)->get()->count('id');

                          $carry=App\Models\User::where('id',$lev_three_right_l_r->id)->first();
                          if ($carry->left_active > $carry->right_active) {
                            $total_carry = $carry->left_active - $carry->right_active;
                          } elseif ($carry->left_active < $carry->right_active) {
                            $total_carry = $carry->right_active - $carry->left_active;
                          }else {
                            $total_carry = '0';
                          }
                          $left_total=App\Models\User::where('id',$lev_three_right_l_r->id)->first();
                          $right_total=App\Models\User::where('id',$lev_three_right_l_r->id)->first();
                     ?>
                      <form action="#" method="post">
                        @csrf
                        <input type="hidden" name="id" value="">
                          <div class="form-group">
                              <label class="form-label" for="basic-default-name">Deposit Wallet({{$cr}})</label>
                              <input readonly type="text" class="form-control"  value="{{$deposit_wallet}}" name="package_name" placeholder="Package name" />
                          </div>
                          <div class="form-group">
                              <label class="form-label" for="basic-default-email">Income Wallet({{$cr}})</label>
                              <input type="number" readonly name="price" value="{{$income_wallet}}" class="form-control" placeholder="Enter Price ({{$cr}})"/>
                          </div>
                          <div class="form-group">
                              <label class="form-label" for="basic-default-password">Total Refferal</label>
                              <input type="number" readonly name="no_of_pairs" value="{{$refferals}}" class="form-control" placeholder="Enter number of pairs"/>
                          </div>
                          <div class="form-group">
                              <label class="form-label" for="confirm-password">Left Total</label>
                              <input type="round" readonly  name="return_percentage" class="form-control" value="{{$left_total->left_total}}" placeholder="Enter Daily Return Percentage"/>
                          </div>
                          <div class="form-group">
                              <label class="form-label" for="dob">Right Total</label>
                              <input type="number" readonly class="form-control" name="duration" value="{{$right_total->right_total}}" />
                          </div>
                          <div class="form-group">
                              <label class="form-label" for="dob">Carry Forward</label>
                              <input type="number" readonly class="form-control" name="duration" value="{{$total_carry}}" />
                          </div>






                  </div>
                </div>
                <div class="modal-footer">

                </div>
                  </form>
            </div>
        </div>
    </div>
</div>
