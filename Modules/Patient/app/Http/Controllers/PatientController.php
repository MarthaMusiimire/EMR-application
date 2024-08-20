<?php

namespace Modules\Patient\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Patient\Models\Patient;
use Modules\Patient\Http\Requests\StorePatientRequest;
use Modules\Patient\Http\Requests\UpdatePatientRequest;



class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $patients = Patient::paginate(20);
        return view('patient::index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patient::Create-patient');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
       
        Patient::create($request->all());

        // Redirect to the index route with a success message
        return redirect()->route('patients.index')
                         ->with('success', 'Patient created successfully.');
}

    /**
     * Show the specified resource.
     */
    public function show($id)
    {

        $patient = Patient::findOrFail($id);
        return view('patient::Show-patient', compact('patient', 'id'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patient::Edit-patient', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        
        $patient = Patient::findOrFail($id);
        $patient->update($request->all());
        return redirect()->route('patients.index')
                         ->with('success', 'Patient updated successfully.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        return redirect()->route('patients.index')
                         ->with('success', 'Patient deleted successfully.');

    }

    public function inactive()
    {
        $patient = Patient::onlyTrashed()->get();
     
        return view('patient::inactive-patients', compact('patient'));

    }

    public function restore($id)
    {
        $patient = Patient::onlyTrashed()->findOrFail($id);
        $patient->restore();

        return redirect()->route('patients.inactive')
                         ->with('success', 'Patient activated successfully.');
    }


    public function showInactive($id)
    {

        $patient = Patient::withTrashed()->findOrFail($id);
        return view('patient::Show-inactive', compact('patient'));

    }
}
