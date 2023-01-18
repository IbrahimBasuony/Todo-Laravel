<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('js/bootstrap.min.css')}}">
    <title>{{$todo->title}}</title>
</head>

<body class="container w-50 mt-5">
    @include('errors')
    <form action="{{url("update/$todo->id")}}" method="post">
        @csrf
        @method('PUT')
            <textarea type="text" class="form-control"  name="title" id="" placeholder="enter your note here">{{$todo->title}}</textarea>
            <div class="text-center">
                <button type="submit" name="submit" class="form-control text-white bg-info mt-3 " >Update</button>
            </div>
    </form>
</body>
</html>
