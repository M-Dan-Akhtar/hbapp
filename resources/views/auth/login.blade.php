<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-dark text-light">

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card bg-secondary text-light shadow-lg">
          <div class="card-body">
            <h3 class="card-title text-center mb-4">Login</h3>

            @if (session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
              @csrf

              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control" required autofocus>
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

              <div class="mb-3 form-check">
                <input type="checkbox" name="remember" id="remember_me" class="form-check-input">
                <label class="form-check-label" for="remember_me">Remember Me</label>
              </div>

              <div class="d-flex justify-content-between align-items-center">
                @if (Route::has('password.request'))
                  <a href="{{ route('password.request') }}" class="text-light small">Forgot your password?</a>
                @endif

                <button type="submit" class="btn btn-primary">Log in</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
