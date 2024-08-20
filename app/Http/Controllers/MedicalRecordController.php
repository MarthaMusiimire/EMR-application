<?php

namespace App\Http\Controllers;

use App\Models\medicalRecord;
use App\Http\Requests\StoremedicalRecordRequest;
use App\Http\Requests\UpdatemedicalRecordRequest;

class MedicalRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoremedicalRecordRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(medicalRecord $medicalRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(medicalRecord $medicalRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatemedicalRecordRequest $request, medicalRecord $medicalRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(medicalRecord $medicalRecord)
    {
        //
    }
}
