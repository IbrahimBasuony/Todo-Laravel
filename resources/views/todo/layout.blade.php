<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('js/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>To-Do-List</title>
</head>
<body>
    @include('success')
    @include('errors')
    <div class="container my-3 ">
        <div class="row d-flex justify-content-center">

                <div class="container mb-5 d-flex justify-content-center">
                    <div class="col-md-4">
                        <form action="{{url("create")}}" method="post">
                            @csrf
                        <textarea type="text" class="form-control" rows="3" name="title" id="" placeholder="enter your note here"></textarea>
                        <div class="text-center">
                            <button type="submit" name="submit" class="form-control text-white bg-info mt-3 " >Add To Do</button>
                        </div>
                        </form>
                    </div>
                </div>


        </div>
        <div class="row d-flex justify-content-between">
            <!-- all -->
            <div class="col-md-3 ">
                <h4 class="text-white">All Notes</h4>


                <div class="m-2  py-3">
                    <div class="show-to-do">

                        @if (! $todo)
                        <div class="item">
                            <div class="alert-success text-center ">
                             empty to do
                            </div>
                        </div>
                        @endif
                        @foreach ($todo as $value )
                        <div class="alert alert-info p-2">
                                <h4 >{{$value['title']}}</h4>
                                <h5>{{$value['created_at']}}</h5>
                                <div class="d-flex justify-content-between mt-3">

                                    <a href="{{url("edit/$value->id")}}"class="btn btn-info p-1 text-white" >edit</a>

                                    {{-- <a href="{{url("doing/$value->id")}}"class="btn btn-info p-1 text-white" >doing</a> --}}
                                    <form action="{{url("doing/$value->id")}}"method="post">
                                        @csrf
                                        <button type="submit"class="btn btn-info p-1 text-white">doing</button>
                                    </form>
                                </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>

            <!-- doing -->
            <div class="col-md-3 ">

                <h4 class="text-white">Doing</h4>


                <div class="m-2 py-3">
                    <div class="show-to-do">

                            @if (! $doing)
                            <div class="item">
                                <div class="alert-success text-center ">
                                 empty to do
                                </div>
                            </div>
                            @endif
                            @foreach ($doing as $value )
                        <div class="alert alert-success p-2">
                                <h4 >{{$value['title']}}</h4>
                                <h5>{{$value['created_at']}}</h5>
                                <div class="d-flex justify-content-between mt-3">
                                    <a></a>
                                    {{-- <a href="{{url("done/$value->id")}}"class="btn btn-success p-1 text-white" >Done</a> --}}
                                    <form action="{{url("done/$value->id")}}"method="post">
                                        @csrf
                                        <button type="submit"class="btn btn-success p-1 text-white">done</button>
                                    </form>
                                </div>

                        </div>
                        @endforeach
                    </div>
                </div>

            </div>

            <!-- done -->
            <div class="col-md-3">
                <h4 class="text-white">Done</h4>

                <div class="m-2 py-3">
                    <div class="show-to-do">

                        @if (! $done)
                        <div class="item">
                            <div class="alert-success text-center ">
                             empty to do
                            </div>
                        </div>
                        @endif
                        @foreach ($done as $value )
                        <div class="alert alert-warning p-2">
                             <!--   <a href="" onclick="confirm('are your sure')"  class="remove-to-do text-dark d-flex justify-content-end " >X</a> -->


                                <h4 >{{$value['title']}}</h4>
                               <h5>{{$value['created_at']}}</h5>

                               <form action="{{url("delete/$value->id")}}"method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"class="btn btn-danger p-1 text-white">delete</button>
                            </form>


                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>
</html>
