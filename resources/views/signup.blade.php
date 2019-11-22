@extends('layout.app')

@section('body')
<div class="container">
            <form class="form-horizontal" id="myform" accept="/{{ $url }}" method="post" role="form">
             <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <h2><i>Sign Up</i></h2>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">First Name</label>
                    <div class="col-sm-9">
                        <input type="text"  name="fname"  placeholder="First Name" class="form-control" value="{{ old('fname') }}"  autofocus >
                    <span class="error">{{ $errors->getBag('default')->first('fname') }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label">Last Name</label>
                    <div class="col-sm-9">
                        <input type="text"  name="lname" placeholder="Last Name" class="form-control" 
                          value="{{ old('lname') }}" autofocus>
                    <span class="error">{{ $errors->getBag('default')->first('lname') }}</span>
                    </div>

                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Phone</label>
                    <div class="col-sm-9">
                       <input type="text" name="number" placeholder="Mobile Number" 
                         value="{{ old('number') }}" class="form-control">
                    <span class="error">{{ $errors->getBag('default')->first('number') }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email*</label>
                    <div class="col-sm-9">
                        <input type="email" placeholder="Email" class="form-control"  
                          value="{{ old('email') }}" name="email">
                    <span class="error">{{ $errors->getBag('default')->first('email') }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password*</label>
                    <div class="col-sm-9">
                        <input type="password" id="psd" name="password" placeholder="Password" 
                          value="{{ old('password') }}" class="form-control">
                    <span class="error">{{ $errors->getBag('default')->first('password') }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Confirm Password*</label>
                    <div class="col-sm-9">
                      <input type="password" name="cpassword" placeholder="Password" class="form-control">
                    <span class="error">{{ $errors->getBag('default')->first('cpassword') }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Address</label>
                    <div class="col-sm-9">
                        <input type="text" name="address" placeholder="Address"  value="{{ old('address') }}" class="form-control">
                    <span class="error">{{ $errors->getBag('default')->first('address') }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Country</label>
                    <div class="col-sm-9">
                    <select class="form-control" id="country_id" name="country_id" oldcountry="{{ old('country_id') }}">
                     <option disabled selected value="">Select Country</option>
                     @foreach($countryies as $country)
                     	@if(old('country_id') == $country->id)
                      		<option value="{{ $country->id }}" selected>{{ $country->name }}</option>
                    	@else
                      		<option value="{{ $country->id }}">{{ $country->name }}</option>
                    	@endif
                     @endforeach
                    </select>
                    <span class="error">{{ $errors->getBag('default')->first('country_id') }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">State</label>
                    <div class="col-sm-9" name="state_id">
                    <select class="form-control" id="state_id" name="state_id" oldstate="{{ old('state_id') }}">
                     <option disabled selected value="">Select State</option>
                    </select>
                    <span class="error">{{ $errors->getBag('default')->first('state_id') }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <span class="help-block">*Required fields</span>
                        <input type="hidden"  class="" name="role_id" value="{{ $role }}">
                    </div>
                </div>
               <button type="submit" class="btn btn-primary btn-block"><i>Sign Up</i></button>
               <center>Already have an account<p><a href="/login"><i>Log In</i></a></p><center>


            </form> <!-- /form -->
</div> <!-- ./container -->

@endsection


