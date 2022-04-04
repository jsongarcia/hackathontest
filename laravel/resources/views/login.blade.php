<html>
    <head>
        <title>Login Page</title>
    </head>
    <body>
        <h1>Login Page</h1>
        @if(Session::has("user"))
         <script> window.location ={{url('/information')}} </script>
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