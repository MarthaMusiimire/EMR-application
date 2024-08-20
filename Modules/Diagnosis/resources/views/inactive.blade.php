@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Inactive Diagnoses</h2>
    

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($diagnosis->isEmpty())
        <div class="alert alert-info">
            No diagnosis found.
        </div>
    @else
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Diagnosis Name</th>
                    <th>ICD-11 Code</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($diagnosis as $index => $diagnosis)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $diagnosis->diagnosis_name }}</td>
                        <td>{{ $diagnosis->icd_code }}</td>
                        <td>
                                <form action="{{ route('diagnosis.restore', $diagnosis->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success btn-sm">Activate</button>
                                </form>
                                <a href="{{ route('diagnoses.index', $diagnosis->id) }}" class="btn btn-info btn-sm">Back</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

   
</div>
@endsection
