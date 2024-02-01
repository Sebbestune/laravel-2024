<html>
    <body>
        <h1>Hello, {{ $name }}</h1>
        @if ($usertype === "unregistered")
            <button>Register/Login</button>
        @else
            <button>Profile</button>
        @endif
        @if ($usertype === "admin")
            <button>Admin Panel</button>
        @endif

        @include('fragments.post-editor')
    </body>
</html>