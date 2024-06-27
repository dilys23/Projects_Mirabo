<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../resources/css/login.css">

</head>
<body>
    <div class="container" style="margin-top: 200px; border:solid 0.1px ; width: 430px; border-radius: 10px">
        <div class="row" style="margin: 20px 10px 10px 10px; padding: 10px">
            <div class="content" >
                <h4>Login</h4>
                <hr>
                <form action="{{route('login-user')}}" method = "post">
                    @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>

                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">
                        {{Session::get('fail')}}
                    </div>
                    @endif
                    @csrf

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" placeholder="Enter email" name="email" value="{{old('email')}}">
                        <span class="text-danger">@error('email') {{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">password</label>
                        <input type="password" class="form-control" placeholder="Enter password" name="password" value="{{old('password')}}">
                        <span class="text-danger">@error('password') {{$message}}@enderror</span>
                    </div>
                    <div class="form-group" style="margin: 20px 0px 10px 140px">
                        <button class="btn btn-block btn-primary" type="submit" > Login</button>
                    </div>
                    <br>
                    <a href="registration">New User ? Register Here.</a>
                </form>
            </div>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
