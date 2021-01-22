@extends("Master.masterDesign")

@section("content")
<div class = "row">
@foreach(array_rand($selectieKleuren, 4) as $code)

<div class = "col-6" onclick="window.location.href='/{{$id}}/addKleur/{{$selectieKleuren[$code]}}'" style = "height: 500px; background-color:{{$selectieKleuren[$code]}};">
<a href="/iets"></a>
</div>
@endforeach
</div>
@endsection