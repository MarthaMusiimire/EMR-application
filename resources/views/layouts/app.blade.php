<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EMR System')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            height: 100vh;
            margin: 0;
            background-color: #f0f2f5; /* Light background color for the entire page */
        }

        .sidebar {
            min-height: 100vh;
            width: 250px;
            background-color: #2c3e50; /* Darker background color for the sidebar */
            color: #ecf0f1; /* Lighter text color */
            border-right: 1px solid #bdc3c7;
            padding-top: 20px;
        }

        .sidebar .navbar-brand {
            color: #ecf0f1;
            padding: 10px;
            font-weight: bold;
            text-align: center;
            background-color: #34495e;
            margin-bottom: 20px;
            border-radius: 4px;
        }

        .sidebar .nav-link {
            color: #ecf0f1;
            padding: 15px;
            margin: 5px;
            font-size: 16px;
        }

        .sidebar .nav-link.active {
            background-color: #2980b9;
            border-radius: 4px;
        }

        .sidebar .nav-link:hover {
            background-color: #34495e;
            border-radius: 4px;
        }

        .content {
            flex: 1;
            padding: 20px;
            background-color: #ecf0f1;
            overflow-y: auto;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="navbar-brand">
        <img src="{{ asset('images/logo.jpeg') }}" alt="Company Logo" style="max-width: 100%; max-height:100%;">
        </div>
        <div class="nav flex-column">
        <div class="dropdown">

            <!-- PATIENTS MODULE-->
            <a class="nav-link dropdown-toggle {{ request()->routeIs('patients.*') ? 'active' : '' }}" href="#" id="patientsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Patients
            </a>
            <div class="dropdown-menu" aria-labelledby="patientsDropdown">
                <a class="dropdown-item" href="{{ route('patients.create') }}">Create Patients</a>
                <a class="dropdown-item" href="{{ route('patients.index') }}">View Patients</a>
                <a class="dropdown-item" href="{{ route('patients.inactive') }}">Inactive Patients</a>
            </div>
            </div>


            <!-- DRUGS MODULE-->
            <div class="dropdown">
            <a class="nav-link dropdown-toggle {{ request()->routeIs('drugs.*') ? 'active' : '' }}" href="#" id="drugsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Drugs
            </a>
            <div class="dropdown-menu" aria-labelledby="drugsDropdown">
                <a class="dropdown-item" href="{{ route('patients.create') }}">Create Drugs</a>
                <a class="dropdown-item" href="{{ route('patients.index') }}">View Drugs</a>
            </div>
            </div>


           
            <!-- CLINICS MODULE-->
            <div class="dropdown">
            <a class="nav-link dropdown-toggle {{ request()->routeIs('clinics.*') ? 'active' : '' }}" href="#" id="clinicsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Clinics
            </a>
            <div class="dropdown-menu" aria-labelledby="clinicssDropdown">
                <a class="dropdown-item" href="{{ route('clinics.create') }}">Create Clinics</a>
                <a class="dropdown-item" href="{{ route('clinics.index') }}">View Clinics</a>
            </div>
            </div>


            <!--LABS MODULE-->
            <div class="dropdown">
            <a class="nav-link dropdown-toggle {{ request()->routeIs('labTests.*') ? 'active' : '' }}" href="#" id="labsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Lab
            </a>
            <div class="dropdown-menu" aria-labelledby="labsDropdown">
                <a class="dropdown-item" href="{{ route('labTests.create') }}">Create Lab Tests</a>
                <a class="dropdown-item" href="{{ route('labTests.index') }}">View Lab Tests</a>
                <a class="dropdown-item" href="{{ route('labTests.inactive') }}">Inactive Tests</a>
            </div>
            </div>



                 <!--DIAGNOSIS MODULE-->
                 <div class="dropdown">
            <a class="nav-link dropdown-toggle {{ request()->routeIs('diagnoses.*') ? 'active' : '' }}" href="#" id="diagnosesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Diagnoses
            </a>
            <div class="dropdown-menu" aria-labelledby="diagnosesDropdown">
                <a class="dropdown-item" href="{{ route('diagnoses.create') }}">Create Diagnosis</a>
                <a class="dropdown-item" href="{{ route('diagnoses.index') }}">View Diagnosis</a>
                <a class="dropdown-item" href="{{ route('diagnosis.inactive') }}">Inactive Diagnoses</a>
            </div>
            </div>



             <!--CONSULTATION MODULE-->
             <div class="dropdown">
            <a class="nav-link dropdown-toggle {{ request()->routeIs('consultations.*') ? 'active' : '' }}" href="#" id="consultationsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Consultations
            </a>
            <div class="dropdown-menu" aria-labelledby="consultationsDropdown">
                <a class="dropdown-item" href="{{ route('consultations.create') }}">Create Consultation</a>
                <a class="dropdown-item" href="{{ route('consultations.index') }}">View Consultations</a>
                <a class="dropdown-item" href="{{ route('consultations.inactive') }}">Inactive Consultations</a>
            </div>
            </div>



              <!--USERS MODULE-->
            <div class="dropdown">
            <a class="nav-link dropdown-toggle {{ request()->routeIs('users.*') ? 'active' : '' }}" href="#" id="usersDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Users
            </a>
            <div class="dropdown-menu" aria-labelledby="usersDropdown">
                <a class="dropdown-item" href="{{ route('users.create') }}">Create Users</a>
                <a class="dropdown-item" href="{{ route('users.index') }}">View users</a>
                <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                <a class="dropdown-item" href="{{ route('users.inactive') }}">Inactive Users</a>
                
            </div>
            </div>




            
            <!-- Add more module links here -->
        </div>
    </div>

    <div class="content">
        @yield('content')
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
