@extends('layouts.app')

  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Drug</h2>
        </div><br>
        <div class="pull-right">
            <a class="btn btn-primary" href="#"> Back</a>
        </div>
    </div>
</div><br>
<form action="{{ route('drugs.update', $drug->id) }}" method="POST">
    @csrf
    @method('PUT')
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Drug Name:</strong>
                <input type="text" name="drug_name"  minlength='2' class="form-control" placeholder="Drug Name" value="{{old('drug_name',  $drug->drug_name)}}">
            </div> 
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <strong>Brand Name:</strong>
                <input type="text" name="brand_name"  minlength='2' class="form-control" placeholder="Brand Name" value="{{old('brand_name', $drug->brand_name)}}">
            </div>
        </div>

        <div class="form-group">
                <strong>Form</strong>
                <select name = "form" id= "form">
                    <option value = "1" @if(old('form')=='1') selected @endif>Tablets</option>
                    <option value = "2" @if(old('form')=='2') selected @endif>Capsules</option>
                    <option value = "3" @if(old('form')=='3') selected @endif>Injections</option>
                    <option value = "4" @if(old('form')=='4') selected @endif>Syrups</option>
                    <option value = "5" @if(old('form')=='5') selected @endif>Ointments</option>
                    <option value = "6" @if(old('form')=='6') selected @endif>Creams</option>
                    <option value = "7" @if(old('form')=='7') selected @endif>Patches</option>
                    <option value = "8" @if(old('form')=='8') selected @endif>Suppositories</option>
                    <option value = "9" @if(old('form')=='9') selected @endif>Drops</option>
                    <option value = "10" @if(old('form')=='10') selected @endif>Inhalers</option>
                    <option value = "11" @if(old('form')=='11') selected @endif>Powders</option>

                </select>
        </div>
           
        </div><br>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            
                <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
   
</form>
@endsection 