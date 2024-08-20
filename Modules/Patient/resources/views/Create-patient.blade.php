@extends('layouts.app')

  
@section('content')
<div class="row"> 
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Register New Patient</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="#"> Back</a>
        </div>
    </div>
</div>
<form action="{{ route('patients.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>First Name:</strong>
                <input type="text" name="first_name" required maxlength='40' minlength='2' class="form-control" placeholder="Fist Name" value="{{old('first_name')}}">
            </div> 
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <strong>Last Name:</strong>
                <input type="text" name="last_name" required maxlength='40' minlength='2' class="form-control" placeholder="Last Name" value="{{old('last_name')}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <strong>Gender:</strong>
                <input type="radio" id= 'male' name="gender" value="M" @if(old('gender')=='M')checked @endif>
                <label>Male</label>
                <input type="radio" id= 'female' name="gender"  value="F" @if(old('gender')=='F')checked @endif>
                <label>Female</label>
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date of Birth:</strong>
                <input type="date" required min='1900/01/01' name="date_of_birth" class="form-control" placeholder="yyyy/mm/dd" value="{{old('date_of_birth')}}">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone Number</strong>
                <input maxlength="10" type="text" name="phone_number" class="form-control" placeholder="Phone number" value="{{old('phone_number')}}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Next of Kin</strong>
                <input type="text" name="next_of_kin_name" class="form-control" placeholder="Next of Kin Name" value="{{old('next_of_kin_name')}}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Relationship</strong>
                <select name = "relationship" id= "relationship">
                    <option value = "1" @if(old('relationship')=='1') selected @endif>Father</option>
                    <option value = "2" @if(old('relationship')=='2') selected @endif>Mother</option>
                    <option value = "3" @if(old('relationship')=='3') selected @endif>Spouce</option>
                    <option value = "4" @if(old('relationship')=='4') selected @endif>Brother</option>
                    <option value = "5" @if(old('relationship')=='5') selected @endif>Sister</option>

                </select>
            </div>
</div>


            <div class="form-group">
                <strong>Next of Kin Phone Number</strong>
                <input maxlength="10" type="text" name="next_of_kin_phone_number" class="form-control" placeholder="Phone number" value="{{old('next_of_kin_phone_number')}}">
            </div>

           
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center"> <br>
            
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection 