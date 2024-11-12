<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;



class MyJobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = request()->user();
        return view(
            'my_job_application.index',
            [
                'applications' => $user->jobApplications()
                    ->with([
                        'job' => fn($query) => $query->withCount('jobApplications')
                            ->withAvg('jobApplications', 'expected_salary'),
                        'job.employer'
                    ])
                    ->latest()->get()
            ]
        );
    }




    public function destroy(JobApplication $myJobApplication)
    {
        $myJobApplication->delete();
        return redirect()->back()->with(
            'success',
            'Job application removed'
        );
    }
}
