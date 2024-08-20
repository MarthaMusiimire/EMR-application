@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            <h4 style="background-color: #FFD358; color: black; padding: 13px;">PATIENTS</h4>
            </div><br><br>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('patients.create') }}"> Create New Patient</a>          
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
            <th>File Number</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Gender</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($patients as $patient)
        <tr>
            <td>{{ $patient->file_number}}
            <td>{{ $patient->first_name }} {{ $patient->last_name}}</td>
            <td>{{ $patient->phone_number }}</td>
            <td>{{ ($patient->gender =='M')? 'Male':'Female'}}</td>
           
            <td>
                <form action="{{ route('patients.destroy',$patient->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('patients.show',$patient->id) }}">Details</a>
    
                    <a class="btn btn-primary" href="{{ route('patients.edit',$patient->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button><br>
                    
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    
@endsection
