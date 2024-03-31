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
            <li class="resname">Chef's Table</li>            
            <li><a id="loggedin" href="/managehomeorder"> Welcome {{auth()->user()->name}}</a></li>
            <li><a id="manageorder" href="/manageorder"> Manage Order </a></li>
            <li class="logout">
                <form class = "logout2" method="POST" action="/logout">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
            @else
            <li class="resname">Chef's Table</li>
            <li><a class="login" href="/login"> Login </a></li>
            <li><a class="regi" href="/register"> Register </a></li>
            @endauth
        </ul>
    </div>
    
    <div id="reserve-form">
        <form  method="POST" action="/reserve">
            @csrf
        <p id="rttitle"> RESERVE YOUR TABLE </p>
        <label id="rtname" for="name">Name</label><br>
        <input id="rtnamebox" type="text" name="name"><br>
        <label id="rtmail" for="email">Email</label><br>
        <input id="rtmailbox" type="email" name ="email"><br>
        <label id="rtdate" for="date">Date</label><br>
        <input id="rtdatebox" type="date" name = "date"><br>
        <label id="rtphone" for="phone">Phone</label><br>
        <input id="rtphonebox" type="tel" name="phone" placeholder="01715-450678" pattern="[0-9]{5}-[0-9]{6}"><br>
        <label id="rtguest" for="guests">No. of guests</label><br>
        <input id="rtguestbox" type="number" name="guests"><br>
        <label id="rttime" for="time">Time</label><br>
        <input id="rttimebox" type="time" name="time"><br>
        <label id="rtdesc" for="description">Special Request</label><br>
        <textarea id="rtdescbox" name="description" rows="10"></textarea><br>
        <button id="rtsubmit" type="submit">Submit</button>
        </form>
    </div>
</body>
</html>