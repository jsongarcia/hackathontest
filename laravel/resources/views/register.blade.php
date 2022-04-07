<html>
    <head>
        <title>Register Page</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <div class="login">
        <h1>Register Page</h1>
        @if(isset($error))
            <p class="msg msg-error">{{$error}}</p>
        @endif
        @if(isset($success))
            <p class="msg msg-success">{{$success}}</p>
        @endif
        <form action="/addUser" method="POST">
        @csrf
        <input type = "email" name="email" placeholder="Email" required><br>
        <input type = "password" name="pass1" placeholder="Password" required><br>
        <input type = "password" name="pass2" placeholder="Confirm Password" required><br>
        <input type="submit" value="Register"><br>
        </form>
        <a href = "/">Have an account? <b>Login</b></a>
        </div>
    </body>
</html>