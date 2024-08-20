@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Prescription for Patient</h2>
    
    <!-- Prescription Form -->
    <form action="{{ route('prescriptions.store') }}" method="POST">
        @csrf
        
        <!-- Patient Selection -->
        <div class="form-group">
            <label for="patient_id">Patient:</label>
            <select name="patient_id" id="patient_id" class="form-control" required>
                <option value="">Select a patient</option>
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->name }} - {{ $patient->date_of_birth }}</option>
                @endforeach
            </select>
        </div>

        <!-- Drugs Section -->
        <div id="drugs-section">
            <div class="form-group">
                <label for="drug_name_1">Drug Name:</label>
                <select name="drugs[0][drug_name]" id="drug_name_1" class="form-control" required>
                    <option value="">Select a drug</option>
                    @foreach ($drugs as $drug)
                        <option value="{{ $drug->id }}">{{ $drug->name }}</option>
                    @endforeach
                </select>
            </div>

      

            <div class="form-group">
                <label for="instructions_1">Instructions:</label>
                <textarea name="drugs[0][instructions]" id="instructions_1" class="form-control" rows="3" required></textarea>
            </div>
        </div>

        <!-- Button to Add More Drugs -->
        <button type="button" id="add-more-drugs" class="btn btn-secondary mb-3">Add More Drugs</button>



        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Save Prescription</button>
    </form>
</div>

<!-- JavaScript to Add More Drugs -->
<script>
    let drugIndex = 1;

    document.getElementById('add-more-drugs').addEventListener('click', function() {
        drugIndex++;
        
        const drugSection = `
            <div class="form-group">
                <label for="drug_name_${drugIndex}">Drug Name:</label>
                <select name="drugs[${drugIndex}][drug_name]" id="drug_name_${drugIndex}" class="form-control" required>
                    <option value="">Select a drug</option>
                    @foreach ($drugs as $drug)
                        <option value="{{ $drug->id }}">{{ $drug->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="brand_name_${drugIndex}">Brand Name:</label>
                <input type="text" name="drugs[${drugIndex}][brand_name]" id="brand_name_${drugIndex}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="form_${drugIndex}">Form:</label>
                <select name="drugs[${drugIndex}][form]" id="form_${drugIndex}" class="form-control" required>
                    <option value="">Select form</option>
                    <option value="Syrup">Syrup</option>
                    <option value="Tablet">Tablet</option>
                    <option value="Ointment">Ointment</option>
                    <option value="Injection">Injection</option>
                </select>
            </div>

            <div class="form-group">
                <label for="code_${drugIndex}">Code:</label>
                <input type="text" name="drugs[${drugIndex}][code]" id="code_${drugIndex}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="instructions_${drugIndex}">Instructions:</label>
                <textarea name="drugs[${drugIndex}][instructions]" id="instructions_${drugIndex}" class="form-control" rows="3" required></textarea>
            </div>
        `;

        const drugsSection = document.getElementById('drugs-section');
        drugsSection.insertAdjacentHTML('beforeend', drugSection);
    });
</script>
@endsection
