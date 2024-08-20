@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Inactive Lab Tests</h2>
    

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($labTest->isEmpty())
        <div class="alert alert-info">
            No lab tests found.
        </div>
    @else
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Test Name</th>
                    <th>Duration (minutes)</th>
                    <th>Results</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($labTest as $index => $test)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $test->test_name }}</td>
                        <td>{{ $test->duration }}</td>
                        <td>{{ $test->results }}</td>
                        <td>
                                <form action="{{ route('labTests.restore', $test->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success btn-sm">Activate</button>
                                </form>
                                <a href="{{ route('labTests.index', $test->id) }}" class="btn btn-info btn-sm">Back</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

   
</div>
@endsection
