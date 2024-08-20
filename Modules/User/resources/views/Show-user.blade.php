@extends('layouts.app')

@section('title', 'User Details')

@section('content')
<div style="max-width: 800px; margin: 20px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9;">
    <h2 style="text-align: center; color: #4a90e2;">User Details</h2>
    


    <div style="margin-bottom: 10px;">
        <strong style="color: #333;">User Name:</strong>
        <span style="color: #555;">{{ $user->user_name}}</span>
    </div>

    <div style="margin-bottom: 10px;">
        <strong style="color: #333;">Email:</strong>
        <span style="color: #555;">{{ $user->email }}</span>
    </div>

    

    <div style="margin-bottom: 10px;">
        <strong style="color: #333;">Role:</strong>
        <span style="color: #555;">{{ $user->role=='1'?'Doctor':
                                            ($user->role=='2'?'Nurse':
                                            ($user->role=='3'?'Lab Specialist': 'Pharmacist'))}}</span>
    </div>



    <div class="text-center mt-4">
            <a href="{{ route('users.index', $user->id) }}" class="btn btn-primary" style="margin-right: 10px;">Back</a>
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning" style="margin-right: 10px;">Edit</a>
            
    </div>
</div>
@endsection
