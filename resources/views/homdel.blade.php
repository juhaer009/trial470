
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{url('css/styles.css')}}"/>
    <title>Practice</title>
</head>

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

<form  id="onlineorder" method="POST" action="/onlineorder">
    @csrf
    <p id="hddeli">ONLINE DELIVERY</p>
    @php
        $totalCost = 0;
    @endphp
<label id="hdname" for="name">Name</label><br>
<input id="hdnamebox" type="text" name="name"><br>
<label id="hdcont" for="email">Email</label><br>
<input id="hdcontbox" type="email" name ="email"><br>
<label id="hdaddr" for="address">Address</label><br>
<input id="hdaddrbox" type="text" name = "address"><br>
<p id="hditem">Select Item</p>
@foreach($listingsall as $listing)
    <input id="hdmenu" type="checkbox" name="menu" value="{{ $listing->item_name }}" >
    <label id="hdmenubox" for="menu"> {{ $listing->item_name }} - {{$listing->price}}</label><br>
    @php
            $totalCost += $listing['Price'];
    @endphp
@endforeach

<button id="hdbutton" type="submit">Submit</button>
</form>


