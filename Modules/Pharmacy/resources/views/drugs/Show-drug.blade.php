@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drug Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-header {
            background-color: #007bff;
            color: #fff;
        }
        .card-body {
            background-color: #f8f9fa;
        }
        .table th {
            background-color: #343a40;
            color: #fff;
        }
        .table td {
            background-color: #ffffff;
        }
        .table td.label {
            font-weight: bold;
            color: #495057;
        }
        .table td.value {
            color: #212529;
        }
        .table .row-highlight {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header text-center bg-primary text-white">
                <h3>{{ $drug->drug_name }}</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr class="row-highlight">
                        <td class="label">Brand Name</td>
                        <td class="value">{{$drug->brand_name}}</td>
                    </tr>
                    <tr>
                        <td class="label">Form</td>
                        <td class="value">{{ $drug->form=='1'?'Tablets':
                                            ($drug->form=='2'?'Capsules':
                                            ($drug->form=='3'?'Injections':
                                            ($drug->form=='4'?'Syrups':
                                            ($drug->form=='5'?'Ointments':
                                            ($drug->form=='6'?'Creams':
                                            ($drug->form=='7'?'Patches':
                                            ($drug->form=='8'?'Suppositories':
                                            ($drug->category=='9'?'Drops': 
                                            ($task->category=='10'?'Inhalers': 'Powders')))))))))  }}</td>
                    </tr>
                    <tr class="row-highlight">
                        <td class="label">Code</td>
                        <td class=" text-danger">{{ $drug->code }}</td>
                        
                    </tr>
                </table><br><br>
                <div class="text-center">
                    <a class="btn btn-primary" href="{{ route('drugs.index', $drug->id) }}">Back</a>
                </div>
                
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection