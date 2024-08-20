@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            <h4 style="background-color: #FFD358; color: black; padding: 13px;">USERS</h4>
            </div><br><br>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>          
            </div>
        </div>
    </div>
    <br>

   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->user_name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role=='1'? 'Doctor':
                   ($user->role=='2'? 'Nurse':
                   ($user->role=='3'? 'Lab Specialist':'Pharmacist'))}}</td>
            <td>
                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    
@endsection
