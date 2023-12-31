<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-layout="dark-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="StartBNS - Forex and Crypto Asset Management">
    <meta name="keywords" content="StartBNS - Forex and Crypto Asset Management">
    <meta name="author" content="StartBNS - Forex and Crypto Asset Management">
    <title>Sowad.net</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('custom/images/favicon.png')}}">
    <!--<link rel="apple-touch-icon" href="{{asset('app-assets/images/ico/apple-icon-120.png')}}">-->
    <!--<link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/images/ico/favicon.ico')}}">-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/bordered-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/page-auth.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body style="background-color:#fa2603;"  class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    
    <div id="video-background">
        <!-- Video Library -->
      <video onload="this.play();" autoplay loop muted>
        <source src="{{asset('app-assets/images/network.mp4')}}" type="video/mp4"  codecs="avc1.4D401E, mp4.40.2">
      </video>
    </div>
    
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v1 px-2">
                    <div class="auth-inner py-2">
                        <!-- Login v1 -->
                        <div class="card mb-0" style="background-color: rgba(4, 0, 18, 0.49);color: white;}">
                            <div class="card-body">
                                <a href="javascript:void(0);" class="brand-logo">
                                  <img
                                    src="{{asset('storage/Logo/'.basic_settings()[0]->image)}}"
                                    alt="image"
                                    width="180"

                                  />
                                </a>

                                <h4 class="card-title mb-1 text-center">Welcome to Nagatrade</h4>


                                <form class="auth-login-form mt-2" id="registeruser" action="{{ route('register') }}" method="POST" >
                                  @csrf
                                  <div class="form-group">
                                      <label class="form-label" for="basic-default-email">Applicant Name</label>
                                      <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name"
                                             required/>

                                  </div>
                                  <div class="form-group">
                                      <label class="form-label" for="basic-default-email">User Name</label>
                                      <input type="text" id="user_name" name="user_name" class="form-control"
                                             placeholder="Enter User Name" required/>


                                  </div>


                                  <div class="form-group">
                                      <label class="form-label" for="basic-default-email">Email</label>
                                      <input type="text" id="email" name="email" class="form-control"
                                             placeholder="Enter Email" required/>

                                  </div>
                                  <div class="form-group">
                                      <label class="form-label" for="basic-default-email">Password</label>
                                      <input type="password" id="password" name="password" class="form-control"
                                             placeholder="Enter Password" required/>

                                  </div>
                                  <div class="form-group">
                                      <label class="form-label" for="basic-default-email">Confirm Password</label>
                                      <input type="password" id="confirm_password" name="confirm_password" class="form-control"
                                             placeholder="Confirm Password" required/>

                                  </div>
                                  <div class="form-group">
                                      <label class="form-label" for="basic-default-email">Phone Number</label>
                                      <input type="number" id="number" name="number" class="form-control"
                                             placeholder="Enter Your Phone Number" required/>

                                  </div>


                                  <div class="form-group">
                                      <label for="basicSelect">Select Country</label>
                                      <select class="select2Me form-control form-control-lg" name="country" id="country">
                                          <option label="Choose Country"></option>


                                          <option value="AF">Afghanistan</option>
                                          <option value="AX">&Aring;land Islands</option>
                                          <option value="AL">Albania</option>
                                          <option value="DZ">Algeria</option>
                                          <option value="AS">American Samoa</option>
                                          <option value="AD">Andorra</option>
                                          <option value="AO">Angola</option>
                                          <option value="AI">Anguilla</option>
                                          <option value="AQ">Antarctica</option>
                                          <option value="AG">Antigua and Barbuda</option>
                                          <option value="AR">Argentina</option>
                                          <option value="AM">Armenia</option>
                                          <option value="AW">Aruba</option>
                                          <option value="AU">Australia</option>
                                          <option value="AT">Austria</option>
                                          <option value="AZ">Azerbaijan</option>
                                          <option value="BS">Bahamas</option>
                                          <option value="BH">Bahrain</option>
                                          <option value="BD">Bangladesh</option>
                                          <option value="BB">Barbados</option>
                                          <option value="BY">Belarus</option>
                                          <option value="BE">Belgium</option>
                                          <option value="BZ">Belize</option>
                                          <option value="BJ">Benin</option>
                                          <option value="BM">Bermuda</option>
                                          <option value="BT">Bhutan</option>
                                          <option value="BO">Bolivia, Plurinational State of</option>
                                          <option value="BA">Bosnia and Herzegovina</option>
                                          <option value="BW">Botswana</option>
                                          <option value="BV">Bouvet Island</option>
                                          <option value="BR">Brazil</option>
                                          <option value="IO">British Indian Ocean Territory</option>
                                          <option value="BN">Brunei Darussalam</option>
                                          <option value="BG">Bulgaria</option>
                                          <option value="BF">Burkina Faso</option>
                                          <option value="BI">Burundi</option>
                                          <option value="KH">Cambodia</option>
                                          <option value="CM">Cameroon</option>
                                          <option value="CA">Canada</option>
                                          <option value="CV">Cape Verde</option>
                                          <option value="KY">Cayman Islands</option>
                                          <option value="CF">Central African Republic</option>
                                          <option value="TD">Chad</option>
                                          <option value="CL">Chile</option>
                                          <option value="CN">China</option>
                                          <option value="CX">Christmas Island</option>
                                          <option value="CC">Cocos (Keeling) Islands</option>
                                          <option value="CO">Colombia</option>
                                          <option value="KM">Comoros</option>
                                          <option value="CG">Congo</option>
                                          <option value="CD">Congo, the Democratic Republic of the</option>
                                          <option value="CK">Cook Islands</option>
                                          <option value="CR">Costa Rica</option>
                                          <option value="CI">C&ocirc;te d'Ivoire</option>
                                          <option value="HR">Croatia</option>
                                          <option value="CU">Cuba</option>
                                          <option value="CY">Cyprus</option>
                                          <option value="CZ">Czech Republic</option>
                                          <option value="DK">Denmark</option>
                                          <option value="DJ">Djibouti</option>
                                          <option value="DM">Dominica</option>
                                          <option value="DO">Dominican Republic</option>
                                          <option value="EC">Ecuador</option>
                                          <option value="EG">Egypt</option>
                                          <option value="SV">El Salvador</option>
                                          <option value="GQ">Equatorial Guinea</option>
                                          <option value="ER">Eritrea</option>
                                          <option value="EE">Estonia</option>
                                          <option value="ET">Ethiopia</option>
                                          <option value="FK">Falkland Islands (Malvinas)</option>
                                          <option value="FO">Faroe Islands</option>
                                          <option value="FJ">Fiji</option>
                                          <option value="FI">Finland</option>
                                          <option value="FR">France</option>
                                          <option value="GF">French Guiana</option>
                                          <option value="PF">French Polynesia</option>
                                          <option value="TF">French Southern Territories</option>
                                          <option value="GA">Gabon</option>
                                          <option value="GM">Gambia</option>
                                          <option value="GE">Georgia</option>
                                          <option value="DE">Germany</option>
                                          <option value="GH">Ghana</option>
                                          <option value="GI">Gibraltar</option>
                                          <option value="GR">Greece</option>
                                          <option value="GL">Greenland</option>
                                          <option value="GD">Grenada</option>
                                          <option value="GP">Guadeloupe</option>
                                          <option value="GU">Guam</option>
                                          <option value="GT">Guatemala</option>
                                          <option value="GG">Guernsey</option>
                                          <option value="GN">Guinea</option>
                                          <option value="GW">Guinea-Bissau</option>
                                          <option value="GY">Guyana</option>
                                          <option value="HT">Haiti</option>
                                          <option value="HM">Heard Island and McDonald Islands</option>
                                          <option value="VA">Holy See (Vatican City State)</option>
                                          <option value="HN">Honduras</option>
                                          <option value="HK">Hong Kong</option>
                                          <option value="HU">Hungary</option>
                                          <option value="IS">Iceland</option>
                                          <option value="IN">India</option>
                                          <option value="ID">Indonesia</option>
                                          <option value="IR">Iran, Islamic Republic of</option>
                                          <option value="IQ">Iraq</option>
                                          <option value="IE">Ireland</option>
                                          <option value="IM">Isle of Man</option>
                                          <option value="IL">Israel</option>
                                          <option value="IT">Italy</option>
                                          <option value="JM">Jamaica</option>
                                          <option value="JP">Japan</option>
                                          <option value="JE">Jersey</option>
                                          <option value="JO">Jordan</option>
                                          <option value="KZ">Kazakhstan</option>
                                          <option value="KE">Kenya</option>
                                          <option value="KI">Kiribati</option>
                                          <option value="KP">Korea, Democratic People's Republic of</option>
                                          <option value="KR">Korea, Republic of</option>
                                          <option value="KW">Kuwait</option>
                                          <option value="KG">Kyrgyzstan</option>
                                          <option value="LA">Lao People's Democratic Republic</option>
                                          <option value="LV">Latvia</option>
                                          <option value="LB">Lebanon</option>
                                          <option value="LS">Lesotho</option>
                                          <option value="LR">Liberia</option>
                                          <option value="LY">Libyan Arab Jamahiriya</option>
                                          <option value="LI">Liechtenstein</option>
                                          <option value="LT">Lithuania</option>
                                          <option value="LU">Luxembourg</option>
                                          <option value="MO">Macao</option>
                                          <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                          <option value="MG">Madagascar</option>
                                          <option value="MW">Malawi</option>
                                          <option value="MY">Malaysia</option>
                                          <option value="MV">Maldives</option>
                                          <option value="ML">Mali</option>
                                          <option value="MT">Malta</option>
                                          <option value="MH">Marshall Islands</option>
                                          <option value="MQ">Martinique</option>
                                          <option value="MR">Mauritania</option>
                                          <option value="MU">Mauritius</option>
                                          <option value="YT">Mayotte</option>
                                          <option value="MX">Mexico</option>
                                          <option value="FM">Micronesia, Federated States of</option>
                                          <option value="MD">Moldova, Republic of</option>
                                          <option value="MC">Monaco</option>
                                          <option value="MN">Mongolia</option>
                                          <option value="ME">Montenegro</option>
                                          <option value="MS">Montserrat</option>
                                          <option value="MA">Morocco</option>
                                          <option value="MZ">Mozambique</option>
                                          <option value="MM">Myanmar</option>
                                          <option value="NA">Namibia</option>
                                          <option value="NR">Nauru</option>
                                          <option value="NP">Nepal</option>
                                          <option value="NL">Netherlands</option>
                                          <option value="AN">Netherlands Antilles</option>
                                          <option value="NC">New Caledonia</option>
                                          <option value="NZ">New Zealand</option>
                                          <option value="NI">Nicaragua</option>
                                          <option value="NE">Niger</option>
                                          <option value="NG">Nigeria</option>
                                          <option value="NU">Niue</option>
                                          <option value="NF">Norfolk Island</option>
                                          <option value="MP">Northern Mariana Islands</option>
                                          <option value="NO">Norway</option>
                                          <option value="OM">Oman</option>
                                          <option value="PK">Pakistan</option>
                                          <option value="PW">Palau</option>
                                          <option value="PS">Palestinian Territory, Occupied</option>
                                          <option value="PA">Panama</option>
                                          <option value="PG">Papua New Guinea</option>
                                          <option value="PY">Paraguay</option>
                                          <option value="PE">Peru</option>
                                          <option value="PH">Philippines</option>
                                          <option value="PN">Pitcairn</option>
                                          <option value="PL">Poland</option>
                                          <option value="PT">Portugal</option>
                                          <option value="PR">Puerto Rico</option>
                                          <option value="QA">Qatar</option>
                                          <option value="RE">R&eacute;union</option>
                                          <option value="RO">Romania</option>
                                          <option value="RU">Russian Federation</option>
                                          <option value="RW">Rwanda</option>
                                          <option value="BL">Saint Barth&eacute;lemy</option>
                                          <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                          <option value="KN">Saint Kitts and Nevis</option>
                                          <option value="LC">Saint Lucia</option>
                                          <option value="MF">Saint Martin (French part)</option>
                                          <option value="PM">Saint Pierre and Miquelon</option>
                                          <option value="VC">Saint Vincent and the Grenadines</option>
                                          <option value="WS">Samoa</option>
                                          <option value="SM">San Marino</option>
                                          <option value="ST">Sao Tome and Principe</option>
                                          <option value="SA">Saudi Arabia</option>
                                          <option value="SN">Senegal</option>
                                          <option value="RS">Serbia</option>
                                          <option value="SC">Seychelles</option>
                                          <option value="SL">Sierra Leone</option>
                                          <option value="SG">Singapore</option>
                                          <option value="SK">Slovakia</option>
                                          <option value="SI">Slovenia</option>
                                          <option value="SB">Solomon Islands</option>
                                          <option value="SO">Somalia</option>
                                          <option value="ZA">South Africa</option>
                                          <option value="GS">South Georgia and the South Sandwich Islands</option>
                                          <option value="ES">Spain</option>
                                          <option value="LK">Sri Lanka</option>
                                          <option value="SD">Sudan</option>
                                          <option value="SR">Suriname</option>
                                          <option value="SJ">Svalbard and Jan Mayen</option>
                                          <option value="SZ">Swaziland</option>
                                          <option value="SE">Sweden</option>
                                          <option value="CH">Switzerland</option>
                                          <option value="SY">Syrian Arab Republic</option>
                                          <option value="TW">Taiwan, Province of China</option>
                                          <option value="TJ">Tajikistan</option>
                                          <option value="TZ">Tanzania, United Republic of</option>
                                          <option value="TH">Thailand</option>
                                          <option value="TL">Timor-Leste</option>
                                          <option value="TG">Togo</option>
                                          <option value="TK">Tokelau</option>
                                          <option value="TO">Tonga</option>
                                          <option value="TT">Trinidad and Tobago</option>
                                          <option value="TN">Tunisia</option>
                                          <option value="TR">Turkey</option>
                                          <option value="TM">Turkmenistan</option>
                                          <option value="TC">Turks and Caicos Islands</option>
                                          <option value="TV">Tuvalu</option>
                                          <option value="UG">Uganda</option>
                                          <option value="UA">Ukraine</option>
                                          <option value="AE">United Arab Emirates</option>
                                          <option value="GB">United Kingdom</option>
                                          <option value="US">United States</option>
                                          <option value="UM">United States Minor Outlying Islands</option>
                                          <option value="UY">Uruguay</option>
                                          <option value="UZ">Uzbekistan</option>
                                          <option value="VU">Vanuatu</option>
                                          <option value="VE">Venezuela, Bolivarian Republic of</option>
                                          <option value="VN">Viet Nam</option>
                                          <option value="VG">Virgin Islands, British</option>
                                          <option value="VI">Virgin Islands, U.S.</option>
                                          <option value="WF">Wallis and Futuna</option>
                                          <option value="EH">Western Sahara</option>
                                          <option value="YE">Yemen</option>
                                          <option value="ZM">Zambia</option>
                                          <option value="ZW">Zimbabwe</option>

                                      </select>
                                  </div>

                                  <?php

                                  //dd($packages);
                                  $users = App\Models\User::all();

                                  ?>





                                  <!-- <div class="form-group">
                                      <label for="basicSelect">Select Sponsor</label>
                                      <select class="select2Me form-control form-control-lg" name="sponsor" id="sponsor">
                                          <option label="Choose Sponsor"></option>
                                          @foreach ($users as $user)

                                              <option value="{{ $user->id }}">{{ ucwords($user->user_name) }}</option>
                                          @endforeach
                                      </select>
                                  </div> -->
                                  <!-- <form id="sform" action="/search" >
                                  <div class="form-group">
                                    <label for="basicSelect" class="form-label">Select Sponsor</label>
                                    <input type="text" name="sponsor" name="query" id="search" id="sponsor" class="form-control"/>
                                  </div>
                                </form>
                                <div id="suggestUser"></div> -->
                                 @if(isset($_GET['ref']))
                                <div class="form-group">
                                    <label class="form-label" for="basic-default-email">Sponsor</label>
                                    <input type="text" value="{{$_GET['ref']}}" id="sponsor" name="sponsor" class="form-control"
                                           placeholder="Enter User Name" required/>

                                    <div id="suggestUser"></div>
                                </div>
                                @else
                                <div class="form-group">
                                    <label class="form-label" for="basic-default-email">Sponsor</label>
                                    <input type="text" id="sponsor" name="sponsor" class="form-control"
                                           placeholder="Enter User Name" required/>

                                    <div id="suggestUser"></div>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label for="basicSelect">Select Position</label>
                                    <select class="select2Me form-control" name="position" id="position">
                                        <option label="Choose position"></option>
                                        <option value="2">Right</option>
                                        <option value="1">Left</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="basic-default-email">Placement ID</label>
                                    <input type="text" id="placement_id" name="placement_id" class="form-control"
                                          required readonly />

                                </div>


                                  @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                      <div class="form-group">
                                          <x-jet-label for="terms">
                                              <div class="flex items-center">
                                                  <x-jet-checkbox name="terms" id="terms"/>

                                                  <div class="ml-2">
                                                      {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                              'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                              'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                                      ]) !!}
                                                  </div>
                                              </div>
                                          </x-jet-label>
                                      </div>
                              @endif
                                    <button class="btn btn-primary btn-block" type="submit" id="btnSubmit" tabindex="4">Sign Up</button>
                                </form>

                               <p class="text-center mt-2">
                                    <span>Already have an account?</span>
                                    <a href="{{route('login')}}">
                                        <span>Sign in instead</span>
                                    </a>
                                </p>


                            </div>
                        </div>
                        <!-- /Login v1 -->
                    </div>
                </div>

            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script type="text/javascript">
    //alert('success');
        $(document).ready(function () {
            //select2Me('');
        });
      //  $("#successMessage").delay(10000).slideUp(300);
        $('#sponsor').on('change', function (e) {
            $('#placement_id').val('');
            $("#position").select2("val", "");
        });

        $('#position').on('change', function (e) {
            var position = $(this).val();
            if (position == '') {
                return false;
            }
            var sponsor = $('#sponsor').val();
            if (sponsor == '') {
                $(this).val('');
                return alert('select a sponsor');
            }
            //var position=  $('#position').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                //url: $(this).attr('action'),
                url: '{{route("referrals-checkposition")}}',
                type: 'POST',
                data: {sponsor: sponsor, position: position},
                //dataType: 'json',
                success: function (data) {
                    $('#placement_id').val(data);
                    //location.reload();
                },
                error: function (data) {
                    console.log(data);
                }
            });

        });

        $("body").on("keyup", "#sponsor", function () {
            let searchData = $("#sponsor").val();
            if (searchData.length > 0) {
                $.ajax({
                    type: 'POST',
                    url: '{{route("get-user")}}',
                    data: {search: searchData},
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function (result) {
                        $('#suggestUser').html(result.success)
                        console.log(result.data)
                        if (result.data) {
                            $("#position").val("");
                            $("#placement_id").val("");
                            $("#position").removeAttr('disabled');
                        } else {
                            $("#position").val("");
                            $("#placement_id").val("");
                            $('#position').prop('disabled', true);
                        }
                    }
                });
            }
            if (searchData.length < 1) $('#suggestUser').html("")
        })


    </script>

    <!-- <script type="text/javascript">
        $(document).ready(function () {
            selectToMe('');
        });
        $("#successMessage").delay(10000).slideUp(300);
        $('#sponsor').on('change', function (e) {
            $('#placement_id').val('');
            $("#position").select2("val", "");
        });

        $('#position').on('change', function (e) {
            var position = $(this).val();
            if (position == '') {
                return false;
            }
            var sponsor = $('#sponsor').val();
            if (sponsor == '') {
                $(this).val('');
                return alert('select a sponsor');
            }
            //var position=  $('#position').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                //url: $(this).attr('action'),
                url: '{{route("referrals-checkposition")}}',
                type: 'POST',
                data: {sponsor: sponsor, position: position},
                //dataType: 'json',
                success: function (data) {
                    $('#placement_id').val(data);
                    //location.reload();
                },
                error: function (data) {
                    console.log(data);
                }
            });

        });

        $('#registeruser').on('submit', function (e) {
            e.preventDefault();
            //disable the submit button
            $("#btnSubmit").attr("disabled", true);
            $('form').find('small').remove();
            $('form').find('input').removeClass('is-invalid');
            var registerForm = $("#registeruser");
            var formData = registerForm.serialize();

            $.ajaxSetup({
                header: $('meta[name="_token"]').attr('content')
            })
            $.ajax({
                url: $(this).attr('action'),
                // url: '{{route("referrals-useradd")}}',
                type: 'POST',
                data: formData,
                //dataType: 'json',
                success: function (data) {
                    //console.log(data);
                     location.reload();
                },
                error: function (error_response,e) {
                    $('#btnSubmit').attr("disabled", false);
                    if (error_response.responseJSON.message === "Insufficient Balance"){
                        alert("Insufficient Balance");
                    }
                    $.each(error_response.responseJSON.errors, function(key,value) {
                        $('#' + key ).after('<small class="text-danger">' + value + '</small>').closest('input').removeClass('is-invalid').addClass('is-invalid');

                    });
                }
            });
        });
    </script>

        <script>
      $("body").on("keyup","#search",function(){
        let searchData = $("#search").val();
        if(searchData.length>0){
          $.ajax({
            type:'POST',
            url:"{{ url('/find-users') }}",
            data:{search:searchData},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success:function(result){
                $('#suggestUser').html(result)
            }
          });
        }
        if(searchData.length<1) $('#suggestUser').html("")
      })
    </script> -->

    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('app-assets/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('app-assets/js/scripts/pages/page-auth-login.js')}}"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>
