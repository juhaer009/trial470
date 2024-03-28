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

<table id="menutable">
    <tr>
        <th>Items</th>
        <th>Price</th>
    </tr>

    @foreach($menus as $menu)
    <tr>
       {{-- <td>{{ data_get($menu, 'Item name') }}</td>--}}
       <td>{{$menu->item_name}}</td>
        <td>{{$menu->price}}</td>
    </tr>  
    @endforeach
</table>