<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Dashboard</title>
</head>
<body>
    <h1>User Dashboard</h1>
    <div>
        @if(session()->has('success'))
            <div> 
                {{session('success')}}
            </div>
        @endif
    </div>
    <div>
        @if($errors->any())
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <form method="post" action="">
        @csrf
        @method('POST')
        <div>
            <label>Username</label>
            <input type="text" name="name" placeholder="username">
        </div>
        <div>
            <label>Password</label>
            <input type="text" name="password" placeholder="password">
        </div>
        <div>
            <input type="submit" value="Save account"/>
        </div>
    </form>

    <div>
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Password</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($userdashboard as $userdashboard)
                <tr>
                    <td>{{$userdashboard ->name}}</td>
                    <td>{{$userdashboard ->password}}</td>
                    <td>
                        <a href="{{route('edit', ['userdashboard' => $userdashboard])}}">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{route('delete', ['userdashboard' => $userdashboard])}}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete"/>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>