<!DOCTYPE html>
<html>
<head>
    <title>Edit Job</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Edit Job Posting</h2>

    <form method="POST" action="{{ route('job-postings.update', $job_posting->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Job Title</label>
            <input type="text" name="summary" id="summary" class="form-control" value="{{ old('summary', $job_posting->summary) }}" required>
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Job Description</label>
            <textarea name="body" id="body" class="form-control" rows="5" required>{{ old('body', $job_posting->body) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

</body>
</html>
