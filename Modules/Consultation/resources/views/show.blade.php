@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>Consultation Details</h3>
                <a href="{{ route('consultations.index') }}" class="btn btn-primary float-right">Back to Consultations</a>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label>Symptoms:</label>
                    <p>{{ $consultation->symptoms }}</p>
                </div>

                <div class="form-group">
                    <label>Duration (days):</label>
                    <p>{{ $consultation->duration }}</p>
                </div>

                <div class="form-group">
                    <label>Primary Diagnosis:</label>
                    <p>{{ $consultation->primary_diagnosis }}</p>
                </div>

                <div class="form-group">
                    <label>Other Diagnosis:</label>
                    <p>{{ $consultation->other_diagnosis }}</p>
                </div>

                <div class="form-group">
                    <label>Treatment Plan:</label>
                    <p>{{ $consultation->treatment_plan }}</p>
                </div>


                <div class="form-group">
                    <a href="{{ route('consultations.edit', $consultation->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('consultations.destroy', $consultation->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this consultation?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
