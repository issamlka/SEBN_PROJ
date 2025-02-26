<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('backend/admin_assets/assets/css/login_style.css') }}" />
    <title>Login</title>
  </head>
  <body>
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="login-box">
        <div class="login-header">
          <header>Login</header>
        </div>
        <div class="input-box">
          <input type="email" name="email" class="input-field" id="id" placeholder="Email" required>
        </div>
        <div class="input-box">
          <input type="password" class="input-field" id="password" name="password" autocomplete="current-password" placeholder="Password" required>
        </div>
        <div class="input-submit">
          <button type="submit" class="submit-btn" id="submit"></button>
          <label for="submit">Sign In</label>
        </div>
      </div>
    </form>
  </body>
</html>
