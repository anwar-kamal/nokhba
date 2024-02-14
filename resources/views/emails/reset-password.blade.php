<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        p {
            text-align: center;
            margin-bottom: 10px;
        }

        .reset-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
            margin-bottom: 10px;
            margin-right: auto;
            margin-left: auto;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            color: #777;
        }
    </style>
</head>

<body>

    <div class="container">
        <a href="#" style="display: flex;width: 100%"><img width="75" title="logo"
                style="background-color: #ffffff;margin-bottom: 10px;margin-right: auto;margin-left: auto"
                src="{{ getImage(getGlobal('logo')['logo']) }}"
                alt="logo"></a>
        <div style="display: flex;width: 100%">
            <h1 style="background-color: #ffffff;margin-bottom: 10px;margin-right: auto;margin-left: auto">Password
                Reset</h1>
        </div>
        <p>We recently received a request to reset the password for your Leaders Institute account. To proceed with the
            password reset, please follow the instructions below:</p>

        <div style="display: flex"> <a href="{{ $resetLink }}" class="reset-button">Reset Password</a></div>

        <p>If you did not request this password reset, please ignore this email. Your account is secure, and no changes
            have been made.</p>

        <p><strong>Important:</strong> This link is valid for 24 hours. After that, you'll need to request a new
            password reset.</p>

        <p>If you have any questions or need further assistance, please contact our support team at.</p>
        {{-- <p>If you have any questions or need further assistance, please contact our support team at
            [{{ $email_info['email'] }} , {{ $phone_number['phone'] }}].</p> --}}
    </div>

    <div class="footer">
        <p>Contact Information: Leaders Institute</p>
    </div>

</body>

</html>
