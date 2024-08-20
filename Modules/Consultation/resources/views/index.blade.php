@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h3>Consultations</h3>
                <a href="{{ route('consultations.create') }}" class="btn btn-primary float-right">Create New Consultation</a>
            </div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if($consultations->isEmpty())
                    <p>No consultations found.</p>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Symptoms</th>
                                <th>Duration (days)</th>
                                <th>Primary Diagnosis</th>
                                <th>Other Diagnosis</th>
                                <th>Treatment Plan</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($consultations as $consultation)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $consultation->symptoms }}</td>
                                    <td>{{ $consultation->duration }}</td>
                                    <td>{{ $consultation->primary_diagnosis }}</td>
                                    <td>{{ $consultation->other_diagnosis }}</td>
                                    <td>{{ $consultation->treatment_plan }}</td>
                                    <td>
                                        <a href="{{ route('consultations.show', $consultation->id) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('consultations.edit', $consultation->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('consultations.destroy', $consultation->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this consultation?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
