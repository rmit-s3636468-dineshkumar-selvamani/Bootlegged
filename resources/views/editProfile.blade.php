@include('layouts.store')

@include('sideNavBar')
@section('content')
    <div class="view" style="margin-left: 14%;">


        <div class="container" style="margin-left: 10%">
            <h1>Edit Profile</h1>
            <hr>
            <div class="row">
                <!-- left column -->
                @if( Auth::user()->type == 'StoreOwner')
                    <form action="/store_editProfile" method="POST" id="store_editProfile">
                    @csrf

                    <!-- edit form column -->

                        <div class="col-md-14 personal-info">
                            <div class="alert alert-info alert-dismissable">

                                <i class="fa fa-coffee"></i>
                                <strong>ALERT : </strong> Do not refresh or move to any other page before you save the
                                changes.
                            </div>


                            <h3>Personal info</h3>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if(session()->has('message'))
                                <div class="alert alert-info alert-dismissable">

                                    <i class="fa fa-coffee"></i>
                                    <strong>MESSAGE : </strong> {{ session()->get('message') }}
                                </div>
                            @endif
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="col-lg-5 control-label">Business name:</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" name="store_name" type="text"
                                               value="{{$details->store_name}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Email:</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" name="store_email" type="text"
                                               value="{{$details->store_email}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Password:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" name="store_password" type="Password"
                                               placeholder="Enter New Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Confirm password:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" name="store_password_confirmation" type="password"
                                               placeholder="Confirm New Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Address</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" name="store_address" type="text"
                                               value="{{$details->store_address}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Suburb</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" name="store_suburb" type="text"
                                               value="{{$details->store_suburb}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">State</label>
                                    <div class="col-lg-8">
                                        <div class="ui-select">
                                            <select id="store_state" name="store_state" class="form-control">
                                                @if($details->store_state == 'VIC')
                                                    <option value="VIC" selected="selected">VIC</option>
                                                    <option value="NSW">NSW</option>
                                                    <option value="WA">WA</option>
                                                    <option value="QLD">QLD</option>
                                                    <option value="SA">SA</option>
                                                    <option value="TAS">TAS</option>
                                                @endif
                                                @if($details->store_state == 'NSW')
                                                    <option value="VIC">VIC</option>
                                                    <option value="NSW" selected="selected">NSW</option>
                                                    <option value="WA">WA</option>
                                                    <option value="QLD">QLD</option>
                                                    <option value="SA">SA</option>
                                                    <option value="TAS">TAS</option>
                                                @endif
                                                @if($details->store_state == 'WA')
                                                    <option value="VIC">VIC</option>
                                                    <option value="NSW">NSW</option>
                                                    <option value="WA" selected="selected">WA</option>
                                                    <option value="QLD">QLD</option>
                                                    <option value="SA">SA</option>
                                                    <option value="TAS">TAS</option>
                                                @endif
                                                @if($details->store_state == 'QLD')
                                                    <option value="VIC">VIC</option>
                                                    <option value="NSW">NSW</option>
                                                    <option value="WA">WA</option>
                                                    <option value="QLD" selected="selected">QLD</option>
                                                    <option value="SA">SA</option>
                                                    <option value="TAS">TAS</option>
                                                @endif
                                                @if($details->store_state == 'SA')
                                                    <option value="VIC">VIC</option>
                                                    <option value="NSW">NSW</option>
                                                    <option value="WA">WA</option>
                                                    <option value="QLD">QLD</option>
                                                    <option value="SA" selected="selected">SA</option>
                                                    <option value="TAS">TAS</option>
                                                @endif
                                                @if($details->store_state == 'TAS')
                                                    <option value="VIC">VIC</option>
                                                    <option value="NSW">NSW</option>
                                                    <option value="WA">WA</option>
                                                    <option value="QLD">QLD</option>
                                                    <option value="SA">SA</option>
                                                    <option value="TAS" selected="selected">TAS</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-3 control-label">Postcode</label>
                                    <div class="col-md-8">
                                        <input class="form-control" name="store_postcode" type="number"
                                               value="{{$details->store_postcode}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-5 control-label">Contact Number</label>
                                    <div class="col-md-8">
                                        <input class="form-control" name="store_phone" type="number"
                                               value="{{$details->store_phone}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">ABN </label>
                                    <div class="col-md-8">
                                        <input class="form-control" name="store_abn" type="number"
                                               value="{{$details->store_abn}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label">License Number</label>
                                    <div class="col-md-8">
                                        <input class="form-control" name="store_license" type="text"
                                               value="{{$details->store_license}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Stripe ID</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="store_stripeid"
                                               value="{{$details->store_Stripeid}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-8">
                                        <input type="submit" class="btn btn-primary" value="Save Changes">
                                        <span></span>
                                        <input type="reset" class="btn btn-default" value="Cancel">
                                    </div>
                                </div>
                            </form>
                        </div>
            </div>
        </div>
        <hr>
        </form>

        @else
            <form action="{{ route('manu_editProfile') }}" method="POST" id="manu_editProfile">
                @csrf

                <div class="col-md-14 personal-info">
                    <div class="alert alert-info alert-dismissable">
                        <a class="panel-close close" data-dismiss="alert">×</a>
                        <i class="fa fa-coffee"></i>
                        <strong>ALERT : </strong> Do not refresh or move to any other page before you save the changes.
                    </div>
                    <h3>Personal info</h3>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session()->has('message'))
                        <div class="alert alert-info alert-dismissable">

                            <i class="fa fa-coffee"></i>
                            <strong>MESSAGE : </strong> {{ session()->get('message') }}
                        </div>
                    @endif
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-lg-5 control-label">Business name:</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="manu_name" type="text"
                                       value="{{$details->manu_name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email:</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="manu_email" type="text"
                                       value="{{$details->manu_email}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Password:</label>
                            <div class="col-md-8">
                                <input class="form-control" name="manu_password" type="Password"
                                       placeholder="Enter New Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-5 control-label">Confirm password:</label>
                            <div class="col-md-8">
                                <input class="form-control" name="manu_password_confirmation" type="password"
                                       placeholder="Confirm New Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Address</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="manu_address" type="text"
                                       value="{{$details->manu_address}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Suburb</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="manu_suburb" type="text"
                                       value="{{$details->manu_suburb}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">State</label>
                            <div class="col-lg-8">
                                <div class="ui-select">
                                    <select id="manu_state" name="manu_state" class="form-control">
                                        @if($details->manu_state == 'VIC')
                                            <option value="VIC" selected="selected">VIC</option>
                                            <option value="NSW">NSW</option>
                                            <option value="WA">WA</option>
                                            <option value="QLD">QLD</option>
                                            <option value="SA">SA</option>
                                            <option value="TAS">TAS</option>
                                        @endif
                                        @if($details->manu_state == 'NSW')
                                            <option value="VIC">VIC</option>
                                            <option value="NSW" selected="selected">NSW</option>
                                            <option value="WA">WA</option>
                                            <option value="QLD">QLD</option>
                                            <option value="SA">SA</option>
                                            <option value="TAS">TAS</option>
                                        @endif
                                        @if($details->manu_state == 'WA')
                                            <option value="VIC">VIC</option>
                                            <option value="NSW">NSW</option>
                                            <option value="WA" selected="selected">WA</option>
                                            <option value="QLD">QLD</option>
                                            <option value="SA">SA</option>
                                            <option value="TAS">TAS</option>
                                        @endif
                                        @if($details->manu_state == 'QLD')
                                            <option value="VIC">VIC</option>
                                            <option value="NSW">NSW</option>
                                            <option value="WA">WA</option>
                                            <option value="QLD" selected="selected">QLD</option>
                                            <option value="SA">SA</option>
                                            <option value="TAS">TAS</option>
                                        @endif
                                        @if($details->manu_state == 'SA')
                                            <option value="VIC">VIC</option>
                                            <option value="NSW">NSW</option>
                                            <option value="WA">WA</option>
                                            <option value="QLD">QLD</option>
                                            <option value="SA" selected="selected">SA</option>
                                            <option value="TAS">TAS</option>
                                        @endif
                                        @if($details->manu_state == 'TAS')
                                            <option value="VIC">VIC</option>
                                            <option value="NSW">NSW</option>
                                            <option value="WA">WA</option>
                                            <option value="QLD">QLD</option>
                                            <option value="SA">SA</option>
                                            <option value="TAS" selected="selected">TAS</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label">Postcode</label>
                            <div class="col-md-8">
                                <input class="form-control" name="manu_postcode" type="text"
                                       value="{{$details->manu_postcode}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-5 control-label">Contact Number</label>
                            <div class="col-md-8">
                                <input class="form-control" name="manu_phone" type="text"
                                       value="{{$details->manu_phone}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">ABN </label>
                            <div class="col-md-8">
                                <input class="form-control" name="manu_abn" type="text" value="{{$details->manu_abn}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-5 control-label">License Number</label>
                            <div class="col-md-8">
                                <input class="form-control" name="manu_license" type="text"
                                       value="{{$details->manu_license}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-5 control-label">Stripe ID</label>
                            <div class="col-md-8">
                                <input class="form-control" name="manu_stripeid" type="text"
                                       value="{{$details->manu_Stripeid}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-primary" value="Save Changes">
                                <span></span>
                                <input type="reset" class="btn btn-default" value="Cancel">
                            </div>
                        </div>
                    </form>
                </div>
            </form>
    </div>


    @endif


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
            integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
            integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
            crossorigin="anonymous"></script>



