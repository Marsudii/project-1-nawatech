<!DOCTYPE html>
<html>
<head>
    <title>Resend Email Verification</title>
</head>
<body>
    <h1>Resend Email Verification</h1>
    <p>Your email has not been verified yet. Please click the button below to resend the verification link.</p>

    <form method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit">Resend Verification Link</button>
    </form>
</body>
</html>
