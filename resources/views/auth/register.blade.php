<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-dark text-light">

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card bg-secondary text-light shadow-lg">
          <div class="card-body">
            <h3 class="card-title text-center mb-4">Register</h3>

            <form method="POST" action="{{ route('register') }}">
              @csrf

              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-control" required autofocus>
                @error('name')
                  <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                @error('email')
                  <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" name="password" class="form-control" required>
                @error('password')
                  <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required>
                @error('password_confirmation')
                  <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
              </div>

              <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('login') }}" class="text-light small">Already registered?</a>
                <button type="submit" class="btn btn-primary">Register</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
