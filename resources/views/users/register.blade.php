<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{url('css/styles.css')}}"/>
    <title>Practice</title>
</head>
<body>
    <div class="navbar">
        <ul id = "list1">
            @auth
            <li class="login">Welcome {{auth()->user()->name}}</li>
            <li><a class="regi" href="/manage-order"> Manage Order </a></li>
            <li class="logout">
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
            @else
            <li><a class="login" href="/login"> Login </a></li>
            <li><a class="regi" href="/register"> Register </a></li>
            @endauth
        </ul>
    </div>
    <div>
        <form class="user-register" method = "POST" action="/users">
        @csrf
        <p class="rreg">Register</p>
        <p class="cacc">Create an account</p>
            <label class="rname" for="name">Name</label><br>
            <input class="reginame" type="text" id="name" name="name"><br>
            <label class="rmail" for="email">Email</label><br>
            <input class="regimail" type="text" id="email" name="email"><br>
            <label class="rpass" for="password">Password</label><br>
            <input class="regipass" type="password" id="password" name="password"><br>
            <label class="rcpass" for="password2">Confirm Password</label><br>
            <input class="regicpass" type="password" name="password_confirmation"><br>
            <button class="regisubmit" type="submit">Submit</button>
        </form>
    </div>
</body>
</html>