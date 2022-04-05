<html>
    <head>
        <title>Login Page</title>
    </head>
    <body>
        <h1 class="title">Login Page</h1>
        @if(Session::has("user"))
         <script> window.location.href="/home" </script>
        @endif
        @if(isset($msg))
            <p>{{$msg}}</p>
        @endif
        <form action="/" method="POST">
        @csrf
        <input type = "text" name="email" placeholder="Email"><br>
        <input type = "password" name="password" placeholder="Password"><br>
        <input type="submit" value="Login" />
        </form>
        <a href="/register">Need an account? <b>Register</b></a>
    </body>
</html>