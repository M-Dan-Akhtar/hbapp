<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            <div class="container">
              <h1>Available Job Postings</h1>
              @foreach($job_postings as $job)
                  <div class="card mb-3">
                      <div class="card-body">
                          <h5 class="card-title">{{ $job->summary }}</h5>
                          <p class="card-text">{{ Str::limit($job->body, 100) }}</p>
                          <a href="{{ route('job-postings.show', $job->id) }}" class="btn btn-primary">View Details</a>
                      </div>
                  </div>
              @endforeach
          </div>
        </div>
    </div>
</x-app-layout>
