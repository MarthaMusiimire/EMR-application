@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center mb-4">Inactive Patients</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($patient->isEmpty())
            <div class="alert alert-info">
                No inactive patients found.
            </div>
        @else
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>File Number</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patient as $index => $patient)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $patient->first_name }} {{$patient->last_name}}</td>
                            <td>{{ $patient->gender == 'M' ? 'Male' : 'Female' }}</td>
                            <td>{{ $patient->date_of_birth }}</td>
                            <td>{{ $patient->file_number }}</td>
                            <td>
                                <form action="{{ route('patients.restore', $patient->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success btn-sm">Activate</button>
                                </form>
                                <a href="{{ route('inactivePatients.show', $patient->id) }}" class="btn btn-info btn-sm">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{ route('patients.index') }}" class="btn btn-primary mt-4">Back to Active Patients</a>
    </div>
@endsection