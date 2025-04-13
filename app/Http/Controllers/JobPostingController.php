<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobPosting;
use Carbon\Carbon;
class JobPostingController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $job_postings = JobPosting::where('created_at', '>=', Carbon::now()->subMonths(2))
    ->orderBy('created_at', 'desc')
    ->get();

    return view('dashboard', compact('job_postings'));    
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('job-postings.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validated = $request->validate([
      'summary' => 'required|string|max:255',
      'body' => 'required|string',
    ]);

    $validated['user_id'] = auth()->id();

    JobPosting::create($validated);

    return redirect()->route('dashboard')->with('success', 'Job created!');
  }

  /**
   * Display the specified resource.
   */
  public function show(JobPosting $job_posting)
  {
    
    return view('job-postings.show', compact('job_posting'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(JobPosting $job_posting)
  {
    return view('job-postings.edit', compact('job_posting'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, JobPosting $job_posting)
  {
    // Validate the form input
    $validated = $request->validate([
      'summary' => 'required|string|max:255',
      'body' => 'required|string',
    ]);

    $job_posting->update($validated);

    return redirect()->route('dashboard', $job_posting->id)
      ->with('success', 'Job posting updated successfully!');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(JobPosting $job_posting)
  {
    $job_posting->delete();
    return redirect()->route('dashboard')->with('success', 'Job deleted successfully.');
  }


  public function expressInterest(JobPosting $job_posting)
  {
      $user = auth()->user();

      if (!$user->interestedJobs->contains($job_posting->id)) {
          $user->interestedJobs()->attach($job_posting->id);
      }

      return redirect()->back()->with('success', 'You have expressed interest in this job!');
  }

}
