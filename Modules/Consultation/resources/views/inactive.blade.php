@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Inactive Consultations</h2>
    

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($labTest->isEmpty())
        <div class="alert alert-info">
            No consultation found.
        </div>
    @else
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Symptoms</th>
                    <th>Duration (days)</th>
                    <th>Primary Diagnosis</th>
                    <th>Other Diagnoses</th>
                    <th>Treatment Plan</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consultations as $index => $consultation)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $consultation->symptoms }}</td>
                        <td>{{ $consultation->duration }}</td>
                        <td>{{ $consultation->primary_diagnosis }}</td>
                        <td>{{ $consultation->other_diagnoses }}</td>
                        <td>{{ $consultation->treatment_plan }}</td>
                        <td>
                                <form action="{{ route('consultations.restore', $consultation->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success btn-sm">Activate</button>
                                </form>
                                <a href="{{ route('consultations.index', $consultation->id) }}" class="btn btn-info btn-sm">Back</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

   
</div>
@endsection
