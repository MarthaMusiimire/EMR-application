@extends('layouts.app')


@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-md-6 col-lg-6"> <!-- Adjust the column size based on how narrow you want the form -->
            <div class="card">
                <div class="card-header text-center">
                    <h4>Create Diagnosis</h4>
                </div>
                <div class="card-body">
                    <!-- Use the same form for both create and edit by checking if $clinic is set -->
                    <form action="{{ route('diagnoses.store') }}" method="POST">
                        @csrf
                        
                        <div class="form-group">
                            <label for="diagnosis_name">Diagnosis Name</label>
                            <input type="text" name="diagnosis_name" id="diagnosis_name" class="form-control" value="{{ old('diagnosis_name') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="icd_code">ICD-CODE 11</label>
                            <input type="text" name="icd_code" id="icd_code" class="form-control" value="{{ old('icd_code') }}" required>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">
                                Create
                            </button>
                            <a href="{{ route('diagnoses.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection