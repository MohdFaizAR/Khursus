<?php

namespace App\Http\Controllers;

use App\Models\todolist;
use App\Http\Requests\StoretodolistRequest;
use App\Http\Requests\UpdatetodolistRequest;

class TodolistController extends Controller
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
    public function store(StoretodolistRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(todolist $todolist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(todolist $todolist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetodolistRequest $request, todolist $todolist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(todolist $todolist)
    {
        //
    }
}
