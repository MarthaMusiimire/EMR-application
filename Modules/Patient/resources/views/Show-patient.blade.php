@extends('layouts.app')

@section('title', 'Patient Details')

@section('content')
<div style="max-width: 800px; margin: 20px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9;">
    <h2 style="text-align: center; color: #4a90e2;">Patient Details</h2>
    
    <div style="margin-bottom: 10px;">
        <strong style="color: #333;">File Number:</strong>
        <span style="color: #555;">{{ $patient->file_number }}</span>
    </div>

    <div style="margin-bottom: 10px;">
        <strong style="color: #333;">First Name:</strong>
        <span style="color: #555;">{{ $patient->first_name }}</span>
    </div>

    <div style="margin-bottom: 10px;">
        <strong style="color: #333;">Last Name:</strong>
        <span style="color: #555;">{{ $patient->last_name }}</span>
    </div>

    <div style="margin-bottom: 10px;">
        <strong style="color: #333;">Gender:</strong>
        <span style="color: #555;">{{ ($patient->gender =='M')? 'Male':'Female'}}</span>
    </div>

    <div style="margin-bottom: 10px;">
        <strong style="color: #333;">Date of Birth:</strong>
        <span style="color: #555;">{{ $patient->date_of_birth }}</span>
    </div>

    <div style="margin-bottom: 10px;">
        <strong style="color: #333;">Phone Number:</strong>
        <span style="color: #555;">{{ $patient->phone_number }}</span>
    </div>

    <div style="margin-bottom: 10px;">
        <strong style="color: #333;">Next of Kin Name:</strong>
        <span style="color: #555;">{{ $patient->next_of_kin_name }}</span>
    </div>

    <div style="margin-bottom: 10px;">
        <strong style="color: #333;">Next of Kin Relationship:</strong>
        <span style="color: #555;">{{ $patient->relationship=='1'?'Father':
                                            ($patient->relationship=='2'?'Mother':
                                            ($patient->relationship=='3'?'Spouce': 
                                            ($patient->relationship=='4'?'Brother': 'Sister')))}}</span>
    </div>

    <div style="margin-bottom: 10px;">
        <strong style="color: #333;">Next of Kin Phone Number:</strong>
        <span style="color: #555;">{{ $patient->next_of_kin_phone_number }}</span>
    </div><br><br>

    <div class="text-center mt-4">
            <a href="{{ route('patients.index', $patient->id) }}" class="btn btn-primary" style="margin-right: 10px;">Back</a>
            <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-warning" style="margin-right: 10px;">Edit</a>
            <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this patient?');">Delete</button>
            </form>
    </div>
</div>
@endsection
