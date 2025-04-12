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
</div>
</body>
</html>