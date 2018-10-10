<table class="table table-dark">
                    
                    <tr>
                <td><label>Product Type: </label></td>
                <td>
                    <input type="text" id="type" name="type" class="form-control here" style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); "value="{{old('type')}}" readonly >
                  
                </td>
                    </tr>
                    
                    <tr>
                
                <td><label>Total Quantity: </label></td>
                <td><input type="text" id="tqty" name="tqty" class="form-control here{{ $errors->has('tqty') ? ' is-invalid' : '' }}" style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); " value="{{old('tqty')}}" required></td>
                 @if ($errors->has('tqty'))
                                    <div class="alert alert-danger">
                                        <strong id="tqty">{{ $errors->first('tqty') }}</strong>
                                    </div>
                                @endif
                    </tr>
                    
                    <tr>
                <td><label>Unit Price: &nbsp;&nbsp;&nbsp;&nbsp;   $</label></td>
                <td><input type="text" id="unitPrice" class="form-control here{{ $errors->has('unitPrice') ? ' is-invalid' : '' }}" name="unitPrice" style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); " value="{{old('unitPrice')}}"></td>
                 @if ($errors->has('unitPrice'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('unitPrice') }}</strong>
                                    </div>
                @endif
                    </tr>

                    <tr>
                <td><label>Total Price:   &nbsp;&nbsp;   $</label></td>
                <td><input type="text" name="totalPrice" class="form-control here {{ $errors->has('unitPrice') ? ' is-invalid' : '' }}" id="totalPrice" style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); " value="{{old('totalPrice')}}"></td>
                @if ($errors->has('totalPrice'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('totalPrice') }}</strong>
                                    </div>
                                @endif
                    </tr>

                    <tr>
                <td><label>Expiry: </label></td>
                <td><input type="text" id="expiry" name="expiry" class="form-control here {{ $errors->has('expiry') ? ' is-invalid' : '' }}" style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); " value="{{old('expiry')}}"></td>
                @if ($errors->has('expiry'))
                                    <div class="alert alert-danger">
                                        <strong id="expiry">{{ $errors->first('expiry') }}</strong>
                                    </div>
                                @endif
                    </tr>

                    <tr>
                <td><label>Vintage: </label></td>
                <td><input type="text" id="vintage" name="vintage" class="form-control here {{ $errors->has('vintage') ? ' is-invalid' : '' }}" style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); " value="{{old('vintage')}}"></td>
                @if ($errors->has('vintage'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('vintage') }}</strong>
                                    </div>
                                @endif
                    </tr>

                    <tr>
                <td><label>Condition: </label></td>
                <td><input type="text" id="condition" name="condition" class="form-control here {{ $errors->has('condition') ? ' is-invalid' : '' }}" style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); " value="{{old('condition')}}" ></td>
                @if ($errors->has('condition'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('condition') }}</strong>
                                    </div>
                                @endif
                    </tr>
                    <tr>
                <td><label>Prouct Status: </label></td>
                <td>
                   
                    <select  id="status" name="status"   style="width:287px;"  class="custom-select">
                    <option value="1" selected="selected">Active</option>
                    <option value="0">Inactive</option></td>
                 
                    
                    </tr>
                    <tr>
                <td><label>Image: </label></td>
                <td><input type="file" id="pimage" name="pimage" class="form-control here {{ $errors->has('condition') ? ' is-invalid' : '' }}" style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); " ></td>
                @if ($errors->has('pimage'))
                                    <div class="alert alert-danger">
                                        <strong id="image">{{ $errors->first('pimage') }}</strong>
                                    </div>
                                @endif
                    </tr>
            </table>