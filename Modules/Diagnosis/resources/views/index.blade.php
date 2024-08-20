@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>All Diagnoses</h3>
                <a href="{{ route('diagnoses.create') }}" class="btn btn-primary float-right">Add New Diagnosis</a>
            </div>

            <div class="card-body">
                @if($diagnoses->isEmpty())
                    <p>No diagnoses found.</p>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Diagnosis Name</th>
                                <th>ICD-11 Code</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($diagnoses as $diagnosis)
                                <tr>
                                    <td>{{ $diagnosis->diagnosis_name }}</td>
                                    <td>{{ $diagnosis->icd_code }}</td>
                                    <td>
                                        <a href="{{ route('diagnoses.show', $diagnosis->id) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('diagnoses.edit', $diagnosis->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('diagnoses.destroy', $diagnosis->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this diagnosis?')">Delete</button>
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

