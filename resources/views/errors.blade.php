@if ($errors->any())
@foreach ($errors->all() as $error )
    {{-- {{$error}} --}}
    <div class="alert alert-danger" role="alert">
        {{$error}}
      </div>
@endforeach

@endif
