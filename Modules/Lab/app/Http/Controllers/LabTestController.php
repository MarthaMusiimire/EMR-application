<?php

namespace Modules\Lab\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Lab\Models\LabTest;

class LabTestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $labTests= LabTest::paginate(30);
        return view('lab::labTests.index', compact('labTests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lab::labTests.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        LabTest::create($request->all());
        return redirect()->route('labTests.index')
                         ->with('success', 'Lab Test created successfully.');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $labTest = LabTest::findOrFail($id);
        return view('lab::labTests.show', compact('labTest', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $labTest = LabTest::findOrFail($id);
        return view('lab::labTests.edit', compact('labTest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $labTest = LabTest::findOrFail($id);
        $labTest->update($request->all());
        return redirect()->route('labTests.index')
                         ->with('success', 'Lab test updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $labTest = LabTest::findOrFail($id);
        $labTest->delete();
        return redirect()->route('labTests.index')
                         ->with('success', 'Lab test deleted successfully.');
    }

    public function inactive()
    {
        $labTest = LabTest::onlyTrashed()->get();
     
        return view('lab::labTests.inactive', compact('labTest'));

    }

    public function restore($id)
    {
        $labTest = LabTest::onlyTrashed()->findOrFail($id);
        $labTest->restore();

        return redirect()->route('labTests.index')
                         ->with('success', 'Lab test activated successfully.');
    }



}
