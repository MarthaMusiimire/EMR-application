@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Inactive Uses</h2>
    

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($users->isEmpty())
        <div class="alert alert-info">
            No user found.
        </div>
    @else
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->user_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role=='1'?'Doctor':
                               ($user->role==''?'Nurse': 
                               ($user->role=='3'?'Lab-Scientist': 'Pharmacist'))}}
                        </td>
                        <td>
                                <form action="{{ route('users.restore', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success btn-sm">Activate</button>
                                </form>
                                <a href="{{ route('users.index', $user->id) }}" class="btn btn-info btn-sm">Back</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

   
</div>
@endsection
