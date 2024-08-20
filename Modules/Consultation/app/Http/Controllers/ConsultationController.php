<?php

namespace Modules\Consultation\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Consultation\Models\Consultation;
use Modules\Diagnosis\Models\Diagnosis;


class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultations = Consultation::paginate(20);
        return view('consultation::index', compact('consultations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $diagnosis = Diagnosis::all();
        // dd($diagnosis);

        
        // Handle the case where no diagnoses are found or an unexpected result is returned
        if ($diagnosis === true || $diagnosis->isEmpty()) {
            
            abort(404, 'No diagnoses found');
        }

        return view('consultation::create', compact('diagnosis'));
        
    }


    //function for 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        Consultation::create($request->all());

        // Redirect to the index route with a success message
        return redirect()->route('consultations.index')
                         ->with('success', 'Consultation created successfully.');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $consultation = Consultation::findOrFail($id);
        return view('consultation::show', compact('consultaton', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $consultation = Consultation::findOrFail($id);
        return view('consultation::edit', compact('consultation', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $consultation = Consultation::findOrFail($id);
        $consultation->update($request->all());
        return redirect()->route('consultations.index')
                         ->with('success', 'Consultation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $consultation = Consultation::findOrFail($id);
        $consultation->delete();
        return redirect()->route('consultations.index')
                         ->with('success', 'Consultation deleted successfully.');
    }

    public function inactive()
    {
        $consultation = Consultation::onlyTrashed()->get();
        return view('consultation::inactive', compact('consultation'));

    }


    public function restore($id)
    {
        $consultation = Consultation::onlyTrashed()->findOrFail($id);
        $consultation->restore();

        return redirect()->route('consultations.inactive')
                         ->with('success', 'Consultation activated successfully.');
    }



}
