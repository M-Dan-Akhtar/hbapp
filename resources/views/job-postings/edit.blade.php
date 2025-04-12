<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Job</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-dark text-light">

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card bg-secondary text-light shadow-lg">
          <div class="card-body">
            <h3 class="card-title text-center mb-4">Edit Job Posting</h3>

            <form method="POST" action="{{ route('job-postings.update', $job_posting->id) }}">
              @csrf
              @method('PUT')

              <div class="mb-3">
                <label for="summary" class="form-label">Job Title</label>
                <input type="text" name="summary" id="summary" class="form-control" value="{{ old('summary', $job_posting->summary) }}" required>
                @error('summary')
                  <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="body" class="form-label">Job Description</label>
                <textarea name="body" id="body" class="form-control" rows="5" required>{{ old('body', $job_posting->body) }}</textarea>
                @error('body')
                  <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
              </div>

              <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('job-postings.show', $job_posting->id) }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
