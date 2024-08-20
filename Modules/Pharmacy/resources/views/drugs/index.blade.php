@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            <h4 style="background-color: #FFD358; color: black; padding: 13px;">DRUGS</h4>
            </div><br><br>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('drugs.create') }}"> Create New drug</a>          
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
            <th>Drug Code</th>
            <th>Drug Name</th>
            <th>Brand Name</th>
            <th>Form</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($drugs as $drug)
        <tr>
            <td>{{ $drug->code}}
            <td>{{ $drug->drug_name}}</td>
            <td>{{ $drug->brand_name}}</td>
            <td>{{
                    $drug->form == '1' ? 'Tablets' :
                    ($drug->form == '2' ? 'Capsules' :
                    ($drug->form == '3' ? 'Injections' :
                    ($drug->form == '4' ? 'Syrups' :
                    ($drug->form == '5' ? 'Ointments' :
                    ($drug->form == '6' ? 'Creams' :
                    ($drug->form == '7' ? 'Patches' :
                    ($drug->form == '8' ? 'Suppositories' :
                    ($drug->form == '9' ? 'Drops' :
                    ($drug->form == '10' ? 'Inhalers' : 'Powders')))))))))
                }}
            </td>
         
            <td>
                <form action="{{ route('drugs.destroy',$drug->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('drugs.show',$drug->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('drugs.edit',$drug->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    
@endsection
