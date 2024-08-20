@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">All Lab Tests</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($labTests->isEmpty())
        <div class="alert alert-info">
            No lab tests found.
        </div>
    @else
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Test Name</th>
                    <th>Duration (minutes)</th>
                    <th>Results</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($labTests as $index => $test)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $test->test_name }}</td>
                        <td>{{ $test->duration }}</td>
                        <td>{{ $test->results }}</td>
                        <td>
                            <a href="{{ route('labTests.show', $test->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('labTests.edit', $test->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('labTests.destroy', $test->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this lab test?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('labTests.create') }}" class="btn btn-primary mt-4">Add New Lab Test</a>
</div>
@endsection
