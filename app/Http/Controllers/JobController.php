<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\job_listings;
use App\Models\Joblisting;
use App\Models\Joblistings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        Gate::authorize('viewAny', Joblisting::class);
        //seach bar
        $filter = request()->only('search', 'min_salary', 'max_salary', 'experience', 'category');

        return view('job.index', ['jobs' => Joblisting::with('employer')->latest()->filter($filter)->get()]);
    }



    public function show(Joblisting $job)
    {

        Gate::authorize('view', $job);
        return view('job.show', ['job' => $job->load('employer.jobs')]);
    }
}
