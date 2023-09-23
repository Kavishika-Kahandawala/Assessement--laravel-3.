<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registration | ABC </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LINEARICONS -->
    <link rel="stylesheet" href="{{ URL::to('fonts/linearicons/style.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/auth_style.css') }}">


</head>
<body>
    <div class="wrapper">
        <div class="inner">
            <img src="images/image-1.png" alt="" class="image-1">
            <form action="{{ URL::to('login') }}" method="post">
                <h3>Register a new account</h3>
                <div class="form-holder">
                    <span class="lnr lnr-user"></span>
                    <input type="text" class="form-control" placeholder="Username" name="username">
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-text-size"></span>
                    <input type="text" class="form-control" placeholder="Your Name" name="name">
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-lock"></span>
                    <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
                <button type="submit">
                    <span>Register</span>
                </button>
                <br/>
                <p style="text-align: center;">Already have an account? <a href="{{ URL::to('login') }}">Sign in</a></p>
            </form>
            <img src="images/image-2.png" alt="" class="image-2">
        </div>
    </div>
</body>
</html>
