<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            background-color: #f3f4f6;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #374151;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 0.5rem;
            border: 1px solid #d1d5db;
            border-radius: 4px;
        }

        .checkbox {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .checkbox input {
            margin-right: 0.5rem;
        }

        .error {
            color: #fc5353;
            margin-bottom: 1rem;
            font-size: 0.875rem;
            background: #ffdbdb;
            width: 100%;
            padding: 0.5rem
        }

        .status {
            color: green;
            margin-bottom: 1rem;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .actions a {
            font-size: 0.875rem;
            color: #2563eb;
            text-decoration: none;
        }

        .actions a:hover {
            text-decoration: underline;
        }

        .login-btn {
            padding: 0.5rem 1rem;
            background-color: #4f46e5;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .login-btn:hover {
            background-color: #4338ca;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h2>User Login</h2>

        @if (session('status'))
            <div class="status">
                {{ session('status') }}
            </div>
        @endif



        <form method="POST" action="{{ route('login') }}">
            @csrf


            <label for="email">Email</label>
            <input type="email" name="email" id="email" autofocus value="{{ old('email') }}">
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror


            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror

            <div class="checkbox">
                <input type="checkbox" id="remember_me" name="remember">
                <label for="remember_me">Remember me</label>
            </div>

            <div class="actions">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forgot password?</a>
                @endif

                <button type="submit" class="login-btn">Log in</button>
            </div>
        </form>
    </div>

</body>

</html>
