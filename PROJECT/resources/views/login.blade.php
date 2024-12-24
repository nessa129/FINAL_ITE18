<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in/up Form</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
        <form method="POST" action="{{ route('register.submit') }}">
                @csrf
                <h1>Create Account</h1>
                <input type="text" name="name" placeholder="Name" required />
                <input type="text" name="student_id" placeholder="Student ID" required />
                <input type="text" name="program" placeholder="Program" required />
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" id="password" name="password" placeholder="Password" required />
                <small id="password-warning" class="warning-text"></small>

                <button type="submit">Sign Up</button>
            </form>
        </div>
        <div class="form-container log-in-container">

        @if ($errors->any())
    <div class="error-messages">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <form method="POST" action="{{ route('login.submit') }}">
                @csrf
                <h1>Log in</h1>
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Password" required />
                <a href="#">Forgot your password?</a>
                <button type="submit">Log In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <div class="logo-container">
                        <img src="{{ asset('img/is.png') }}" alt="Logo" class="logo">
                    </div>
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us, please login with your personal info</p>
                    <button class="ghost" id="logIn">Log In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <div class="logo-container">
                        <img src="{{ asset('img/is.png') }}" alt="Logo" class="logo">
                    </div>
                    <h1>Hello, Ka-IS!</h1>
                    <p>Enter your personal details and start your journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>
            Created with <i class="fa fa-heart"></i> by:
            Regine H. Rivera | Aubrey A. Padas | Kimberly Suarez
        </p>
    </footer>

    <script src="{{ asset('js/login.js') }}"></script> 
</body>
</html>
