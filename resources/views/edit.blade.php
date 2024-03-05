<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit User Dashboard</h1>
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
    <form method="post" action="{{route('update', ['userdashboard' => $userdashboard])}}">
        @csrf
        @method('PUT')
        <div>
            <label>Username</label>
            <input type="text" name="name" placeholder="username" value={{$userdashboard->name}}>
        </div>
        <div>
            <label>Password</label>
            <input type="text" name="password" placeholder="password" value={{$userdashboard->password}}>
        </div>
        <div>
            <input type="submit" value="Update Account"/>
        </div>
    </form>

</body>
</html>