<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create Job</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">

  <div class="container py-5">
    <h1 class="mb-4">Post a New Job</h1>

    <form action="{{ route('job-postings.store') }}" method="POST" class="bg-secondary p-4 rounded shadow">
      @csrf

      <div class="mb-3">
        <label for="summary" class="form-label">Job Title</label>
        <input type="text" name="summary" id="summary" class="form-control" placeholder="Enter job title" required>
      </div>

      <div class="mb-3">
        <label for="body" class="form-label">Job Description</label>
        <textarea name="body" id="body" class="form-control" rows="5" placeholder="Enter job description" required></textarea>
      </div>

      <button type="submit" class="btn btn-success">Create Job</button>
      <a href="{{ route('dashboard') }}" class="btn btn-light ms-2">Cancel</a>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
