<style>
    body {
        margin: 0;
    }

    .navbar {
        list-style-type: none;
        margin: 0;
        padding: 0;
        background-color: #333;
        overflow: auto;
        /* position: fixed; */
        width: 100%;
    }

    .navbar li {
        float: left;
    }

    .navbar li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-family:'Segoe UI';
        font-weight: bolder;
    }

    /* Change the link color to #111 (black) on hover */
    .navbar li a:hover {
        background-color: #111;
    }

</style>

<header>
    <nav>
        <ul class="navbar" >
            <li><a href="/home">Home</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/contract">Contract</a></li>
            <li><a href="/monitor">Monitor</a></li>
            {{ Auth::user() }}
            @if(!Auth::user() == null)
                <li style="float: right;"><a href="{{ route("logout") }}">Logout</a></li>
            @else
                <li style="float: right;"><a href="{{ route("register") }}">Register</a></li>
                <li style="float: right;"><a href="{{ route("login") }}">Login</a></li>
            @endif
        </ul>
    </nav>
</header>
