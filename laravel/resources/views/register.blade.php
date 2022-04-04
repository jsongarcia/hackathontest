<html>
    <head>
        <title>Register Page</title>
    </head>
    <body>
        <h1>Register Page</h1>
        @if(isset($msg))
            <p>{{$msg}}</p>
        @endif
        <form action="/addUser" method="POST">
        @csrf
        <input type = "text" name="email" placeholder="Email"><br>
        <input type = "password" name="pass1" placeholder="Password"><br>
        <input type = "password" name="pass2" placeholder="Confirm Password"><br>
        <input type="submit" value="Register"><br>
        </form>
        <a href = "/">Have an account? <b>Login</b></a>
    </body>
</html>