<?php

namespace Modules\Diagnosis\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Diagnosis\Models\Diagnosis;

class DiagnosisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diagnoses= Diagnosis::paginate(30);
        return view('diagnosis::index', compact('diagnoses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('diagnosis::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        Diagnosis::create($request->all());
        return redirect()->route('diagnoses.index')
                         ->with('success', 'Diagnosis created successfully.');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $diagnosis = Diagnosis::findOrFail($id);
        return view('diagnosis::show', compact('diagnosis', 'id'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $diagnosis = Diagnosis::findOrFail($id);
        return view('diagnosis::edit', compact('diagnosis', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $diagnosis = Diagnosis::findOrFail($id);
        $diagnosis->update($request->all());
        return redirect()->route('diagnoses.index')
                         ->with('success', 'Diagnosis updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $diagnosis = Diagnosis::findOrFail($id);
        $diagnosis->delete();
        return redirect()->route('diagnoses.index')
                         ->with('success', 'Diagnosis deleted successfully.');
    }

    public function inactive()
    {
        $diagnosis = Diagnosis::onlyTrashed()->get();
     
        return view('diagnosis::inactive', compact('diagnosis'));

    }

    public function restore($id)
    {
        $diagnosis = Diagnosis::withTrashed()->where('id', $id)->first();
        $diagnosis->restore();

        return redirect()->route('diagnosis.inactive')
                         ->with('success', 'Diagnosis activated successfully.');
    }



}
