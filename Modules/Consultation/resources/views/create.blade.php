@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation</title>
        <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- jQuery (Required for Select2) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


</head>
<body>
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>Create Consultation</h3>
            </div>

            <div class="card-body">
                <form action="{{ route('consultations.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="symptoms"><strong>Symptoms:</strong></label>
                        <textarea name="symptoms" class="form-control" placeholder="Describe the symptoms" required>{{ old('symptoms') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="duration"><strong>Duration (in days):</strong></label>
                        <input type="number" name="duration" class="form-control" placeholder="Duration of symptoms" required value="{{ old('duration') }}">
                    </div>

                    
                    
                                
                    <div class="form-group">
                        <label for="primary_diagnosis">Primary Diagnosis</label>
                        <select name="primary_diagnosis" class="form-control">
                        <option value="">Primary Diagnosis</option>
                            @foreach($diagnosis as $diagnosisItem)
                                <option value="{{ $diagnosisItem->id }}">{{ $diagnosisItem->diagnosis_name }} ({{ $diagnosisItem->icd_code }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="other_diagnoses"><strong>Other Diagnoses:</strong></label>
                        <textarea name="other_diagnoses" class="form-control" placeholder="Other diagnoses" >{{ old('other_diagnoses') }}</textarea>
                    </div>


                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Save Consultation</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

    
</body>
</html>