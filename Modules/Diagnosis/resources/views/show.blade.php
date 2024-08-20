@extends('layouts.app')

@section('title', 'Diagnosis Details')

@section('content')
<div style="max-width: 800px; margin: 20px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9;">
    <h2 style="text-align: center; color: #4a90e2;">Dagnosis Details</h2>
    


    <div style="margin-bottom: 10px;">
        <strong style="color: #333;">Diagnosis Name:</strong>
        <span style="color: #555;">{{ $diagnosis->diagnosis_name}}</span>
    </div>

    <div style="margin-bottom: 10px;">
        <strong style="color: #333;">ICD-11 Code:</strong>
        <span style="color: #555;">{{ $diagnosis->icd_code }}</span>
    </div>


    <div class="text-center mt-4">
            <a href="{{ route('diagnoses.index', $diagnosis->id) }}" class="btn btn-primary" style="margin-right: 10px;">Back</a>
            <a href="{{ route('diagnoses.edit', $diagnosis->id) }}" class="btn btn-warning" style="margin-right: 10px;">Edit</a>
            
    </div>
</div>
@endsection
