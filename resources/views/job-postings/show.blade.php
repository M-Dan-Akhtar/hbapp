<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <div class="container">
    <h1>{{ $job_posting->summary }}</h1>
    <p>{{ $job_posting->body }}</p>

    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
    @can('update-job-posting', $job_posting)
      <a href="{{ route('job-postings.edit', $job_posting->id) }}" class="btn btn-primary ml-2">Edit Job</a>
    @endcan

    @if (!auth()->user()->interestedJobs->contains($job_posting->id))
        <form action="{{ route('job-postings.interest', $job_posting->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">I'm Interested</button>
        </form>
    @else
        <p class="text-muted mt-2">You've already expressed interest.</p>
    @endif

    @if (auth()->id() === $job_posting->user_id)
        <h5 class="mt-4">Interested Users:</h5>
        <ul>
            @forelse ($job_posting->interestedUsers as $user)
                <li>{{ $user->name }} ({{ $user->email }})</li>
            @empty
                <li>No one has expressed interest yet.</li>
            @endforelse
        </ul>
    @endif



</div>
</body>
</html>