
<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <div class = "login">
            <h1 class="title">Login Page</h1>
            @if(Session::has("user"))
            <script> window.location.href="/home" </script>
             @endif
            @if(isset($error))
                <p class="msg msg-error">{{$error}}</p>
            @endif
            @if(isset($notice))
            <p class="msg msg-notice">{{$notice}}</p>
        @endif
            <form action="/" method="POST">
            @csrf
            <input type = "email" name="email" placeholder="Email" required><br>
            <input type = "password" name="password" placeholder="Password" required><br>
            <input type="submit" value="Login" />
            </form>
            <a href="/register">Need an account? <b>Register</b></a>
        </div>

    </body>
</html>

