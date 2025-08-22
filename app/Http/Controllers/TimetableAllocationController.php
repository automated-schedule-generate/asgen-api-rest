<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTimetableAllocationRequest;
use App\Http\Requests\UpdateTimetableAllocationRequest;
use App\Models\TimetableAllocation;

class TimetableAllocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TimetableAllocation::with('allocationTimes')->get();
        return response($data, 200);
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
    public function store(StoreTimetableAllocationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TimetableAllocation $timetableAllocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TimetableAllocation $timetableAllocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTimetableAllocationRequest $request, TimetableAllocation $timetableAllocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TimetableAllocation $timetableAllocation)
    {
        //
    }
}
