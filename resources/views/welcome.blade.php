<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <div class="container my-5">
        <div class="row mb-4">
            <div class="col-md-12 text-center">
                <h1>Welcome to Our Job Booking Platform</h1>
                <p>Sign in to view job listings and express your interest.</p>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6 mx-auto text-center">
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg mb-3">Login</a><br>
                <a href="{{ route('register') }}" class="btn btn-secondary btn-lg">Register</a>
            </div>
        </div>
    </div>
</body>
</html>
