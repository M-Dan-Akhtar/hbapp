<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-dark text-light">

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card bg-secondary text-light shadow-lg">
          <div class="card-body text-center py-5">
            <h1 class="card-title mb-3">Welcome to Our Job Booking Platform</h1>
            <p class="card-text mb-4">Sign in to view job listings and express your interest.</p>

            <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-2">Login</a>
            <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg">Register</a>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
