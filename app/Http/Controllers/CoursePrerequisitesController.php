<?php

namespace App\Http\Controllers;

use App\Models\course_prerequisites;
use App\Http\Requests\Storecourse_prerequisitesRequest;
use App\Http\Requests\Updatecourse_prerequisitesRequest;

class CoursePrerequisitesController extends Controller
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
    public function store(Storecourse_prerequisitesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(course_prerequisites $course_prerequisites)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(course_prerequisites $course_prerequisites)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatecourse_prerequisitesRequest $request, course_prerequisites $course_prerequisites)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(course_prerequisites $course_prerequisites)
    {
        //
    }
}
