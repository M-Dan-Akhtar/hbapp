<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobPostingController;
use App\Models\JobPosting;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [JobPostingController::class, 'index'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    

    Route::get('job-postings/create', [JobPostingController::class, 'create'])->name('job-postings.create')
         ->middleware('can:create-job-posting');

    Route::post('job-postings', [JobPostingController::class, 'store'])->name('job-postings.store')
            ->middleware('can:create-job-posting');

    Route::get('job-postings/{job_posting}/edit', [JobPostingController::class, 'edit'])->name('job-postings.edit')
        ->middleware('can:update-job-posting,job_posting');        

    Route::put('job-postings/{job_posting}', [JobPostingController::class, 'update'])->name('job-postings.update')
        ->middleware('can:update-job-posting,job_posting');

    Route::get('job-postings/{job_posting}', [JobPostingController::class, 'show'])->name('job-postings.show');

    Route::post('/job-postings/{job_posting}/interest', [JobPostingController::class, 'expressInterest'])
    ->middleware('auth')
    ->name('job-postings.interest');

    
    // Route::get('job-postings', [JobPostingController::class, 'index'])->name('job-postings.index');
    // Route::delete('job-postings/{job_posting}', [JobPostingController::class, 'destroy'])->name('job-postings.destroy')
    //     ->middleware('can:delete-job-posting,job_posting');
});

require __DIR__.'/auth.php';
