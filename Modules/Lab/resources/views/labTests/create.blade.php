@extends ('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header text-center">
                <h3>Lab Tests</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('labTests.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Test Name:</strong>
                                <input type="text" name="test_name" required maxlength='100' class="form-control" placeholder="Test Name" value="{{ old('test_name') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Duration (minutes):</strong>
                                <input type="number" name="duration" required min="0" class="form-control" placeholder="Duration" value="{{ old('duration') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <strong>Results:</strong>
                        <textarea name="results" class="form-control" placeholder="Enter the results">{{ old('results') }}</textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
