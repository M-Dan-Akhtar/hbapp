<form action="{{ route('job-postings.store') }}" method="POST">
  @csrf

  <input type="text" name="summary" placeholder="Job Title">
  <br>
  <textarea name="body" placeholder="Job Description"></textarea>
  <br>
  <button type="submit">Create Job</button>
</form>
