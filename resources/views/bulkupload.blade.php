@include('layouts.store')
@section('content')


    @include('sideNavBar')
    <div class="view" style="margin-left: 14%;">
        <!-- Blueprint header -->
        <header class="bp-header cf">

            <h1>Bulk Upload</h1><br><br><br>
            @if(session()->has('message'))
                <div class="alert alert-info alert-dismissable">

                    <i class="fa fa-coffee"></i>
                    <strong>MESSAGE : </strong> {{ session()->get('message') }}
                </div>

            @endif
            <div class="downloadfile text-center">
                <p> Please download the template given in the link below</p><br>
                <a href="/downloads"> Download Template </a><br><br>

                <p>Enter all the product details in the given template and upload it.</p>
            </div>

            <div style="color: black;">
                <div class="content text-center">
                    <h1>File Upload</h1><br>
                    <form action="{{URL::to('upload')}}" method="post" enctype="multipart/form-data">
                        <label style="color: black;">Select file to upload:</label>
                        <input style="color: black;" type="file" name="file" id="file">
                        @if ($errors->has('file'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('file') }}</strong>
                            </div>
                        @endif
                        <span id="error"></span>
                        <div style=" margin-top: 20px;">
                            <input type="submit" class="btn btn-primary {{$errors->has('submit') ? 'has-error' : ''}}"
                                   value="Upload" name="submit" id="submit"><span
                                    class="glyphicon glyphicon-arrow-up"></span>

                        </div>

                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </form>
                </div>
            </div>


        </header>
    </div>
