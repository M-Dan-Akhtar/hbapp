<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Job Details</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">


  <div class="container py-5">
    <div class="card bg-secondary text-light mb-4">
      <div class="card-body">
        <h2 class="card-title">{{ $job_posting->summary }}</h2>
        <p class="card-text">{{ $job_posting->body }}</p>
        <p class="text-light"><small>Posted on {{ $job_posting->created_at->format('M d, Y') }}</small></p>

        <div class="d-flex gap-2 mt-3">
          <a href="{{ route('dashboard') }}" class="btn btn-light btn-sm">Back to Dashboard</a>

          @can('update-job-posting', $job_posting)
            <a href="{{ route('job-postings.edit', $job_posting->id) }}" class="btn btn-primary btn-sm">Edit Job</a>
          @endcan

          @can('delete-job-posting', $job_posting)
            <form action="{{ route('job-postings.destroy', $job_posting->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this job posting?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm">Delete Job</button>
            </form>
          @endcan

        </div>

        <div class="mt-4">
          @if (!auth()->user()->interestedJobs->contains($job_posting->id))
              <form action="{{ route('job-postings.interest', $job_posting->id) }}" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-success btn-sm">I'm Interested</button>
              </form>
          @else
              <p class="text-muted mt-2">You've already expressed interest.</p>
          @endif
        </div>

        @if (auth()->id() === $job_posting->user_id)
          <div class="mt-4">
            <h5>Interested Users</h5>
            <ul class="list-group list-group-flush">
              @forelse ($job_posting->interestedUsers as $user)
                  <li class="list-group-item bg-secondary text-light">{{ $user->name }} ({{ $user->email }})</li>
              @empty
                  <li class="list-group-item bg-secondary text-light">No one has expressed interest yet.</li>
              @endforelse
            </ul>
          </div>
        @endif
      </div>
    </div>
  </div>

</body>
</html>
