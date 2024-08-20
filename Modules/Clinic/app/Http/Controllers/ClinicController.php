<?php

namespace Modules\Clinic\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Clinic\Models\Clinic;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clinics = Clinic::paginate(20);
        return view('clinic::index', compact('clinics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clinic::Create-clinic');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        Clinic::create($request->all());

        // Redirect to the index route with a success message
        return redirect()->route('clinics.index')
                         ->with('success', 'Clinic created successfully.');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        
        $clinic = Clinic::findOrFail($id);
        return view('clinic::Show-clinic', compact('clinic', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $clinic = Clinic::findOrFail($id);
        return view('clinic::Edit-clinic', compact('clinic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $clinic = Clinic::findOrFail($id);
        $clinic->update($request->all());
        return redirect()->route('clinic.index')
                         ->with('success', 'Clinic updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $clinic = Clinic::findOrFail($id);
        $clinic->delete();
        return redirect()->route('clinics.index')
                         ->with('success', 'Clinic deleted successfully.');
    }
}
