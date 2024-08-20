<?php

namespace Modules\Pharmacy\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Pharmacy\Models\Drug;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drugs= Drug::paginate(20);
        return view('pharmacy::drugs.index', compact('drugs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pharmacy::drugs.Create-drug');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        Drug::create($request->all());
        return redirect()->route('drugs.index')
                         ->with('success', 'Drug created successfully.');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $drug = Drug::findOrFail($id);
        return view('pharmacy::drugs.Show-drug', compact('drug', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $drug= Drug::findOrFail($id);
        return view('pharmacy::drugs.Edit-drug', compact('drug'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $drug = Drug::findOrFail($id);
        $drug->update($request->all());
        return redirect()->route('drugs.index')
                         ->with('success', 'Drug updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $drug = Drug::findOrFail($id);

        // Delete the drug record
        $drug->delete();

        // Redirect to the index page with a success message
        return redirect()->route('drugs.index')
                         ->with('success', 'drug deleted successfully.');
    }
}
