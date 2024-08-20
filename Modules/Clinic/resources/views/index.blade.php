@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            <h4 style="background-color: #FFD358; color: black; padding: 13px;">CLINICS</h4>
            </div><br><br>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('clinics.create') }}"> Create New Clinic</a>          
            </div>
        </div>
    </div>
    <br>

   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Clinic Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($clinics as $index => $clinic)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $clinic->clinic_name}}</td>
            <td>
                <form action="{{ route('clinics.destroy',$clinic->id) }}" method="POST">

    
                    <a class="btn btn-primary" href="{{ route('clinics.edit',$clinic->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    
@endsection

