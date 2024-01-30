<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Verify Your Email Address</h2>

        <div>
            Thanks for creating an account with the verification demo app.
            Please follow the link below to verify your email address<br/>
            <H1>{{URL::to('register/verify/' . $confirmation_code)}}</H1>.<br/>
            Or if you use api
            <H1>{{$confirmation_code}}</H1>.<br/>
        </div>

    </body>
</html>