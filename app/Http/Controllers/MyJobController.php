<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\Joblisting;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MyJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        Gate::authorize('viewAnyEmployer', Joblisting::class);
        $user = request()->user();

        return view(
            'my_job.index',
            ['jobs' => $user->employer->jobs()->with(['employer', 'jobApplications', 'jobApplications.user'])->get()]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        Gate::authorize('create', Joblisting::class);
        return view('my_job.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobRequest $request)
    {
        Gate::authorize('create', Joblisting::class);


        $request->user()->employer->jobs()->create($request->validated());
        return redirect()->route('my-jobs.index')->with('success', 'Job was created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Joblisting $myJob)
    {
        Gate::authorize('update', $myJob, Joblisting::class);

        return view('my_job.edit', ['job' => $myJob]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobRequest $request, Joblisting $myJob)
    {

        Gate::authorize('update', $myJob, Joblisting::class);

        $myJob->update($request->validated());
        return redirect()->route('my-jobs.index')->with('success', 'Job updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Joblisting $myJob)
    {
        $myJob->delete();
        return redirect()->route('my-jobs.index')->with('success', 'Job deleted');
    }
}
