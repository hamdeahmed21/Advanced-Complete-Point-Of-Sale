<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">
    <title>Email Verification</title>
</head>
<style>
    /* Styles for the container */
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f5f5f5;
    }

    /* Styles for the authentication card */
    .auth-card {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        text-align: center;
        max-width: 400px;
    }

    /* Styles for the success message */
    .success-message {
        color: green;
        font-weight: bold;
    }

    /* Styles for the buttons */
    button {
        background-color: #3490dc;
        color: #fff;
        border: none;
        border-radius: 4px;
        padding: 10px 20px;
        margin-top: 10px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #2779bd;
    }

</style>
<body>
<div class="container">
    <div class="auth-card">
        <img src="{{ asset('logo/eleblack.png') }}" alt="Company Logo" width="100px">

        <h2>Thanks for signing up!</h2>
        <p>Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</p>

        @if (session('status') == 'verification-link-sent')
            <p class="success-message">A new verification link has been sent to the email address you provided during registration.</p>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="resend-button">Resend Verification Email</button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-button">Log Out</button>
        </form>
    </div>
</div>
</body>
</html>
