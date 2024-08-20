@extends('layouts.app')


@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-md-6 col-lg-6"> <!-- Adjust the column size based on how narrow you want the form -->
            <div class="card">
                <div class="card-header text-center">
                    <h4>Create Clinic</h4>
                </div>
                <div class="card-body">
                    <!-- Use the same form for both create and edit by checking if $clinic is set -->
                    <form action="{{ route('clinics.store') }}" method="POST">
                        @csrf
                        
                        <div class="form-group">
                            <label for="clinic_name">Clinic Name</label>
                            <input type="text" name="clinic_name" id="clinic_name" class="form-control" value="{{ old('clinic_name') }}" required>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">
                                Create
                            </button>
                            <a href="{{ route('clinics.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection