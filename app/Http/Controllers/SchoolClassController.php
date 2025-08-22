<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSchoolClassRequest;
use App\Http\Requests\UpdateSchoolClassRequest;
use App\Models\SchoolClass;

class SchoolClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schoolClasses = SchoolClass::paginate();
        return response()->json($schoolClasses);
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
    public function store(StoreSchoolClassRequest $request)
    {
        $validated = $request->validated();
        $schoolClass = SchoolClass::create($validated);
        return response()->json($schoolClass, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(SchoolClass $classes)
    {
        return response()->json($classes);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SchoolClass $classes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSchoolClassRequest $request, SchoolClass $classes)
    {
        $validated = $request->validated();
        $classes->update($validated);
        return response()->json($classes, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SchoolClass $classes)
    {
        $classes->delete();
        return response()->json(null, 204);
    }
}
