@extends ('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h3>Edit  User</h3>
        </div><br>
        <div class="pull-right">
            <a class="btn btn-primary" href="#"> Back</a>
        </div><br>
    </div>
</div>

<form action="{{ route('users.update', '$user->id') }}" method="POST">

    @csrf
    @method('PUT')
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>User Name:</strong>
                <input type="text" name="user_name" required maxlength='40' minlength='2' class="form-control" placeholder="User Name" value="{{ $user->user_name}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" required class="form-control" placeholder="Email" value="{{$user->email}}">
            </div>
        </div><br>

        <div class="form-group">
                <strong>Password</strong>
                <input type="password" name="password" class="form-control" placeholder="Password" value="{{$user->password}}">
        </div>


      <div class="form-group"><br>
                <strong>Role</strong>
                <select name = "role" id= "role">
                    <option value = "1"  @if(old('role')=='1') selected @endif>Doctor</option>
                    <option value = "2"  @if(old('role')=='2') selected @endif>Nurse</option>
                    <option value = "3"  @if(old('role')=='3') selected @endif>Lab Specialist</option>
                    <option value = "4"  @if(old('role')=='4') selected @endif>Pharmacist</option>
                </select>
            </div>
        
           
        </div><br>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            
                <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </div>
   
</form>
@endsection