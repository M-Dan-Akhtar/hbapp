<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">

  
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
              {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
              <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="dropdown-item">Logout</button>
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  
  <div class="container py-5">
    <h1 class="mb-4">Available Job Postings</h1>
    @can('create-job-posting')
      <div class="mb-4">
        <a href="{{ route('job-postings.create') }}" class="btn btn-success">+ Post New Job</a>
      </div>
    @endcan
  
    @foreach($job_postings as $job)
      <div class="card bg-secondary text-light mb-3">
        <div class="card-body">
          <h5 class="card-title">{{ $job->summary }}</h5>
          <p class="card-text">{{ Str::limit($job->body, 100) }}</p>
          <small class="text-muted">Posted on {{ $job->created_at->format('M d, Y') }}</small>
          <div class="mt-2">
            <a href="{{ route('job-postings.show', $job->id) }}" class="btn btn-primary btn-sm">View Details</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
