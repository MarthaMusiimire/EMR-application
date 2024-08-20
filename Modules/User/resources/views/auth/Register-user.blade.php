@extends ('layouts.app')

@section('content')


<div class="container mt-5">
    <h1>Register</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="user_name">Username</label>
            <input type="text" id="user_name" name="user_name" class="form-control" placeholder="Username" value="{{ old('user_name') }}" required>
           
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
          
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
           
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select name = "role" id= "role">
                    <option value = "1" @if(old('role')=='1') selected @endif>Doctor</option>
                    <option value = "2" @if(old('role')=='2') selected @endif>Nurse</option>
                    <option value = "3" @if(old('role')=='3') selected @endif>Lab specialist</option>
                    <option value = "4" @if(old('role)=='4') selected @endif>Pharmacist</option>

                </select>
           
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
@endsection
