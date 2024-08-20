@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>Edit Consultation</h3>
            </div>

            <div class="card-body">
                <form action="{{ route('consultations.update', $consultation->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="symptoms"><strong>Symptoms:</strong></label>
                        <textarea name="symptoms" class="form-control" placeholder="Describe the symptoms" required>{{ old('symptoms') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="duration"><strong>Duration (in days):</strong></label>
                        <input type="number" name="duration" class="form-control" placeholder="Duration of symptoms" required value="{{ old('duration') }}">
                    </div>

                    <div class="form-group">
                        <label for="primary_diagnosis"><strong>Primary Diagnosis:</strong></label>
                        <input type="text" name="primary_diagnosis" class="form-control" placeholder="Primary Diagnosis" required value="{{ old('primary_diagnosis') }}">
                    </div>

                    <div class="form-group">
                        <label for="other_diagnosis"><strong>Other Diagnosis:</strong></label>
                        <input type="text" name="other_diagnosis" class="form-control" placeholder="Other Diagnosis (if any)" value="{{ old('other_diagnosis') }}">
                    </div>

                    <div class="form-group">
                        <label for="treatment_plan"><strong>Treatment Plan:</strong></label>
                        <textarea name="treatment_plan" class="form-control" placeholder="Outline the treatment plan" required>{{ old('treatment_plan') }}</textarea>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Edit Consultation</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
