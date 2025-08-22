<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCoordinatorRequest;
use App\Http\Requests\UpdateCoordinatorRequest;
use App\Models\Coordinator;

class CoordinatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coordinators = Coordinator::paginate(10);
        return response()->json($coordinators, 200);
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
    public function store(StoreCoordinatorRequest $request)
    {
        $validated = $request->validated();
        $coordinator = Coordinator::create($validated);
        return response()->json($coordinator, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Coordinator $coordinator)
    {
        return response()->json($coordinator->firstOrFail(), 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coordinator $coordinator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCoordinatorRequest $request, Coordinator $coordinator)
    {
        $validated = $request->validated();
        $coordinator->update($validated);
        return response()->json($coordinator, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coordinator $coordinator)
    {
        //
    }
}
