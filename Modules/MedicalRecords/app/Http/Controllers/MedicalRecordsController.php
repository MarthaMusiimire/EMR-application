<?php

namespace Modules\MedicalRecords\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MedicalRecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('medicalrecords::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medicalrecords::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('medicalrecords::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('medicalrecords::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
